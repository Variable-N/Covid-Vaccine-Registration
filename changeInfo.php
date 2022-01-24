<?php
session_start();
$output = "";
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
                            
                            <h3 class="text-center my-3">Change User Information</h3>
                            
                            <div class="text-center"><?php echo $output; ?></div>
                            <a href = 'changeUname.php'> <h3  style='text-align:center;padding-top:3px;color: #0000AF;font-size:20px;'> Change Username </h3> </a>
                            <a href = 'changeEmail.php'> <h3  style='text-align:center;padding-top:3px;color: #0000AF;font-size:20px;'> Change Email</h3> </a>
                            <a href = 'changePass.php'> <h3  style='text-align:center;padding-top:3x;color: #0000AF;font-size:20px;'> Change Password </h3> </a>


                            <a href = 'userDashboard.php'> <h3  style='text-align:center;padding-top:25px;color: #0000DF;font-size:25px;'> Go to User Dashboard </h3> </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
 
</html>