<?php		
	require_once('../PHP/config.php');
	$sql="SELECT * FROM datos_medico";
	$result = $con->query($sql);
		               
	while($row=$result->fetch_assoc()) {
	?>
    <option value=" <?php echo $row['id_medico'] ?> " >
	<?php echo utf8_encode($row['nombre']." ".$row['apellido_materno']." ".$row['apellido_paterno']); ?>
	</option>
        
    <?php

	}
 									
?>