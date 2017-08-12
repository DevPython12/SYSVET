<?php
	require("../PHP/config.php");

	$id_empleado = $_REQUEST['id_empleado'];
    $sql = "DELETE FROM datos_empleados WHERE id_empleado=$id_empleado";

		if ($con->query($sql) === TRUE) {
			echo '<script type="text/javascript"> 
	    		alert("Empleado Eliminado Correctamente");</a>
	    		</script>';
		} else {
			echo "Error al intentar eliminar el empleado: ". $sql . "<br>" . $con->error;
		}
		
		$con->close();



					
?>