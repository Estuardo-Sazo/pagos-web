<?php

include_once('include/connect.php');

class DaoCostumers extends Base{
    // Get 
public function get($user){
    $sql= "SELECT * FROM customers WHERE id_user=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$user]);

    while($result = $stmt->fetchAll()){
        return $result;
    }
}

    // Get 
    public function getStatus($user,$status){
        $sql= "SELECT * FROM customers WHERE status=? AND id_user=?";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$status,$user]);
    
        while($result = $stmt->fetchAll()){
            return $result;
        }
    }

   // Get id
   public function getId($id){
    $sql= "SELECT * FROM customers where id=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    while($result = $stmt->fetchAll()){
        return $result;
    }
}

 // Delete id
 public function delete($id){
    $sql= "DELETE FROM customers where id=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    while($result = $stmt->fetchAll()){
        return $result;
    }
}


public function set($data){
    $sql= "INSERT INTO customers (name,address,uuid,description,phone,type_customer,id_user) VALUES(:name,:address,:uuid,:description,:phone,:type_customer,:id_user)";
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

public function put($data){
    $sql= "UPDATE  customers SET name=:name, address=:address,uuid=:uuid,description=:description,phone=:phone,type_customer=:type_customer WHERE id=:id";
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