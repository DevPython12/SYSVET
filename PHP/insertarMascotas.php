<?php

include('config.php');

$id_cliente = $_REQUEST['id_cliente'];
$nombre = $_REQUEST['nombre_mascota'];
$edad = $_REQUEST['edad'];
$color = $_REQUEST['color'];
$longitud = $_REQUEST['longitud'];
$peso = $_REQUEST['peso'];
$tipoMascota = $_REQUEST['tipoMascota'];
$raza = $_REQUEST['raza'];
$tipoSangre = $_REQUEST['tipo_sangre'];
$esterilizado = $_REQUEST['esterilizado'];
$sexo = $_REQUEST['sexo'];
$alergias = $_REQUEST['alergias'];
$observaciones = $_REQUEST['observaciones'];



$sql = "INSERT INTO pacientes (id_paciente, id_cliente, nombre, edad, especie, raza, sexo, color, esterilizado, longitud, peso, tipo_sangre, alergias, observaciones )
			VALUES (null, '$id_cliente' ,'$nombre', '$edad', '$tipoMascota', '$raza', '$sexo', '$color', '$esterilizado', '$longitud', '$peso', '$tipoSangre', '$alergias', '$observaciones' ) ";


//$add = mysqli_query($con, $sql); 
//mysqli_close($con);
if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Mascota Agregado Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>