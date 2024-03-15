<?php 
    define("WEB_ROUTE" , "http://localhost:8001/");
       
    //define("WEB_ROUTE" , "http://libasse24.alwaysdata.net/");
    define("HOST_DB","localhost");
            define("ROUTE_DIR" , str_replace('public' ,'',$_SERVER['DOCUMENT_ROOT']));
            //connexion avec la base de donnee
            define("USER_DB","root",);
            define('PASSWORD_DB','Libasse');
            define("DB_CHAINE_CONNECTION","mysql:dbname=gestion_location_vehicule;host=".HOST_DB);
            ///////////////////////////////
            define("UPLOAD_DIR" , ROUTE_DIR. 'public/img/uploads/vehicule/');
            define("NBR_PAGE",2);
            define("IMAGE",WEB_ROUTE.'img/uploads/vehicule/');
            
?>