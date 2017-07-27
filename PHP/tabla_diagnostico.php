<?php
	require("../PHP/config.php");

	$diagnostico = $_REQUEST['id_diagnostico'];
	//echo($diagnostico);
	if($diagnostico == ""){
		echo "Debes ingresar el folio de diagnostico";
	} else {
		$sql = "CALL SP_diagnostico('$diagnostico')";
		$result = $con->query($sql);
		if($result->num_rows>0){
			echo "<table class='table table-hover'>
			 		<tr>
			 			<th>Enfermedad</th>
			 			<th>Comentarios</th>
			 		</tr>
			 		<tr>";

			while($row=$result->fetch_assoc())
			{
			 	echo "<td>".$row["nombre_enfermedad"]."</td>". 
			 		 "<td>".$row["comentarios"]."</td>".
			 		 "</tr>";
			 									}
			} else{
			 	echo " 0 results";
			 }		

			 echo "</table>";		
		}

	
					
?>
		 