<?php
include_once('../../utils/validate_session.php'); 
include_once('../../utils/header.php'); 
cabecera('Nuevo Cliente');
include_once('../../utils/nav.php'); 
?>

<div class="container">
    <br>
    <h2 align="center">Nuevo Cliente</h2>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <form action="" id="newCustomer">
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Dirección:</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="uuid">Referencia:</label>
                    <input type="text" name="uuid" id="uuid" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Detalles:</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono:</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type_customer">Tipo Cliente:</label>
                    <select type="text" name="type_customer" id="type_customer" class="form-control" required>
                        <option value="0">Normal</option>
                        <option value="1">Especial</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
            </form>
        </div>
    </div>
</div>



<?php
include_once('../../utils/footer.php'); 
footer('customers');
?>