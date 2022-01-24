<?php
    session_start();
    session_regenerate_id(true);
    if(!isset($_SESSION['AgentLoginId'])){
       // header("location: index2.php");
    }
?>
<html>
    <head>
        <title> Search & Update Vaccine Card No</title>
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
    <body style="background-color:#ADD8E6;">
        <center>
            <h5 ><font face="Arial" size="6px" color="#35363A">Search Vaccine Card No For Updating</font></h5>
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


                    $query_run = mysqli_query($connection, " SELECT V.* FROM vaccine_info V, user_location U, agent A 
                    WHERE A.Vaccine_Center = U.Center_Name AND U.Unq_username = V.Unq_username 
                    AND A.Agent_Email = '$agent' AND V.Vaccine_card_no =   '$Vaccine_card_no' "); //


                    $row = mysqli_fetch_array($query_run);

                    if($row==Null){
                        echo '<h3 class="text-center my-3" style ="color : red;">User Not Found / Not From Your Center</h3>';
                    }
                    while($row)
                    {
                        ?>
                        <form action="" method="POST">
                            
                            <h4><font face="Arial" size="4px" color="#35363A" >User Name (Cannot Be Updated)<span style="opacity:0;">Thiassenaaaatehis nvsblehehasadasdsad</span></h4>
                            <input readonly="" type="text" name="Unq_username" value="<?php echo $row['Unq_username'] ?>" /><br>

                            <h4><font face="Arial" size="4px" color="#35363A">Vaccine Card No (Cannot Be Updated)</font><span style="opacity:0;">mmce is nvisilnasadasdsad</span> </h4>
                            <input readonly="" type="text" name="Vaccine_card_no" value="<?php echo $row['Vaccine_card_no'] ?>"/><br>

                            <h4><font face="Arial" size="4px" color="#35363A">No of Doses</font><span style="opacity:0;">Ths semmntence is invisiblehehboiasadasdsad</span> </h4>
                            <input type="text" name="No_of_doses" value="<?php echo $row['No_of_doses'] ?>"/><br>

                            <h4><font face="Arial" size="4px" color="#35363A">First Dose Date</font><span style="opacity:0;">immiss sentence is invisiblneboiasadasdsad</span> </h4>
                            <input type="text" name="First_Dose_Date" value="<?php echo $row['First_Dose_Date'] ?>"/><br>

                            <h4><font face="Arial" size="4px" color="#35363A">Second Dose Date</font><span style="opacity:0;">miiimmis sentence is insibeboiasadasdsad</span> </h4>
                            <input type="text" name="Second_Dose_Date" value="<?php echo $row['Second_Dose_Date'] ?>"/><br>

                            <h4><font face="Arial" size="4px" color="#35363A">Vaccine Name</font><span style="opacity:0;">mmiiiis sentence is invisibnehhebosadasdsad</span> </h4>
                            <input type="text" name="Vaccine_Name" value="<?php echo $row['Vaccine_Name'] ?>"/><br>

                            <br>

                            <input type="submit" name="update" value="Update Data" class="btn btn-info">

                        </form>

                        
                        <?php
                        break;
                    }
                }        
            ?>
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

    $query1 = "UPDATE vaccine_info SET No_of_doses='$No_of_doses' WHERE Vaccine_card_no='$Vaccine_card_no' ";

    $query2 = "UPDATE vaccine_info SET First_Dose_Date='$First_Dose_Date' WHERE Vaccine_card_no='$Vaccine_card_no' ";

    $query3 = "UPDATE vaccine_info SET Second_Dose_Date='$Second_Dose_Date' WHERE Vaccine_card_no='$Vaccine_card_no' ";

    $query4 = "UPDATE vaccine_info SET Vaccine_Name='$Vaccine_Name' WHERE Vaccine_card_no='$Vaccine_card_no' ";


    $query_run = mysqli_query($connection, $query1);

    $query_run = mysqli_query($connection, $query2);

    $query_run = mysqli_query($connection, $query3);

    $query_run = mysqli_query($connection, $query4);


    //698271763
    if($query_run)
    {
        echo '<script> alert("Data Updated") </script>';
        header("location: vaccineupdated.php");

    }
    else
    {
        echo '<script> alert("DATA NOT Updated!!") </script>';
    }
}
?>