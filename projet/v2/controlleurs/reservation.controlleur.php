<?php 

if ($_SERVER['REQUEST_METHOD']=='GET') {
   
    if (isset($_GET['views'])) {
        if ($_GET['views']=='mes.reservations') {
           if (est_client()) {
            show_mes_reservations();
           }else {
               header("location:".WEB_ROUTE);
           }
        }elseif ($_GET['views']=='annuler.reservation') {
            $id_reservation=(int)$_GET['id_reservation'];
            show_confirm_annuler_reservation();
        }elseif ($_GET['views']=='list') {
            $tab = find_all_categorie();
            require(ROUTE_DIR.'views/responsable_reservation/list.html.php');
        }elseif ($_GET['views']=='liste.reservations') {
           if (est_responsable()) {
            show_liste_reservations();
           }else {
            header("location:".WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule');

           }
        }elseif ($_GET['views']=='mesreservations.encours') {
            if (est_client()) {
                show_mesreservations_encours();
            }else {
                   header("location:".WEB_ROUTE);
               }
        }elseif ($_GET['views']=='retour.location') {
            show_retour_location();
        }elseif ($_GET['views']=='ajout.reservation') {
            show_ajout_reservation($_GET['id_vehicule']);
        }elseif ($_GET['views']=='reservation.client') {
           show_reservation_client((int)$_GET['id_client']);
        }elseif ($_GET['views']=='traiter.reservation') {
           if (est_responsable()) {
            show_traiter_reservation((int)$_GET['id_reservation']);
           }else {
            header("location:".WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule');
           }
        }elseif ($_GET['views']=='facture') {
            $paiement=find_paiement((int)$_GET['id_reservation']);
            $driver=find_all_conducteur();
            $reservations = find_reservation_by_id_reservation((int)$_GET['id_reservation']);
            require(ROUTE_DIR.'views/reservation/facture.html.php');
          
        }elseif ($_GET['views'] == 'tableau.bord') {
            //require(ROUTE_DIR.'views/reservation/dasboard.html.php');
            show_dashboard();
        }
        
     }else{
          require(ROUTE_DIR.'views/client/liste.vehicule.html.php');
     }
   
}elseif ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action']=='add.reservation') {
            $_SESSION['reserve'] = $_POST;
            if (isset($_POST['inscription'])) {
                  add_user_reserve($_POST);
            }else {
                add_reserve_client($_POST);
            }
        }elseif ($_POST['action']=='filtre_reservation') {
              show_liste_reservations($_POST);
        }elseif ($_POST['action']=='traiter.reservation') {
            show_liste_reservations();
        }elseif ($_POST['action']=='annuler.reservation') {
            show_mes_reservations();
           //show_confirm_annuler_reservation((int)$_POST['id_reservation']);
        }elseif ($_POST['action']=='gerer.retour') {
            //enregistrer les donnees du retour;
            gerer_retour_vehicule($_POST);
        }elseif ($_POST['action'] == 'filtrer.mes.reserve') {
          show_mes_reservations();
        }
    }
}
function show_dashboard(){
    $vtrDispo = count_vehicule_disponible(2);
    $cmonDispo=  count_vehicule_disponible(1);
    $reserveNow=count_reservation_now();
    $veh_louer_now =count_location_vehicule_to_now(2);
    $cam_louer_now =count_location_vehicule_to_now(1);
    $conducteur_dispo=count_conducteur_dispo();
    $vehicules_dispo=find_bien_disponible();
    $reserve_annuler=count_reservation_annulee_to_now();
    $vehicule_returned_now=vehicule_return_to_today();
    require_once(ROUTE_DIR.'views/reservation/dasboard.html.php');
}
function show_retour_location(){
    $reservations = find_reservation_by_id_reservation_traiter($_GET['id_reservation']);
    $driver=find_all_conducteur();
    $id_reservation=$_GET['id_reservation'];
    require(ROUTE_DIR.'views/reservation/retour.location.html.php');
}
function show_mesreservations_encours(){
    $id_user=$_SESSION['userConnect']['id_user'];
    $reservations=find_all_reservation_cours($id_user);
    $nbrPage=2;
    $total_records=count($reservations);
    $total_page=total_page($total_records,$nbrPage);
    $get=$_GET['page'];
    if (isset($get)) {
      $page=$get;
    }else {
      $page=1;
    }
    $suivant=$precedent=0;
    $suivant=$page+1;
    $precedent=$page-1;
    $start_from=start_from($page,$nbrPage);
    $reservations=find_all_reservation_cours($id_user,'en cours',$start_from,$nbrPage);
    require(ROUTE_DIR.'views/reservation/mesreservations.encours.html.php');
}
function gerer_retour_vehicule(array $data){
    $arrayError=[];
    extract($data);
    validefield1($kilometre,'kilometre',$arrayError);
    valide_nom_categorie($date_retour_reel,'date_retour',$arrayError);
    if (form_valid($arrayError)) {
        $date_retour_reel = date_format(date_create($date_retour_reel),'Y-m-d H:i:s');
        update_reservation_date_retour_reel_kilometre((int)$kilometre,$date_retour_reel,(int)$data['id']);
        //remettre l'etat du vehicule reserver a disponible 
        update_etat_vehicule_nom_etat(6,(int)$data['id_vehicule']);
        //  changer aussi l'etat de la reservation et le mettre a terminer
        update_reservation__annuler_by_id(5,(int)$data['id']);
        //changer aussi l'etat du conducteur et le mettre a disponible
        if (!empty($data['id_conducteur'])) {
            update_conducteur_etat('normal',(int)$data['id_conducteur']);
        }
        //inserer le montant de la reservation dans la table paiement
        
        header("location:".'?controlleurs=reservation&views=facture&id_reservation='.$data['id']);
        exit;
    }else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:".'?controlleurs=reservation&views=retour.location&id_reservation='.$data['id']);
        exit;
    }
}
function show_confirm_annuler_reservation(){
    $reserva = lister_reservation_by_client($_SESSION['userConnect']['id_user']);
    require(ROUTE_DIR.'views/reservation/confirm.annuler.reservation.html.php');

   }

