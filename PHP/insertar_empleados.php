<?php

include('config.php');

$nombre = $_REQUEST['nombre_empleado'];
$a_paterno = $_REQUEST['apellido_paterno_empleado'];
$a_materno = $_REQUEST['apellido_materno_empleado'];
$fecha_nacimiento = $_REQUEST['fecha_nacimiento_empleado'];
$direccion = $_REQUEST['direccion_empleado'];
$telefono = $_REQUEST['telefono_empleado'];
$movil= $_REQUEST['movil_empleado'];
$curp = $_REQUEST['curp_empleado'];
$rfc = $_REQUEST['rfc_empleado'];
$sexo = $_REQUEST['sexo_empleado'];


$sql = "INSERT INTO datos_empleados (nombre, apellido_paterno, apellido_materno, fecha_nacimiento, direccion, telefono, movil, curp, rfc, sexo)
			VALUES ('$nombre', '$a_paterno', '$a_materno', '$fecha_nacimiento', '$direccion', '$telefono', '$movil', '$curp', '$rfc', '$sexo') ";


if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Empleado Agregado Correctamente"); 
    		
    		</script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



?>