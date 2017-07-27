<?php
	require("../PHP/config.php");

	$id_mascota = $_REQUEST['id_mascota'];
	//echo($diagnostico);
	if($id_mascota == ""){
		echo "Debes ingresar la mascota";
	} else {
		$sql = "CALL SP_historial_consulta('$id_mascota')";
		$result = $con->query($sql);
		if($result->num_rows>0){
			echo "<table class='table table-hover'>
			 		<tr>
			 			<th>Veterinario</th>
			 			<th>Motivo</th>
			 			<th>Fecha</th>
			 			<th>Hora</th>
			 			<th>Sintomas</th>
			 			<th>Examen Fisico</th>
			 			<th>Diagnostico</th>
			 			<th>Tratamiento</th>
			 			<th>Instrucciones</th>
			 			<th>Costo</th>
			 		</tr>
			 		<tr>";

			while($row=$result->fetch_assoc())
			{
			 	echo "<td>".$row["Veterinario"]."</td>".
			 		 "<td>".$row["motivo"]."</td>". 
			 		 "<td>".$row["fecha"]."</td>".
			 		 "<td>".$row["hora"]."</td>".
			 		 "<td>".$row["sintomas"]."</td>". 
			 		 "<td>".$row["Examen Fisico"]."</td>".
			 		 "<td>".$row["diagnostico"]."</td>".
			 		 "<td>".$row["tratamiento"]."</td>".
			 		 "<td>".$row["instrucciones"]."</td>". 
			 		 "<td>".$row["costo"]."</td>".
			 		 "</tr>";
			 									}
			} else{
			 	echo "No hay historial de la mascota";
			 }		

			 echo "</table>";		
		}

	
					
?>