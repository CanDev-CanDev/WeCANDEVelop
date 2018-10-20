<?php 

$servername = 'den1.mssql3.gear.host';
$username = 'candev';
$password = 'Qu0R?ilq8-E7';

$link = mssql_connect($servername, $username, $password);

if($link){
	die("Connection failed");
}
else {
	echo "<h1>Connected Successfully!!!</h1>";
}

?>
