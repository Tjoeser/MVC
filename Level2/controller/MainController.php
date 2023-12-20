<?php

require_once 'controller/ContactsController.php';
require_once 'controller/ProductsController.php';

class MainController
{
    private $ContactsController;
    private $ProductsController;
    public function __construct()
    {
        $this->ContactsController = new ContactsController();
        $this->ProductsController = new ProductsController();
    }

    public function __destruct()
    {
        // code
    }

    public function handleRequest()
    {
        try {

            $op = isset($_GET['op']) ? $_GET['op'] : '';
            switch ($op) {
                case 'products':
                    $this->ProductsController->handleRequest($op);
                    break;
                case 'contacts':
                    $this->ContactsController->handleRequest($op);
                    break;
                default:
                    $this->defaultCase();
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function defaultCase()
    {
        include 'view/default.php';
    }

    public function contactsCase()
    {   
        include 'view/contacts.php';
    }

    public function productsCase()
    {
        include 'view/products.php';
    }

}
