<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>

<div class="container jjjj">
<div class="row ">
     <div class="col-md-12 " style="margin-left: -1%;">
       <h5 class="section-title font-weight-light text-white mb-4">
         <span class="headline" style="font-size: 1.5rem;">Reservation en cours de validation</span>
       </h5 >
     </div>
    
 </div>
 <div class="row">
 <div class="col-md-12 "  style="margin-left: -1%;">
          <a href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations'?>" style="color: #fff;text-decoration:none;" ><i class="fa fa-arrow-left ml-2" style="color: #d2b100;" aria-hidden="true"></i>  Retourner</a>
     </div>
 </div>

<div class="row mt-3 ">
          <table class="table  table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-warning">Type Vehicule</th>
                    <th scope="col" class="text-warning">Vehicule</th>
                    <th scope="col" class="text-warning">Date debut & date fin</th>
                    <th scope="col" class="text-warning">Etat </th>
                </tr>
            </thead>
            <tbody>
            <?php $reserve['date_debut_location']=date_create($reserve['date_debut_location']);
                   $reserve['date_fin_location']=date_create($reserve['date_fin_location']);
            foreach($reservations as $reserve): ?> 
                <tr>
                    <td class="text-white" scope="row"><?=$reserve['nom_type_vehicule']?></td>
                    <td class="text-white"><?=$reserve['nom_categorie'].' '.$reserve['nom_marque'].' '.$reserve['nom_modele']?></td>
                    <td class="text-white"><?= substr($reserve['date_debut_location'],0,10).' & '.substr($reserve['date_fin_location'],0,10)?></td>
                    <td class="text-white"><?=$reserve['nom_etat']?></td>
                </tr>
             <?php endforeach ?>
            </tbody>
        </table>
 </div> 
        <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item <?= empty($page) || ($page==1) ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mesreservations.encours&page='.$precedent ?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mesreservations.encours&page='.$i ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item   <?= $page > $total_page-1 ? 'disabled' : ""?>  " >
                 <a class="page-link next "  href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mesreservations.encours&page='.$suivant ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
  

</div>
<style>
               .jjjj{
        margin-top: 13%;
   
    
    }
              
    .card {
        background: #000;
    }
    
 </style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
