<?php

include('config.php');

$id_vacuna = $_REQUEST['vacunas'];
$id_paciente = $_REQUEST['id_mascota_2'];
$fecha_aplicacion = $_REQUEST['date'];
$observaciones = $_REQUEST['observacion_vacuna'];


$sql = "INSERT INTO vacunas_pacientes (id_vacunas_pacientes, id_vacuna, id_paciente, fecha_aplicacion, observaciones)
			VALUES (null, '$id_vacuna' ,'$id_paciente', '$fecha_aplicacion', '$observaciones') ";


//$add = mysqli_query($con, $sql); 
//mysqli_close($con);
if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Vacuna Agregada Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>