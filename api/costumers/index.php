<?php

// Estabablecmos el modo de respuesta de tipo JSON
header("Content-type: application/json");

/// Guardamos el tipo de request para luego evalualro
$REQUETS = $_SERVER['REQUEST_METHOD'];
//Incluimos el dao encargao de hacer el CRUD de usuaios
include_once '../controller/costumers.php';
$ob = new DaoCostumers;

//Si el request es de tipo GET
if ($REQUETS == 'GET') {
    $r; /// Variable para enviar la respuesta a la peticion
    if (isset($_GET['id'])) {
        $r = $ob->getId($_GET['id']);
    } else {
        $r = ($ob->get());
    }

    echo json_encode($r);
}

//Si el request es de tipo GET
if ($REQUETS == 'DELETE') {
    $r; /// Variable para enviar la respuesta a la peticion
    if (isset($_GET['id'])) {
        $r = $ob->delete($_GET['id']);
        if ($r == null) {
            $r['body'] = 'Deleted';
        }
    } else {
        $r['ERROR'] = 'Need ID';
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

//Si el request es de tipo POST
if ($REQUETS == 'PUT') {
    // Almacenamos las respuesta de app cliente
    $_POST = json_decode(file_get_contents('php://input'), true);
    $r = $ob->put($_POST);
    $result['body'] = $r;
    $rpt = json_encode($result);

    echo $rpt;
}
