<?php

class Path_Controller{
    public function Plantilla(){
        include "vista/plantilla.php";
    }

    public function Rutas(){

        if (isset($_GET["ruta"])) {
                
            $rutas = $_GET["ruta"];

        }else{
            $rutas = "index";
        }
        $response = Modelo::Path_Modelo($rutas);
        
        include $response;

    }
}
?>