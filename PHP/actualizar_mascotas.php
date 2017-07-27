<?php
	include('config.php');

	$id_paciente = $_REQUEST['id_mascota'];
	$id_cliente = $_REQUEST['id_mascota'];
	$nombre_mascota = $_REQUEST['nombre_mascota'];
	$edad_mascota =  $_REQUEST['edad_mascota'];
	$longitud_mascota =  $_REQUEST['longitud_mascota'];
	$peso_mascota =  $_REQUEST['peso_mascota'];
	$color_mascota =  $_REQUEST['color_mascota'];
	$especie =  $_REQUEST['especie'];
	$raza =  $_REQUEST['raza'];
	$tipo_sangre =  $_REQUEST['tipo_sangre'];
	$sexo =  $_REQUEST['sexo'];
	$esterilizado =  $_REQUEST['esterilizado'];
	$alergias =  $_REQUEST['alergias'];
	$observaciones =  $_REQUEST['observaciones'];

	$sql = "UPDATE pacientes SET id_paciente='$id_paciente', id_cliente='$id_cliente', nombre='$nombre_mascota', edad='$edad_mascota', 
			especie='$especie', raza='$raza', sexo='$sexo', color='$color_mascota', esterilizado='$esterilizado', longitud='$longitud_mascota', 
			peso='$peso_mascota', tipo_sangre='$tipo_sangre', alergias='$alergias', observaciones='$observaciones'  WHERE id_paciente=$id_paciente";

	//$add = mysqli_query($con, $sql); 
	//mysqli_close($con);
	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Mascota Actualizada Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>