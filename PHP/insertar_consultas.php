<?php

include('config.php');

$id_paciente = $_REQUEST['id_mascota_3'];
$id_medico = $_REQUEST['id_medico'];
$id_receta = $_REQUEST['id_receta'];
$fecha = $_REQUEST['date'];
$motivo = $_REQUEST['motivo_consulta'];
$sintomas = $_REQUEST['sintomas_consulta'];
$actitud = $_REQUEST['actitud_consulta'];
$condicion_cuerpo = $_REQUEST['corporal_consulta'];
$hidratacion = $_REQUEST['hidratacion_consulta'];
$mucosas = $_REQUEST['mucosas_consulta'];
$ojos = $_REQUEST['ojos_consulta'];
$odios = $_REQUEST['oidos_consulta'];
$nodulos = $_REQUEST['linfaticos_consulta'];
$piel = $_REQUEST['piel_consulta'];
$locomocion = $_REQUEST['locomocion_consulta'];
$musculo = $_REQUEST['musculo_consulta'];
$s_nervioso = $_REQUEST['nervioso_consulta'];
$s_cardiovascular = $_REQUEST['cardiovascular_consulta'];
$s_respiratorio = $_REQUEST['respiratorio_consulta'];
$s_digestivo = $_REQUEST['digestivo_consulta'];
$s_genitourinario = $_REQUEST['genitourinario_consulta'];
date_default_timezone_set('America/Mexico_City');
$hora = date('H:i');
$diagnostico = $_REQUEST['diagnostico'];
$tratamiento = $_REQUEST['tratamiento'];
$instrucciones = $_REQUEST['instrucciones'];
$costo = $_REQUEST['costo_consulta'];


$sql = "INSERT INTO consultas (id_consulta, id_paciente	,id_medico , id_receta, fecha ,motivo ,sintomas ,actitud	,condicion_cuerpo ,
	hidratacion	,mucosas ,ojos	,odios	,nodulos ,piel ,locomocion ,musculo ,s_nervioso	,s_cardiovascular ,s_respiratorio ,s_digestivo ,s_genitourinario ,
	hora, diagnostico, tratamiento, id_consultorio ,instrucciones ,costo)
			VALUES (null, '$id_paciente', '$id_medico', '$id_receta', '$fecha', '$motivo', '$sintomas', '$actitud', '$condicion_cuerpo', 
				'$hidratacion', '$mucosas', '$ojos', '$odios', '$nodulos', '$piel', '$locomocion', '$musculo', '$s_nervioso', '$s_cardiovascular', 
				'$s_respiratorio', '$s_digestivo', '$s_genitourinario', '$hora', '$diagnostico', '$tratamiento', null, '$instrucciones', '$costo') ";


//$add = mysqli_query($con, $sql); 
//mysqli_close($con);
if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Consulta Agregada Correctamente"); 
    		
    		</script>';
   /* header('location: /ejemplo2/index.php#');*/
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>