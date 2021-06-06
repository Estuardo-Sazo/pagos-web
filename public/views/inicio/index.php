<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Inicio');
include_once('../../utils/nav.php'); 

?>
<a href="../sales/new.php" class="btn-flotante">Nueva Venta</a>
<br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mt-2">
            <a class="btn btnM btn-info btn-block btn-lg" href="../sales">
                Ventas
            </a>
        </div>
        <div class="col-md-4 mt-2">
            <a class="btn btnM btn-primary btn-block btn-lg" href="../customers">
                Clientes
            </a>
        </div>
        <div class="col-md-4 mt-2">
            <a class="btn btnM btn-secondary btn-block btn-lg" href="../types-payments">
                Articulos

            </a>
        </div>

    </div>
</div>

<?php
include_once('../../utils/footer.php'); 
footer('inicio');
?>