<?php

$credentials = include('config.php');
 
$conn = sqlsrv_connect($credentials["SERVER"], $credentials);

if($conn){
	$query = $_GET["q"];
	
	$query = "SELECT TOP 10 * FROM dbo.Company WHERE Company_Name LIKE '%" . $query . "%'";
	$result = sqlsrv_query($conn, $query);
	
	if($result == false){
		echo '[]';
		return;
	}
	
	$arr = array();
	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
		array_push($arr, $row["Company"]);
	}
	echo json_encode($arr);
}
else {
	echo '[]';
}
?>
