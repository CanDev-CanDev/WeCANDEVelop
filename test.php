<?php 

$servername = 'den1.mssql3.gear.host';
$username = 'candev';
$password = 'wecandevelop123!';
$dbName = 'candev';
$connectionInfo = array("Database" => $dbName, "UID" => $username, "PWD" => $password);

$conn = sqlsrv_connect($servername, $connectionInfo);

if($conn){
	echo "<h1>Connected Successfully!!!</h1>";
}
else {
	echo "Connection Failed :(((";
}
?>
