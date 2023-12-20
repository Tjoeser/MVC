<?php

require_once 'controller/ContactsController.php';
class Output
{

    public function __construct()
    {
        try{
        } catch (PDOException $e) {
        }
    }

    public function __destruct()
    {
        // code
    }

    public function createTable($result, $controller, $uniquecolumn, $pages, $addcheckboxes){
        $tableheader = false;
        $html = "<div class='content'>";
        $html .= "<table>";
        $html .= "<br>";
        $html .= "<a class=\"crudfunctionbutton\" href='index.php?op={$controller}&act=create'><i class='fa-solid fa-circle-plus'></i> Create</a>";
        $html .= "<br>";
        $html .= "<br>";
        foreach ($result as $row){
            if ($tableheader == false){
                $html .= "<tr>";
                foreach ($row as $key => $value){
                    $html .= "<th>" . $key . "</th>";
                }
                $html .= "<th>actions</th>";
                $html .= "</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";
            foreach ($row as $key => $value){
                $html .= "<td data-title='{$key}'>" . $value . "</td>";
            }
            $html .= "<td><a class=\"crudfunctionbutton\" href='index.php?op={$controller}&act=read&id={$row[$uniquecolumn]}'><i class='fa fa-pencil'></i> Read</a>";
            $html .= "<a class=\"crudfunctionbutton\" href='index.php?op={$controller}&act=update&id={$row[$uniquecolumn]}'><i class='fa fa-wrench'></i>Update</a>";
            $html .= "<a class=\"crudfunctionbutton\" href='index.php?op={$controller}&act=delete&id={$row[$uniquecolumn]}'><i class='fa fa-trash'></i> Delete</a></td>";
            $html .= "<tr>";
        }
        $html .= "</table></div><br>";
        return $html;
    }


    public function createDropdown($res)
    {
        $id = $res[0]['id'];
        $html = "<form class='searchsectionform' action='index.php?op=contacts&act=search&id={$id}' method='post'>";
        $html .= "<select name='name' onchange='this.form.submit()'>";
        $html .= "<option value=''>Selecteer een naam</option>";
        
        foreach ($res as $row){
            $fname = explode(" ", $row['name']);
            $html .= "<option value='".$row['id']."'>". $fname[0] . " </option>";
        }
        $html .= "</select>";
        $html .= "</form>";
        return $html;
    }

    public function createProductsDropdown($res)
    {
        $id = $res[0]['product_id'];
        $html = "<form class='searchsectionform' action='index.php?op=products&act=search&id={$id}' method='post'>";
        $html .= "<select name='name' onchange='this.form.submit()'>";
        $html .= "<option value=''>Selecteer een product</option>";

        foreach ($res as $row){
            $fname = $row['product_name'];
            $html .= "<option value='".$row['product_id']."'>". $fname . " </option>";
        }
        $html .= "</select>";
        $html .= "</form>";
        return $html;
    }


    public function createContactSearchbar($res)
    {
        $html = "<form class='searchsectionform' id='productsearchbar' action='index.php?op=contacts&act=searchbar' method='post'>";
        $html .= '<input class="whitebox" type="text" name="search" placeholder="Search">';
        $html .= '<input type ="submit">';
        $html .= '</form>';
        return $html;
    }

    public function createProductSearchbar($res)
    {
        $html = '<form class="searchsectionform" id="productsearchbar" method="post" action="index.php?op=products&act=searchbar">';
        $html .= '<input class="whitebox" type="text" name="search" placeholder="Search">';
        $html .= '<input type ="submit">';
        $html .= '</form>';
        return $html;
    }

    public function createContactUpdateForm($res)
    {
        // var_dump($res);
        $html = "<div class='content'>";
        $html .= "<form action='index.php?op=contacts&act=update' method='post'>";
        $html .= "<label>name</label>";
        $html .= "<input type='text' name='name' value='{$res[0]['name']}'>";
        $html .= "<label>phone</label>";
        $html .= "<input type='text' name='phone' value='{$res[0]['phone']}'>";
        $html .= "<label>email</label>";
        $html .= "<input type='text' name='email' value='{$res[0]['email']}'>";
        $html .= "<label>address</label>";
        $html .= "<input type='text' name='address' value='{$res[0]['address']}'>";
        $html .= "<input type='hidden' name='id' value='{$res[0]['id']}'>";
        $html .= "<input type='submit' name='submit' value='submit'>";
        $html .= "<a class=\"crudfunctionbutton\" href='index.php?contacts'><i class='fa-solid fa-circle-plus'></i> Home</a>";
        $html .= "</form>";
        $html .= "</div>";
        return $html;
    }

    public function createProductUpdateForm($res)
    {
        $a = $res[0]['product_price'];
        $b = ltrim($a, '€');

        $html = "<div class='content'>";
        $html .= "<form action='index.php?op=products&act=update&id={$res[0]['product_id']}' method='post'>";
        $html .= "<label>product_type_code</label>";
        $html .= "<input type='text' name='product_type_code' value='{$res[0]['product_type_code']}'>";
        $html .= "<label>supplier_id</label>";
        $html .= "<input type='text' name='supplier_id' value='{$res[0]['supplier_id']}'>";
        $html .= "<label>product_name</label>";
        $html .= "<input type='text' name='product_name' value='{$res[0]['product_name']}'>";
        $html .= "<label>product_price</label>";
        $html .= "<input type='text' name='product_price' value='{$b}'>";
        $html .= "<label>other_product_details</label>";
        $html .= "<input type='text' name='other_product_details' value='{$res[0]['other_product_details']}'>";
        $html .= "<input type='submit' name='submit' value='submit'>";
        $html .= "<a class=\"crudfunctionbutton\" href='index.php?op=products'><i class='fa-solid fa-circle-plus'></i> Home</a>";
        $html .= "</form>";
        $html .= "</div>";
        return $html;
    }

    public function createButtons($pages, $controller){

        $html = "";
        for ($i = 1; $i <= $pages; $i++) {
            $html .= "<a class='navbutton' href='index.php?op={$controller}&page=$i'>$i</a> ";
        }
        return $html;
    }
}