function show_traiter_reservation($id_reservation){
    $reservation=find_reservation_by_id_reservation($id_reservation);
    //if (!is_null($reservation[0]['id_conducteur'])) {
       $driver=find_all_conducteur();
    $conducteurs=find_all_conducteur_by_permis();
    $vehicule=find_all_vehicule_by_marque_modele_categorie($reservation[0]['nom_categorie'],$reservation[0]['nom_marque'],$reservation[0]['nom_modele']);
    require(ROUTE_DIR.'views/reservation/traiter.reservation.html.php');
}
function show_reservation_client($id_client){
    $reservation_bien=lister_reservation_client($id_client);  
    $nbrPage=5;
    $total_records=count($reservation_bien);
    $total_page=total_page($total_records,$nbrPage);
    $get=$_GET['page'];
    if (isset($get)) {
      $page=$get;
    }else {
      $page=1;
    }
    $suivant=$precedent=0;
    $suivant=$page+1;
    $precedent=$page-1;
    $start_from=start_from($page,$nbrPage);
    $reservation_bien=lister_reservation_client($id_client,$start_from,$nbrPage);  
    require(ROUTE_DIR.'views/reservation/reservation.client.html.php');
}
function show_ajout_reservation($id_vehicule){
    $vehicule=find_vehicule_by_id($id_vehicule);
    $_SESSION['id_marque']=$vehicule[0]['id_marque'];
    $_SESSION['id_modele']=$vehicule[0]['id_modele'];
    $_SESSION['id_categorie']=$vehicule[0]['id_categorie'];
    $_SESSION['id_type_vehicule']=$vehicule[0]['id_type_vehicule'];
    $options=find_all_vehicule_option_vehicule($id_vehicule);
    require(ROUTE_DIR.'views/reservation/ajout.reservation.html.php');
}
function add_user_reserve(array $post):void{
    $arrayError=[];
    extract($post);
   
    valide_field_number((string)$telephone,VALIDE_NUMBER,'numero',$arrayError);
    validation_password($password,$arrayError,'password'); 
    valide_field_mail($login,'login',$arrayError);
    valide_user_name($nom,'nom',$arrayError);
    valide_user_name($prenom,'prenom',$arrayError);
    validefield($pays,'pays',$arrayError);
    validefield($ville,'ville',$arrayError);
    validefield1($rue,'rue',$arrayError);
    validefield2($code_postal,'code_postal',$arrayError);
    valide_user_name($date_debut,'date_debut',$arrayError);
    valide_user_name($date_fin,'date_fin',$arrayError);
    //$date_debut=date_create($date_debut);
   // $date_fin=date_create($date_fin);
   // compare_date($date_fin,$date_debut,'date_debut',$arrayError);
    if ($password!=$confirm_password) {
        $arrayError['confirm'] = 'le mot de passe est different';
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$post['id_vehicule']);
        exit;
     } 
     $user=login_exist($login);
    /*  var_dump($user);
     die; */
     if ($user!=false) {
        $arrayError['loginExist'] = 'ce login exist deja';
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$post['id_vehicule']);
        exit;
     }
    if (form_valid($arrayError)) {
        if (isset($chauffeur)) {
           //  die('djwj');
             $_SESSION['chauffeur'] = 1;
         }else {
             $_SESSION['chauffeur']="";
         }
        $adresse=[
            (int)$rue,
            $ville,
            genere_reference(),
            $pays,
            (int)$code_postal
        ];
        $last_id = insert_adresse($adresse);
        
         $user=[
            $nom,
            $prenom,
            $login,
            $telephone,
           genere_reference(),
            $password,
            $last_id,
            2,
            $confirm_password
         ];
          $id_user=inscrire_utilisateur($user);
          $date_debut=date_format(date_create($date_debut),'Y-m-d H:i:s');
          $date_fin=date_format(date_create($date_fin),'Y-m-d H:i:s');
            $reservations=[
                date_format(date_create(),'Y-m-d'),
                $date_debut,
                $date_fin,
                $id_user,
                $_SESSION['id_modele'],
                $_SESSION['id_marque'],
                $_SESSION['id_categorie'],
                1,
                $_SESSION['id_type_vehicule']
            ];
            ajout_reservation_vehicule($reservations);
            header('location:'.WEB_ROUTE);
            exit;
    }else {
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$post['id_vehicule']);
    }
  }
  function add_reserve_client(array $post):void{
    $arrayError=[];
    extract($post);
   
    valide_user_name($date_debut,'date_debut',$arrayError);
    valide_user_name($date_fin,'date_fin',$arrayError);
    $date_debut1=date_create($date_debut);
    $date_fin1=date_create($date_fin);
 compare_date($date_fin1,$date_debut1,'date_debut',$arrayError);
    if (form_valid($arrayError)) {
        if (isset($chauffeur)) {
            $_SESSION['chauffeur'] = 1;
        }else {
            $_SESSION['chauffeur']="";
        }
          $date_debut=date_format(date_create($date_debut),'Y-m-d H:i:s');
          $date_fin=date_format(date_create($date_fin),'Y-m-d H:i:s');
            $reservations=[
                date_format(date_create(),'Y-m-d'),
                $date_debut,
                $date_fin,
                $_SESSION['userConnect']['id_user'],
                $_SESSION['id_modele'],
                $_SESSION['id_marque'],
                $_SESSION['id_categorie'],
                1,
                $_SESSION['id_type_vehicule']
            ];
            ajout_reservation_vehicule($reservations);
            $_SESSION['valide_reservation'] = 'Success Votre reservation est en cours de validation';
            header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations');
            exit;
    }else {
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$post['id_vehicule']);
    }
  }
    function show_mes_reservations(){
        if (isset($_POST['oui'])) {
            if ($_POST['id_type_vehicule']==1) {
               if (!empty($_POST['id_conducteur'])) {
                update_conducteur_etat('normal',(int)$_POST['id_conducteur']);
               }
            }
            update_reservation__annuler_by_id(3,(int)$_GET['id_reservation']);
            update_etat_vehicule_nom_etat(6,$_POST['id_vehicule']);
        }
        $reservations = lister_reservation_by_client($_SESSION['userConnect']['id_user']);
        $nbrPage=3;
        $total_records=count($reservations);
        $total_page=total_page($total_records,$nbrPage);
        $get=$_GET['page'];
        if (isset($get)) {
          $page=$get;
        }else {
          $page=1;
        }
        $suivant=$precedent=0;
        $suivant=$page+1;
        $precedent=$page-1;
        $start_from=start_from($page,$nbrPage);
        $reservations = lister_reservation_by_client($_SESSION['userConnect']['id_user'],$start_from,$nbrPage);
        if (isset($_POST['filtre'])) {
            extract($_POST);
            if (!empty($date)) {
                $date=date_format(date_create($date),'Y-m-d');
                $reservations = lister_reservation_by_client_filter_date((int)$_SESSION['userConnect']['id_user'],null,null,$date,$etat);
                
            }else {
                
                $reservations = lister_reservation_by_client_filter((int)$_SESSION['userConnect']['id_user'],null,null,$etat);
                
            }
        }
        require(ROUTE_DIR.'views/reservation/mes.reservations.html.php');
    }
   
   function show_liste_reservations($post=null){
    $arrayError=[];
       if (isset($_POST['traiter'])) {
        controle_traiter_reservation($_POST['vehicule'],'vehicule',$arrayError);
          
           if (form_valid($arrayError)) {

                if (isset($_POST['conducteur'])) {
                    update_reservation_id_vehicule_id_conducteur_and_etat((int)$_POST['vehicule'],(int)$_POST['conducteur'],2,(int)$_GET['id_reservation']);
                    //changer aussi l'etat du conducteur et le mettre a indisponible
                    update_conducteur_etat('archiver',(int)$_POST['conducteur']);
                }else {
                  update_reservation_id_vehicule_and_etat((int)$_POST['vehicule'],2,(int)$_GET['id_reservation']);
                }
                    //changer l'etat du vehicule a indisponible aprs avoir attribuer la vehicule
                    update_etat_vehicule_nom_etat(7,(int)$_POST['vehicule']);
                    //inserer la caution dans la table paiement apres valider la reservation
                    insert_into_paiement_caution((int)$_POST['caution'],(int)$_GET['id_reservation'],1);
           }else {
                $_SESSION['arrayError']=$arrayError;
                header('location:'.WEB_ROUTE.'?controlleurs=reservation&views=traiter.reservation&id_reservation='.$_GET['id_reservation']);
           }

       }elseif (isset($_POST['annuler'])) {
           //annuler la reservation
          update_reservation__annuler_by_id(3,(int)$_GET['id_reservation']);
       }
       $etats=find_all_etat();
        if (is_null($post)) {
             $encours_reservation=find_all_reservation_by_date_or_etat_paginate();
             $nbrPage=5;
             $total_records=count($encours_reservation);
             $total_page=total_page($total_records,$nbrPage);
             $get=$_GET['page'];
             if (isset($get)) {
               $page=$get;
             }else {
               $page=1;
             }
             $suivant=$precedent=0;
             $suivant=$page+1;
             $precedent=$page-1;
             $start_from=start_from($page,$nbrPage);
             $encours_reservation=find_all_reservation_by_date_or_etat_paginate('en cours',null,$start_from,$nbrPage);
        }else {
            extract($post);
     
           if ($date==null) {
            $encours_reservation=find_all_reservation_by_date_or_etat_paginate($etat_reservation);
            $nbrPage=5;
            $total_records=count($encours_reservation);
            $total_page=total_page($total_records,$nbrPage);
            $get=$_GET['page'];
            if (isset($get)) {
              $page=$get;
            }else {
              $page=1;
            }
            $suivant=$precedent=0;
            $suivant=$page+1;
            $precedent=$page-1;
            $start_from=start_from($page,$nbrPage);
             $encours_reservation=find_all_reservation_by_date_or_etat_paginate($etat_reservation,null,$start_from,$nbrPage);
           }else {
            $date=date_format(date_create($date),'Y-m-d H:i:s');
            $encours_reservation=find_all_reservation_by_date_or_etat($etat_reservation,$date);
           }
        
        }
        require(ROUTE_DIR.'views/reservation/liste.reservations.html.php');

   }

   
?>