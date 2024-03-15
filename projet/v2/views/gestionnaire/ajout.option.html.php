<?php 
if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
/* var_dump($option);
die; */
require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
         <div class="col-md-12">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline">Parametrage Option Vehicule</span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.option'?>" class="btn btn-warning ml-auto mr-auto" >
         <i class="fas fa-list-ul"></i>Liste option vehicule
        </a>

    </div>
    <div class="container">
         <form action="" method="post">
             <input type="hidden" name="controlleurs" value="vehicule">
             <input type="hidden" name="action" value="<?=isset($option[0]['id_option_vehicule']) ? 'edit.option'  : "add.option" ?>">
             <input type="hidden" name="id_option_vehicule" value="<?=isset($option[0]['id_option_vehicule']) ? $option[0]['id_option_vehicule']  : "" ?>">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="" class="text-warning">Saisir une option</label>
                                <input type="text" name="option" id="" value="<?=isset($option[0]['nom_option_vehicule']) ? $option[0]['nom_option_vehicule']  : "" ?>" class="form-control" placeholder="Saisir une option" aria-describedby="helpId">
                                <small id="helpId" class="text-danger">
                                    <?=isset($arrayError['option']) ? $arrayError['option'] : "" ?>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-4 mt">
                            <button type="submit" name="ajout.option" class="btn btn-warning"><?=isset($option[0]['id_option_vehicule']) ? 'Modifier' : "Ajouter" ?></button>
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
