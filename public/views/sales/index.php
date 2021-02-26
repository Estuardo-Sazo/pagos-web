<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Venta');
include_once('../../utils/nav.php'); 

?>
<h2 align="center">Venta</h2>
<hr>

<div class="container">
    <div class="row">
        <div class="col-md-4 mt-2">
            <div class="card border-black mb-3">
                <div class="card-body pt-1 pb-1">
                    <h4 class="text-center">Marvin</h4>
                    <div class="row">
                        <div class="col-8">
                            <p class="card-text m-0">22/2/2021 </p>
                            <p class="card-text m-0">200 Diamantes</p>
                        </div>
                        <div class="col-4 text-success">
                            <h5>Saldo</h5>
                            <h3 >Q25</h3>
                        </div>
                    </div>
                    <!-- <p class="btn-cliente mt-1">
                            <a href="view.php?id=${d.id}" class="btn btn-success btn-block ">Ver</a>
                        </p> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../../utils/footer.php'); 
footer('sales');
?>