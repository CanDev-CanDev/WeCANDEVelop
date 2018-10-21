<?php

$credentials = include('config.php');
 
$conn = sqlsrv_connect('tcp:candev.database.windows.net,1433', $credentials);

if($conn){
	$query = $_GET["q"];
	
	$query = "SELECT TOP 10 * FROM dbo.Organ_Fed_Jurisdiction WHERE Organization_EN LIKE '%" . $query . "%'";
	$result = sqlsrv_query($conn, $query);
	
	if($result == false){
		echo '[]';
		die( print_r( sqlsrv_errors(), true));
		return;
	}
	
	$arr = array();
	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
		array_push($arr, $row["Organization_EN"]);
	}
	echo json_encode($arr);
}
else {
	die( print_r( sqlsrv_errors(), true));
	echo '[]';
}
?>
