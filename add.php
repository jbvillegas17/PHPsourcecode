<?php

include_once("connection.php");// this is the first one that the browser read
//connection(); -this how you call a fuction
$con = connection(); // to call the connection

if(isset($_POST['submit'])){
	
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$gender = $_POST['gender'];
	
	$sql = "INSERT INTO `student_list`( `first_name`, `last_name`,`gender`) VALUES ('$fname','$lname','$gender')";
	$students = $con->query($sql) or die ($con->error);
	
	echo header("Location: index.php");
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>STUDENT MANAGEMENT SYSTEM</title>
		<link rel = "stylesheet" href = "stms.css">
	</head>
	<body>
	<form action = "" method = "post"> <!--if get it will put in the url and if post it will put in form data/body- and sa action kung saan pupunta yung form-->
			<label>First Name</label>
			<input type = "text" name = "firstname" id = "firstname">
	
			<label>Last Name</label>
			<input type = "text" name = "lastname" id = "lastname">
			
			<label>Gender</label>
			<select name = "gender" id = "gender">
				<option value = "Male">Male</option>
				<option value = "Female">Female</option>
			</select>
	
			<input type = "submit" name = "submit"value = "Submit Form"> <!--button type is use to activate a fuction while submit type is use submit in form that its belong-->
	</form>
	
	</body>
</html>