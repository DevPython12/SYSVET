<?php
	require("../PHP/config.php");

	$id_medicamento = $_REQUEST['id_medicamento'];
	$sql = "DELETE FROM info_medicamentos WHERE id_info_medicamento=$id_medicamento";

		if ($con->query($sql) === TRUE) {
			echo '<script type="text/javascript"> 
	    		alert("Medicamento Eliminado Correctamente");</a>
	    		</script>';
		} else {
			echo "Error al intentar eliminar medicamento: ". $sql . "<br>" . $con->error;
		}
		
		$con->close();


?>