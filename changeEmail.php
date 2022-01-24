<?php
session_start();
$success = True;
$success2 = True;
$success3 = True;
$success4 = False;
include("includes/connection.php");

$output = "";

if (isset($_POST['change'])) {
    $uname =  $_SESSION['user'];
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
    $pass3 = $_POST['pass3'];
    $cur_pass = mysqli_fetch_array( mysqli_query($connect, "select Password from user where Unq_username = '$uname'"));
    if (empty($email1) || empty($email2 || empty($pass3))) {
        $success = False;
    } else if ($email1 != $email2) {
        $success2 = False;
    }
    else if ($pass3 != $cur_pass[0]) {
        $success3 = False;
    } else {
        $query = "update user set Email = '$email1' where Unq_username = '$uname';";
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
        <?php include("includes/header.php"); ?>



        <div class="container">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                        <form method="post">
                            
                            <h3 class="text-center my-3">Change Email</h3>
                            <?php
                            if (!$success) {
                                echo '<h3 class="text-center my-3" style ="color : red;">Invalid Inputs</h3>';
                            }
                            else if (!$success2) {
                                echo '<h3 class="text-center my-3" style ="color : red;">New Email and Retype Email does not match</h3>';
                            }
                            else if (!$success3) {
                                echo '<h3 class="text-center my-3" style ="color : red;">Incorrect Password</h3>';
                            }
                            else if ($success4) {
                                echo '<h3 class="text-center my-3" style ="color : green;">Email Changed Successfully.</h3>';
                            }
                            
?>
                            <div class="text-center"><?php echo $output; ?></div>

                            <label> New Email </label>
                            <input type="text" name="email1" class="form-control my-2" placeholder="Enter new Email">

                            <label> Retype New Email </label>
                            <input type="text" name="email2" class="form-control my-2" placeholder="Enter new Email">

                            <label>Enter Your Password </label>
                            <input type="password" name="pass3" class="form-control my-2" placeholder="Enter Current Password">

                            <input type="submit" name="change" class="btn btn-success" value="Confirm Change">
                            <a href = 'userDashboard.php'> <h3  style='text-align:center;padding-top:25px;color: #0000CF;font-size:25px;'> Go to User Dashboard </h3> </a>"
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>