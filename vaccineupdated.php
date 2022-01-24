<?php
session_start();
  include("includes/connection.php");
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
					<form>

                        <h2><font face="Arial" size="5px" color="#42ba96">Vaccine Info Updated!</font>

                        <h2>Updated Vaccine Info of Users</h2>
                        <a href="uservaccineupdate.php">SEARCH-USER</a>
                        <a href="search.php">UPDATE</a><br>
                        <br>
		
                        <?php	
                        include("includes/connection.php");

                        $query_run = mysqli_query($connect, "SELECT * FROM vaccine_info ");

                        while($data = mysqli_fetch_array($query_run))
                        {
                        ?>
                            <?php echo "Vaccine card no:"; ?>
                            <?php echo $data['Vaccine_card_no']; ?></br>

                            <?php echo "Username:"; ?>
                            <?php echo $data['Unq_username']; ?></br>

                            <?php echo "Vaccine Name:"; ?>
                            <?php echo $data['Vaccine_Name']; ?></br>

                            <?php echo "No of doses:"; ?>
                            <?php echo $data['No_of_doses']; ?></br>

                            <?php echo "First Dose Date:"; ?>
                            <?php echo $data['First_Dose_Date']; ?></br>

                            <?php echo "Second Dose Date:"; ?>
                            <?php echo $data['Second_Dose_Date']; ?></br>                            
                            </br>

                        <?php
                        }
                            
                        ?>
                        
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>