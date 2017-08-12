<?php

	include('config.php');

	$id_nota = $_REQUEST['id_editar_nota'];
	$id_usuario = $_REQUEST['usuario_nota_admin'];
	$titulo = $_REQUEST['editar_titulo_nota'];
	$comentario = $_REQUEST['editar_comentario_nota'];
	$fecha = $_REQUEST['editar_fecha_nota'];

	$sql = "UPDATE notas SET id_usuario ='$id_usuario', titulo ='$titulo',  comentario ='$comentario',  fecha ='$fecha'  
			WHERE id_nota=$id_nota";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Nota Actualizada Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>