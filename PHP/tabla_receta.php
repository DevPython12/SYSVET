<?php
	require("../PHP/config.php");

	$receta = $_REQUEST['id_receta'];
	//echo($diagnostico);
	if($receta == ""){
		echo "Debes ingresar el folio de la receta";
	} else {
		$sql = "CALL SP_receta('$receta')";
		$result = $con->query($sql);
		if($result->num_rows>0){
			echo "<table class='table table-hover'>
			 		<tr>
			 			<th>Medicamentos</th>
			 			<th>Cantidad</th>
			 			<th>Frecuencia</th>
			 			<th>Duracion</th>
			 			<th>Comentarios</th>
			 		</tr>
			 		<tr>";

			while($row=$result->fetch_assoc())
			{
			 	echo "<td>".$row["nombre_generico"]."</td>". 
			 		 "<td>".$row["cantidad"]."</td>".
			 		 "<td>".$row["frecuencia"]."</td>".
			 		 "<td>".$row["duracion"]."</td>".
			 		 "<td>".$row["comentarios"]."</td>".
			 		 "</tr>";
			 									}
			} else{
			 	echo "No existe ese folio";
			 }		

			 echo "</table>";		
		}

	
					
?>