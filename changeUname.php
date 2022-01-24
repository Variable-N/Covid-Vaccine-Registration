<?php
session_start();
$success = True;
$success2 = True;
$success3 = True;
$success4 = False;
$success5 = True;
include("includes/connection.php");

$output = "";

if (isset($_POST['change'])) {
    $uname =  $_SESSION['user'];
    $newUname1 = $_POST['newUname1'];
    $newUname2 = $_POST['newUname2'];
    $pass3 = $_POST['pass3'];
    $uniqueCheck = mysqli_fetch_array( mysqli_query($connect, "select count(Unq_username) from user where Unq_username = '$newUname1'"));
    $cur_pass = mysqli_fetch_array( mysqli_query($connect, "select Password from user where Unq_username = '$uname'"));
    if (empty($newUname1) || empty($newUname2 || empty($pass3))) {
        $success = False;
    } else if ($newUname1 != $newUname2) {
        $success2 = False;
    }
    else if ($pass3 != $cur_pass[0]) {
        $success3 = False;
    }else if ($uniqueCheck[0] > 0) {
        $success5= False;
    } else {
        $res = mysqli_query($connect, "update user set Unq_username = '$newUname1' where Unq_username = '$uname'");
        $res = mysqli_query($connect, "update vaccine_info set Unq_username = '$newUname1' where Unq_username = '$uname'");
        $res = mysqli_query($connect, "set foreign_key_checks = 0");
        $res = mysqli_query($connect, "update vaccine_info set Has = '$newUname1' where Unq_username = '$newUname1';");
        $res = mysqli_query($connect, "update user_location set Unq_username = '$newUname1' where Unq_username = '$uname'");
        $res = mysqli_query($connect, "set foreign_key_checks = 1");
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
        <?php include("includes/header.php"); ?>



        <div class="container">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                        <form method="post">
                            
                            <h3 class="text-center my-3">Change Username</h3>
                            <h3  style='text-align:center;color: red;font-size:15px;'> Caution! Changing your username will log you out. </h3>
                            <?php
                            if (!$success) {
                                echo '<h3 class="text-center my-3" style ="color : red;">Invalid Inputs</h3>';
                            }
                            else if (!$success2) {
                                echo '<h3 class="text-center my-3" style ="color : red;">New username and Retype Username does not match</h3>';
                            }
                            else if (!$success3) {
                                echo '<h3 class="text-center my-3" style ="color : red;">Incorrect Password</h3>';
                            }
                            else if ($success4) {
                                echo '<h3 class="text-center my-3" style ="color : green;">Username Changed Successfully.</h3>';
                            }
                            else if (!$success5) {
                                echo '<h3 class="text-center my-3" style ="color : red;">This username already exists</h3>';
                            }
?>
                            <div class="text-center"><?php echo $output; ?></div>

                            <label> New Username </label>
                            <input type="text" name="newUname1" class="form-control my-2" placeholder="Enter new username">

                            <label> Retype New Username </label>
                            <input type="text" name="newUname2" class="form-control my-2" placeholder="Enter new username">

                            <label>Enter Your Password </label>
                            <input type="password" name="pass3" class="form-control my-2" placeholder="Enter Current Password">

                            <input type="submit" name="change" class="btn btn-success" value="Confirm Change">
                            <?php
                            if ($success4) {
                                echo "<a href = 'logout.php'> <h3  style='text-align:center;padding-top:25px;color: #0000CF;font-size:25px;'> Logout to show the changes </h3> </a>";
                            }
                            else {
                                echo "<a href = 'userDashboard.php'> <h3  style='text-align:center;padding-top:25px;color: #0000CF;font-size:25px;'> Go to User Dashboard </h3> </a>";
                            }
?>
                             
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>