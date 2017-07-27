<?php

include('config.php');

$nombre = $_REQUEST['nombre_cliente'];
$a_paterno = $_REQUEST['a_paterno_cliente'];
$a_materno = $_REQUEST['a_materno_cliente'];
$direccion = $_REQUEST['direccion'];
$celular = $_REQUEST['celular'];
$telefono = $_REQUEST['telefono'];
$date = $_REQUEST['date'];


$sql = "INSERT INTO clientes (id_cliente, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, direccion, telefono, movil)
			VALUES (null, '$nombre', '$a_paterno', '$a_materno', '$date', '$direccion', '$telefono', '$celular') ";


$add = mysqli_query($con, $sql);
mysqli_close($con);
	


?>