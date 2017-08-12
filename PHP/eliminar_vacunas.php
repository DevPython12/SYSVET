<?php
	require("../PHP/config.php");

	$id_vacuna = $_REQUEST['id_vacuna'];
	$sql = "DELETE FROM vacunas WHERE id_vacuna=$id_vacuna";

		if ($con->query($sql) === TRUE) {
			echo '<script type="text/javascript"> 
	    		alert("Vacuna Eliminada Correctamente");</a>
	    		</script>';
		} else {
			echo "Error al intentar eliminar vacuna: ". $sql . "<br>" . $con->error;
		}
		
		$con->close();


?>