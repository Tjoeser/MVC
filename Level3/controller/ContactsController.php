<?php

require_once 'model/ContactsLogic.php';
require_once 'model/Output.php';

class ContactsController
{
    private $ContactsLogic;
    private $Output;
    public function __construct()
    {
        $this->ContactsLogic = new ContactsLogic();
        $this->Output = new Output();
    }

    public function __destruct()
    {
        // code
    }

    public function handleRequest()
    {
        try {

            $act = isset($_GET['act']) ? $_GET['act'] : '';
            switch ($act) {
                case 'create':
                    $this->collectCreateContact();
                    break;
                case 'read':
                    $this->collectReadContact($_GET['id']);
                    break;
                case 'update':
                    $id = $_REQUEST['id'];
                    $this->collectUpdateContact($id);
                    break;
                case 'delete':
                    $id = $_GET['id'];
                    $this->collectDeleteContact($id);
                    break;
                case 'search':
                    $id = $_REQUEST['name'];
                    $this->collectReadContactDropdown($id);
                    break;
                case 'searchbar':
                    $this->collectReadContactSearchbar();
                    break;
                default:
                    $this->collectReadAllContacts();
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectCreateContact()
    {
        if (isset($_POST['submit'])) {
            header("Location: index.php");
        }
        $contacts = $this->ContactsLogic->createContact();
        $dropdown = "";
        $searchbar = "";
        include 'view/createcontact.php';
    }


    public function collectReadContact($id)
    {
        $res = $this->ContactsLogic->readContacts($id);
        $contacts = $this->Output->createTable($res, "contacts", "id", 5, true);
        $dropdown = "";
        $searchbar = "";
        include 'view/contacts.php';
    }

    public function collectReadAllContacts()
    {
        $res = $this->ContactsLogic->readAllContacts();
        $res2 = $this->ContactsLogic->firstname();
        $contacts = $this->Output->createTable($res, "contacts", "id", 5, true);
        $dropdown = $this->Output->createDropdown($res);
        $searchbar = $this->Output->createContactSearchbar($res);
        $msg = "showing page {} of all pages";
        include 'view/contacts.php';
    }


    public function collectUpdateContact($id)
    {
        $contacts = $this->ContactsLogic->readContacts($id);
        $updateteable = $this->Output->createContactUpdateForm($contacts);

        if (isset($_POST['submit'])) {
            $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
            $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
            $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
            $update = $this->ContactsLogic->updateContact($id, $name, $phone, $email, $address);
            header("Location: index.php");
        }
        $dropdown = "";
        $searchbar = "";
        include "view/update.php";
    }

    public function collectDeleteContact($id)
    {
        $contacts = $this->ContactsLogic->deleteContact($id);
        $dropdown = "";
        $searchbar = "";
        include "view/delete.php";
    }

    public function collectfirstname()
    {
        echo "RAAAAA";
        // $contacts = $this->ContactsLogic->firstname();
        include "view/contacts.php";
    }

    public function collectReadContactDropdown($id)
    {
        $res = $this->ContactsLogic->dropdownSearch($id);
        $contacts = $this->Output->createTable($res, "contacts", "id", 5, true);
        $dropdown = "";
        $searchbar = "";
        include 'view/contacts.php';
    }

    public function collectReadContactSearchbar()
    {
        $search = $_REQUEST['search'];
        $res = $this->ContactsLogic->searchContactsBar($search);
        $Products = $this->Output->createTable($res, "contacts", "id", 5, true);
        $dropdown = "";
        $searchbar = "";
        include 'view/Products.php';
    }
}
