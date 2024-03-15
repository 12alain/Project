

<?php  


require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>

<div class="container">
            <div class="card mt">
                <div class="card-body">
                    <h4 class="card-title">Confirmation </h4>
                    <p class="card-text">Voulez vous annuler la reservation</p>
                    <div class="row">
                        <div class="col-md-6">
                            <a name="" id="" class="btn btn-danger" href="<?=WEB_ROUTE.'?controlleurs=reservation&views=mes.reservations'?>" role="button">non</a>
                        </div>
                        <div class="col-md-6">
                           <form action="" method="post">
                               <input type="hidden" name="controlleurs" value="reservation">
                               <input type="hidden" name="action" value="annuler.reservation">
                               <input type="hidden" name="id_type_vehicule" value="<?=(int)$reserva[0]['id_type_vehicule']?>">
                               <input type="hidden" name="id_conducteur" value="<?=isset($reserva[0]['id_conducteur']) ? (int)$reserva[0]['id_conducteur'] : ""?>">
                               <input type="hidden" name="id_reservation" value="<?=$id_reservation?>">
                               <input type="hidden" name="id_vehicule" value="<?=(int)$reserva[0]['id_vehicule']?>">
                               <?php //var_dump($reserva); die;?>
                               <button type="submit" name="oui" class="btn btn-success">Oui</button>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<style>
    .mt{
        margin-top: 22%;
    }
</style>
<?php require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>