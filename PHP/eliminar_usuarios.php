<?php
	require("../PHP/config.php");

	session_start();
	$_SESSION['id_usuario'];
	$id_usuario = $_REQUEST['id_usuario'];

	if($id_usuario == $_SESSION['id_usuario']) {
		echo "No borres el usuario actual";
	} else {

		$sql = "DELETE FROM usuarios WHERE id_usuario=$id_usuario";

		if ($con->query($sql) === TRUE) {
			echo '<script type="text/javascript"> 
	    		alert("Usuario Eliminado Correctamente");</a>
	    		</script>';
		} else {
			echo "Error al intentar eliminar usuario: ". $sql . "<br>" . $con->error;
		}
		
		$con->close();
	}


					
?>