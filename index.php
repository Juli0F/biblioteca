<?php


require_once "controlador/Path_Controller.php";
require_once "controlador/Admin_Controller.php";
require_once "controlador/Empleado_Controller.php";

require_once "modelo/Path_Modelo.php";                    
require_once "modelo/Admin_Modelo.php";

require_once "modelo/Empleado_Modelo.php";




$path = new Path_Controller();
$path -> Plantilla();

