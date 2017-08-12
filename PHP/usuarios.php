<?php		
	require_once('../PHP/config.php');
	$sql="SELECT * FROM usuarios";
	$result = $con->query($sql);
		               
	while($row=$result->fetch_assoc()) {
	?>
    <option value=" <?php echo $row['id_usuario'] ?> " >
	<?php echo utf8_encode($row['nombre_usuario']); ?>
	</option>
        
    <?php

	}
 									
?>