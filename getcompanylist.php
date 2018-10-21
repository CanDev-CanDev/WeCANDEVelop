<?php

$credentials = include('config.php');
 
$conn = sqlsrv_connect('den1.mssql3.gear.host', $credentials);

if($conn){
	$query = $_GET["q"];
	
	$query = "SELECT TOP 10 * FROM dbo.Company WHERE Company_Name LIKE '%" . $query . "%'";
	$result = sqlsrv_query($conn, $query);
	
	if($result == false){
		echo '[]';
		die( print_r( sqlsrv_errors(), true));
		return;
	}
	
	$arr = array();
	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
		array_push($arr, $row["Company_Name"]);
	}
	echo json_encode($arr);
}
else {
	die( print_r( sqlsrv_errors(), true));
	echo '[]';
}
?>
