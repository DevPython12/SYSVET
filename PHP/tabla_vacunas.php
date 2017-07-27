<?php
	require("../PHP/config.php");

	$id_mascota = $_REQUEST['id_mascota'];
	//echo($diagnostico);
	if($id_mascota == ""){
		echo "Debes ingresar la mascota";
	} else {
		$sql = "CALL SP_vacuna('$id_mascota')";
		$result = $con->query($sql);
		if($result->num_rows>0){
			echo "<table class='table table-hover'>
			 		<tr>
			 			<th>Nombre Vacuna</th>
			 			<th>Fecha aplicacion</th>
			 			<th>Observaciones</th>
			 		</tr>
			 		<tr>";

			while($row=$result->fetch_assoc())
			{
			 	echo "<td>".$row["nombre"]."</td>". 
			 		 "<td>".$row["fecha_aplicacion"]."</td>".
			 		 "<td>".$row["observaciones"]."</td>".
			 		 "</tr>";
			 									}
			} else{
			 	echo "La mascota  no tiene vacunas";
			 }		

			 echo "</table>";		
		}

	
					
?>