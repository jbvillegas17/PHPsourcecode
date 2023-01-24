<?php
if(!isset($_SESSION)){
	session_start();
}


include_once("connection.php");// this is the first one that the browser read

//connection(); -this how you call a fuction

$con = connection(); // to call the connection

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";
	$user = $con->query($sql) or die ($con->error);
	$row = $user->fetch_assoc();
	$total = $user->num_rows;
	
	if($total > 0){
		$_SESSION['UserLogin'] = $row['username'];
		$_SESSION['Access'] = $row['access'];
		echo header("location: index.php");
	}else{
		echo "No user found";
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>STUDENT MANAGEMENT SYSTEM</title>
		<link rel = "stylesheet" href = "stms.css">
	</head>
	<body>
	
		<h1>Login Page</h1>
		<br>
		<form action = "" method = "post">
		<label>Username</label>
			<input type = "text" name = "username" id = "username">
		<label>Password</label>
			<input type = "password" name = "password" id = "password">
		<button type = "submit" name = "login">Login</button>
		</form>
	</body>
</html>