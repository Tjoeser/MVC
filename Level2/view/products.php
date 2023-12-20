
<?php

require 'header.php';

echo $Products;


if(isset($pagebuttons)){
    echo $pagebuttons;
}

if(isset($msg)){
    echo $msg;
}


require 'footer.php';

?>