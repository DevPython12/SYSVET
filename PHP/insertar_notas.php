<?php

include('config.php');
session_start();
$id_usuario = $_SESSION['id_usuario'];
$nota_titulo = $_REQUEST['nota_titulo'];
$nota_comentario = $_REQUEST['nota_comentario'];
$fecha = date("Y-m-d");


$sql = "INSERT INTO notas (id_usuario, titulo, comentario, fecha)
			VALUES ('$id_usuario', '$nota_titulo', '$nota_comentario', '$fecha') ";


if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Nota Agregada Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



?>