<?php
	require("../PHP/config.php");

	$id_cliente = $_REQUEST['id_cliente'];
	$sql = "DELETE FROM clientes WHERE id_cliente=$id_cliente";

	if ($con->query($sql) === TRUE) {
		echo '<script type="text/javascript"> 
	    		alert("Cliente Eliminado Correctamente");</a>
	    		</script>';
	} else {
		echo "Error al intentar eliminar cliente: ". $sql . "<br>" . $con->error;
	}
		
	$con->close();
						
?>