<?php
class Modelo{
    static public function Path_Modelo($rutas){
        
        if ($rutas ==  "ingreso" || $rutas == "registrar" || $rutas == "empleados" ||$rutas == "editar" || $rutas == "salir") {

            $pagina = "vista/modulo/".$rutas.".php";

        }else if ($rutas == "index") {
            
            $pagina = "vista/modulo/ingreso.php";

        }else{

            $pagina = "vista/modulo/ingreso.php";

        }
        return $pagina;
    }
}
?>