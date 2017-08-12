<?php

	require("../PHP/config.php");

	$id_usuario = $_REQUEST['$id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' ";
    $result = $con->query($sql);

    $row = mysqli_fetch_array($result);  
    echo json_encode($row);  

?>