<?php 

class conexionDB{
    static public function cDB(){
      
        $servername = "localhost";
        $username = "root";
        $password = "3w.gmail.com";

        try {
          $conn = new PDO("mysql:host=$servername;dbname=crud", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
          //return $conn;
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }

        return $conn;
    }
}



