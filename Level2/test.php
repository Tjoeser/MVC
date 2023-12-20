<?php

function createTable($data, $act, $id_name){
    $row = ["product_id" => 12, "name" => "Jack"];
    var_dump($row);
    $html = "je moeder";
    $id = $row[$id_name];
    $html .= "<a href='index.php?act={$act}&op=read&id={$id}'> Link</a>";
    return $html;
}


$spul = "";
echo createTable($spul, "products", "product_id");

?>