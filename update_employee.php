<?php
include ('config.php');
if(isset($_POST['logout']))
{
	session_destroy();
	header('location:index.php');
	
}
if(empty($_SESSION['login_name']))
{
	header('location:index.php');
}

$id = $_GET['emp_id'];
$sql = mysqli_query($link, "SELECT * FROM employee WHERE emp_id = '$id'");
$pdata = mysqli_fetch_array($sql);

if(isset($_POST['update_employee_submit'])){

	$update_username = $_POST['update_employee_username'];
	$update_password = $_POST['update_employee_password'];

	$sql_update_query = "UPDATE employee SET emp_username = '$update_username', emp_password = '$update_password', emp_status = 'employee' WHERE emp_id = '$id'";
				mysqli_query($link,$sql_update_query) or die(mysqli_error());

      		$message = "Employee successfully UPDATED!";
      		echo "<script type='text/javascript'>alert('$message'); window.location.assign('admin_dashboard.php')</script>";



}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<style type="text/css">
		th{
			border: 1px solid black;
		}
		td{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<center>
		<h1>WELCOME!</h1>

		<span class="navbar-brand" href="#">Logged in as <strong style="color: black">
			  <?php $user = $_SESSION['login_name'];  echo "<span style='text-transform: uppercase'>$user</span>" ?></strong></span>
		<br>
		<hr width="50%" >
		<br>
		Employee Details
		<br>

		<form method="POST">
			Username: <input type="text" name="update_employee_username" required="" value="<?php echo $pdata['emp_username']?>" > <br><br>
			Password: &nbsp;<input type="password" name="update_employee_password" required="" value="<?php echo $pdata['emp_password']?>" ><br><br>
			  
			  </select><br><br>

			  <center><input type="Submit" name="update_employee_submit" value="Update Employee"></center>
		</form>