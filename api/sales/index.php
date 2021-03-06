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
    if (isset($_GET['user'])) {
        if (isset($_GET['st'])) {
            $r = $ob->getStatus($_GET['st'],$_GET['id'],$_GET['user']);
        }else  if (isset($_GET['id'])) {
            $r = $ob->saleForId($_GET['id'],$_GET['user']);
        } else if (isset($_GET['forId'])) {
            $r = $ob->getId($_GET['forId'],$_GET['user']);
        }else if (isset($_GET['search'])) {
            $r = $ob->getSearch($_GET['search']);        
        }else if (isset($_GET['customer'])) {
            $r = $ob->salesForConstumers($_GET['status'],$_GET['user']);
        } else {
            $r = ($ob->get());
            if($r==null){
                $r=[];
            }
    }
}else{
    $r['message'] ='Need Id User';
}

    echo json_encode($r);
}

//Si el request es de tipo POST
if ($REQUETS == 'POST') {

    if(isset($_GET['PUT'])){
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $r = $ob->put($_POST,$id);    
            $result['body'] = $r;
            $rpt = json_encode($result);
        }else{
            $result['ERROR'] = 'Need Id';
            $rpt = json_encode($result);
        }
    }else{
        // Almacenamos las respuesta de app cliente
        $_POST = json_decode(file_get_contents('php://input'), true);
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
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $r = $ob->put($_POST,$id);    
        $result['body'] = $r;
        $rpt = json_encode($result);
    }else{
        $result['ERROR'] = 'Need Id';
        $rpt = json_encode($result);
    }
   

   echo $rpt;
}