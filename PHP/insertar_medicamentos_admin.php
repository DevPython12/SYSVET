<?php

include('config.php');

$nombre_generico = $_REQUEST['nombre_generico_2'];
$nombre_comercial = $_REQUEST['nombre_comercial_2'];
$medicamento_tipo = $_REQUEST['medicamento_tipo'];
$administracion_tipo = $_REQUEST['administracion_tipo'];


$sql = "INSERT INTO info_medicamentos (nombre_generico, nombre_comercial, id_tipo_medicamento, id_tipo_administracion)
			VALUES ('$nombre_generico', '$nombre_comercial', '$medicamento_tipo', '$administracion_tipo') ";


if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Medicamento Agregado Correctamente"); 
    		
    		</script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



?>