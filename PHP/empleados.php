<?php		
	require_once('../PHP/config.php');
	$sql="SELECT * FROM datos_empleados";
	$result = $con->query($sql);
		               
	while($row=$result->fetch_assoc()) {
	?>
    <option value=" <?php echo $row['id_empleado'] ?> " >
	<?php echo utf8_encode($row['nombre']." ".$row['apellido_paterno']." ".$row['apellido_materno']); ?>
	</option>     
    <?php


	}
 									
?>