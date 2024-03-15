<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>


<div class="container">
   <div class="row jjjj">
    
     <div class="col-md-4">
       <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.vehicules'?>" style="color: #fff;text-decoration:none;" ><i class="fa fa-arrow-left mr-2" style="color: #d2b100;" aria-hidden="true"></i>Liste Vehicules </a>
     </div>
      <div class="col-md-8">
            <h5 class="section-title font-weight-light text-white mb-4">
                <span class="headline">
                   Liste Vehicules archives
                </span>
            </h5 >
        </div>
     
   </div>
  
   

      <div class="row mt-4">
      <table class="table table-bordered table-sm ">
            <thead>
              <tr>
                <th scope="col" class="text-warning">Avatar</th>
                <th scope="col" class="text-warning">Type </th>
                <th scope="col" class="text-warning">Marque</th>
                <th scope="col" class="text-warning">Modele</th>
                <th scope="col" class="text-warning">Categorie</th>
                <th scope="col" class="text-warning">Immatriculation</th>
                <th scope="col" class="text-warning">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($vehiculeArchiver as $vehicule): ?>
                <form action="" method="post">
                    <input type="hidden" name="controlleurs" value="vehicule">
                    <input type="hidden" name="action" value="desarchive.vehicule">
                    <input type="hidden" name="id_vehicule" value="<?=$vehicule['id_vehicule']?>">
              <tr>
              <?php $image=find_image_vehicule_by_id($vehicule['id_vehicule']) ?>
                 <th scope="row" class="text-white"><img class="rounded" style="width: 35px;height:35px;" src="<?=WEB_ROUTE.'img/uploads/vehicule/'.$image[0]['nom_image']?>" alt="" srcset=""></th>
                <th scope="row" class="text-white"><?=$vehicule['nom_type_vehicule']?></th>
                <td class="text-white"><?=$vehicule['nom_marque']?></td>
                <td class="text-white"><?=$vehicule['nom_modele']?></td>
                <td class="text-white"><?=$vehicule['nom_categorie']?></td>
                <td class="text-white"><?=$vehicule['immatriculation_vehicule']?></td>
                <td>
                    <button type="submit" name="desarchiver" class="btn btn-sm btn-outline-warning"><i class="fas fa-file-archive  "></i>Desarchiver</button>
                </td>
              </tr>
              </form>
              <?php endforeach ?>
            </tbody>
      </table>
      </div>
 </div> 
      
 <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item <?= empty($page) || ($page==1) ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=archives.vehicules&page='.$precedent ?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=archives.vehicules&page='.$i ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item   <?=$page > $total_page-1 ? 'disabled' : ""?>  " >
                 <a class="page-link next "  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=archives.vehicules&page='.$suivant ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
     
<style>
 .edit{
    color: yellow;
  }
  .archive{
    color: red;
  }
    .jjjj{
        margin-top: 20%;
   
    
    }
   
body{
  overflow-x: hidden
  ;
}


    .card {
        background: #000;
    }
</style>
<style>
              figure.zoom {
  background-position: 50% 50%;
  position: relative;
  width: 450px;
  overflow: hidden;
  cursor: zoom-in;
  background-repeat: no-repeat;
  background-size: auto;
}
figure.zoom img:hover {
  opacity: 0;
}
figure.zoom img {
  transition: opacity 0.5s;
  display: block;
  width: 85%;
}
            </style>
            <script>
              function zoom(e) {
  var zoomer = e.currentTarget;
  e.offsetX ? (offsetX = e.offsetX) : (offsetX = e.touches[0].pageX);
  e.offsetY ? (offsetY = e.offsetY) : (offsetX = e.touches[0].pageX);
  x = (offsetX / zoomer.offsetWidth) * 100;
  y = (offsetY / zoomer.offsetHeight) * 100;
  zoomer.style.backgroundPosition = x + "% " + y + "%";
}

            </script>
         
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
