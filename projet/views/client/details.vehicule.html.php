<?php
         require(ROUTE_DIR.'views/imc/header.html.php');
       ?>

   
    <div class="container">
        <div class="row mt ">
          <a href="<?=WEB_ROUTE?>" style="text-decoration: none;" class="ml-3 text-white"><i class="fa fa-arrow-left" style="color: yellow;" aria-hidden="true"></i> Retourner</a>
        </div>
      
      <div class="row">
        <div class="col-sm-12 mb-4 ml-auto mr-auto" style="min-width: 22 rem;">
          <div class="card " style="background:#191919">
          
            <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <img
                            class="card-img-top"  style="width: 100%;"
                            src="<?=WEB_ROUTE.'img/uploads/vehicule/'.$images[0]['nom_image']?>"
                            alt="Annonce 1"
                        />
    
                      </div>
                      <div class="col-md-6 mt-5">
                        <div class="row">
                          <div class=" col-md-6">
                                  <p class=" text-white">Type vehicule : <?=ucfirst($vehicule[0]['nom_type_vehicule'])?></p>
                                  <p class="card-text text-white">
                                      Categorie : <?=$vehicule[0]['nom_categorie']?>
                                  </p>
                                  <p class="card-text text-white">
                                      Marque : <?=$vehicule[0]['nom_marque']?>
                                  </p>
                                  <p class="card-text text-white">
                                      Modele : <?=$vehicule[0]['nom_modele']?>
                                  </p>
                          </div>  
                          <div class="col-md-6">
                              <p class="card-text text-white ">
                                  Prix location Jour : <span class="text-warning"><?=$vehicule[0]['prix_location_jour'].' '.'FCFA'?></span>
                              </p>
                              <p class="card-text text-white">
                                  Prix location Kilometre : <?=$vehicule[0]['prix_location_km'].' '.'FCFA'?>
                              </p>
                              <p class="card-text text-white">
                                  Caution : <?=$vehicule[0]['caution'].' '.'FCFA'?>
                              </p>
                              <p class="card-text text-white">
                                  Immatriculation : <?=$vehicule[0]['immatriculation_vehicule']?>
                              </p>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col">
                              <a class="btn btn-outline-warning" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=ajout.reservation&id_vehicule='.$_GET['id_vehicule']?>" role="button">Reserver</a>
                            </div>

                        </div>
                      </div>
                    </div>
              
           <!--    <span class="float-left btn btn-sm disabled">Depuis: 999H</span>
              <a href="#" class="btn btn-sm btn-warning float-right"><?=$vehicule[0]['nom_etat']?></a
              > -->
            </div>
          </div>
        </div>
        <!-- -------------------------------------------- -->
      
      </div>

    </div>
    <style>
        .mt{
            margin-top: 12%;
        }
    </style>
    <?php
         require(ROUTE_DIR.'views/imc/footer.html.php');
       ?>