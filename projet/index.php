<?php 
    require(dirname(__DIR__)."/config/constante.php");
    require(dirname(__DIR__)."/config/require.php");
    require(dirname(__DIR__)."/config/pattern.php");
    open_session();
   /*  $array_bien =   find_bien_disponible();
    echo ("<pre>");
    var_dump($array_bien);
    echo "<pre/>";  */
    
    require(ROUTE_DIR.'lib/router.php');
   
   
?>
