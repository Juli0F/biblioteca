
	<?php
session_start();

if (!$_SESSION["Ingreso"]) {
	header("location:index.php?ruta=ingreso");
	exit();
}

?>
	<br>
	<h1>EDITAR UN EMPLEADO</h1>

	<form method="post" >
		
    <?php
        $editar = new Empleado_Controller();
        $editar -> editar_empleado();
        
        $actualizar = new Empleado_Controller();
        $actualizar -> actualizar_empleado();
    ?>
	</form>
