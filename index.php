<?php

include 'config.php';

if(isset($_POST['ipasa'])){


		//gikan sa form
		$user = $_POST['ngan'];
		$pass = $_POST['pass'];
		//


			//e select ang data nga toa sa database e compara sa gi input
	$query_admin = "SELECT * from employee where emp_username = '".$user."' AND emp_password ='".$pass."' AND emp_status = 'admin'";
$query_employee ="SELECT * from employee where emp_username = '".$user."' AND emp_password ='".$pass."' AND emp_status = 'employee'";

		$fetch_admin = mysqli_query($link,$query_admin) or die (mysqli_error());
		$fetch_employee = mysqli_query($link,$query_employee) or die (mysqli_error());


		//

					$fetch_admin_result = mysqli_fetch_array($fetch_admin);
					$fetch_employee_result = mysqli_fetch_array($fetch_employee);


						if (is_array($fetch_admin_result))
						{

							$_SESSION['login_name'] = $_POST['ngan'];
							$_SESSION['login_session'] = "ipasa";
							echo '<script type="text/javascript">';
							echo 'alert("Successful Login! \n WELCOME - '.$user.'   ");';
							echo 'window.location.href="admin_dashboard.php"';
							echo '</script>';
						}

						else if(is_array($fetch_employee_result))
						{

							$_SESSION['login_name'] = $_POST['ngan'];
							$_SESSION['login_session'] = "ipasa";
							echo '<script type="text/javascript">';
							echo 'alert("Successful Login! \n WELCOME - '.$user.'   ");';
							echo 'window.location.href="employee_dashboard.php"';
							echo '</script>';
						}

						else
						{
							echo '<script>';
							echo 'alert("Error Credentials!" ) ;';
							echo 'window.location.href = "index.php";';
							echo '</script>';
						}

}

?>


<html>
	<head>
			<title>Login</title>

		    <meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="css/bulma.css">
			<link rel="stylesheet" href="css/bulma.min.css">
			<link rel="stylesheet" href="css/mystyle.css">
    		<link rel="shortcut icon" href="img/cec-panglao.png" type="image/x-icon">
    		<link rel="icon" href="img/cec.png" type="image/x-icon">
			<script defer src="js/all.js"></script>

			<link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
	</head>
	<body>
	
	<section>
		<div class="hero has-background-dark is-fullheight">
			<div class="hero-body ">
				<div class="column is-4 is-offset-4">
					<div class="container has-text-centered is-fullhd">
					<figure class="image is-128x128 img-responsive iimg"><img src="img/final_logo.png"></figure>
					<h1 class="title is-4 has-text-white-bis minus-top jj">Search for Mr. & Ms. Ce-C 2019</h1>
					<div class="subtitle has-text-white is-size-6" style="font-family: 'courgette', cursive;">Please login to proceed.</div>
						<div class="box sr">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="field">
									<div class="control has-icons-left">
										<input type="text" class="input" name="ngan" placeholder="Enter Username" required>
										<span class="icon is-small is-left">
											<i class="fas fa-user"></i>
										</span>
									</div>
								</div>
								<div class="field">
									<div class="control has-icons-left">
										<input type="password" name="pass" class="input" placeholder="Enter Password" required>
										<span class="icon is-small is-left">
											<i class="fas fa-lock"></i>
										</span>
									</div>
								</div>
								<br>
									<input type="submit" class="button is-block is-medium is-success is-fullwidth is-1 has-text-weight-bold" name="ipasa" value="SIGN IN">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</body>
</html>
