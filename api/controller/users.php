<?php

include_once('include/connect.php');

class DaoUser extends Base{
    // Get 
public function get(){
    $sql= "SELECT * FROM users";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute();
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function getLogin($user){
    $sql= "SELECT * FROM users where username=?";
    $stmt= $this->connect()->prepare($sql);
    $stmt->execute([$user]);
    while($result = $stmt->fetchAll()){
        return $result;
    }
}

public function set($data){
    $sql= "INSERT INTO users(name,username,password) VALUES(:name,:username,:password)";
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

}