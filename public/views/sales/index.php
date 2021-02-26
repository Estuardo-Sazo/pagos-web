<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Ventas');
include_once('../../utils/nav.php'); 

?>
<a href="new.php" class="btn-flotante">Nueva Venta</a>


<br>
<div class="container mt-5">
    <h2 align="center">Ventas</h2>
    <hr>
    <div class="row m-2 justify-content-center">
        <div class="col-md-4">
            <input type="search" class="form-control form-control-sm border-info " id="search" placeholder="Buscar (Saldo, cliente, referencia, fecha)">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <button class="btn btn-danger btn-block  btn-sm" onClick="getStatus(1)">Pediente</button>
        </div>
        <div class="col-4">
            <button class="btn btn-success btn-block btn-sm" onClick="getStatus(0)">Completo</button>
        </div>
        <div class="col-4">
            <button class="btn btn-info btn-block btn-sm" onClick="getStatus(3)">Todo</button>
        </div>
    </div>
    <div class="row mb-5 pb-1" id="listSales">

    </div>
</div>

<?php
include_once('../../utils/footer.php'); 
footer('sales');
?>