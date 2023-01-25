<?php

include_once("connection.php");// this is the first one that the browser read

//connection(); -this how you call a fuction

$con = connection(); // to call the connection

if(isset($_POST['delete'])){
	
	$id = $_POST['ID'];
	$sql = "DELETE FROM student_list WHERE id = '$id'";
	$con->query($sql) or die ($con->error);
	echo header("location: index.php");
}

?>