<html>
    <head>
        <title>Admin Panel</title>
        <body style='background-color: #ADD8E6'>
    </head>
    <body>
    <center>
    <?php include("header1.php"); ?>
        <div class="header">
        <h1>Search User Name</h1>
        <form action="" method="POST">
            <input type="text" name="Unq_username" placeholder="ENTER USER NAME"/><br/>
            <input type="submit" name="search" value="Search Data"/>
            
        </form>
        </div>


        
            

            <?php
                $connection = mysqli_connect("localhost", "root","");
                $db = mysqli_select_db($connection,"covid_vaccine_reg");

                if(isset($_POST['search']))
                {
                    $Unq_username = $_POST['Unq_username'];

                    $query_run = mysqli_query($connection, "SELECT * FROM user where Unq_username='$Unq_username' ");

                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                        <h2>Update User info</h2>
                        <form action="" method="POST" >
                            <label for="Unq_username"><b>User Name</b></label><br>
                            <input type="text" name="Unq_username" value="<?php echo $row['Unq_username'] ?>"/><br>
                            <label for="NID"><b>NID</b></label><br>
                            <input type="text" name="NID" value="<?php echo $row['NID'] ?>"/><br>
                            <label for="Passport"><b>Passport</b></label><br>
                            <input type="text" name="Passport" value="<?php echo $row['Passport'] ?>"/><br>
                            <label for="bcn"><b>bcn</b></label><br>
                            <input type="text" name="bcn" value="<?php echo $row['bcn'] ?>"/><br>
                            <label for="Email"><b>Email</b></label><br>
                            <input type="text" name="Email" value="<?php echo $row['Email'] ?>"/><br>
                            <label for="Password"><b>Password</b></label><br>
                            <input type="text" name="Password" value="<?php echo $row['Password'] ?>"/><br>
                            <label for="hc"><b>hc</b></label><br>
                            <input type="text" name="hc" value="<?php echo $row['hc'] ?>"/><br>

                            <input type="submit" name="update" value="Update Data">
                        </form>

                        <?php
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
    $NID = $_POST['NID'];
    $Passport = $_POST['Passport'];
    $bcn = $_POST['bcn'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $hc = $_POST['hc'];

    $query = "UPDATE user SET NID='$NID', Passport='$Passport', bcn='$bcn' ,Email='$Email', Password='$Password', hc='$hc' WHERE Unq_username='$Unq_username' ";
    $query_run = mysqli_query($connection, $query);

    //698271763

    if($query_run)
    {
        echo '<script> alert("Data Updated") </script>';
    }
    else
    {
        echo '<script> alert("DATA NOT Updated!!") </script>';
    }
}
?>