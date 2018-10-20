<?php 

$servername = 'den1.mssql3.gear.host';
$username = 'candev';
$password = 'wecandevelop123!';
$dbName = 'candev';
$connectionInfo = array("Database" => $dbName, "UID" => $username, "PWD" => $password);

$conn = sqlsrv_connect($servername, $connectionInfo);

if($conn){
	die("Connection failed");
}
else {
	echo "<h1>Connected Successfully!!!</h1>";
}

?>
