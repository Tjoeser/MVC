<?php
require_once 'Datahandler.php';

class ProductsLogic
{
    private $DataHandler; // Declare the property with the correct case

    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "user_db", "root", "");
    }

    public function createProduct()
    {
        if (isset($_REQUEST['submit'])) {
            $product_type_code = $_REQUEST['product_type_code'];
            $supplier_id = $_REQUEST['supplier_id'];
            $product_name = $_REQUEST['product_name'];
            $product_price = $_REQUEST['product_price'];
            $other_product_details = $_REQUEST['other_product_details'];
            if (empty($product_type_code) or empty($supplier_id) or empty($product_name) or empty($product_price) or empty($other_product_details)) {
                return "Alle velden zijn vereist";
            } else {
                $sql = "INSERT INTO products (product_type_code, supplier_id, product_name, product_price, other_product_details) 
                            VALUES('$product_type_code', '$supplier_id', '$product_name', '$product_price', '$other_product_details')";
                $this->DataHandler->createData($sql);
                return 'Successfully created new Product!';
                $html = "<a class=\"crudfunctionbutton\" href='index.php'><i class='fa-solid fa-circle-plus'></i> Home</a>";
                echo $html;
            }
        }
    }

    public function readProducts($product_id)
    {
        $sql = "SELECT product_id, product_type_code, supplier_id, product_name, CONCAT('€ ',REPLACE(product_price, '.', ','))product_price, other_product_details FROM products WHERE product_id IN ($product_id)";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function readAllProducts($p)
    {
        try {
            $items_per_page = 5;
            $position = (($p - 1) * $items_per_page);
            $sql = "SELECT product_id, product_type_code, supplier_id, product_name, CONCAT('€ ',REPLACE(product_price, '.', ','))product_price, other_product_details FROM products LIMIT $position, $items_per_page";
            $result = $this->DataHandler->readsData($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $pages = $this->DataHandler->readsData("SELECT COUNT(*) FROM products");
            $res = $result->fetchAll();
            $pages = ceil($pages->fetchColumn() / $items_per_page);
            return array($res, $pages);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateProduct($product_id, $product_type_code, $supplier_id, $product_name, $product_price, $other_product_details)
    {
        $sql = "UPDATE `products` SET `product_type_code` = '" . $product_type_code . "', `supplier_id` = '" . $supplier_id . "', `product_name` = '" . $product_name . "', `product_price` = '" . $product_price . "', `other_product_details` = '" . $other_product_details . "' WHERE product_id=" . $product_id;
        print($sql);
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }


    public function deleteProduct($id)
    {
        $sql = "DELETE  FROM Products WHERE product_id IN ($id)";
        $result = $this->DataHandler->deleteData($sql);
        return 'Succesvol verwijderd ' . $result;
    }

    public function firstname()
    {
        $sql = "SELECT product_name FROM Products";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function dropdownSearch($id)
    {
        $sql = "SELECT * FROM products WHERE product_id=$id";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function searchProductsBar($search)
    {
        $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%' OR product_type_code LIKE '%$search%' OR supplier_id LIKE '%$search%' OR product_price LIKE '%$search%' OR other_product_details LIKE '%$search%'";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function readFullAllProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function downloadFile($res)
    {
        $filename = "webdata_" . date('Y-m-d') . ".csv";
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Content-Type: application/octet-stream');

        $header = array("product_id", "product_type_code", "supplier_id", "product_name", "product_price", "other_product_details");
        $fp = fopen('php://output', 'w');
        fputcsv($fp, $header);
        foreach ($res as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);



        $html = "";
        $html .= "Download succesvol! <br>";
        return $html;
    }
}
