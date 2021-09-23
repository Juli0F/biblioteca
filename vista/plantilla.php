<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CRUD</title>

	<link rel="stylesheet" type="text/css" href="vista/css/estilos.css">

</head>

<body>
<?php
    
    session_start();

    
    if ($_SESSION["Ingreso"]) {
        include "modulo/menu.php";    
    }
    
    
?>

<section>
<?php
    $rutas = new Path_Controller();
    $rutas -> Rutas();
?>

</section>
	
</body>

</html>