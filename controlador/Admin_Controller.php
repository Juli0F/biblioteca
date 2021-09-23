<?php 

class Admin_Controller{
    public function ingreso_controller(){
        
        if (isset($_POST["usuarioI"])) {
            $datosC = array("usuario"=>$_POST["usuarioI"], "clave"=>$_POST["claveI"]);
            
            $tablaBD = "administradores";
            $respuesta = Admin_Modelo::ingresoModelo($datosC, $tablaBD);
            
            
            if($respuesta["usuario"]== $_POST["usuarioI"] && $respuesta["clave"]== $_POST["claveI"]){
                session_start();

                $_SESSION["Ingreso"] = true;
                $_SESSION["usuario"] = $_POST["usuarioI"];
                $_SESSION["userid"] = $respuesta["id"];
                
                header("location:index.php?ruta=empleados");

            }else{
                echo "Error Al Ingresar";
            }
        }
        
    }
}