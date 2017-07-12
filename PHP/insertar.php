<?php

include('config.php');

$nombre = $_GET['nombre'];
$a_paterno = $_GET['a_paterno'];
$a_materno = $_GET['a_materno'];
$direccion = $_GET['direccion'];
$celular = $_GET['celular'];
$telefono = $_GET['telefono'];
$date = $_GET['date'];




$sql = "INSERT INTO clientes (id_cliente, nombre, apellido_paterno, apellido_materno, fecha_nacimiento, direccion, telefono, movil)
			VALUES (null, '$nombre', '$a_paterno', '$a_materno', '$date', '$direccion', '$telefono', '$celular') ";


if ($con->query($sql) === TRUE) {

	echo '<script type="text/javascript"> 
    		alert("Cliente agregado correctamente.");
    		window.location.assign("../usuario/index.php");
    	  </script>';
} else {
	 echo '<script type="text/javascript"> 
    		alert("Error al agregar.");
    		window.location.assign("../usuario/index.php");
    	  </script>';
}



?>