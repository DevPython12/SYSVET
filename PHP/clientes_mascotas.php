<?php

require('config.php');

//consulta todos los empleados
$id_mascota = $_REQUEST['id_mascota'];

if($id_mascota == ""){
	echo "";

} else {
		if ($con)
	{
		$fetch = mysqli_query($con,"CALL SP_cliente_mascota('$id_mascota')"); 
		
		/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
		while ($row = mysqli_fetch_array($fetch)) {
			$row['nombre'];
			$row['apellido_paterno'];
			$row['apellido_materno'];
			$row['telefono'];

			echo '<div class="col-md-3">
	              	<input id="nombre_cliente_3" type="text" name="nombre_cliente_3" class="nombre_cliente_3 form-control" value="'.$row['nombre'].'" placeholder="Nombre de cliente" readonly><br />
	              </div>';

			echo '<div class="col-md-3">
	              	<input id="a_paterno_cliente_3" type="text" name="a_paterno_cliente_3" class="a_paterno_cliente_3 form-control" 
	              	value="'.$row['apellido_paterno'].'" placeholder="Apellido Paterno de cliente" readonly><br />
	              </div>';

			echo '<div class="col-md-3">
	              	<input id="a_materno_cliente_3" type="text" name="a_materno_cliente_3" class="a_materno_cliente_3 form-control" 
	              	value="'.$row['apellido_materno'].'" placeholder="Apellido Materno del cliente" readonly><br />
	              			<br /><br />
	              </div>';

			echo ' <div class="col-md-3">
	              	<input id="telefono_cliente_3" type="text" name="telefono_cliente_3" class="telefono_cliente_3 form-control" 
	              	value="'.$row['telefono'].'" placeholder="Telefono cliente" readonly><br />
	              			<br /><br />
	              </div>';


	    }
	}
}
	

/* Cierra la conexión. */
mysqli_close($con);



?>