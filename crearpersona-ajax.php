<?php

if (isset($_REQUEST['term'])) {
    $servername = "localhost";
    $username = 'root';
    $password = "";
    $dbname = "cmd";
    
    $id= isset($_GET['id']);
    $idpersona=isset($_GET['id']);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
	$query = $_REQUEST['term'];
	$sql = "SELECT * FROM `empresa` WHERE nombre LIKE '%{$query}%'";
	$result = mysqli_query($conn, $sql);
	$array = array();
	while($row = mysqli_fetch_assoc($result)){
	$array[] = array("id"=>$row['idEmpresa'], "value"=>$row['nombre'], "label"=>$row['nombre']);
	}
	echo json_encode ($array); //Return the JSON Array
}

?>
