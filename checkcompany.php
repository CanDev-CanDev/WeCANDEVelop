<?php

$credentials = include('config.php');

$conn = sqlsrv_connect('tcp:candev.database.windows.net,1433', $credentials);

if($conn){
	$employer = $_GET["employer"];

	$query = "SELECT * FROM dbo.Organ_Fed_Jurisdiction WHERE Organization_EN = '$employer'";
	$result = sqlsrv_query($conn, $query);
	if($result == false){
		die( print_r( sqlsrv_errors(), true));
		echo '{"success":"false"}';
	}
	else {
		$arr = array();
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
			array_push($arr, $row["Verified_Federal_Flag"]);
		}
		if(count($arr) > 0){
			if($arr[0] == 1){
				echo '{"success":"true", "federal":"yes"}';
			}
			else {
				echo '{"success":"true", "federal":"maybe"}';
			}
		}
		else {
			echo '{"success":"true", "federal":"no"}';
		}
	}
}
else {
	die( print_r( sqlsrv_errors(), true));
	echo '{"success":"false"}';
}
?>

