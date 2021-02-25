<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Clientes');
include_once('../../utils/nav.php'); 

?>
<input type="hidden" name="" id="list" value="1">
<div class="container">
    <div class="row mt-2 justify-content-center">
        <div class="col-md-4">
            <input type="search" class="form-control border-info inpSearch" placeholder="Buscar cliente">
        </div>
    </div>

    <div class="row mt-2 justify-content-center">
        <div class="col-4"> <a class="btn btn-info btn-block" href="add.php">Nuevo</a></div>
    </div>

    <div class="row mt-2 justify-content-center" id="listCustomers">
        
    </div>

</div>


<?php
include_once('../../utils/footer.php'); 
footer('customers');
?>