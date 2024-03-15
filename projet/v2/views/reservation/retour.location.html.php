<?php 
   if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  }
  /* var_dump($categorie[0]['id_categorie']);
  die; */
 require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
        <a class="ml-3" style="color: #d2b100;text-decoration:none;" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations'?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Retourner</a>
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline"> Gerer retour vehicule </span>
            </h3 >
         </div>
    </div>
    <div class="row">
        <div class="col-12">
             <div class="card w-100 " style="background-color: #212529;">
                        <div class="card-body ">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-white">Date debut location : <?=date_format(date_create($reservations[0]['date_debut_location']),'d-m-Y')?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-white">Date fin location : <?= date_format(date_create($reservations[0]['date_fin_location']),'d-m-Y') ?></p>
                                        </div>
                                        <div class="col-md-4">
                                             <p class="text-white">Type Vehicule : <?=$reservations[0]['nom_type_vehicule']?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                             <p class="text-white">Immatriculation Vehicule : <?=$reservations[0]['immatriculation_vehicule']?></p>
                                        </div>
                                        <div class="col-md-4">
                                              <p class="text-white">Vehicule : <?=$reservations[0]['nom_marque'].' '.$reservations[0]['nom_modele']?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-white">Prix location jour : <?=$reservations[0]['prix_location_jour'].' '.'FCFA'?></p>
                                        </div>
                                        <?php
                                         $date1=date_create($reservations[0]['date_fin_location']);
                                         $date2=date_create($reservations[0]['date_debut_location']);
                                         $jr= difference_date($date1,$date2);
                                         if(is_null($reservations[0]['id_conducteur'])){
                                            $prix = intval($jr)*intval($reservations[0]['prix_location_jour']);
                                         }else {
                                            $prix = intval($jr)*intval($reservations[0]['prix_location_jour'])+intval($driver[0]['prix_conducteur']);
                                         }
                                         ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="text-white">Caution : <?=$reservations[0]['caution'].' '.'FCFA'?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <p class="text-white">Nbrs jours : <?= $jr ?></p>
                                        </div>
                                        <?php if(!is_null($reservations[0]['id_conducteur'])):?>
                                            <div class="col-md-4">
                                                 <p class="text-white">Prix conducteur : <?= $driver[0]['prix_conducteur'].' FCFA' ?></p>
                                            </div>
                                        <?php endif ?>     
                                      
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-white">Prix total : <?= $prix.' '.'FCFA' ?></p>
                                        </div>
                                    </div>
                         </div>
              </div>
         </div>
    </div>
    
 <div class="mt-1">
    <form action="" method="post">
                <input type="hidden" name="controlleurs" value="reservation">
                <input type="hidden" name="action" value="gerer.retour">
                <input type="hidden" name="id" value="<?=$id_reservation?>">
                <input type="hidden" name="id_vehicule" value="<?=$reservations[0]['id_vehicule']?>">
                <input type="hidden" name="id_conducteur" value="<?=$reservations[0]['id_conducteur']?>">
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">Date de retour reel</label>
                                <input type="date" name="date_retour_reel" id="" class="form-control "  style="background-color: #212529;color:white" placeholder=""  aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?=isset($arrayError['date_retour']) ? $arrayError['date_retour'] : '';?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">Kilometre Parcourus</label>
                                <input type="text" name="kilometre" id="" value="" class="form-control"  style="background-color: #212529;color:white" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?=isset($arrayError['kilometre']) ? $arrayError['kilometre'] : '';?>
                                </small>
                            </div>
                        </div>
                    </div>
            <div class="row  ">
                <button type="submit" class="btn btn-warning ml-3" name="add.retour">Valider</button>
            </div>
        </form>
 
    </div>

 
</div>
<style>
     .jjj{
        margin-top: 20%;
    }
    .section-title::after {
    content: ' ';
    position: absolute;
    display: block;
    width: 40px;
    border: 1px solid #d2b100;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    
}
.mt{
    margin-top: 3%;
}
.section-title{
    font-size: 20px;
}
input[type=text]{
    background-color: grey;
}
/* .pagination > li > a
{
    background-color: white;
    color: #5A4181;
} */



</style>

<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
