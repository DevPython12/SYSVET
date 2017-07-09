<?php

include('config.php');

$nombre = $_GET['nombre'];
$descripcion = $_GET['descripcion'];
$color = $_GET['color'];
$longitud = $_GET['longitud'];
$peso = $_GET['peso'];
$tipoMascota = $_GET['tipoMascota'];
$raza = $_GET['raza'];
$tipoSangre = $_GET['tipoSangre'];
$esterilizado = $_GET['esterilizado'];
$sexo = $_GET['sexo'];
$descripcion = $_GET['descripcion'];
$observaciones = $_GET['observaciones'];



$sql = "INSERT INTO pacientes (id_paciente, id_cliente, nombre, edad, especie, raza, sexo, color, esterilizado, longitud, peso, tipo_sangre, alergias, observaciones )
			VALUES (null, '$nombre', '$descripcion', '$color', '$longitud', '$peso', '$tipoMascota', '$raza', '$tipoSangre', '$esterilizado', '$sexo', '$descripcion', '$observaciones' ) ";


if ($con->query($sql) === TRUE) {

	echo '<script type="text/javascript"> 
    		alert("Cliente agregado correctamente.");
    		window.location.assign("../usuario/index.php");
    	  </script>';
} else {
	 echo "Error: " . $sql . "<br>" . $con->error;
}



?>