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
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline"><?=isset($categorie[0]['id_categorie']) ? 'Modifier' : "Ajouter" ?> Categorie </span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <a class="btn btn-warning ml-auto mr-auto" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie'?>">
         <i class="fas fa-list-ul"></i> Liste categorie
        </a>
     </div>
 <div class="mt-5">
    <form action="" method="post">
                <input type="hidden" name="controlleurs" value="vehicule">
                <input type="hidden" name="action" value="<?=!isset($categorie[0]['id_categorie']) ? 'add.categorie' : "edit.categorie" ?>">
                <input type="hidden" name="id_categorie" value="<?=isset($categorie[0]['id_categorie']) ? $categorie[0]['id_categorie'] : "" ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">Nom categorie</label>
                                <input type="text" value="<?=isset($categorie[0]['nom_categorie']) ? $categorie[0]['nom_categorie'] : "" ?>" name="categorie" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                    <?=isset($arrayError['categorie']) ? $arrayError['categorie'] : '';?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">Caution categorie</label>
                                <input type="text" name="caution" id="" class="form-control" placeholder="" value="<?=isset($categorie[0]['caution']) ? $categorie[0]['caution'] : "" ?>" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?=isset($arrayError['caution']) ? $arrayError['caution'] : '';?>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">prix_location_jour</label>
                                <input type="text" name="prix_jour" id="" class="form-control" placeholder="" value="<?=isset($categorie[0]['prix_location_jour']) ? $categorie[0]['prix_location_jour'] : "" ?>" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?=isset($arrayError['prix_jour']) ? $arrayError['prix_jour'] : '';?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="text-warning">prix_location_kilometre</label>
                                <input type="text" name="prix_kilometre" id="" value="<?=isset($categorie[0]['prix_location_km']) ? $categorie[0]['prix_location_km'] : "" ?>" class="form-control" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                <?=isset($arrayError['prix_km']) ? $arrayError['prix_km'] : '';?>
                                </small>
                            </div>
                        </div>
                    </div>
            <div class="row  ml-1">
                <button type="submit" class="btn btn-warning" name="add.categorie"><?=isset($categorie[0]['id_categorie']) ? 'Modifier' : "Ajouter" ?></button>
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
