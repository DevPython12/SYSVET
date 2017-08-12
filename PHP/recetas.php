<?php		
	require_once('../PHP/config.php');
	$sql="SELECT * FROM recetas";
	$result = $con->query($sql);
		               
	while($row=$result->fetch_assoc()) {
	?>
    <option value=" <?php echo $row['id_receta'] ?> " >
	<?php echo utf8_encode($row['id_receta']); ?>
	</option>
        
    <?php

	}
 									
?>