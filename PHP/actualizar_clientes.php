<?php

	include('config.php');

	$id_cliente = $_REQUEST['id_clientes_editar'];
	$nombre = $_REQUEST['nombre_clientes_editar'];
	$a_paterno = $_REQUEST['paterno_clientes_editar'];
	$a_materno = $_REQUEST['materno_clientes_editar'];
	$fecha_nacimiento = $_REQUEST['fecha_clientes_editar'];
	$direccion = $_REQUEST['direccion_clientes_editar'];
	$telefono = $_REQUEST['telefono_clientes_editar'];
	$movil = $_REQUEST['movil_clientes_editar'];


	$sql = "UPDATE clientes SET nombre ='$nombre', apellido_paterno ='$a_paterno',  apellido_materno ='$a_materno', fecha_nacimiento ='$fecha_nacimiento', direccion ='$direccion',  telefono ='$telefono', movil ='$movil' 
			WHERE id_cliente=$id_cliente";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Cliente Actualizado Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>