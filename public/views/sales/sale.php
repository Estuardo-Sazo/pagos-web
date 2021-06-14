<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Venta');
include_once('../../utils/nav.php'); 

?>

<div class="modal fade" id="modalPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar pago</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <form id="frm-pago">
                    <div class="form-group">
                        <label for="pago">Pago:</label>
                        <input class="form-control" type="number" name="payment" id="payment" re>
                        <input type="hidden" name="current" id="payment">
                        <input type="hidden" id="idC" name="sale" value="<?= $_GET['id']?>">
                        <input type="hidden" id="current" name="current">

                    </div>
                    <button class="btn btn-info btn-block" type="submit">Registrar</button>
                </form>
                <br>
                <div id="alerta">

                
                </div>
            </div>

        </div>
    </div>
</div>


<span id="btnPagar"></span>

<input type="hidden" id="idC" value="<?= $_GET['id']?>">
<div class="container mt-5">
    <a href="../customers/detail.php?id=<?= $_GET['customer']?>" class="btn btn-warning m-3">Volver</a>


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