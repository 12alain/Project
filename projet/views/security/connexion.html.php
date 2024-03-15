
<?php 
 if (isset($_SESSION['arrayError'])) {
  $arrayError=$_SESSION['arrayError'];
  unset($_SESSION['arrayError']);
}
 require_once(ROUTE_DIR.'views/imc/header.html.php'); 
 ?>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown mt">
  <div id="formContent shadow-lg   ">
    <!-- Tabs Titles -->
<div class="card mt-5 w-75 col-md-8  mb-3 ml-auto mr-auto text-left" style="background:#191919" >
  <div class="card-body    ">

 
    <form action="<?=WEB_ROUTE?>" method="post">
    <input type="hidden" name="controlleurs" value="security">
    <input type="hidden" name="action" value="connexion">
    <?php if(isset($arrayError['invalide'])): ?>
    <div class="alert alert-danger" role="alert">
      <strong>
        <?=$arrayError['invalide']?>
      </strong>
    </div>
    <?php endif ?>
       <div class="row">
            <div class="col-md-12">
            <div class="form-group  ">
            <label for="" class="text-warning">Saisir le login</label>
            <input type="text" name="login" required="required" id="" class="form-control bg-secondary" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-danger">
                <?= isset($arrayError['login']) ? $arrayError['login'] : ""; ?>
            </small>
          </div>
            </div>
       </div>
       <div class="row">
         <div class="col-md-12  ">
          <div class="form-group ">
            <label for=""  class="text-warning">Saisir le mot de passe</label>
            <input type="password" name="password" id="myInput" class="form-control bg-secondary" placeholder="" aria-describedby="helpId">
            <input type="checkbox" class="mt-4" onclick="myFunction()"><label class="text-warning ml-2" for="">Voir Password </label>
            <small id="helpId" class="text-danger">
                <?= isset($arrayError['password']) ? $arrayError['password'] : ""; ?>
            </small>
          </div>
         </div>
       </div>
        <div class="row">
          <div class="col-md-4 ">
          <button type="submit" class="btn btn-warning " name="connexion">Se connecter</button>
          </div>
          <div class="col-md-6 mt-2 ml-auto">
            <a href="<?=WEB_ROUTE.'?controlleurs=security&views=inscription'?>">S'incrire ??</a>
          </div>
        </div>
    </form>
  </div>
</div>
  

    <!-- Remind Passowrd -->
   

  </div>
</div>
<style>


/* input[type=text]{
  border-bottom-color: yellow;
} */
body {
  /*  font-family: "Poppins", sans-serif;
    height: 80vh; */
  background-color: #000;
}
.mt{
  margin-top: 17%;
}

</style>

        <?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
