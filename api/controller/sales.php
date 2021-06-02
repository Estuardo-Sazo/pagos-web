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
    $sql= "SELECT s.id , s.status,s.price,s.start_date,s.balance,c.name as customer,t.name as type_payment FROM sales s
            JOIN customers c on c.id=s.customer
            JOIN types_payments t on t.id=s.type_payment 
            WHERE s.id=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

 // Get 
 public function getStatus($st,$id,$user){
     
        $sql= "SELECT s.id , s.status,s.price,s.start_date,s.balance,c.name as customer,t.name as type_payment FROM sales s
        JOIN customers c on c.id=s.customer
        JOIN types_payments t on t.id=s.type_payment
        WHERE s.status=? AND c.id=? AND c.id_user=? order by s.start_date DESC";
     
    
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$st,$id,$user]);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function salesForConstumers($status,$user){
    $sql= "SELECT c.id , c.status,SUM(s.balance)as balance,c.name as customer FROM sales s
    JOIN customers c on c.id=s.customer       
    WHERE c.status=? AND s.status=1 AND c.id_user=? group by c.id;";

    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$status,$user]);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function saleForId($id,$user){
    $sql= "SELECT c.id , c.status,SUM(s.balance)as balance,c.name as customer FROM sales s
    JOIN customers c on c.id=s.customer       
    WHERE c.id=? AND c.id_user=? group by c.id;";

    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$id,$user]);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

// Get 
public function getSearch($q){    
       $sql= "SELECT s.id , s.status,s.price,s.start_date,s.balance,c.name as customer,t.name as type_payment FROM sales s
       JOIN customers c on c.id=s.customer
       JOIN types_payments t on t.id=s.type_payment
       WHERE  (c.name LIKE '%$q%') OR (s.start_date LIKE '%$q%') OR (c.uuid LIKE '%$q%') order by s.start_date,s.status DESC";   
   
   $stmt= $this->connect()->prepare($sql);
   $stmt->execute();
   while($result = $stmt->fetchAll()){
       return $result;
   }
}

public function set($data){
    $sql= "INSERT INTO sales(type_payment,price,customer,user,status,start_date, start_time,end_date, end_time, balance ) 
                        VALUES(:type_payment, :price, :customer, :user, :status, :start_date, :start_time,:end_date, :end_time, :balance)";
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

public function put($data,$sale){
    $key='';
    $i= count($data);
    $t=0; 
    foreach ($data as $k => $v)
    {
        $t++;
        $c=($t==$i)?'':',';
        $key=$key.$k.'='.':'.$k.$c;
    }
    $sql= "UPDATE sales SET $key  WHERE id=$sale";
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