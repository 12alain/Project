<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container">
    <div class="row jjj">
         <div class="col-md-8">
            <h3 class="section-title font-weight-light text-white mb-4">
                <span class="headline">Parametrage Conducteur</span>
            </h3 >
         </div>
         <div class="col-md-4">
              <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=archives.driver'?>" style="color: #fff;text-decoration:none;" >Conducteurs archives <i class="fa fa-arrow-right ml-2" style="color: #d2b100;" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="row">
         <a href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=ajout.conducteur'?>" class="btn btn-warning ml-auto mr-auto w-25">
         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg> Ajouter Conducteur
         </a>

    </div>
    <div class="row mt-5">
         <table class="table table-bordered table-sm">
            <thead>
                <tr>
                <th scope="col" class="text-warning">Avatar</th>
                <th scope="col" class="text-warning">Nom & Prenom</th>
                <th scope="col" class="text-warning">Telephone</th>
                <th scope="col" class="text-warning">Type Permis</th>
                <th scope="col" class="text-warning">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($conducteurs as $conducteur): ?>
                    <form action="" method="post">
                        <input type="hidden" name="controlleurs" value="vehicule">
                        <input type="hidden" name="action" value="desarchiver.conducteur">
                        <input type="hidden" name="id_conducteur" value="<?=$conducteur['id_conducteur']?>">
                      <tr>
                            <td class="align-center">
                                <?php if (!is_null($conducteur['nom_image'])): ?>
                                    <img style="width: 30px;height: 30px;" src="<?=WEB_ROUTE.'img/uploads/vehicule/'.$conducteur['nom_image']?>" class="rounded-pill" alt=""> 
                                <?php else: ?>
                                    <img style="width: 30px;height: 30px;" src="<?=WEB_ROUTE.'img/avatar.jpg'?>" class="rounded-pill" alt=""> 
                                <?php endif ?>   
                            </td>
                            <td class="text-white"><?=$conducteur['nom_conducteur'].' '.$conducteur['prenom_conducteur']?></td>
                            <td class="text-white"><?=$conducteur['telephone_conducteur']?></td>
                            <td class="text-white"><?=$conducteur['type_permis']?></td>
                            <td class="text-white">
                                 <?php if($conducteur['etat']=='normal'): ?>
                                    <a name="" id="" class="btn border-secondary text-secondary w" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=archive.conducteur&id_conducteur='.$conducteur['id_conducteur']?>" role="button"><i class="fas fa-file-archive archive"></i>archiver</a>
                                 <?php else: ?>    
                                     <button type="submit" name="desarchiver" class="btn border-secondary text-secondary w"><i class="fas fa-file-archive archive"></i>Desarchiver</button>
                                  <?php endif?>    
                                <a name="" id="" class="btn border-warning text-warning w"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=edit.conducteur&id_conducteur='.$conducteur['id_conducteur']?>" role="button"><i class="fas fa-edit edit "></i>modifier</a>
                            </td>
                     </tr>
                </form>
              <?php endforeach ?>
            </tbody>
            </table>
    </div>
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-center ">
            <li class="page-item <?= empty($page) || ($page==1) ? 'disabled' : ""?>">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.conducteur&page='.$precedent?>" tabindex="-1">
                 <span aria-hidden="true" class="tt">&laquo;</span>
                 <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for($i=1;$i<=$total_page;$i++): ?>
                 <li class="page-item"><a class="page-link" href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.conducteur&page='.$i ?>"><?=$i?></a></li>
            <?php endfor ?>
            <li class="page-item <?=$page > $total_page-1 ? 'disabled' : ""?>  ">
                 <a class="page-link next"  href="<?=WEB_ROUTE.'?controlleurs=vehicule&views=liste.conducteur&page='.$suivant ?>">
                      <span aria-hidden="true" class="tt">&raquo;</span>
                      <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<style>
     .jjj{
        margin-top: 15%;
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
