<?php

// Estabablecmos el modo de respuesta de tipo JSON
header("Content-type: application/json");

/// Guardamos el tipo de request para luego evalualro
$REQUETS =$_SERVER['REQUEST_METHOD'];
//Incluimos el dao encargao de hacer el CRUD de usuaios
include_once('../controller/types_payments.php');
$types_payments = new DaoTypesPayments;

//Si el request es de tipo GET
if($REQUETS=='GET'){
    $r;/// Variable para enviar la respuesta a la peticion

    if(isset($_GET['id'])){
        $r= json_encode($types_payments->getType($_GET['id']));
    }else if(isset($_GET['user'])){
        $r= json_encode($types_payments->get($_GET['user']));
    }else{
        $result['message']="Need User Id!";
        $r= json_encode($result);
    }
    
    echo $r;
}

//Si el request es de tipo POST
if($REQUETS=='POST'){
    $r= '';
    // Almacenamos las respuesta de app cliente
    $_POST= json_decode(file_get_contents('php://input'),true); 
    if(isset($_GET['id'])){
        $types_payments->put($_POST,$_GET['id']);
        $result['message']="UPDATED";
        $r= json_encode($result); 
    }else{
    $types_payments->set($_POST);
    $result['message']="Add";
    $r= json_encode($result); 

    }

    echo $r;
}