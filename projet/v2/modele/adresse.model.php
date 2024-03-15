<?php 

function insert_adresse(array $adresse):int{
    $pdo=ouvrir_connection_db();
    $sql="INSERT INTO adresse (rue,ville,numero_adresse, pays, code_postal)
                     VALUES (?, ?, ?, ?,?)";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   
    $sth->execute($adresse);
    $dernier_id = $pdo->lastInsertId();
    fermer_connection_db($pdo);
    return $dernier_id;
}

function update_adresse(array $adresses):int{
    $pdo=ouvrir_connection_db();
    $sql="UPDATE `adresse` 
            SET `rue` = ?,
             `ville` = ?,
              `pays` = ?, 
              `code_postal` = ? 
              WHERE `id_adresse` = ?";
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($adresses);
     fermer_connection_db($pdo);//fermeture
     return $sth->rowCount() ;   
  }
    
?>