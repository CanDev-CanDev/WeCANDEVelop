<?php 

$credentials = include('config.php');

$conn = sqlsrv_connect('tcp:candev.database.windows.net,1433', $credentials);

if($conn){
	$employer = $_POST["employer"];
	$approval = ($_POST["needsApproval"] == "true")?0:1;

	$query = "INSERT INTO dbo.Organ_Fed_Jurisdiction (Organization_EN, Verified_Federal_Flag) VALUES('".$employer."', 0)";
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
