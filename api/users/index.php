<?php
session_start();
// Estabablecmos el modo de respuesta de tipo JSON
header("Content-type: application/json");

/// Guardamos el tipo de request para luego evalualro
$REQUETS = $_SERVER['REQUEST_METHOD'];
//Incluimos el dao encargao de hacer el CRUD de usuaios
include_once '../controller/users.php';
$ob = new DaoUser;

//Si el request es de tipo GET
if ($REQUETS == 'GET') {
    $r; /// Variable para enviar la respuesta a la peticion
   
        $r = ($ob->get());
        if($r==null){
            $r=[];
        }
    

    echo json_encode($r);
}

//Si el request es de tipo POST
if ($REQUETS == 'POST') {
    if (isset($_GET['login'])) {
        $_POST = json_decode(file_get_contents('php://input'), true);
        $rt = $ob->getLogin($_POST['username']);
        if(isset($rt[0]['id'])){
            if (password_verify($_POST['password'],$rt[0]['password'])) {
                unset($rt[0]['password']);
                $_SESSION['id_user']=$rt[0]['id'];
                $_SESSION['name_user']=$rt[0]['name'];

                $rpt = json_encode($rt[0]);
            }else{
            $r['ERROR']='Data Incorrect';
            $rpt = json_encode($r);
        }
        }else{
            $r['ERROR']='Data Incorrect';
            $rpt = json_encode($r);
        }
    
    }else{

        // Almacenamos las respuesta de app cliente
        $_POST = json_decode(file_get_contents('php://input'), true);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $r = $ob->set($_POST);
        $result['body'] = $r;
        $rpt = json_encode($result);
    }

    echo $rpt;
}

//Si el request es de tipo PUT
if ($REQUETS == 'PUT') {
        // Almacenamos las respuesta de app cliente
        $_POST = json_decode(file_get_contents('php://input'), true);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $r = $ob->put($_POST);
        $result['body'] = $r;
        $rpt = json_encode($result);   

    echo $rpt;
}