<?php


require_once "conexionDB.php";

class Empleado_Modelo extends conexionDB{
    static public function registrar_empleado($datos_controller, $tabla){
        
        $pdo = conexionDB::cDB()->prepare("INSERT INTO $tabla (nombre,apellido,email,puesto,salario) VALUES(:nombre, :apellido, :email, :puesto, :salario)"); 
        
        $pdo -> bindParam(":nombre",$datos_controller["nombre"],PDO::PARAM_STR);
        $pdo -> bindParam(":apellido",$datos_controller["apellido"],PDO::PARAM_STR);
        $pdo -> bindParam(":email",$datos_controller["email"],PDO::PARAM_STR);
        $pdo -> bindParam(":puesto",$datos_controller["puesto"],PDO::PARAM_STR);
        $pdo -> bindParam(":salario",$datos_controller["salario"],PDO::PARAM_STR);        
        
        if($pdo -> execute()){
            return 1;
        }else{
            return 0;
        }
        $pdo -> close();
    }    
    
    
    static public function mostar_empleado_modelo($tabla){
        
        $pdo = conexionDB::cDB()->prepare("SELECT id,nombre,apellido,email,puesto,salario FROM $tabla"); 
        $pdo -> execute();
        return $pdo->fetchAll();
        $pdo->close();
    }
    static public function editar_empleado_modelo($datos_controller,$tabla){
    
        
        $pdo = conexionDB::cDB()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tabla WHERE id = :id"); 
        $pdo -> bindParam(":id",$datos_controller,PDO::PARAM_INT);
        $pdo ->execute();
        $respuesta = $pdo ->fetch();      
        /*
        foreach($respuesta as $key => $value){
            echo 
                $value;
        }
        */
        return $respuesta;
        $pdo ->close();
     }
    static public function actualizar_empleado($datos_controller,$tabla){
        
        $pdo = conexionDB::cDB()->prepare("UPDATE $tabla SET nombre = :nombre, apellido = :apellido, email = :email, puesto = :puesto, salario = :salario WHERE id = :id"); 
        
        $pdo ->bindParam(":id",$datos_controller["id"], PDO::PARAM_INT);
        $pdo ->bindParam(":nombre",$datos_controller["nombre"], PDO::PARAM_STR);
        $pdo ->bindParam(":apellido",$datos_controller["apellido"], PDO::PARAM_STR);
        $pdo ->bindParam(":email",$datos_controller["email"], PDO::PARAM_STR);
        $pdo ->bindParam(":puesto",$datos_controller["puesto"], PDO::PARAM_STR);
        $pdo ->bindParam(":salario",$datos_controller["salario"], PDO::PARAM_STR);
        
        try {
            //code...
            
            if($pdo -> execute()){
                echo "todo correcto";
                return 1;
            }else{
                echo "fallo con exito";
                return 0;
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $pdo -> close();
    }
    static public function eliminar_empleado($datos_controller,$tabla){
        $pdo = conexionDB::cDB()->prepare("DELETE FROM $tabla WHERE id = :id"); 
        $pdo-> bindParam(":id",$datos_controller,PDO::PARAM_INT);
        
        if($pdo -> execute()){
            echo "todo correcto";
            return 1;
        }else{
            echo "fallo con exito";
            return 0;
        }
    }
}