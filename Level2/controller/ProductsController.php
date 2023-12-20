<?php

require_once 'model/ProductsLogic.php';
require_once 'model/Output.php';

class ProductsController
{
    private $ProductsLogic;
    private $Output;
    public function __construct()
    {
        $this->ProductsLogic = new ProductsLogic();
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
            $page = isset($_GET['page']) ? $_GET['page'] : '';
            switch ($act) {
                case 'create':
                    $this->collectCreateProduct();
                    break; 
                case 'read':
                    $this->collectReadProduct($_GET['id']);
                    break;
                case 'update':
                    $id = $_REQUEST['id'];
                    $this->collectUpdateProduct($id);
                    break;
                case 'delete':
                    $id = $_GET['id'];
                    $this->collectDeleteProduct($id);
                    break;
                case 'search':
                    $id = $_REQUEST['name'];
                    $this->collectReadProductDropdown($id);
                    break;
                case 'searchbar':
                    $this->collectReadProductSearchbar();
                    break;
                default:
                    $p = isset($_GET['page']) ? $_GET['page'] : 1;
                    $this->collectReadPagedProducts($p);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectCreateProduct()
    {
        if (isset($_POST['submit'])){
            header("Location: index.php");
        }
        $Products = $this->ProductsLogic->createProduct();
        $dropdown = "";
        $searchbar = "";
        include 'view/createproduct.php';
    }


    public function collectReadProduct($id)
    {
        $res = $this->ProductsLogic->readProducts($id);
        $Products = $this->Output->createTable($res, "products", "product_id", 5, true);
        $dropdown = "";
        $searchbar = "";
        include 'view/products.php';
    }

    public function collectReadPagedProducts($p)
    {
        $res = $this->ProductsLogic->readAllProducts($p);
        $Products = $this->Output->createTable(($res[0]), "products", "product_id", 5, true);
        $dropdown = $this->Output->createProductsDropdown($res[0], "");
        $searchbar = $this->Output->createProductSearchbar($res[0]);
        $pages = $res[1];
        $pagebuttons = $this->Output->createButtons($pages, "products");
        $msg = "showing page {$p} of all pages";
        include 'view/products.php';
    }


    public function collectUpdateProduct($id)
    {
        $Products = $this->ProductsLogic->readProducts($id);
        $updateteable = $this->Output->createProductUpdateForm($Products);

        if (isset($_POST['submit'])) {
            $product_type_code = isset($_REQUEST['product_type_code']) ? $_REQUEST['product_type_code'] : '';
            $supplier_id = isset($_REQUEST['supplier_id']) ? $_REQUEST['supplier_id'] : '';
            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : '';
            $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : '';
            $other_product_details = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : '';
            $update = $this->ProductsLogic->updateProduct($id, $product_type_code, $supplier_id, $product_name, $product_price, $other_product_details);
            header("Location: index.php");
        }
        $dropdown = "";
        $searchbar = "";

        include "view/update.php";
    }

    public function collectDeleteProduct($id)
    {
        $Products = $this->ProductsLogic->deleteProduct($id);
        $dropdown = "";
        $searchbar = "";
        include "view/delete.php";
    }

    public function collectReadProductDropdown($id)
    {
        $res = $this->ProductsLogic->dropdownSearch($id);
        $Products = $this->Output->createTable($res, "Products", "product_id", 5, true);
        $dropdown = "";
        $searchbar = "";
        include 'view/Products.php';
    }

    public function collectReadProductSearchbar(){
        $search = $_REQUEST['search'];
        $res = $this->ProductsLogic->searchProductsBar($search);
        $Products = $this->Output->createTable($res, "products", "product_id", 5, true);
        $dropdown = "";
        $searchbar = ""; 
        include 'view/Products.php';
    }
}
