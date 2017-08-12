<?php

	include('config.php');

	session_start();
	$id_usuario = $_SESSION['id_usuario'];
	$id_nota = $_REQUEST['id_nota'];
	$nota_titulo = $_REQUEST['editar_titulo_nota'];
	$nota_comentario = $_REQUEST['editar_comentario_nota'];
	$fecha = date("Y-m-d");

	$sql = "UPDATE notas SET titulo='$nota_titulo', comentario='$nota_comentario'  WHERE id_nota=$id_nota AND id_usuario=$id_usuario";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Nota Actualizada Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>