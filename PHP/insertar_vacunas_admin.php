<?php

include('config.php');

$abreviatura = $_REQUEST['abreviatura_vacuna'];
$nombre = $_REQUEST['nombre_vacuna'];

$sql = "INSERT INTO vacunas (abreviatura, nombre)
			VALUES ('$abreviatura', '$nombre') ";


if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Vacuna Agregada Correctamente"); 
    		
    		</script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



?>