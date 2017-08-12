<?php

	include('config.php');

	$id_empleado = $_REQUEST['id_empleado_editar'];
	$nombre = $_REQUEST['nombre_empleado_editar'];
	$a_paterno = $_REQUEST['paterno_empleado_editar'];
	$a_materno = $_REQUEST['materno_empleado_editar'];
	$fecha_nacimiento = $_REQUEST['fecha_empleado_editar'];
	$direccion = $_REQUEST['direccion_empleado_editar'];
	$telefono = $_REQUEST['telefono_empleado_editar'];
	$movil = $_REQUEST['movil_empleado_editar'];
	$rfc = $_REQUEST['curp_empleado_editar'];
	$curp = $_REQUEST['rfc_empleado_editar'];
	$sexo = $_REQUEST['sexo_empleado_editar'];


	$sql = "UPDATE datos_empleados SET nombre ='$nombre', apellido_paterno ='$a_paterno',  apellido_materno ='$a_materno', fecha_nacimiento ='$fecha_nacimiento', direccion ='$direccion',  telefono ='$telefono', movil ='$movil' , rfc ='$rfc',  curp ='$curp', sexo ='$sexo'
			WHERE id_empleado='$id_empleado'";

	if ($con->query($sql) === TRUE) {

    echo '<script type="text/javascript"> 
    		alert("Empleado Actualizado Correctamente"); 
    		
    		</script>';

    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}	

?>