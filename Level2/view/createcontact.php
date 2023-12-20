
<?php

require 'header.php';

$html = "<br>";
$html .= "<form action='index.php?op=contacts&act=create' method='post'>";
$html .= "<label>fname</label>";
$html .= "<input type='text' name='fname' placeholder='fname'>";
$html .= "<label>phone</label>";
$html .= "<input type='text' name='phone' placeholder='phone'>";
$html .= "<label>email</label>";
$html .= "<input type='text' name='email' placeholder='email'>";
$html .= "<label>Location</label>";
$html .= "<input type='text' name='address' placeholder='address'>";
$html .= "<input type='submit' name='submit' value='submit'>";
$html .= "<a class=\"crudfunctionbutton\" href='index.php'><i class='fa-solid fa-circle-plus'></i> Home</a>";

$html .= "</form>";

echo $html;

require 'footer.php';

?>