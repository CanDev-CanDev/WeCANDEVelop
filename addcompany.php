<?php 

$credentials = include('config.php');

$conn = sqlsrv_connect($credentials["SERVER"], $credentials);

if($conn){
	$employer = $_POST["employer"];
	$approval = ($_POST["needsApproval"] == "true")?1:0;

	$query = "INSERT INTO dbo.Company (Company_Name, Federal, Approved) VALUES('".$employer."', 1,".$approval.")";
	$result = sqlsrv_query($conn, $query);
	if($result == false){
		echo '{"success":"false"}';
	}
	else {
		echo '{"success":"true"}';
	}
}
else {
	echo '{"success":"false"}';
}
?>
