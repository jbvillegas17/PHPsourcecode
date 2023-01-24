<?php

include_once("connection.php");// this is the first one that the browser read
//connection(); -this how you call a fuction
$con = connection(); // to call the connection
$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'"; //to called your db
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){
	
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$gender = $_POST['gender'];
	
	$sql = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', gender = '$gender' WHERE id = '$id'";
	$con->query($sql) or die ($con->error);
	
	echo header("Location: details.php?ID=".$id); //. is called cancatinate
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
			<input type = "text" name = "firstname" id = "firstname" value = "<?php echo $row['first_name'];?>">
	
			<label>Last Name</label>
			<input type = "text" name = "lastname" id = "lastname" value = "<?php echo $row['last_name'];?>">
			
			<label>Gender</label>
			<select name = "gender" id = "gender">
				<option value = "Male"<?php echo ($row['gender'] == "Male")? 'selected' : '';?> >Male</option>
				<option value = "Female"<?php echo ($row['gender'] == "Female")? 'selected' : '';?>>Female</option>
			</select>
	
			<input type = "submit" name = "submit"value = "Update"> <!--button type is use to activate a fuction while submit type is use submit in form that its belong-->
	</form>
	
	</body>
</html>