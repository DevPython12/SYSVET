<?php

include('config.php');

$nombre_generico = $_REQUEST['nombre_generico_medicamento'];
$nombre_comercial = $_REQUEST['nombre_comercial_medicamento'];
$id_tipo_medicamento = $_REQUEST['tipo_admin_medicamento'];
$id_tipo_administracion = $_REQUEST['tipo_medicamento'];

$sql = "INSERT INTO info_medicamentos (id_info_medicamento, nombre_generico, nombre_comercial, id_tipo_medicamento, id_tipo_administracion)
			VALUES (null, '$nombre_generico', '$nombre_comercial', '$id_tipo_medicamento', '$id_tipo_administracion') ";


if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Medicamento Agregado Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



?>