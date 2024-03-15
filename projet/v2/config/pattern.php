<?php 

        define("VALIDE_EMAIL","#^[a-zA-Z]{1}\w{4,15}@{1}(gmail|hotmail|yahoo|)\.[a-z]{2,3}$#"); 
        define("VALIDE_NUMBER","#^(\+|00)?(221)?(77|70|75|77|78|76)[0-9]{7}$#");
        define("VALIDE_PASSWORD","#^[a-zA-Z0-9@]{4,15}$#");
        define("VALIDE_USERNAME","#^[A-Z][a-zA-Z0-9]{5,}$#");
        define("VALIDE_POSTAL","#[0-9]{5}#");
        $error=[
            'ERROR_EMAIL'=> 'L\'email est invalide',
            'ERROR_NUMBER'=> 'le numero de tephone est invalide',
            'ERROR_PASSWORD'=> 'le password est compris entre 6 et 10',
            'ERROR_USERNAME'=> 'le nom commance par une lettre majuscule'
        ]
?>