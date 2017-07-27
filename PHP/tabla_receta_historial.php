<?php
	require("../PHP/config.php");

	$id_mascota = $_REQUEST['id_mascota'];
	//echo($diagnostico);
	if($id_mascota == ""){
		echo "Debes ingresar la mascota";
	} else {
		$sql = "CALL SP_receta_consulta('$id_mascota')";
		$result = $con->query($sql);
		if($result->num_rows>0){
			echo "<table class='table table-hover'>
			 		<tr>
			 			<th>Fecha Consulta</th>
			 			<th>Medicamentos</th>
			 			<th>Cantidad</th>
			 			<th>Frecuencia</th>
			 			<th>Duracion</th>
			 			<th>Comentarios</th>
			 		</tr>
			 		<tr>";

			while($row=$result->fetch_assoc())
			{
			 	echo "<td>".$row["Fecha Consulta"]."</td>". 
			 		 "<td>".$row["Medicamentos"]."</td>".
			 		 "<td>".$row["Cantidad"]."</td>".
			 		 "<td>".$row["Duracion"]."</td>".
			 		 "<td>".$row["Frecuencia"]."</td>".
			 		 "<td>".$row["Comentarios"]."</td>".
			 		 "</tr>";
			 									}
			} else{
			 	echo "No tiene consulta";
			 }		

			 echo "</table>";		
		}

	
					
?>