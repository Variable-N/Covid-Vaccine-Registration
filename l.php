
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Covid Vaccine System</title>
	<body style='background-color: #ADD8E6'>

</head>
<body>
<center>
	<?php include("includes/header.php"); ?>



	<div class="container">
		<div class="col-md-12">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 shadow-sm" style="margin-top:100px;">
					<form action="login.php">

					
						<h3 class="text-center my-3">User? Login here</h3>

						<input type="submit" name="login" class="btn btn-success" value="User Login">
					</form>

					<form action="agentlogin.php">
					<h3 class="text-center my-3"> Agent? Login here </h3>
					
					<input type="submit" name="Agent login" class="btn btn-success" value="Agent Login">
					</form>
				</div>
			</div>
		</div>
	</div>

</center>
</body>
</html>