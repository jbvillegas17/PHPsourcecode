<?php
if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION['UserLogin'])){
	echo "Welcome ".$_SESSION['UserLogin']; 
}else{
	echo "Welcome Guess";
}

include_once("connection.php");// this is the first one that the browser read

//connection(); -this how you call a fuction

$con = connection(); // to call the connection

//sql 
$sql = "SELECT * FROM student_list"; //to called your db
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
	
	<h1>STUDENT MANAGEMENT SYSTEM</h1>
	<br>
	<br>
	<?php if(isset($_SESSION['UserLogin'])){?>
<a href = "logout.php">Logout</a>	
	<?php }else{?>
<a href = "login.php">Login</a>	
	<?php }?>
<a href = "add.php">Add New</a>	
	<table>
		<thead>
		<tr>
		<th></th>
			<th>FIRST NAME</th>
			<th>LAST NAME</th>
		</tr>
		</thead>
		<tbody>
			<?php do{ ?>
			<tr>
				<td><a href = "details.php?ID=<?php echo $row['id'];?>">view</a></td>
				<td><?php echo $row['first_name']; ?></td>
				<td><?php echo $row['last_name']; ?></td>
			</tr>
			<?php }while($row = $students->fetch_assoc()) ?>
		</tbody>
	</table>
	</body>
</html>