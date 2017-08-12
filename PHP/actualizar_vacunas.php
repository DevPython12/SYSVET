<?php

	include('config.php');

	$id_vacuna = $_REQUEST['id_editar_vacuna'];
	$abreviatura = $_REQUEST['editar_abreviatura_vacuna'];
	$nombre = $_REQUEST['editar_nombre_vacuna'];

	$sql = "UPDATE vacunas SET abreviatura ='$abreviatura', nombre ='$nombre'
			WHERE id_vacuna=$id_vacuna";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Vacuna Actualizada Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>