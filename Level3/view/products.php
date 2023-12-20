
<?php

require 'header.php';

echo $Products;

if(isset($pagebuttons)){
    echo $pagebuttons;
}

if(isset($nextitem)){
    echo $nextitem;
}

if(isset($msg)){
    echo $msg;
}
require 'footer.php';

?>