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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee_Dashboard</title>
</head>
<body>
	<center>
		<h1>WELCOME Employee!</h1>

		<span class="navbar-brand" href="#">Logged in as <strong style="color: black">
			  <?php $user = $_SESSION['login_name'];  echo "<span style='text-transform: uppercase'>$user</span>" ?></strong></span>

		<form method="POST">
		<input type="Submit" name="logout" value="LOGOUT"><br>
		</form>
	</center>

</body>
</html>