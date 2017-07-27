<?php

require('config.php');

if (isset($_GET['term'])){

	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM enfermedades where nombre_enfermedad like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_enfermedad=$row['id_enfermedad'];
		$row_array['value'] = $row['nombre_enfermedad'];
		$row_array['buscar_enfermedades1']=$row['nombre_enfermedad'];
		$row_array['id_enfermedad1']=$row['id_enfermedad'];
		$row_array['nombre_enfermedad1']=$row['nombre_enfermedad'];
	

		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>