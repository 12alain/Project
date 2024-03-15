<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>

<div class="container">
        <div class="row jjj">
            <h3>
                <a href="<?=WEB_ROUTE.'?controlleurs=reservation&views=liste.reservations'?>"><i class="fa fa-arrow-circle-left  " style="color: #d2b100;" aria-hidden="true"></i></a>
            </h3>
            <div class="col-md-12 mr-2">
                <h3 class="section-title font-weight-light text-white mb-4 mr-1">
                     <span class="headline ">Reservations par client</span>
                </h3 >
             </div>
        </div>
    <div class="row mt-2">
        <table class="table table border ">
            <thead>
                <tr>
                    <th scope="col" class="text-warning">Type vehicule</th>
                    <th scope="col" class="text-warning">Vehicule</th>
                    <th scope="col" class="text-warning">Date</th>
                    <th scope="col" class="text-warning">Etat</th>
                </tr>
            </thead>
            <tbody>
               
            <?php foreach($reservation_bien as $client): ?>
                <tr>
                    <td class="text-white"><?=$client['nom_type_vehicule']?></td>
                    <td class="text-white"><?=$client['nom_marque'].' '.$client['nom_modele']?></td>
                    <td class="text-white"><?=date_format(date_create($client['date_debut_location']),'Y-m-d').' & '.date_format(date_create($client['date_fin_location']),'Y-m-d')?></td>
                    <th class="text-white"><?=$client['nom_etat']?></th>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
            <nav aria-label="Page navigation example ">
                <ul class="pagination justify-content-center ">
                    <li class="page-item <?= empty($page) || ($page==1) ? 'disabled' : ""?>">
                          <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=reservation&views=reservation.client&id_client='.(int)$_GET['id_client'].'&page='.$precedent ?>" tabindex="-1">
                          <span aria-hidden="true" class="tt">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php for($i=1;$i<=$total_page;$i++): ?>
                          <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=reservation.client&id_client='.(int)$_GET['id_client'].'&page='.$i ?>"><?=$i?></a></li>
                    <?php endfor ?>
                    <li class="page-item   <?= $_GET['page'] >= $total_page-1 ? 'disabled' : ""?>  " >
                          <a class="page-link next "  href="<?=WEB_ROUTE.'?controlleurs=reservation&views=reservation.client&id_client='.(int)$_GET['id_client'].'&page='.$suivant ?>">
                              <span aria-hidden="true" class="tt">&raquo;</span>
                              <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
</div>
<style>
    .jjj{
        margin-top: 26%;
    }
    .section-title{
    font-size: 20px;
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

</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
