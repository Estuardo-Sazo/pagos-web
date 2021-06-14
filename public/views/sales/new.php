<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Nueva Venta');
include_once('../../utils/nav.php'); 

?>
<!-- MODAL CLIENTE -->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <input type="search" class="form-control form-control-sm border-info " id="search" 
                placeholder="Buscar Cliente ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Referencia</th>
                        </tr>
                    </thead>

                    <tbody id="listClientes">


                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

<!-- MODAL PRODUTO -->
<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione un Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <input type="search" class="form-control form-control-sm border-info " id="search2" 
                placeholder="Buscar Cliente ">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                        </tr>
                    </thead>

                    <tbody id="listProducto">


                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

<h2 align="center">Nueva Venta</h2>
<hr>

<input type="hidden" id="idC" value="<?= isset($_GET['customer'])?$_GET['customer']:""?>">

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="" id="newSale">
                <div class="form-group">
                    <a class="btn btn-dark m-2 border-10" data-toggle="modal" data-target="#modalCliente "
                        id="selCLiente">Selecionar Cliente</a>
                    <input type="text" id="cliente" class="form-control" disabled>
                    <input type="hidden" name="customer" id="customer">

                </div>
                <div class="form-group">
                    <a class="btn btn-dark m-2 border-10" data-toggle="modal" data-target="#modalProducto"
                        id="selectPro">Seleccionar Producto</a>
                    <input type="text" id="producto" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="text" id="precio" class="form-control" disabled>
                    <input type="hidden" name="price" id="price">
                    <input type="hidden" name="type_payment" id="type_payment">
                </div>
                <div class="form-group">
                    <label for="precio">Fecha:</label>
                    <input type="date" id="date" class="form-control">

                </div>
                <input type="hidden" name="user" value="<?= $_SESSION['id_user']?>">

                <button id="pago" class="btn btn-primary btn-block">Pago</button>
                <button id="credito" class="btn btn-warning btn-block">Credito</button>

            </form>
        </div>
    </div>
</div>


<?php
include_once('../../utils/footer.php'); 
footer('newSale');
?>