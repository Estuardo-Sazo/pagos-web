<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Ventas');
include_once('../../utils/nav.php'); 

?>
<a href="new.php" class="btn-flotante">Nueva Venta</a>


<br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 align="center">Ventas</h2>
        </div>
        <div class="col-md-6">
            <h3 align="center">Total: <span id="total" class="badge badge-dark">Q0</span></h3>
        </div>
    </div>
    <hr>
    <div class="row d-none m-2 justify-content-center">
        <div class="col-md-4">
            <input type="search" class="form-control form-control-sm border-info " id="search"
                placeholder="Buscar (Saldo, cliente, referencia, fecha)">
        </div>
    </div>
   
    <div class="row mb-5 pb-1" id="listSales">

    </div>
</div>

<?php
include_once('../../utils/footer.php'); 
footer('sales');
?>