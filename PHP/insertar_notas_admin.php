<?php

include('config.php');

$id_usuario = $_REQUEST['usuario_nota'];
$nota_titulo = $_REQUEST['titulos_notas'];
$nota_comentario = $_REQUEST['cuerpo_notas'];
$fecha = date("Y-m-d");


$sql = "INSERT INTO notas (id_usuario, titulo, comentario, fecha)
			VALUES ('$id_usuario', '$nota_titulo', '$nota_comentario', '$fecha') ";


if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Nota Agregada Correctamente"); 
    		
    		</script>';
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



?>