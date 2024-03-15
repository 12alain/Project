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
                <span class="headline">Parametrage Categorie </span>
            </h3 >
         </div>
    </div>
    <div class="row">
         <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.categorie'?>" class="btn btn-warning ml-auto mr-auto">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg> Ajouter categorie
        </a>
    </div>
    <div class="row mt-5">
         <table class="table border table-bordered  table-sm ml-auto mr-auto ">
            <thead>
                <tr>
                <th scope="col" class="text-warning">Nom Categorie</th>
                <th scope="col" class="text-warning">Etat</th>
                <th scope="col" class="text-warning">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $categorie): ?>
                    <form action="" method="post">
                        <input type="hidden" name="controlleurs" value="vehicule">
                        <input type="hidden" name="action" value="desarchiver.categorie">
                        <input type="hidden" name="id_categorie" value="<?=$categorie['id_categorie']?>">
                    <tr>
                        <td class="text-white"><?=$categorie['nom_categorie']?></td>
                        <td class="text-white"><?=$categorie['etat']?></td>
                        <td class="text-white">
                        <?php if($categorie['etat']=='archiver'):?>
                            <button type="submit" name="desarchiver" class="btn border-secondary text-secondary w"><i class="fas fa-file-archive archive"></i>Desarchiver</button>
                        <?php else :?>  
                            <button type="submit" name="archiver" class="btn border-secondary text-secondary w"><i class="fas fa-file-archive archive"></i>archiver</button>
                        <?php endif ?>  
                            <a name=""  id="" class=" btn border-warning text-warning w"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=edit.categorie&id_categorie='.$categorie['id_categorie']?>" ><i class="fas fa-edit edit "></i>Modifier</a>
                        </td>
                    </tr>
                    </form>
                <?php endforeach ?>
               
            </tbody>
            </table>
    </div>
    
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item <?= empty($page) || ($page==1) ? 'disabled' : ""?> ">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie&page='.$precedent ?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie&page='.$i ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item  <?=$page > $total_page-1 ? 'disabled' : ""?>  ">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.categorie&page='.$suivant ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
  
  <!--   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
   -->  <script>
$("#.LienModal").click(function(){
    var Id=$(this).attr("rel");
        $(".modal-body").fadeIn(1000).html('<div style="text-align:center; margin-right:auto; margin-left:auto">Patientez...</div>');
        $.ajax({
            type:"POST",
            data:{Id : Id},
            url:"reponse.php",
            error:function(msg){
                $(".modal-body").addClass("tableau_msg_erreur").fadeOut(800).fadeIn(800).fadeOut(400).fadeIn(400).html('<div style="margin-right:auto; margin-left:auto; text-align:center">Impossible de charger cette page</div>');
            },
            success:function(data){
                $(".modal-body").fadeIn(1000).html(data);
            }
        });
    });
    </script>
</div>
<style>
     .jjj{
        margin-top: 14%;
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
/* .pagination > li > a
{
    background-color: white;
    color: #5A4181;
} */



</style>
<script>
    function openModal(){
         $('#exampleModalLong').modal();
    } 
    $('button').click(function(){
        $('#exampleModalLong').modal('show');
    });
   
/*     $(document).ready(function(){
    $("#submitButton").click(function(){
        $("#exampleModalLong").modal();
    });
}); */
/* $(document).ready(function(){
   $("#exampleModalLong").modal();
}); */
</script>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
