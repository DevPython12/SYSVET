<?php		
	require('../PHP/config.php');
	$sql="SELECT * FROM tipos_administracion_medicamentos";
	$result = $con->query($sql);
		               
	while($row=$result->fetch_assoc()) {
	?>
    <option value=" <?php echo $row['id_tipo_administracion'] ?> " >
	<?php echo utf8_encode($row['nombre']); ?>
	</option>
        
    <?php

	}						
?>