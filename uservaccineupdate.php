<?php
    session_start();
    session_regenerate_id(true);
    if(!isset($_SESSION['AgentLoginId'])){
       // header("location: index2.php");
    }
?>

<html>
    <head>
        <title> Search Vaccine Card No</title>
		<meta charset="utf-8">
	<title>Covid Vaccine System</title>

	<body style='background-color: #ADD8E6'>
        <style>
            body{
                background-color: whitesmoke;
            }
        input{
            width: 40%;
            height: 5%;
            border: 1px;
            border-radius: 4px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
        }
        </style>


        <?php include("includes/header.php"); ?>
    </head>
    <body >
        <center>
            <h5 ><font face="Arial" size="6px" color="#35363A">Search Updated User Info</font></h5>
            <form action="" method="POST"> 

                <input type="text" name="Vaccine_card_no" placeholder="VACCINE CARD NO"/><br>
                <input type="submit" name="search" value="Search" class="btn btn-info"/>
            </form>

            <?php
                $connection = mysqli_connect("localhost", "root","");
                $db = mysqli_select_db($connection,"covid_vaccine_reg");

                if(isset($_POST['search']))
                {
                    $Vaccine_card_no = $_POST['Vaccine_card_no'];

                    $agent = $_SESSION['agent'];

                    $query_run = mysqli_query($connection, " SELECT V.* FROM vaccine_info V, user_location U, agent A WHERE A.Vaccine_Center = U.Center_Name AND U.Unq_username = V.Unq_username AND A.Agent_Email = '$agent' AND V.Vaccine_card_no =   '$Vaccine_card_no' ");

                    $row = mysqli_fetch_array($query_run);

                    if($row==Null){
                        echo '<h3 class="text-center my-3" style ="color : red;">User Not Found / Not From Your Center</h3>';
                    }
                    
                    while($row)
                    {
                        ?>
                        <form action="" method="POST">
							<h3><?php echo "Updated Vaccine Info of This User" ?></h3>

							<h2 style="text-align:center;padding-top:10px;color: black;font-size:19px;">Vaccine Card No: <?php echo $row['Vaccine_card_no'] ?></h2>
							<h4 style="text-align:center;padding-top:10px;color: black;font-size:19px;">Username: <?php echo $row['Unq_username'] ?></h4>
							<h2 style="text-align:center;padding-top:10px;color: black;font-size:19px;">Vaccine Name: <?php echo $row['Vaccine_Name'] ?></h2>
							<h2 style="text-align:center;padding-top:10px;color: black;font-size:19px;">No of Doses: <?php echo $row['No_of_doses'] ?></h2>
							<h2 style="text-align:center;padding-top:10px;color: black;font-size:19px;">First Dose Date: <?php echo $row['First_Dose_Date'] ?></h2>
							<h2 style="text-align:center;padding-top:10px;color: black;font-size:19px;">Second Dose Date: <?php echo $row['Second_Dose_Date'] ?></h2>
                            </br>
                        </form>       
                        <?php
                        break;
                    } 
                }
            ?>
            <a href="vaccineinfo.php">All Users</a><br>
        </center>
    </body>
</html>

<?php
$connection = mysqli_connect("localhost", "root","");
$db = mysqli_select_db($connection,"covid_vaccine_reg");

if(isset($_POST['update']))
{
    
    $Unq_username = $_POST['Unq_username'];
    $No_of_doses = $_POST['No_of_doses'];
    $First_Dose_Date = $_POST['First_Dose_Date'];
    $Second_Dose_Date = $_POST['Second_Dose_Date'];
    $Vaccine_Name = $_POST['Vaccine_Name'];
    $Vaccine_card_no = $_POST['Vaccine_card_no'];

    $query = "UPDATE vaccine_info SET No_of_doses='$No_of_doses',First_Dose_Date='$First_Dose_Date',Second_Dose_Date='$Second_Dose_Date',Vaccine_Name='$Vaccine_Name' WHERE Vaccine_card_no='$Vaccine_card_no' ";
    $query_run = mysqli_query($connection, $query);

    //698271763
    if($query_run)
    {
        echo '<script> alert("Data Updated") </script>';
        header("location: newupvacc.php");

    }
    else
    {
        echo '<script> alert("DATA NOT Updated!!") </script>';
    }
}
?>