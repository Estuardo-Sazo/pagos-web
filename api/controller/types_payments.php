<?php

include_once('include/connect.php');

class DaoTypesPayments extends Base{
    // Get Types Payments
public function get(){
    $sql= "SELECT * FROM types_payments ";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function set($data){
    $sql= "INSERT INTO types_payments (name,cost,price_one,price_two) VALUES(:name,:cost,:price_one,:price_two)";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute($data);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}


}