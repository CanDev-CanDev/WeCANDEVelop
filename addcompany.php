<?php 

$credentials = include('config.php');

$conn = sqlsrv_connect('den1.mssql3.gear.host', $credentials);

if($conn){
	$employer = $_POST["employer"];
	$approval = ($_POST["needsApproval"] == "true")?1:0;

	$query = "INSERT INTO dbo.Company (Company_Name, Federal, Approved) VALUES('".$employer."', 1,".$approval.")";
	$result = sqlsrv_query($conn, $query);
	if($result == false){
		echo '{"success":"false"}';
		die( print_r( sqlsrv_errors(), true));
	}
	else {
		echo '{"success":"true"}';
	}
}
else {
	die( print_r( sqlsrv_errors(), true));
	echo '{"success":"false"}';
}
?>
