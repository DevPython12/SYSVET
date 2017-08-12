<?php

	include('config.php');

	$id_medico = $_REQUEST['id_medicos_editar'];
	$nombre_empleado = $_REQUEST['empleado_medico_editar'];
	$cedula = $_REQUEST['cedula_medicos_editar'];

	$sql = "UPDATE medicos SET id_medico ='$id_medico', id_empleado ='$nombre_empleado',  cedula ='$cedula'  
			WHERE id_medico=$id_medico";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Medico Actualizado Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>