<?php 
    require("./config/constante.php");
    require("./config/require.php");
    require("./config/pattern.php");
    open_session();
   /*  $array_bien =   find_bien_disponible();
    echo ("<pre>");
    var_dump($array_bien);
    echo "<pre/>";  */
    
    require(ROUTE_DIR.'./lib/router.php');
   
   
?>
