<?php 
   

   function inscrire_utilisateur(array $user):int{
        $pdo=ouvrir_connection_db();
        $sql=" INSERT INTO user (nom_user,prenom_user,email_user,telephone_user,
                                fax_user,password_user,id_adresse,id_role,confirm_password) 
                VALUES (?,?,?,?,?,?,?,?,?)";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute($user);
        $dernier_id = $pdo->lastInsertId();
        fermer_connection_db($pdo);
        return $dernier_id;
    }

    function login_exist(string $login):array{
        $pdo=ouvrir_connection_db();
        $sql='SELECT * from user 
                where email_user=?';
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($login));
        $user = $sth->fetchAll();
        fermer_connection_db($pdo);
        return $user;
    }
   
    function find_user_by_login_password($login,$password){
        $pdo=ouvrir_connection_db();
        $sql='select * from user u ,role ro where 
        u.id_role=ro.id_role and
        u.email_user=? and u.password_user=?';
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array($login,$password));
        $user = $sth->fetch(PDO::FETCH_ASSOC);
       // $user = $sth->fetchAll();
        
        fermer_connection_db($pdo);
        return $user;
    }
?>