<?php
	

/*class Login {

	private $db_connection = null;
	public $errors = array();
	public $messages = array();


	public function _construct()
	{

		session_start();

		if(isset($_GET["logout"])) {
			$this->doLogout();
		}
		elseif(isset($_POST["login"])) {
			$this->dologinWithPostData();
		}

	}


	public function dologinWithPostData()
	{

		if(empty($_POST['username'])) {
			$this->errors[] = "El campo de usuario esta vacio.";
		} elseif(empty($_POST['password'])) {
			$this->errors[] = "El campo de contrase&ntilde; esta vacio.";
		} elseif(!empty($_POST['username']) && !empty($_POST['password'])) {

			$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if(!$this->db_connection->set_charset("utf8")) {
				$this->errors[] = $this->db_connection->error;
			}


			if(!$this->db_connection->connect_errno) {

				$username = $this->db_connection->real_escape_string($_POST['username']);

				$sql = "SELECT * FROM usuarios WHERE nombre_usuario = ' " . $username . " ' AND contrasena = '" . $password . "';";
				$result_of_login_check = $this->db_connection->query($sql);

				if($result_of_login_check->num_row == 1) {

					$result_row = $result_of_login_check->fetch_object();

					if(password_verify($_POST['password'], $result_row->contrasena)) {

						$_SESSION['username'] = $result_row->username;
						$_SESSION['password'] = $result_row->password;
						$_SESSION['user_login_status'] = 1;

					} else {
						$this->errors[] = "Contrase&ntilde;. Vuelve a intentar.";
					}
				} else {
					$this->errors[] = "Este usuario no existe.";
				}		

			} else {
				$this->errors[] = "Problema con la conexion a la base de datos.";
			}
		}
	}


	public function doLogout() {

		$_SESSION = array();
		session_destroy();

		$this->messages[] = "Logged out";
	}


	public function isUserLoggedIn() {

		if(isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
			return true;
		}

		return false;
	}
}
*/

/*if(!empty($_POST)) {
	if(isset($_POST["username"]) &&isset($_POST["password"])) {
		if($_POST["username"]!=""&&$_POST["password"]!="") {
			include("config.php");

			$user_id = null;
			$sql = "SELECT * FROM usuarios WHERE nombre_usuario=\"$_POST[username]\" AND contrasena=\"$_POST[password]\" ";
			$query = $con->query($sql);

			while ($r = $query->fetch_array()) {
				$user_id = $r["id"];
				break;				
			}

			if($user_id == null) {
				print "<script>alert(\"Acceso invalido.\");window.location='C:\wamp64\www\SYSVET/index.php';</script>";
			} else {
				session_start();
				$_SESSION["user_id"] = $user_id;
				print "<script>window.location='C:\wamp64\www\SYSVET/inicio.php';</script>";
			}

		}
}
}

*/

require ("config.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$username'";
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


/*$usuarios = $con->query("SELECT nombre_usuario, nivel_usuario
	FROM usuarios
	WHERE nombre_usuario = '". $_POST['username']."'
	AND contrasena = '". $_POST['password']."' ");

if($usuarios->num_rows == 1):
else:
	json_encode(array('error' => true));
endif;

$con->close();
*/

?>

