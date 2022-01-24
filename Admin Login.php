<?php require("includes/connection.php");

?>
<?php include("includes/header.php"); ?>
<html>

<head>
    <meta charset="UTF-8">

    <title>Covid Vaccine System</title>

<body style='background-color: #ADD8E6'>
    </head>


    <?php
   
    $SUCC = True;
    if (isset($_POST['login'])) {
        $AdminEmail = $_POST['AdminEmail'];
        $AdminPass = $_POST['AdminPass'];

        $query = "SELECT * FROM admin WHERE Email= '$AdminEmail' AND Password ='$AdminPass'";
        $res = mysqli_query($connect, $query);
        if (mysqli_num_rows($res) == 1) {
            session_start();
            $_SESSION['AdminLoginId'] = $AdminEmail;
            header("location: Admin Panel.php");
            echo "Hi";
        } else {
            $SUCC = False;
            echo "<script>alart('Invalid Admin Email or Password')</script>";
        }
    }

    ?>

    <body>
        



        <div class="container">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                        <form method="post">
                            <?php

                            ?>
                            <h3 class="text-center my-3">Admin Login</h3>

                            <label>Admin Email</label>
                            <input type="text" name="AdminEmail" class="form-control my-2" placeholder="Enter Email" autocomplete="off">


                            <label>Password</label>
                            <input type="password" name="AdminPass" class="form-control my-2" placeholder="Enter Password">

                        
                            <input type="submit" name="login" class="btn btn-success" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>