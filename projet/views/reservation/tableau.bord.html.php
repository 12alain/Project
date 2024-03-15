<?php  require_once(ROUTE_DIR.'views/imc/header.html.php'); ?>
<div class="container jjj" >
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white  mb-3" style="max-width: 22rem;background:#d2b100;height:150px;">
                <div class="card-body" style="color: black;">
                    <h5 class="card-title text-center">Nbrs de Camion disponible</h5>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h1>
                                 <i class="fas fa-truck"></i>    
                            </h1>
                        </div>
                        <div class="col-md-6 mt-2 text-center">
                            <h3>
                                 <?=$cmonDispo[0]["count(*)"]?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white  mb-3" style="max-width: 22rem;background:#191919;height:150px">
                <div class="card-body">
                    <h5 class="card-title text-center">Nbrs de Voiture disponible</h5>
                    <div class="row">
                        <div class="col-md-6 text-center">
                          <h1>
                          <i class="fa fa-car" aria-hidden="true"></i>
                          </h1>
                        </div>
                        <div class="col-md-6 mt-2 text-center">
                           <h3>
                             <?=$vtrDispo[0]["count(*)"]?>
                           </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white  mb-3" style="max-width: 22rem;background:#191919;height:150px">
                <div class="card-body">
                    <h5 class="card-title text-center">Nbrs de Conducteur disponible</h5>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h1>
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </h1>
                        </div>
                        <div class="col-md-6 mt-2 text-center">
                            <h3>
                                <?=$vtrDispo[0]["count(*)"]?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white  mb-3"  style="max-width: 22rem;background:#191919;height:150px">
                <div class="card-body">
                    <h5 class="card-title text-center">Reservations en cours de la journee</h5>
                    <div class="row text-center">
                        <div class="col-md-6 text-center">
                            <h1>
                                <i class="fas fa-registered"></i>
                            </h1>
                        </div>
                        <div class="col-md-6 mt-2 text-center">
                            <h3>
                            <?=$reserveNow[0]["count(*)"]?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white  mb-3" style="max-width: 22rem;background:#191919;height:150px">
                <div class="card-body">
                    <h5 class="card-title text-center">Voiture en location de la journee</h5>
                    <div class="row">
                        <div class="col-md-6 text-center">
                           <h1>
                                <i class="fa fa-car" aria-hidden="true"></i>
                           </h1>
                        </div>
                        <div class="col-md-6 text-center">
                          <h3>
                               <?= $veh_louer_now[0]["count(*)"]?>
                          </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white   mb-3" style="max-width: 22rem;background:#191919;height:150px">
                <div class="card-body">
                    <h5 class="card-title text-center">Camion en location de la journee</h5>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h1>
                                  <i class="fas fa-truck"></i>   
                            </h1>
                        </div>
                        <div class="col-md-6 mt-2 text-center">
                            <h3>
                                 <?= $cam_louer_now[0]["count(*)"]?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   <!--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->
    <!-- <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class="row text-center">
                niuuuuj
            </div>
            <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">90%</div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4 col-sm-6">
            <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">90%</div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="progress yellow">
              
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
                 
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
        </div>
    </div> -->
</div>

<style>
    .progress{
    width: 150px;
    height: 150px;
    line-height: 150px;
    background: none;
    margin: 0 auto;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards;
}
.progress .progress-value{
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: #44484b;
    font-size: 24px;
    color: #fff;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%;
}
.progress.blue .progress-bar{
    border-color: #049dff;
}
.progress.blue .progress-left .progress-bar{
    animation: loading-2 1.5s linear forwards 1.8s;
}
.progress.yellow .progress-bar{
    border-color: #fdba04;
}
.progress.yellow .progress-left .progress-bar{
    animation: loading-3 1s linear forwards 1.8s;
}
.progress.pink .progress-bar{
    border-color: #ed687c;
}
.progress.pink .progress-left .progress-bar{
    animation: loading-4 0.4s linear forwards 1.8s;
}
.progress.green .progress-bar{
    border-color: #1abc9c;
}
.progress.green .progress-left .progress-bar{
    animation: loading-5 1.2s linear forwards 1.8s;
}
@keyframes loading-1{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(180deg);
        transform: rotate(180deg);
    }
}
@keyframes loading-2{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(144deg);
        transform: rotate(144deg);
    }
}
@keyframes loading-3{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }
}
@keyframes loading-4{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(36deg);
        transform: rotate(36deg);
    }
}
@keyframes loading-5{
    0%{
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100%{
        -webkit-transform: rotate(126deg);
        transform: rotate(126deg);
    }
}
@media only screen and (max-width: 990px){
    .progress{ margin-bottom: 20px; }
}

    .jjj{
        margin-top: 17%;
    }
    .card-body:hover{
        background-color: #d2b100;
        color: #000;
        transition: all 0,5 s;
    }
</style>
<?php  require_once(ROUTE_DIR.'views/imc/footer.html.php'); ?>
