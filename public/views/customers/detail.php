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
                        <input class="form-control" type="number" name="payment" id="payment">
                        <input type="hidden" name="current" id="payment">
                        <input type="hidden" id="idC" name="sale" value="<?= $_GET['id']?>">
                        <input type="hidden" id="current" name="current">

                    </div>
                    <button class="btn btn-info btn-block" type="submit">Registrar</button>
                </form>
            </div>

        </div>
    </div>
</div>


<span id="btnPagar"></span>

<input type="hidden" id="idC" value="<?= $_GET['id']?>">
<div class="container mt-5">
    <br>
    <div class="row justify-content-center" id="data">

    </div>
    <hr>
    <h5 align="center">Lista de pagos</h5>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="sale1-tab" data-toggle="tab" href="#Sales1" role="tab"
                        aria-controls="home" aria-selected="true">Pagos pendientes</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Pagos Completos</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Sales1" role="tabpanel" aria-labelledby="sale1-tab"></div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../../utils/footer.php'); 
footer('detailConstumer');
?>