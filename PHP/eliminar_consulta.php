<?php
	require("../PHP/config.php");

	$id_consulta = $_REQUEST['id_consulta'];
	$sql = "DELETE FROM consultas WHERE id_consulta=$id_consulta";

		if ($con->query($sql) === TRUE) {
			echo '<script type="text/javascript"> 
	    		alert("Consulta Eliminada Correctamente");</a>
	    		</script>';
		} else {
			echo "Error al intentar eliminar consulta: ". $sql . "<br>" . $con->error;
		}
		
		$con->close();


?>