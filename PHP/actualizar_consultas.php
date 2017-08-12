<?php

	include('config.php');

	$id_consulta = $_REQUEST['id_editar_consulta'];
	$id_paciente = $_REQUEST['consulta_masc_editar'];
	$id_medico = $_REQUEST['consulta_vet_editar'];
	$id_receta = $_REQUEST['consulta_rec_editar'];
	$fecha = $_REQUEST['editar_fecha_cons'];
	$motivo = $_REQUEST['editar_motivo_consulta'];
	$sintomas = $_REQUEST['editar_sintomas_consulta'];
	$actitud = $_REQUEST['editar_actitud_consulta'];
	$corporal = $_REQUEST['editar_corporal_consulta'];
	$mucosas = $_REQUEST['editar_mucosas_consulta'];
	$hidratacion = $_REQUEST['editar_hidratacion_consulta'];
	$ojos = $_REQUEST['editar_ojos_consulta'];
	$oidos = $_REQUEST['editar_oidos_consulta'];
	$nodulos = $_REQUEST['editar_linfaticos_consulta'];
	$piel = $_REQUEST['editar_piel_consulta'];
	$locomocion = $_REQUEST['editar_locomocion_consulta'];
	$musculo = $_REQUEST['editar_musculo_consulta'];
	$nervioso = $_REQUEST['editar_nervioso_consulta'];
	$respiratorio = $_REQUEST['editar_respiratorio_consulta'];
	$cardiovascular = $_REQUEST['editar_cardiovascular_consulta'];
	$digestivo = $_REQUEST['editar_digestivo_consulta'];
	$genitourinario = $_REQUEST['editar_genitourinario_consulta'];
	$hora = $_REQUEST['editar_hora_consulta'];
	$diagnostico = $_REQUEST['editar_diagnostico'];
	$instrucciones = $_REQUEST['editar_instrucciones'];
	$tratamiento = $_REQUEST['editar_tratamiento'];
	$costo = $_REQUEST['editar_costo_consulta'];

	$sql = "UPDATE consultas SET id_paciente ='$id_paciente', id_medico ='$id_medico', id_receta ='$id_receta',  fecha ='$fecha',
			 	motivo ='$motivo', sintomas ='$sintomas',  actitud ='$actitud',  condicion_cuerpo ='$corporal',
			 hidratacion = '$hidratacion', mucosas ='$mucosas',  ojos ='$ojos',  odios ='$oidos', nodulos ='$nodulos',
			 	piel ='$piel', locomocion ='$locomocion', musculo ='$musculo',  s_nervioso ='$nervioso', s_cardiovascular ='$cardiovascular',
			  s_respiratorio ='$respiratorio',  s_digestivo ='$digestivo', s_genitourinario ='$genitourinario',  hora ='$hora',  diagnostico ='$diagnostico', tratamiento ='$tratamiento',  id_consultorio =null, instrucciones ='$instrucciones',  costo ='$costo'  
			WHERE id_consulta='$id_consulta'";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Consulta Actualizada Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>