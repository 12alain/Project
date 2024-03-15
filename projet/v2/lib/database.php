<?php 
          function ouvrir_connection_db():PDO{

          
            try{   
                $options=[
                    PDO::ATTR_CASE => PDO::CASE_LOWER,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]; 
                $pdo = new PDO(DB_CHAINE_CONNECTION, USER_DB, PASSWORD_DB,$options); 
                return $pdo;
            }catch (PDOException $e){
                 die ($e->getMessage());
            }
        }

        function fermer_connection_db(PDO $pdo ){
            $pdo = null;
          
        }
?>