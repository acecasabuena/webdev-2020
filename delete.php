<?php
include 'config.php';

$id = $_GET['emp_id'];
$sql = mysqli_query($link, "SELECT * FROM employee WHERE emp_id = '$id'");
$pdata = mysqli_fetch_array($sql);

 $sql_update_query = mysqli_query($link, "DELETE FROM employee WHERE emp_id = '$id'");
				

      		$message = "Employee successfully DELETED!";
      		echo "<script type='text/javascript'>alert('$message'); window.location.assign('admin_dashboard.php')</script>";





?>