<?php

require('config.php');

if (isset($_GET['term'])){

	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM pacientes where nombre like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_mascota=$row['id_paciente'];
		$row_array['value'] = $row['nombre'];
		$row_array['id_mascota']=$row['id_paciente'];
		$row_array['id_cliente']=$row['id_cliente'];
		$row_array['buscar_mascota']=$row['nombre'];
		$row_array['nombre_mascota']=$row['nombre'];
		$row_array['edad_mascota']=$row['edad'];
		$row_array['color_mascota']=$row['color'];
		$row_array['longitud_mascota']=$row['longitud'];
		$row_array['peso_mascota']=$row['peso'];
		$row_array['especie']=$row['especie'];
		$row_array['raza']=$row['raza'];
		$row_array['tipo_sangre']=$row['tipo_sangre'];
		$row_array['sexo']=$row['sexo'];
		$row_array['esterilizado']=$row['esterilizado'];
		$row_array['alergias']=$row['alergias'];
		$row_array['observaciones']=$row['observaciones'];
		
		$row_array['buscar_mascota_vacuna']=$row['nombre'];
		$row_array['id_mascota_2']=$row['id_paciente'];
		$row_array['nombre_mascota_2']=$row['nombre'];
		$row_array['edad_mascota_2']=$row['edad'];
		$row_array['tipo_mascota_2']=$row['especie'];
		$row_array['raza_2']=$row['raza'];

		$row_array['buscar_mascota_3']=$row['nombre'];
		$row_array['nombre_mascota_3']=$row['nombre'];
		$row_array['color_mascota_3']=$row['color'];
		$row_array['id_mascota_3']=$row['id_paciente'];
		$row_array['tipo_mascota_3']=$row['especie'];
		$row_array['raza_3']=$row['raza'];
		$row_array['sexo_mascota_3']=$row['sexo'];
		$row_array['esterilizado_mascota_3']=$row['esterilizado'];
		$row_array['edad_mascota_3']=$row['edad'];
		$row_array['longitud_mascota_3']=$row['longitud'];
		$row_array['peso_mascota_3']=$row['peso'];

		$row_array['buscar_mascota_4']=$row['nombre'];
		$row_array['nombre_mascota_4']=$row['nombre'];
		$row_array['color_mascota_4']=$row['color'];
		$row_array['sexo_mascota_4']=$row['sexo'];
		$row_array['esterilizado_mascota_4']=$row['esterilizado'];
		$row_array['id_mascota_4']=$row['id_paciente'];
		$row_array['tipo_mascota_4']=$row['especie'];
		$row_array['raza_4']=$row['raza'];
		$row_array['edad_mascota_4']=$row['edad'];
		$row_array['longitud_mascota_4']=$row['longitud'];
		$row_array['peso_mascota_4']=$row['peso'];
		$row_array['alergias_4']=$row['alergias'];

		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>