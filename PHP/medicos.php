<?php
if (isset($_GET['term'])){
	# conectare la base de datos
    $con=@mysqli_connect("localhost", "root", "", "sysvet");
	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($con)
{
	$fetch = mysqli_query($con,"SELECT * FROM datos_medico WHERE nombre LIKE '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_medico=$row['id_medico'];
		$row_array['value'] = $row['nombre']." | ".$row['apellido_paterno']." | ".$row['apellido_materno'];
		$row_array['id_medico']=$row['id_medico'];
		$row_array['buscar_medico']=$row['nombre'];
		$row_array['nombre_medico']=$row['nombre'];
		$row_array['a_paterno_medico']=$row['apellido_paterno'];
		$row_array['a_materno_medico']=$row['apellido_materno'];
		$row_array['cedula_medico']=$row['cedula'];
		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($con);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>