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

public function set($data){
    $sql= "INSERT INTO types_payments (name,cost,price_one,price_two,user) VALUES(:name,:cost,:price_one,:price_two,:user)";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute($data);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}


}