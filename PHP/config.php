<?php
/*Datos de conexion a la base de datos*/
error_reporting(E_ALL ^ E_DEPRECATED);
define('DB_HOST', 'localhost');//DB_HOST:  generalmente suele ser "127.0.0.1"
define('DB_USER', 'root');//Usuario de tu base de datos
define('DB_PASS', '');//Contraseña del usuario de la base de datos
define('DB_NAME', 'sysvet');//Nombre de la base de datos
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);



//$con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if(!$con){
	    die("Imposible conectarse: ".mysqli_error($con));
	}

	if (@mysqli_connect_errno()) {
	    die("Conexión falló: ".mysqli_connect_errno()." 
	        : ". mysqli_connect_error());
	}
	else{
	    //echo "Conexion correcta";
	}

?>