<?php

$credentials = include('config.php');

$conn = sqlsrv_connect('den1.mssql3.gear.host', $credentials);

if($conn){
	$employer = $_GET["employer"];

	$query = "SELECT * FROM dbo.Company WHERE Company_Name = '$employer'";
	$result = sqlsrv_query($conn, $query);
	if($result == false){
		die( print_r( sqlsrv_errors(), true));
		echo '{"success":"false"}';
	}
	else {
		$arr = array();
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
			array_push($arr, $row["Company"]);
		}
		if(count($arr) > 0){
			echo '{"success":"true", "federal":"true"}';
		}
		else {
			echo '{"success":"true", "federal":"false"}';
		}
	}
}
else {
	die( print_r( sqlsrv_errors(), true));
	echo '{"success":"false"}';
}
?>

