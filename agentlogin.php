<?php
session_start();
  include("includes/connection.php");
   
   $output = "";

  if (isset($_POST['login'])) {
  	   
  	   $uname = $_POST['Agent_Email'];
  	   $pass = $_POST['pass'];

  	   if (empty($uname)) {
  	   	
  	   }else if(empty($pass)){

  	   }else{

         $query = "SELECT * FROM agent WHERE Agent_Email ='$uname' AND Password='$pass'";
         $res = mysqli_query($connect,$query);

         if (mysqli_num_rows($res) == 1) {
                $_SESSION['agent'] = $uname;
                header("Location: vaccineinfo.php");
				
         	 $output .= "you have logged-In";
         }else{
             $output .= "Failed to login";
         }
  	   }
  }

 ?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Covid Vaccine System</title>
	<body style='background-color: #ADD8E6'>

</head>
<body>
	<?php include("includes/header.php"); ?>

	<div class="container">
		<div class="col-md-12">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 shadow-sm" style="margin-top:100px;">
					<form method="post">
						<h3 class="text-center my-3">Agent Login Panel</h3>
						<div class="text-center"><?php echo $output; ?></div>
						<label>Agent Email</label>
						<input type="text" name="Agent_Email" class="form-control my-2" placeholder="Enter Agent Email" autocomplete="off">
                         
						<label>Password</label>
						<input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

						<input type="submit" name="login" class="btn btn-success" value="Login">
                        <a href="login.php">Login as User</a><br>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>