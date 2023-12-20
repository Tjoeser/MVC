<?php
require_once 'Datahandler.php';

class ContactsLogic
{
    private $DataHandler; // Declare the property with the correct case

    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "user_db", "root", "");
    }

    // Rest of your class methods...


    public function createContact()
    {
        if (isset($_REQUEST['submit'])) {
            $name = $_REQUEST['fname'];
            $phone = $_REQUEST['phone'];
            $email = $_REQUEST['email'];
            $address = $_REQUEST['address'];
            if (empty($name) or empty($phone) or empty($email) or empty($address)) {
                return "Alle velden zijn vereist";
            } else {
                $sql = "INSERT INTO contacts (name, phone, email, address) 
                            VALUES('$name', '$phone', '$email', '$address')";
                $this->DataHandler->createData($sql);
                return 'Successfully created new contact!';
                $html = "<a class=\"crudfunctionbutton\" href='index.php'><i class='fa-solid fa-circle-plus'></i> Home</a>";
                echo $html;
            }
        }
    }

    public function readContacts($id)
    {
        $sql = "SELECT * FROM contacts WHERE id=$id";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function readAllContacts()
    {
        try {
            $sql = "SELECT * FROM contacts";
            $result = $this->DataHandler->readsData($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateContact($id, $name, $phone, $email, $address)
    {
        $sql = "UPDATE `contacts` SET `name` = '" . $name . "', `phone` = '" . $phone . "', `email` = '" . $email . "', `address` = '" . $address . "' WHERE id=" . $id;
        print($sql);
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }
    

    public function deleteContact($id)
    {
        $sql = "DELETE  FROM contacts WHERE id=$id";
        $result = $this->DataHandler->deleteData($sql);
        return 'Succesvol verwijderd ' . $result;
    }

    public function firstname()
    {
        $sql = "SELECT name FROM contacts";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function dropdownSearch($id)
    {
        $sql = "SELECT * FROM contacts WHERE id=$id";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function searchContactsBar($search){
        $sql = "SELECT * FROM contacts WHERE name LIKE '%$search%' OR phone LIKE '%$search%' OR email LIKE '%$search%' OR address LIKE '%$search%'";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }
}
