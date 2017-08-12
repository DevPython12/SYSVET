<?php

include('config.php');

$id_empleado = $_REQUEST['empleado_medico'];
$cedula = $_REQUEST['cedula_medicos'];

$sql = "INSERT INTO medicos (id_empleado, cedula)
			VALUES ('$id_empleado', '$cedula') ";


if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Medico Agregado Correctamente"); 
    		
    		</script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



?> 