<?php

include('config.php');

$nombre = $_REQUEST['nombre_usuario'];
$contrasena = $_REQUEST['contrasena_usuario'];
$id_clinica = $_REQUEST['clinica_usuario'];
$privilegio = $_REQUEST['privilegio_usuario'];


$sql = "INSERT INTO usuarios (id_usuario, nombre_usuario, contrasena, id_clinica, privilegio)
			VALUES (null, '$nombre', '$contrasena', '$id_clinica', '$privilegio') ";


if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Usuario Agregado Correctamente"); 
    		
    		</script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



?>