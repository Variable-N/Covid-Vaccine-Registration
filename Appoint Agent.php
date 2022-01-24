<?php
session_start();
$success = True;
$success4 = False;
include("includes/connection.php");

$output = "";

if (isset($_POST['change'])) {
    $Agent_email =  $_POST['Agent_email'];
    $Password = $_POST['Password'];
    $NID = $_POST['NID'];
    $Admin=$_SESSION['AdminLoginId'];
    $que = mysqli_fetch_array(mysqli_query($connect," select Vaccine_Center from admin where Email='$Admin';"));
    $Vaccine_Center = $que[0];
    
    if (empty($Agent_email) || empty($Password || empty($NID) || empty($Vaccine_Center))) {
        $success = False;
    
    } else {
        $query = "INSERT INTO agent(Agent_Email, Password, NID, Vaccine_Center, Appointed_By) VALUES ('$Agent_email','$Password','$NID','$Vaccine_Center','$Admin');";
        $res = mysqli_query($connect, $query);
        $success4 = True;
        
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

    <?php include("header1.php"); ?>

        <div class="container">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                        <form method="post">
                            
                            <h3 class="text-center my-3">AGENT LOGIN</h3>
                            <?php
                            if (!$success) {
                                echo '<h3 class="text-center my-3" style ="color : red;">Invalid Inputs</h3>';
                            }
                            else if ($success4) {
                                echo '<h3 class="text-center my-3" style ="color : green;">Agent Appoint Successfully.</h3>';
                            }
                            
?>
                            <div class="text-center"><?php echo $output; ?></div>

                            <label> Enter Agent Email </label>
                            <input type="text" name="Agent_email" class="form-control my-2" placeholder="Enter Agent Email">

                            <label> Enter Password </label>
                            <input type="password" name="Password" class="form-control my-2" placeholder="Enter Password">

                            <label>Enter NID </label>
                            <input type="text" name="NID" class="form-control my-2" placeholder="Enter NID">

                            <input type="submit" name="change" class="btn btn-success" value="Confirm Change">
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>