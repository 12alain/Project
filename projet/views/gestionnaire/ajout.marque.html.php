<?php 
if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline">Parametrage Marque</span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.marque'?>" class="btn btn-warning ml-auto mr-auto" >
         <i class="fas fa-list-ul"></i> Liste Marque
        </a>

    </div>
 
    <div class="container">
        <form action="" method="post">
            <input type="hidden" name="controlleurs" value="vehicule">
            <input type="hidden" name="action"  value="<?=!isset($marque[0]['id_marque']) ? 'add.marque' : "edit.marque" ?>">
            <input type="hidden" name="id_marque" value="<?=isset($marque[0]['id_marque']) ? $marque[0]['id_marque'] : "" ?>">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="" class="text-warning">Nom marque</label>
                                    <input type="text" name="marque" id="" value="<?=isset($marque[0]['nom_marque']) ? $marque[0]['nom_marque'] : "" ?>" class="form-control" placeholder="Enter la marque" aria-describedby="helpId">
                                    <small id="helpId" class="text-danger">
                                        <?=isset($arrayError['marque']) ? $arrayError['marque'] : ""?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-4 mt">
                                 <button type="submit" name="ajout.marque" class="btn btn-warning "><?=isset($marque[0]['id_marque']) ? 'Modifier' : "Ajouter" ?></button>
                            </div>
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

</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
