<?php

require_once "conexionDB.php";

class Admin_Modelo extends conexionDB{

 static public function ingresoModelo($datosC, $tablaBD){

    $pdo = conexionDB::cDB()->prepare("SELECT usuario , clave FROM $tablaBD WHERE usuario = :usuario");
    //enlazar paramentros vincula el parametro con la sentencia sql que anteriormente fue preparada
    $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
    
    $pdo -> execute();
    

    return $pdo->fetch();
    
    $pdo->close();
 }
 

}
