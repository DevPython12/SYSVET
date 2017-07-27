<?php

include('config.php');

$id_diagnostico = $_REQUEST['id_diagnostico'];

$sql1 = "INSERT INTO diagnosticos (id_diagnostico)
			VALUES ('$id_diagnostico') ";

if ($con->query($sql1) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Diagnostico Agregado Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	



$id_enfermedad = $_REQUEST['id_enfermedad1'];
$comentarios_enfermedad = $_REQUEST['comentarios_enfermedad'];



$sql2 = "INSERT INTO diagnosticos_enfermedades (id_diagnostico_enfermedad, id_diagnostico, id_enfermedad, comentarios)
			VALUES (null, '$id_diagnostico', '$id_enfermedad', '$comentarios_enfermedad') ";


//$add = mysqli_query($con, $sql); 
//mysqli_close($con);
if ($con->query($sql2) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Diagnosticos Agregados Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	


?>