<?php

/* We will establish connection parameters for the database */
class Base {
   private $host="localhost";
   private $user="root";
   private $pwd="";
   private $dbName="pagos_app";

/* Servidor */
   /*  private $host="localhost";
   private $user="id16259712_admin";
   private $pwd="@Estuardo1206";
   private $dbName="id16259712_pagos_web";
 
 */
   public function connect(){
       $dns='mysql:host='.$this->host . ';dbname='. $this->dbName;
       $pdo= new PDO($dns,$this->user, $this->pwd);
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
       return $pdo;
   }

}