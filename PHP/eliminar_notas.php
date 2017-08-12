<?php
	require("../PHP/config.php");

	$id_nota = $_REQUEST['id_nota'];
	$sql = "DELETE FROM notas WHERE id_nota=$id_nota";

		if ($con->query($sql) === TRUE) {
			echo '<script type="text/javascript"> 
	    		alert("Nota Eliminada Correctamente");</a>
	    		</script>';
		} else {
			echo "Error al intentar eliminar nota: ". $sql . "<br>" . $con->error;
		}
		
		$con->close();


?>