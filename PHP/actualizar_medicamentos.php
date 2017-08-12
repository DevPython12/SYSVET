<?php

	include('config.php');

	$id_medicamento = $_REQUEST['id_medicamento_editar'];
	$nombre_generico = $_REQUEST['nombre_generico_editar'];
	$nombre_comercial = $_REQUEST['nombre_comercial_editar'];
	$id_tipo_medicamento = $_REQUEST['medicamento_tipo_editar'];
	$id_tipo_administracion = $_REQUEST['administracion_tipo_editar'];

	$sql = "UPDATE info_medicamentos SET nombre_generico ='$nombre_generico', nombre_comercial ='$nombre_comercial',  id_tipo_medicamento ='$id_tipo_medicamento',  id_tipo_administracion ='$id_tipo_administracion'  
			WHERE id_info_medicamento=$id_medicamento";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Medicamento Actualizado Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>