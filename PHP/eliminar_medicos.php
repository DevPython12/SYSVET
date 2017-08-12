<?php
	require("../PHP/config.php");	

	$id_medico = $_REQUEST['id_medico'];


	$sql = "DELETE FROM medicos WHERE id_medico=$id_medico";

	if ($con->query($sql) === TRUE) {
		echo '<script type="text/javascript"> 
	    		alert("Medico Eliminado Correctamente");</a>
	    		</script>';
		} else {
			echo "Error al intentar eliminar medico: ". $sql . "<br>" . $con->error;
		}
		
		$con->close();
	

?>