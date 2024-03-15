<?php    
 if (isset($_SESSION['arrayError'])) {
    $arrayError=$_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
  }

require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
          <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="controlleurs" value="vehicule">
              <input type="hidden" name="id" value="<?=isset($driver[0]['id_conducteur']) ? $driver[0]['id_conducteur'] : ""; ?>">
              <input type="hidden" name="action" value="<?=!isset($driver[0]['id_conducteur']) ?'add.conducteur': 'edit.conducteur' ?>">
              <input type="hidden" name="id_adresse" value="<?=isset($driver[0]['id_adresse']) ? $driver[0]['id_adresse'] : ""; ?>">
              <div class="card text-left group shadow mb-4">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <div class="row jjj">
                      <a style="color:#d2b100" class="ml-3" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.conducteur'?>"><i class="fa fa-arrow-left " aria-hidden="true"></i></a>
                        <div class="col-md-12">
                            <h3 class="section-title font-weight-light text-white mb-4">
                                <span class="headline">
                                  <?=isset($driver[0]['id_conducteur']) ? 'Modifier' : "Ajouter"; ?> Conducteur
                                </span>
                            </h3 >
                        </div>
                    </div>
                   
                    <div class="row">                     
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Prenom</label>
                                    <input type="text"
                                        class="form-control" name="prenom" id="" value="<?=isset($driver[0]['prenom_conducteur']) ? $driver[0]['prenom_conducteur'] : ""; ?>" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                        <?= isset($arrayError['prenom']) ? $arrayError['prenom'] :"" ?>
                                    </small>
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Nom</label>
                                    <input type="text"
                                        class="form-control" name="nom" id="" aria-describedby="helpId" value="<?=isset($driver[0]['nom_conducteur']) ? $driver[0]['nom_conducteur'] : ""; ?>" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['nom']) ? $arrayError['nom'] :"" ?>
                                    </small>
                             </div>
                        </div>
                     </div>
                     <div class="row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label for="" class="text-warning">Telephone</label>
                                    <input type="text"
                                        class="form-control" name="telephone" id="" value="<?=isset($driver[0]['telephone_conducteur']) ? $driver[0]['telephone_conducteur'] : ""; ?>" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['numero']) ? $arrayError['numero'] :"" ?>
                                    </small>
                             </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                             <label for="" class="text-warning">Type de Permis</label>
                             <select class="form-control bg" name="permis" id="">
                               <option value="<?=isset($driver[0]['id_permis']) ? $driver[0]['id_permis'] : "0" ?>"><?=isset($driver[0]['id_permis']) ? $driver[0]['type_permis'] : "" ?></option>
                                <?php foreach($permis as $permi): ?>
                               <option value="<?=$permi['id_permis']?>"><?=$permi['type_permis']?></option>
                              <?php endforeach ?>
                             </select>
                             <small id="helpId" class="form-text text-danger">
                                    <?= isset($arrayError['permis']) ? $arrayError['permis'] :"" ?>
                             </small>
                           </div>
                        </div>
                        
                     </div>
                  
                     <div class="row">
                     <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Pays</label>
                               <input type="text"
                                 class="form-control" name="pays" id="" value=" <?=isset($driver[0]['pays']) ? $driver[0]['pays'] : ""; ?>" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-danger">
                               <?= isset($arrayError['pays']) ? $arrayError['pays'] :"" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Ville</label>
                               <input type="text"
                                 class="form-control" name="ville" value=" <?=isset($driver[0]['ville']) ? $driver[0]['ville'] : ""; ?>" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-danger">
                               <?= isset($arrayError['ville']) ? $arrayError['ville'] :"" ?>
                               </small>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Rue</label>
                               <input type="text"
                                 class="form-control" name="rue" value=" <?=isset($driver[0]['rue']) ? $driver[0]['rue'] : ""; ?>" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-danger">
                               <?= isset($arrayError['rue']) ? $arrayError['rue'] :"" ?>
                               </small>
                             </div>
                         </div>
                         
                         <div class="col-md-3">
                             <div class="form-group">
                               <label for="" class="text-warning">Code Postal</label>
                               <input type="text"
                                 class="form-control" name="code_postal" value=" <?=isset($driver[0]['code_postal']) ? $driver[0]['code_postal'] : ""; ?>" id="" aria-describedby="helpId" placeholder="">
                               <small id="helpId" class="form-text text-danger">
                               <?= isset($arrayError['code_postal']) ? $arrayError['code_postal'] :"" ?>
                               </small>
                             </div>
                         </div>
                     </div>
                     <?php //if(!isset($_GET['id_conducteur'])):?>
                       <div class="row">
                         <div class="col-md-6">
                              <div class="form-group">
                                <label for=""></label>
                                <input type="file" class="form-control-file"  onchange="handleFiles(files)" id="upload"  name="avatar" id="" placeholder="" aria-describedby="fileHelpId">
                                <small id="fileHelpId" class="form-text text-danger">
                               </small>
                              </div>
                         </div>   
                         <div class="col-md-6">
                            <div>
                             
                              <label for="upload">
                                  <span id="preview"></span>
                              </label>
                            </div>
                         </div> 
                        </div>
                      <?php //endif ?>
   </form>

                        <div class="row">
                          <div class="col-12 ">
                              <button type="submit" name="add.conducteur" class="btn btn-warning  "> <?=isset($driver[0]['id_conducteur']) ? 'Modifier' : "Ajouter"; ?></button>
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
    .bg{
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
.section-title{
    font-size: 20px;
}
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
