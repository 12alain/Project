<?php

function insert_conducteur(array $conducteurs):int{
    $pdo= ouvrir_connection_db();
    $sql="INSERT INTO `conducteur` (`nom_conducteur`, `prenom_conducteur`, `numero_conducteur`, `telephone_conducteur`, `id_adresse`, `id_permis`,`etat`,nom_image)
    VALUES (?, ?, ?, ?, ?, ?,?,?)";
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute($conducteurs);
  $dernier_id = $pdo->lastInsertId();
  fermer_connection_db($pdo);//fermeture
  return $dernier_id ;
}
function insert_conducteurni(array $conducteurs):int{
  $pdo= ouvrir_connection_db();
  $sql="INSERT INTO `conducteur` (`nom_conducteur`, `prenom_conducteur`, `numero_conducteur`, `telephone_conducteur`, `id_adresse`, `id_permis`,`etat`)
  VALUES (?, ?, ?, ?, ?, ?,?)";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute($conducteurs);
$dernier_id = $pdo->lastInsertId();
fermer_connection_db($pdo);//fermeture
return $dernier_id ;
}

function find_all_conducteur():array{
  $pdo= ouvrir_connection_db();//ouvertur
  $sql="select * from conducteur c,permis p
         where c.id_permis=p.id_permis
         and etat=?";
  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute(array('normal'));
  $conducteurs = $sth->fetchAll();
  fermer_connection_db($pdo);//fermeture
  return $conducteurs;
}
function find_all_conducteur_pagi(string $etat,$start,$nbrPage):array{
  $pdo= ouvrir_connection_db();//ouvertur
  $sql="select * from conducteur c,permis p
           where c.id_permis=p.id_permis
           and etat=? limit $start,$nbrPage ";
  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute(array($etat));
  $conducteurs = $sth->fetchAll();
  fermer_connection_db($pdo);//fermeture
  return $conducteurs;
}

function find_all_conducteur_by_permis():array{
  $pdo= ouvrir_connection_db();//ouvertur
  $sql="SELECT * from conducteur where etat=? and id_permis=?";
  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute(array('normal',3));
  $conducteurs = $sth->fetchAll();
  fermer_connection_db($pdo);//fermeture
  return $conducteurs;
}
function find_all_conducteur_archiver():array{
  $pdo= ouvrir_connection_db();//ouvertur
  $sql="select * from conducteur c,permis p where  c.id_permis=p.id_permis and etat=?";
  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute(array('archiver'));
  $conducteurs = $sth->fetchAll();
  fermer_connection_db($pdo);//fermeture
  return $conducteurs;
}
function archive_conducteur($etat,int $id_conducteur):int{
  $pdo=ouvrir_connection_db();
  $sql="UPDATE `conducteur` 
          SET `etat` = ?
            WHERE `id_conducteur` = ?";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($etat,$id_conducteur));
   fermer_connection_db($pdo);//fermeture
   return $sth->rowCount() ;     
}
function find_conducteur_by_id( $id_conducteur):array{
  $pdo= ouvrir_connection_db();
  $sql="SELECT * from conducteur c,permis p,adresse ad
          where c.id_permis=p.id_permis
            and c.id_adresse=ad.id_adresse
            and c.id_conducteur=? ";
  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute(array($id_conducteur));
  $conducteur = $sth->fetchAll(PDO::FETCH_ASSOC);
  fermer_connection_db($pdo);
  return $conducteur;
}
  function update_conducteur(array $conducteurs):int{
    $pdo=ouvrir_connection_db();
    $sql="UPDATE `conducteur` 
            SET `nom_conducteur` = ?,
             `prenom_conducteur` = ?,
              `telephone_conducteur` = ?, 
              `id_permis` = ?
              WHERE `id_conducteur` = ?";
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $sth->execute($conducteurs);
     fermer_connection_db($pdo);//fermeture
     return $sth->rowCount() ;     
  }
  function update_conducteur_avatar(string $nom_image,int $id_conducteur):int{
    $pdo=ouvrir_connection_db();
    $sql="UPDATE `conducteur` SET `nom_image` = ? WHERE `conducteur`.`id_conducteur` = ?; ";
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($nom_image,$id_conducteur)); 
     fermer_connection_db($pdo);//fermeture
     return $sth->rowCount() ;     
  }
  function update_conducteur_etat($etat,int $id_conducteur):int{
    $pdo=ouvrir_connection_db();
    $sql="UPDATE `conducteur` 
            SET `etat` = ?
              WHERE `id_conducteur` = ?";
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
     $sth->execute(array($etat,$id_conducteur));
     fermer_connection_db($pdo);//fermeture
     return $sth->rowCount() ;     
  }
  function count_conducteur_dispo():array{
    $pdo= ouvrir_connection_db();
    $sql="SELECT count(*) from conducteur 
            where etat=? ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array('normal'));
    $conducteur = $sth->fetchAll(PDO::FETCH_ASSOC);
    fermer_connection_db($pdo);
    return $conducteur;
  }
  function find_conducteur_dispo():array{
    $pdo= ouvrir_connection_db();
    $sql="SELECT * from conducteur 
            where etat=? ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array('normal'));
    $conducteur = $sth->fetchAll(PDO::FETCH_ASSOC);
    fermer_connection_db($pdo);
    return $conducteur;
  }
?>