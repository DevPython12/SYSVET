<?php

	require_once ("../PHP/config.php");

	$usuario = $_SESSION['id_usuario'];
	$sql = "CALL SP_ultimaNota($usuario)";
	$result = $con->query($sql);
	
	if($result->num_rows>0){

		while($row=$result->fetch_assoc()) {
			$id_nota = $row["id_nota"];
			$titulo = $row["titulo"]; 
		    $comentario = $row["comentario"];
			 
		}

		} else{
			 echo "Error";
		}		
?>