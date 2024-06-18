<?php 
// working with mysql using php
// extension used mysqli(mysql improved)

//connect to db server
$server_name = 'localhost';
$server_user = 'root';
$server_password = '';
//$database = 'funflix';
//establish the connection
//mysqli_connect()
$connect = mysqli_connect($server_name, $server_user, $server_password);

if ($connect) {
	echo "Connection successful";
} else{
	//mysqli_connect_error()
	die(mysqli_connect_error());
}
// create a database
$sql = "CREATE DATABASE cleanup";
// execute query - mysqli_query()
$result = mysqli_query($connect, $sql);
if ($result) {
	echo "<br>Database created successfully";
} else {
	//mysqli_error()
	die(mysqli_error($connect));
}

?>
