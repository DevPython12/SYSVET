<?php

require('config.php');

if (isset($_GET['term'])){

	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM info_medicamentos where nombre_generico like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_medicamento=$row['id_info_medicamento'];
		$row_array['value'] = $row['nombre_generico'];
		$row_array['buscar_medicamentos']=$row['nombre_generico'];
		$row_array['id_medicamento']=$row['id_info_medicamento'];
		$row_array['nombre_medicamento']=$row['nombre_generico'];
	

		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>