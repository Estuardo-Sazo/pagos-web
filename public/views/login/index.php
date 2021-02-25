<?php
session_start();
if(isset($_SESSION['id_user'])){
    header('Location: ../Inicio');
}
include_once('../../utils/header.php'); 
cabecera('Inicio de Sesión');
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card border-dark">
                <div class="card-body">
                    <h4 class="card-title text-center">Inicio de Sesión</h4>
                    <form id="login">
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" class="form-control" id="username" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-info btn-block">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once('../../utils/footer.php'); 
footer('login');
?>