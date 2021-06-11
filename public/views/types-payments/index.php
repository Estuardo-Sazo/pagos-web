<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Tipos');
include_once('../../utils/nav.php'); 
$moneda='Q';
?>
<button type="button" class="btn-flotante" data-toggle="modal" data-target="#nuevo">
    Nueva Articulo
</button>
<br>

<!-- Modal NUEVO -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-nuevo">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" class="form-control" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="cost">Costo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><?= $moneda ?></span>
                            </div>
                            <input type="number" step="any" class="form-control" id="cost" name="cost" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price_one">Precio 1</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><?= $moneda ?></span>
                            </div>
                            <input type="number" step="any" class="form-control" id="price_one" name="price_one" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price_two">Precio 2</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><?= $moneda ?></span>
                            </div>
                            <input type="number" step="any" class="form-control" id="price_two" name="price_two" required>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="user" name="user" value="<?=$_SESSION['id_user'] ?>">
                    <button class="btn btn-primary btn-block" type="submit">Guardar</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal EDITAR -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Articulo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <input type="hidden"  id="idType"  >

                <form id="frm-editar">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name_E" class="form-control" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="cost">Costo</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><?= $moneda ?></span>
                            </div>
                            <input type="number" step="any" class="form-control" id="cost_E" name="cost" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price_one">Precio 1</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><?= $moneda ?></span>
                            </div>
                            <input type="number" step="any" class="form-control" id="price_one_E" name="price_one" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price_two">Precio 2</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><?= $moneda ?></span>
                            </div>
                            <input type="number" step="any" class="form-control" id="price_two_E" name="price_two" required>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->

<div class=" container mt-5 mb-5">
    <h3 align="center">Tipos de articulos</h3>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6 mt-2">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Articulo</th>
                        <th>Costo</th>
                        <th>Precio 1</th>
                        <th>Precio 2</th>
                        <th>Operacion</th>
                    </tr>
                </thead>
                <tbody id="lista">

                </tbody>
            </table>
        </div>


    </div>
</div>

<?php
include_once('../../utils/footer.php'); 
footer('types_payments');
?>