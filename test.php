<?php 

$servername = 'localhost';
$username = 'candev';
$password = 'Qu0R?ilq8-E7';

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
else {
	echo "<h1>Connected Successfully!!!</h1>";
}

?>
