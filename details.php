<?php
if(!isset($_SESSION)){
	session_start();
} 

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
	echo "Welcome ".$_SESSION['UserLogin']."<br><br>";
}else{
	echo header("location: index.php");
}

include_once("connection.php");// this is the first one that the browser read

//connection(); -this how you call a fuction

$con = connection(); // to call the connection

#echo $_GET['ID'];

$id = $_GET['ID'];
//sql 
$sql = "SELECT * FROM student_list WHERE id = '$id'"; //to called your db
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

//do{
	//echo $row['first_name']." ".$row['last_name']. "</br>";
//}while($row = $students->fetch_assoc());



?>
<!DOCTYPE html>
<html>
	<head>
		<title>STUDENT MANAGEMENT SYSTEM</title>
		<link rel = "stylesheet" href = "stms.css">
	</head>
	<body>
		
		<form action = "delete.php" method = "post">
		<a href = "index.php"> <-Back </a>
		<a href = "edit.php?ID=<?php echo $row['id'];?> ">Edit </a>
			<button type = "submit" name = "delete">Delete</button>
			<input type = "text" name = "ID" value = "<?php echo $row['id'];?>"> 
		</form>
		<br>
		<h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
		<p>is a <?php echo $row['gender'];?></p>
	</body>
</html>