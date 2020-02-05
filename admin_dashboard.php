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

if(isset($_POST['add_employee_submit'])){

		$add_employee_username_getText = $_POST['add_employee_username'];
		$add_employee_password_getText = $_POST['add_employee_password'];
		$add_employee_status_getText = $_POST['add_employee_status'];

		$sql_query_add_employee = "INSERT INTO employee(emp_id,emp_username,emp_password,emp_status) VALUES('','$add_employee_username_getText','$add_employee_password_getText','$add_employee_status_getText')";
    		mysqli_query($link,$sql_query_add_employee) or die(mysqli_error());

      		$message = "Employee successfully added!";
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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to delete?');
}

function checkUpdate(){
    return confirm('Are you sure you want to update?');
}

</script>

</head>
<body>
	<center>
	<h1 style="font-family: 'Satisfy', cursive;">Welcome to AA's Gallery Hub!</h1>			
		<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#news">Gallery</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li><a style="margin-left: 648px"><span class="navbar-brand" href="#">Logged in as 
			  <?php $user = $_SESSION['login_name'];  echo "<split(pattern, string)an style='text-transform: uppercase';color:'red'>$user</span>" ?></span><a></li>
  <li><form method="POST">
		<input type="Submit" name="logout" value="LOGOUT" class="logout_button"><br>
		</form></li>
</ul>

		<h3>Add Employee</h3>
		<hr width="50%" >
		<br>
		<form method="POST">
			Username: <input type="text" name="add_employee_username" required=""><br><br>
			Password: &nbsp;<input type="password" name="add_employee_password" required=""><br><br>
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status: <input type="text" name="add_employee_status" required=""><br><br>

			  <center><input type="Submit" name="add_employee_submit" value="Submit New Employee"></center>
		</form>
		
			<hr width="50%" >
		<br>
		<br>
		<h4>Employee Lists</h4>
			<table style="border:1px solid black">
				<thead>
					<tr>
						<th>Employee ID's</th>
						<th>Employee Username</th>
						<th>Employee Password</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
				 					<?php
					

				  		
						$sql = mysqli_query($link,"SELECT * FROM employee where emp_status !='admin'");
					
						for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
						{

                            $uid = $num_rows['emp_id'];
							$uname = $num_rows['emp_username'];
							$upass = $num_rows['emp_password'];

							echo "
							<tr>
								<td>$uid</td>
                                <td>$uname</td>   
								<td>$upass</td>                  
								<td><button ><a style='text-decoration:none' href='update_employee.php?emp_id=$num_rows[emp_id]' onclick='return checkUpdate()'>Update</a></button></td>
								<td><button ><a style='text-decoration:none;' href='delete.php?emp_id=$num_rows[emp_id]' onclick='return checkDelete()'>Delete</a></button>
								</td>
							</tr>
							
							";
							
						}
		
				?>
                </tbody>
			</table>
			<BR>
			<BR>
		
	</center>

</body>
</html>