<?php

include('config.php');

$id_receta = $_REQUEST['id_receta'];

$sql1 = "INSERT INTO recetas (id_receta)
			VALUES ('$id_receta') ";

if ($con->query($sql1) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Receta Agregada Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



$id_info_medicamento = $_REQUEST['id_medicamento'];
$cantidad = $_REQUEST['cantidad_medicamento'];
$frecuencia = $_REQUEST['frecuencia_medicamento'];
$duracion = $_REQUEST['duracion_medicamento'];
$comentarios = $_REQUEST['comentarios_medicamento'];

$sql2 = "INSERT INTO recetas_medicamentos (id_receta_medicamento, id_info_medicamento, id_receta, cantidad, frecuencia, duracion, comentarios)
			VALUES (null, '$id_info_medicamento', '$id_receta', '$cantidad', '$frecuencia', '$duracion', '$comentarios') ";


//$add = mysqli_query($con, $sql); 
//mysqli_close($con);
if ($con->query($sql2) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Recetas Agregados Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	


?>