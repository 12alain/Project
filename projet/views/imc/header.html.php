<!doctype html>
<html lang="en">
  <head>
    <title>Gestion_location_vehicule</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?= WEB_ROUTE.'css/style.css' ?>"> 
   </head>
  <body>
      
  
<nav class="navbar navbar-expand-lg navbar-dark ">
      <!-- <a class="navbar-brand" href="#">E-221</a> -->
      <a href="" class="logo"><img src="<?=WEB_ROUTE.'img/logo1.png'?>" alt="" height="105" class="ml-5"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarColor01"
        aria-controls="navbarColor01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse ml-5" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
        <?php if(!est_gestionnaire() && !est_responsable()): ?>
          <li class="nav-item active">
            <a class="nav-link" href="<?= WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicule'?>"
              >Accueil
              <span class="sr-only">(current)</span>
            </a>
          <?php endif ?>
          </li>
          <?php if(est_client()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations'?>">Mes Réservations</a>
            </li>
          <?php endif ?>
          <?php if(est_gestionnaire()): ?>
            
          <ul class="navbar-nav mr-o ml-4">
          <li class="nav-item dropdown mr-md-5">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                >Vehicule</a
              >
                <div class="dropdown-menu ">
                <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicules'?>">Liste Vehicules</a>
                <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.voiture'?>">Ajout voiture</a>
                <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.camion'?>">Ajout camion</a>
                </div>
            
            </li>
          </ul>
        <ul class="navbar-nav mr-o ">
            <li class="nav-item dropdown mr-md-5">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                >Parametrage</a
              >
                <div class="dropdown-menu ">
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.conducteur'?>">Conducteur</a>
                <a class="dropdown-item"   href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie'?>">Categorie</a>
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.marque'?>">Marque</a>
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.modele'?>">Modele</a>
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.option'?>">Option</a>
                </div>
            
            </li>
          </ul>
         
          <?php endif ?>
          <?php if(est_responsable()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations'?>">Liste Reservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ml-2" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=tableau.bord'?>">Tableau de bord</a>
            </li>
          <?php endif ?>
          
        </ul>
       
        <ul class="navbar-nav mr-o mr-4">
            
            <li class="nav-item dropdown mr-md-5">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
                ><?=est_connect() ? $_SESSION['userConnect']['prenom_user'].' '.$_SESSION['userConnect']['nom_user'] : " Utilisateur" ?></a
              >
              <?php if(!est_connect()): ?>
                <div class="dropdown-menu ">
                <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=security&views=connexion'?>"> Se Connecter</a>
                </div>
                <?php elseif(est_connect()): ?>
                <div class="dropdown-menu ">
                  <a class="dropdown-item" href="<?=WEB_ROUTE.'?controlleurs=security&views=deconnexion'?>"> Se Deconnecter</a>
                </div>
                <?php endif ?>
            </li>
          </ul>
      </div>
    </nav>
    <style>
       /*  .navbar{
            background-image: url("https://mapauto.sn/img/desktop_navbar_bg.jpg");
            position: fixed;
            top: 0;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1039;
        } */
        @media only screen and (max-width: 992px) {
          .navbar{
            background-image: url("<?=WEB_ROUTE.'img/nav.jpg'?>");
        } 
      } 
        @media only screen and (max-width: 768px) {
          .xs{
            margin-top: 23%;
            margin-left: -8%;
          }
       
        }
        @media only screen and (min-width: 992px) {
          .navbar{
            background-image: url(<?=WEB_ROUTE.'img/nav.jpg'?>);
            position: fixed;
            top: 0;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1039;
        } 
        .reserv{
          margin-top: 15%;
        }
       
        }


        .navbar a{
            color: #d2b100 !important;
        }
        .dropdown-menu a:hover{
            color: #000 !important;
            background: #d2b100;
        }
        body{
            background: #000;
        }
    </style>

    
  