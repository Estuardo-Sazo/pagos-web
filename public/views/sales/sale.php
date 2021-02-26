<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Venta');
include_once('../../utils/nav.php'); 

?>
<a href="new.php" class="btn-flotante">Registar Pago</a>

<input type="hidden" id="idC" value="<?= $_GET['id']?>" ; <br>
<div class="container mt-5">

    <div class="row justify-content-center" id="data">

    </div>
    <hr>
    <h5 align="center">Pagos</h5>
    <div class="row">
        <div class="col-md-6">
        <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pago</th>
                            <th>Fecha</th>
                            <th>Sal Anterio</th>
                            <th>Saldo </th>


                        </tr>
                    </thead>

                    <tbody id="listPagos">
                      
                    </tbody>

                </table>
        </div>
    </div>
</div>

<?php
include_once('../../utils/footer.php'); 
footer('sale');
?>