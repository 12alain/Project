<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container-fluid jjj" style="margin-top: 10%;">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4"> 
                        <h1 class="h3 mb-0 text-white">Dashboard</h1>
                    </div>

<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2" style="background:#191919;border-left:#4e73df 2px solid;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Nbrs de Conducteur disponible</div>
                    <div class="h5 mb-0 font-weight-bold text-white"><?=$conducteur_dispo[0]["count(*)"]?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-conducteur fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-success shadow h-100 py-2" style="background:#191919;border-left:#f6c23e 2px solid;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Nbrs de Camion disponible</div>
                    <div class="h5 mb-0 font-weight-bold text-white"> <?=$cmonDispo[0]["count(*)"]?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-truck fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-info shadow h-100 py-2 " style="background:#191919;border-left:#fff 2px solid;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                    Nbrs de Voiture disponible
                    </div>
                    <div class="h5 mb-0 font-weight-bold texy-white text-white"> <?=$vtrDispo[0]["count(*)"]?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-car fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-info shadow h-100 py-2 " style="background:#191919;border-left:#ddd 2px solid;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                     véhicules qui retournent dans la journée
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white"><?=$vehicule_returned_now[0]["count(*)"]?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-car fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pending Requests Card Example -->
</div>
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2" style="background:#191919;border-left:#1cc88a 2px solid;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Reservations en cours de la journee</div>
                    <div class="h5 mb-0 font-weight-bold text-white"> <?=$reserveNow[0]["count(*)"]?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-registered fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-success shadow h-100 py-2" style="background:#191919;border-left:#e74a3b 2px solid;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                    Camion en location dans la journee</div>
                    <div class="h5 mb-0 font-weight-bold text-white">  <?= $cam_louer_now[0]["count(*)"]?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-truck fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-info shadow h-100 py-2 " style="background:#191919;border-left:#36b9cc 2px solid;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                    Voiture en location dans la journee
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white"><?=$veh_louer_now[0]["count(*)"]?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-car fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-info shadow h-100 py-2 " style="background:#191919;border-left:#4e73df 2px solid;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                    Les réservations annulées dans la journée
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white"><?=$reserve_annuler[0]["count(*)"]?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-car fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
</div>
        <div class="row">
                    	<!-- sessions-section start -->
								<div class="col-xl-6 col-md-6">
									<div class="card table-card"  style="background:#191919;color:#fff;">
										<div class="card-header" >
											<h5>Liste des Vehicules disponibles</h5>
										</div>
										<div class="card-body px-0 py-0" >
											<div class="table-responsive">
												<div class="session-scroll" style="height:478px;position:relative;">
													<table class="table table  m-b-0" id="mytable" style="background:#191919;">
														<thead>
															<tr style="background:#191919;color:#fff;">
																<th class="text-warning"><span>Avatar</span></th>
																<th class="text-warning"><span>Type Vehicule <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
																<th class="text-warning"><span>Categorie <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
																<th class="text-warning"><span>Marque <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
                                                                <th class="text-warning"><span>Modele <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
																				class="feather icon-help-circle f-16"></i></a></span></th>
															</tr>
														</thead>
														<tbody>
														<?php foreach($vehicules_dispo as $driver): ?>
															<tr><?php $image=find_image_vehicule_by_id($driver['id_vehicule']) ?>
																<td class="">
                                                                        <img  style="width: 30px;height:30px"  class="rounded" src="<?=WEB_ROUTE.'img/uploads/vehicule/'.$image[0]['nom_image']?>" alt="" >
                                                                </td>
                                                                <td class="text-">
                                                                     <?=$driver['nom_type_vehicule']?>
                                                                </td>
                                                                <td class="text-">
                                                                     <?=$driver['nom_categorie']?>
                                                                </td>
                                                                <td class="text-">
                                                                     <?=$driver['nom_marque']?>
                                                                </td>
                                                                <td class="text-white">
                                                                     <?=$driver['nom_modele']?>
                                                                </td>
															</tr>
                                                        <?php endforeach ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- sessions-section end -->
        
       
            <div class="col-md-6">
                 <div class="card shadow mb-4 " style="background:#191919;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-warning">Pourcentage</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small text-white font-weight-bold"> Nbrs de Conducteur disponible <span
                                            class="float-right"><?=$cmonDispo[0]["count(*)"]?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width:<?=$cmonDispo[0]["count(*)"]?>%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small text-white font-weight-bold">Nbrs de Camion disponible <span
                                            class="float-right"><?=$cmonDispo[0]["count(*)"]?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width:<?=$cmonDispo[0]["count(*)"]?>%"
                                            aria-valuenow="<?=$cmonDispo[0]["count(*)"]?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small text-white font-weight-bold">Nbrs de Voiture disponible <span
                                            class="float-right"><?=$vtrDispo[0]["count(*)"]?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width:<?=$vtrDispo[0]["count(*)"]?>%"
                                            aria-valuenow="<?=$vtrDispo[0]["count(*)"]?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small text-white font-weight-bold">Vehicules qui retournent dans la journee <span
                                            class="float-right"><?=$vehicule_returned_now[0]["count(*)"]?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width:<?=$vehicule_returned_now[0]["count(*)"]?>%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small text-white font-weight-bold"> Reservations en cours de la journee <span
                                            class="float-right"><?=$reserveNow[0]["count(*)"]?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:<?=$reserveNow[0]["count(*)"]?>%"
                                            aria-valuenow="<?=$reserveNow[0]["count(*)"]?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
                                   
                                    <h4 class="small text-white font-weight-bold">Reservations annulees de la journee <span
                                            class="float-right"><?=$reserve_annuler[0]["count(*)"]?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-secondary" role="progressbar" style="width:<?=$reserve_annuler[0]["count(*)"]?>%"
                                            aria-valuenow="<?=$reserve_annuler[0]["count(*)"]?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small text-white font-weight-bold">Camion en location de la journee <span
                                            class="float-right"><?=$cam_louer_now[0]["count(*)"]?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?=$cam_louer_now[0]["count(*)"]?>%"
                                            aria-valuenow="<?=$cam_louer_now[0]["count(*)"]?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small text-white font-weight-bold">Vehicule en location de la journee <span
                                            class="float-right"><?=$veh_louer_now[0]["count(*)"]?>%</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:<?=$veh_louer_now[0]["count(*)"]?>%"
                                            aria-valuenow="<?=$veh_louer_now[0]["count(*)"]?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
                                </div>
                  </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
      
    
</div>
<script>
          $(document).ready(function(){
                $('#mytable').DataTable();
          })
      </script>
<?php  //require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
