<?php

	include('config.php');

	$id_usuario = $_REQUEST['id_editar_usuario'];
	$nombre_usuario = $_REQUEST['editar_nombre_usuario'];
	$contrasena = $_REQUEST['editar_contrasena_usuario'];
	$id_clinica = $_REQUEST['editar_clinica_usuario'];
	$privilegio = $_REQUEST['editar_privilegio_usuario'];

	$sql = "UPDATE usuarios SET nombre_usuario ='$nombre_usuario', contrasena ='$contrasena',  id_clinica ='$id_clinica',  privilegio ='$privilegio'  
			WHERE id_usuario=$id_usuario";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Usuario Actualizado Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>