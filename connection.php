<?php
// this main php that connect to the db
	function connection(){

$host = "localhost";
$username = "root";
$password = "";
$database = "student_system";

$con = new mysqli($host, $username, $password, $database);

if($con->connect_error){
	echo $con->connect_error;

	}else {
		return $con;
	}
}


?>