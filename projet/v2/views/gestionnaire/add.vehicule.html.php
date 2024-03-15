<?php 
    if (isset($_SESSION['arrayError'])) {
        $arrayError=$_SESSION['arrayError'];
        unset($_SESSION['arrayError']);
    }
  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container" style="margin-top: -4%;">
          <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="controlleurs" value="vehicule">
              <input type="hidden" name="action" value="<?= isset($voiture[0]['id_vehicule']) ? "edit.voiture" : "add.vehicule" ?>">
              <input type="hidden" name="id_vehicule" value="<?= isset($voiture[0]['id_vehicule']) ? $voiture[0]['id_vehicule'] : "" ?>">
            <div class="card text-left group shadow mb-4">
                <div class="card-body">
                     <div class="row ">
                        <div class="col-md-12">
                            <h3 class="section-title font-weight-light text-white mb-4">
                                <span class="headline"><?= isset($voiture[0]['id_vehicule']) ? "Modifier Vehicule" : "Ajout Vehicule" ?></span>
                            </h3 >
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                             <div class="form-check form-check-inline">
                                 <label class="form-check-label text-warning">
                                     <input class="form-check-input" <?php //($post['vehicule']) ? 'checked' : "" ?> type="radio" name="vehicule" id="" value="voiture"> Voiture
                                 </label>
                             </div>
                             <div class="form-check form-check-inline">
                                 <label class="form-check-label text-warning">
                                     <input class="form-check-input "  <?php //($post['vehicule']=='camion') ? 'checked' : "" ?> type="radio" name="vehicule" id="" value="camion"> Camion
                                 </label>
                             </div>
                         </div>
                         
                         <div class="col-md-6">
                             <button type="submit" class="btn btn-primary">OK</button>
                         </div>
                     </div> 
                    <div class="row">                        
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                    <label for="" class="text-warning">kilometrage</label>
                                    <input type="text"
                                        class="form-control" name="kmt" value="<?= isset($voiture[0]['kilometrage_vehicule']) ? $voiture[0]['kilometrage_vehicule'] : "" ?> <?php // isset($voiture[0]['kilometrage_vehicule']) ? $voiture[0]['kilometrage_vehicule'] : "" ?>" id="" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['kmt']) ? $arrayError['kmt'] : "" ?>
                                    </small>
                             </div>
                        </div>
                     </div>
                    
                     <div class="row mt-2">                        
                        <div class="col-md-4">
                            <div class="form-group ">
                              <label for="" class="text-warning">Categorie</label>
                              <select class="form-control  bg-secondary" name="categorie" id="">
                              <option value="0<?php  //isset($voiture[0]['id_categorie']) ? $voiture[0]['id_categorie'] : "0" ?>" ><?php //$voiture[0]['nom_categorie']?></option>
                                <?php foreach($categories as $categorie): ?>
                                 <option value="<?=$categorie['id_categorie']?>"><?=$categorie['nom_categorie']?></option>
                                <?php endforeach ?>
                              </select>
                              <small class="text-danger">
                              <?= isset($arrayError['o']) ? $arrayError['o'] : "" ?>
                              </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">
                              <label for="" class="text-warning ">Marque</label>
                              <select class="form-control  bg-secondary" name="marque" id="">
                              <option value="0<?php  //isset($voiture[0]['id_marque']) ? $voiture[0]['id_marque'] : "0" ?>" ></option>
                              <?php foreach($marques as $marque): ?>
                                 <option value="<?=$marque['id_marque']?>"><?=$marque['nom_marque']?></option>
                                <?php endforeach ?>
                              </select>
                              <small class="text-danger">
                              <?= isset($arrayError['a']) ? $arrayError['a'] : "" ?>
                              </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group  ">
                              <label for="" class="text-warning">Modele</label>
                              <select class="form-control  bg-secondary" name="modele" id="">
                              <option value="0<?php //isset($voiture[0]['id_modele']) ? $voiture[0]['id_modele'] : "0" ?>" ></option>
                              <?php foreach($modeles as $modele): ?>
                                 <option value="<?=$modele['id_modele']?>"><?=$modele['nom_modele']?></option>
                                <?php endforeach ?>
                              </select>
                              <small class="text-danger">
                              <?= isset($arrayError['m']) ? $arrayError['m'] : "" ?>
                              </small>
                            </div>
                        </div>
                    
                     </div>
                     <div class="row ">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" class="text-warning">Options</label>
                            </div>
                        </div><?php $i=1; ?>
                        <?php foreach($options as $option): ?>
                        <div class="col-md-2">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label text-warning" >
                                    <input class="form-check-input" type="checkbox"   <?php   //$optionsv['id_option_vehicule'] =  $option['id_option_vehicule']  ? 'checked' : "" ; ?>    name="options[]"  id="" value="<?=$option['id_option_vehicule']?>"> <?=$option['nom_option_vehicule']?>
                                </label>
                            </div>
                        </div>
                        <?php $i++;?>
                       
                        <?php endforeach;   //$images=find_all_image_vehicule_id_((int)$_GET['id_vehicule']);?>
                       
                        
                     </div>
                     
                     <?php if(isset($_SESSION['type_vehicule'])): ?>
                        <?php if($_SESSION['type_vehicule']=='camion'): ?>
                      <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Longueur</label>
                               <input type="text" name="longueur" id=""  value="<?=isset($_SESSION['post1']['longueur']) ? $_SESSION['post1']['longueur'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?= isset($arrayError['longueur']) ? $arrayError['longeur'] : "" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                               <label for="" class="text-warning">Largeur</label>
                               <input type="text" name="largeur" id="" value=" <?=isset($_SESSION['post1']['largeur']) ? $_SESSION['post1']['largeur'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?= isset($arrayError['largeur']) ? $arrayError['largeur'] : "" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group ">
                               <label for="" class="text-warning">Hauteur</label>
                               <input type="text" name="hauteur" id="" value=" <?=isset($_SESSION['post1']['hauteur']) ? $_SESSION['post1']['hauteur'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?= isset($arrayError['hauteur']) ? $arrayError['hauteur'] : "" ?>
                               </small>
                             </div>
                         </div> 
                     </div>
                     <div class="row">
                     <div class="col-md-6">
                             <div class="form-group">
                               <label for="" class="text-warning">Charger Max</label>
                               <input type="text" name="charge" id=""  value="<?=isset($_SESSION['post1']['charge']) ? $_SESSION['post1']['charge'] : ""?>" class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                               <?= isset($arrayError['charge']) ? $arrayError['charge'] : "" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                               <label for="" class="text-warning">Volume M3</label>
                               <input type="text" name="volume" id="" value=" <?=isset($_SESSION['post1']['volume']) ? $_SESSION['post1']['volume'] : ""?> " class="bg-secondary form-control" placeholder="" aria-describedby="helpId">
                               <small id="helpId" class="text-danger">
                                   <?= isset($arrayError['volume']) ? $arrayError['volume'] : "" ?>
                               </small>
                             </div>
                         </div>
                     </div> 
                     <?php endif ?>     
                     <?php endif ?>     
                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-group">
                             <label for="" class="text-warning">Cliquer pour ajouter des images</label>
                             <?php if(isset($voiture[0]['id_marque'])): ?>
                                <?php for($i=0;$i<$images[0]["count(*)"];$i++): ?>
                                    <input type="file" value="" class="form-control-file mb" name="avatar[]" id="" placeholder="" aria-describedby="fileHelpId"> 
                                    <?php if($i!=$images[0]["count(*)"]-1): ?>
                                        <style>
                                            .mb{
                                                margin-bottom: 2%;
                                            }
                                        </style>
                                     <?php endif ?>
                                <?php endfor ?>
                             <?php else: ?>
                                <input type="file" value="" class="form-control-file"  name="avatar[]" id="" placeholder="" aria-describedby="fileHelpId">
                             <?php endif ?>
                             <small id="fileHelpId" class="form-text text-danger">
                                 <?php //$arrayError['avatar'] ? $arrayError['avatar'] : "" ?>
                             </small>
                           </div>
                           
                        </div>
                        <div class="col-md-2 m <?= isset($voiture[0]['id_marque']) ? 'd-none': '' ?>" id="">
                            <button type="button"  value="+" id="button" onclick="addField()" class="btn btn-warning ">+</button> <br>                       
                        </div>
                     </div>
                        <div class="row">
                            <div id="fields">
                            </div>
                        </div>
        
                     
                       <div class="row mt-2 ">
                         <div class="col-md-6 ">
                            <button type="submit" name="add" class="btn btn-warning "> <?= isset($voiture[0]['id_vehicule']) ? "Modifier " : "Ajouter" ?></button>
                         </div>
                        
                     </div>
                </div>
                
            </div>
          </form>
</div>
<style>
     #preview{
       margin-top: 2%;
     width: 50px;
     display: inline-block;
   }
   #preview img{
     width: 100%;
   }
    .group{
        margin-top: 21%;
        background-color: #000;
        box-shadow: #ddd;
    }
    input[type=text]{
        background: grey;
    }
    input[type=date]{
        background: grey;
    }
    .jjj{
        margin-top: -6%;
    }
    .section-title::after {
    content: ' ';
    position: absolute;
    display: block;
    width: 70px;
    border: 1px solid #d2b100;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    
}
.mt{
    margin-top: -1%;
}
.section-title{
    font-size: 20px;
}
.image{
    margin-top: 1%;
    margin-left: -106%;
}
</style>


<?php
    if (isset($post['vehicule'])) {
        unset($post['vehicule']);
    }
    if (isset($_SESSION['type_vehicule'])) {
        unset($_SESSION['type_vehicule']);
    }
 require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
