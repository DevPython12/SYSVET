<?php
	include('config.php');

	$id_paciente = $_REQUEST['id_mascota'];
	$sql = "DELETE FROM pacientes WHERE id_paciente=$id_paciente";

	//$add = mysqli_query($con, $sql); 
	//mysqli_close($con);
	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Mascota Eliminada Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>