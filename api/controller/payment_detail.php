<?php

include_once('include/connect.php');

class DaoPaymentDetail extends Base{
    // Get 
public function get(){
    $sql= "SELECT * FROM payment_detail";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute();
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function getId($id){
    $sql= "SELECT * FROM payment_detail where id=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function getSale($id){
    $sql= "SELECT * FROM payment_detail where sale=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}
public function set($data){
    $sql= "INSERT INTO payment_detail (sale,payment,date,time,current,new ) VALUES(:sale, :payment, :date, :time, :current, :new)";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute($data);
    //Detectar error
    if($stmt->errorInfo()[2]!=null){
        $arr = $stmt->errorInfo();
        return $arr;
    }else{
        return 'ADD';      
    }
}

public function put($data,$id){
    $key='';
    $i= count($_POST);
    $t=0; 
    foreach ($_POST as $k => $v)
    {
        $t++;
        $c=($t==$i)?'':',';
        $key=$key.$k.'='.':'.$k.$c;
    }
   
    $sql= "UPDATE payment_detail SET $key  WHERE id=$id";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute($data);

    //Detectar error
    if($stmt->errorInfo()[2]!=null){
        $arr = $stmt->errorInfo();
        return $arr;
    }else{
        return 'UPDATED';      
    }
}

}