<?php		
	require_once('../PHP/config.php');
	$sql="SELECT * FROM clinicas";
	$result = $con->query($sql);
		               
	while($row=$result->fetch_assoc()) {
	?>
    <option value=" <?php echo $row['id_clinica'] ?> " >
	<?php echo utf8_encode($row['nombre']); ?>
	</option>
        
    <?php

	}
 									
?>