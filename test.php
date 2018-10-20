<?php 

$servername = 'den1.mssql3.gear.host';
$username = 'candev';
$password = 'wecandevelop123!';
$dbName = 'candev';
$connectionInfo = array("Database" => $dbName, "UID" => $username, "PWD" => $password);

$conn = sqlsrv_connect($servername, $connectionInfo);

if($conn){
	echo "<h1>Connected Successfully!!!</h1>";
	$query = "INSERT INTO dbo.Company (Company_Name, Company_Url, Federal, Approved) VALUES('Test Company', 'www.testcompany.com', 1, 1)";
	$result = sqlsrv_query($conn, $query);
	if($result == false){
		echo "Failed :(((";
		die (print_r(sqlsrv_errors(), true));
	}
	else {
		echo "Successfully added";
	}
}
else {
	echo "Connection Failed :(((";
}
?>
