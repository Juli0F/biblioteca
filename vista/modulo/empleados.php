<?php
session_start();

if (!$_SESSION["Ingreso"]) {
	header("location:index.php?ruta=ingreso");
	exit();
}

?>

	<br>
	<h1>Empleados</h1>

	<table id="t1" border="0" cellspacing="0">
		
		<thead>
			
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Puesto</th>
				<th>Salario</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			
			<?php
				$mostrar = new Empleado_Controller();
				$mostrar -> mostrar_empleado();
			?>

		</tbody>

	</table>
	<?php
	$eliminar = new Empleado_Controller();
	$eliminar -> eliminar_empleado();	


