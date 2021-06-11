<?php

include_once('include/connect.php');

class DaoTypesPayments extends Base{
    // Get Types Payments
public function get($user){
    $sql= "SELECT * FROM types_payments where user=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$user]);

    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function getType($id){
    $sql= "SELECT * FROM types_payments where id=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function set($data){
    $sql= "INSERT INTO types_payments (name,cost,price_one,price_two,user) VALUES(:name,:cost,:price_one,:price_two,:user)";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute($data);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function put($data,$id){
    $key='';
    $i= count($data);
    $t=0; 
    foreach ($data as $k => $v)
    {
        $t++;
        $c=($t==$i)?'':',';
        $key=$key.$k.'='.':'.$k.$c;
    }
    $sql= "UPDATE types_payments SET $key  WHERE id=$id";
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