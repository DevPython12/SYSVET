<?php
	
require ("config.php");

$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);
sha1($password);

$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$username' AND contrasena = '$password' ";
$result = $con->query($sql);

if($row = $result->fetch_array()) {

	if($row['contrasena'] == $password && $row['privilegio'] == 1)
	{
		session_start();
		$_SESSION['username'] = $username;

		echo  '<script>
					alert("Ingreso correcto");
					location.href = "../usuario/index.php";
				</script>';

	} 
	else if($row['contrasena'] == $password && $row['privilegio'] == 0){
		session_start();
		$_SESSION['username'] = $username;

		echo  '<script>
					alert("Ingreso correcto");
					location.href = "../admin/index.php";
				</script>';
	}
	else {
		
		echo  '<script>
					alert("Ingreso incorrecto");
					location.href = "../index.php";
				</script>';

	}
} else {

	echo  '<script>
				alert("Ingreso incorrecto");
				location.href = "../index.php";
				</script>';
}

mysqli_free_result($result);
mysqli_close($con);


?>

