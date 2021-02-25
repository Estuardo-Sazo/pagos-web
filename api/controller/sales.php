<?php

include_once('include/connect.php');

class DaoSales extends Base{
    // Get 
public function get(){
    $sql= "SELECT * FROM sales";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute();
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

   // Get ID
   public function getId($id){
    $sql= "SELECT * FROM sales where id=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function set($data){
    $sql= "INSERT INTO sales(type_payment,price,customer,user,status,start_date, start_time,end_date, end_time, balance ) 
                        VALUES(:type_payment, :price, :customer, :user, :status, :start_date, :start_time,:end_date, :end_time, :balance)";
    $stmt= $this->connect()->prepare($sql);    
    $stmt->execute($data);
    print_r($data);
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
   
    $sql= "UPDATE sales SET $key  WHERE id=$id";
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