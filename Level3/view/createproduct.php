
<?php

require 'header.php';

$html = "<br>";
$html .= "<form action='index.php?op=products&act=create' method='post'>";
$html .= "<label>product_type_code</label><br>";
$html .= "<input type='text' name='product_type_code' placeholder='product_type_code'><br>";
$html .= "<label>supplier_id</label><br>";
$html .= "<input type='text' name='supplier_id' placeholder='supplier_id'><br>";
$html .= "<label>product_name</label><br>";
$html .= "<input type='text' name='product_name' placeholder='product_name'><br>";
$html .= "<label>product_price</label><br>";
$html .= "<input type='text' name='product_price' placeholder='product_price'><br>";
$html .= "<label>other_product_details</label><br>";
$html .= "<input type='text' name='other_product_details' placeholder='other_product_details'><br>";
$html .= "<input type='submit' name='submit' value='submit'><br>";
$html .= "<a class=\"crudfunctionbutton\" href='index.php'><i class='fa-solid fa-circle-plus'></i> Home</a>";

$html .= "</form>";

echo $html;

require 'footer.php';

?>