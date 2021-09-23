<?php

class Empleado_Controller{
    
    public function registrar_empleado_controller(){
        
        if (isset($_POST["nombreR"])) {
            $datos_controller = array("nombre"=>$_POST["nombreR"],"apellido"=>$_POST["apellidoR"],"email"=>$_POST["emailR"],"salario"=>$_POST["salarioR"],"puesto"=>$_POST["puestoR"]);
        
            $tabla = "empleados";
            $repuesta = Empleado_Modelo::registrar_empleado($datos_controller, $tabla);
            
            if ($repuesta == 1) {
                header("location:index.php?ruta=empleados");
            }else{
                echo "error";
            }
            
        }        
        
    }
    
    public function mostrar_empleado(){
        $tabla = "empleados";
        $respuesta = Empleado_Modelo::mostar_empleado_modelo($tabla);
        
        foreach($respuesta as $key => $value){
            echo '
                    <tr>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["apellido"].'</td>
                        <td>'.$value["email"].'</td>
                        <td>'.$value["puesto"].'</td>
                        <td>'.$value["salario"].'</td>
                        
                        <td>
                            <a href="index.php?ruta=editar&id='.$value["id"].'" >
                                <button class="row-1">Editar</button>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?ruta=empleados&idB='.$value["id"].'" >
                                <button > Eliminar </button>
                            </a>
                        </td>
                        
                    </tr>
            ';
        }
    }
    public  function editar_empleado(){
        
        $datos_controller = $_GET["id"];
        $tabla = "empleados";
        
        $respuesta = Empleado_Modelo::editar_empleado_modelo($datos_controller,$tabla);
        
        echo '
                <input type="hidden" value="'.$respuesta["id"].'" name="idE">
                
                <input type="text" placeholder="Nombre" value="'.$respuesta["nombre"].'"  name="nombreE" required>

                <input type="text" placeholder="Apellido" value="'.$respuesta["apellido"].'" name="apellidoE" required>

                <input type="email" placeholder="Email" value="'.$respuesta["email"].'" name="emailE" required>

                <input type="text" placeholder="Puesto" value="'.$respuesta["puesto"].'" name="puestoE" required>

                <input type="text" placeholder="Salario" value="'.$respuesta["salario"].'" name="salarioE" required>

                <input type="submit" value="Actualizar">
              
            ';
            
    }
    public function actualizar_empleado(){
        
        if (isset($_POST["nombreE"])) {
            $datos_controller = array("id"=>$_POST["idE"],"nombre"=>$_POST["nombreE"],"apellido"=>$_POST["apellidoE"],"email"=>$_POST["emailE"],"puesto"=>$_POST["puestoE"], "salario"=>$_POST["salarioE"]);
            
            $tabla = "empleados";
            
            $respuesta = Empleado_Modelo::actualizar_empleado($datos_controller,$tabla);
            
            
             
            if ($respuesta == 1) {
                header("location:index.php?ruta=empleados");
            }else{
                echo "No se Actualizaron Datos";
            }
                    
        }
    }
    public function eliminar_empleado(){
        if (isset($_GET["idB"])) {
            $datos_controller = $_GET["idB"];
            $tabla = "empleados";
            $respuesta = Empleado_Modelo::eliminar_empleado($datos_controller,$tabla);
            
            if ($respuesta == 1) {
                header("location:index.php?ruta=empleados");
            }else{
                echo "No se Actualizaron Datos";
            }
        }
    }   
}