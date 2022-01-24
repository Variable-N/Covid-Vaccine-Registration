<?php 
$succ = False;
include("includes/connection.php");

$output = "";

if (isset($_POST['register'])) {
	$nid = $_POST['nid'];
	$birth_certificate = $_POST['birth_certificate'];
	$passport = $_POST['passport'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$c_pass = $_POST['c_pass'];
	$hadcovid = $_POST['hadcovid'];
	
	$error = array();

	if (empty($nid)) {
		$error['error'] = "NID is Empty";
	}if(empty($uname)){
		$error['error'] = "username is empty";
	}if(empty($pass)){
		$error['error'] = "Enter Password";
	}if(empty($c_pass)){
		$error['error'] = "Confirm Password";
	// }if($pass != $c_pass){
	// 	$error['error'] = "Both password do not match";
	// }
	}



	if (isset($error['error'])) {
		$output .= $error['error'];
	}else{
		$output .= "";
	}

	if (count($error) < 1) {
		$select = mysqli_query($connect, "SELECT NID, name FROM nid_table WHERE NID = '".$_POST['nid']."'") or exit(mysqli_error($connect));
		if(mysqli_num_rows($select)) {
			
		}
		else{
			exit("NID NOT IN DATABASE, PLEASE CHECK");

		
		}

		$select = mysqli_query($connect, "SELECT Birth_Certificate_No, name FROM  birth_certificate_table WHERE Birth_Certificate_No = '".$_POST['birth_certificate']."'") or exit(mysqli_error($connect));
		if(mysqli_num_rows($select)) {
		}
		else{
			exit("Birth-Certificate NOT IN DATABASE, PLEASE CHECK");

		
		}

		$select = mysqli_query($connect, "SELECT Passport_No, name FROM passport_table WHERE Passport_No = '".$_POST['passport']."'") or exit(mysqli_error($connect));
		if(mysqli_num_rows($select)) {
		}
		else{
			exit("Passport NOT IN DATABASE, PLEASE CHECK");

		
		}

		$select = mysqli_query($connect, "SELECT N.Name from nid_table N, birth_certificate_table B, passport_table P where P.Name = B.Name and B.Name = N.Name and N.NID = '".$_POST['nid']."' and B.Birth_Certificate_No = '".$_POST['birth_certificate']."' and Passport_No = '".$_POST['passport']."'") or exit(mysqli_error($connect));
		if(mysqli_num_rows($select)) {
		}
		else{
			exit("YOUR NID, BIRTH-CERTIFICATE AND PASSPORT DOES NOT MATCH, PLEASE CHECK");

		
		}
		
		$vcn = rand(100000001,799999999);

		$query =  "INSERT INTO user(Unq_username,NID,Passport,Email,Password,bcn,hc,Has) VALUES('$uname', '$nid','$passport', '$email','$pass','$birth_certificate','$hadcovid',('$vcn'+ '$birth_certificate' + '$nid'))";
		$query2 = "INSERT INTO vaccine_info(Vaccine_card_no,No_of_doses,First_Dose_Date,Second_Dose_Date,Vaccine_Name,Unq_username,Has) VALUES (('$vcn'+ '$birth_certificate' + '$nid'),'0','0000-00-00','0000-00-00','','$uname','$uname')";
        $query3 = "INSERT INTO user_location(Vaccine_card_no,Unq_username,Center_Name,City,Area,Selected_date) VALUES (('$vcn'+ '$birth_certificate' + '$nid'),'$uname','','','','0000-00-00')";
        

		if (mysqli_query($connect, $query2) && mysqli_query($connect, $query) && mysqli_query($connect, $query3)) {
			// echo "New record created successfully";
			$succ = True;
		  } else {
			echo "Error: " . $query . "<br>" . mysqli_error($connect);
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
					<?php 
						if ($succ) {
							echo "<h3 
                        		<span> <p style='color: green;'class=text-center my-3;'> REGISTRATION SUCCESSFUL!</p>
                            </h3>";
						}
					?>
					<?php
					echo "<h3 
                        <span> <p style='color: green;'class=text-center my-3;'>Register</p>
                            </h3>";
							?>
						<!-- <h3 class="text-center my-3">Register</h3> -->

						<div class="text-center"><?php echo $output; ?></div>

						<label>NID</label>
						<input type="text" name="nid" class="form-control my-2" placeholder="Enter NID" autocomplete="off">

						<label>Birth Certificate Number</label>
						<input type="text" name="birth_certificate" class="form-control my-2" placeholder="Enter Birth Certificate Number" autocomplete="off">

						<label>Passport Number</label>
						<input type="text" name="passport" class="form-control my-2" placeholder="Enter Passport Number" autocomplete="off">

					

						<label>Username</label>
						<input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" autocomplete="off">

                        <!-- <label>Select Gender</label>
						<select class="form-control my-2" name="gender">
							<option value="">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select> -->
                         
                         <!-- <label>Select Role</label>
						<select name="role" class="form-control my-2">
							<option value="">Selete Role</option>
							<option value="User">User</option>
							<option value="Agent">Agent</option>
						</select> -->
						<label>Email</label>
						<input type="email" name="email" class="form-control my-2" placeholder="Enter email">

						<label>Password</label>
						<input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

						<label>Confirm Password</label>
						<input type="password" name="c_pass" class="form-control my-2" placeholder="Enter Confirm Password">

						<label>Had COVID?</label>
						<select name="hadcovid" class="form-control my-2">
							<option value="">Had Covid?</option>
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>

						<input type="submit" name="register" class="btn btn-success" value="Register">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="" style="margin-top: 30px;"></div>

</body>
</html>