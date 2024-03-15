
<?php 
      function est_connect():bool{
        return isset($_SESSION['userConnect']);
     }
     function est_gestionnaire():bool{
         return est_connect() && $_SESSION['userConnect']['nom_role']=='GESTIONNAIRE';
     }
     function est_client():bool{
         return est_connect() && $_SESSION['userConnect']['nom_role']=='CLIENT';
     }
     function est_responsable():bool{
        return est_connect() && $_SESSION['userConnect']['nom_role']=='RESPONSABLE_RESERVATION';
    }
?>