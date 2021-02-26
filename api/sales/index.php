<?php

// Estabablecmos el modo de respuesta de tipo JSON
header("Content-type: application/json");

/// Guardamos el tipo de request para luego evalualro
$REQUETS = $_SERVER['REQUEST_METHOD'];
//Incluimos el dao encargao de hacer el CRUD de usuaios
include_once '../controller/sales.php';
$ob = new DaoSales;

//Si el request es de tipo GET
if ($REQUETS == 'GET') {
    $r; /// Variable para enviar la respuesta a la peticion
    if (isset($_GET['id'])) {
        $r = $ob->getId($_GET['id']);
    }else if (isset($_GET['status'])) {
        $r = $ob->getStatus($_GET['status']);
    }  else {
        $r = ($ob->get());
        if($r==null){
            $r=[];
        }
    }

    echo json_encode($r);
}

//Si el request es de tipo POST
if ($REQUETS == 'POST') {
    // Almacenamos las respuesta de app cliente
    $_POST = json_decode(file_get_contents('php://input'), true);
    $r = $ob->set($_POST);
    $result['body'] = $r;
    $rpt = json_encode($result);

    echo $rpt;
}

//Si el request es de tipo PUT
if ($REQUETS == 'PUT') {
    // Almacenamos las respuesta de app cliente
    $_POST = json_decode(file_get_contents('php://input'), true);
    if(isset($_GET['id'])){
        $r = $ob->put($_POST,$_GET['id']);    
        $result['body'] = $r;
        $rpt = json_encode($result);
    }else{
        $result['ERROR'] = 'Need Id';
        $rpt = json_encode($result);
    }
   

   echo $rpt;
}