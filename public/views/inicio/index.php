<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Inicio');
include_once('../../utils/nav.php'); 

?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mt-2">
            <a class="btn btnM btn-info btn-block btn-lg"  href="#"> 
            Nueva Venta
            </a>
        </div>
        <div class="col-md-4 mt-2">
            <a class="btn btnM btn-primary btn-block btn-lg"  href="../customers"> 
            <div  class="">Clientes</div>
            </a>
        </div>
        <div class="col-md-4 mt-2">
            <a class="btn btnM btn-success btn-block btn-lg"  href="#"> 
            <div class="">Pagos Pendientes</div>
            </a>
        </div>
    </div>
</div>

<?php
include_once('../../utils/footer.php'); 
footer('inicio');
?>