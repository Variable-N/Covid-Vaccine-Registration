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
                        <h2>Delete User info</h2>
                        <form action="" method="POST" >
                            <label for="Unq_username"><b>User Name</b></label><br>
                            <input type="text" name="Unq_username" value="<?php echo $row['Unq_username'] ?>"/><br>
                
                            <input type="submit" name="update" value="Delete Data">
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

    $query = "DELETE FROM user WHERE Unq_username='$Unq_username' ";
    $query2 = "DELETE FROM user_location WHERE Unq_username='$Unq_username' ";
    $query3 = "DELETE FROM vaccine_info WHERE Unq_username='$Unq_username' ";
    $query_run = mysqli_query($connection, $query);
    $query_run2 = mysqli_query($connection, $query2);
    $query_run3 = mysqli_query($connection, $query3);

    //698271763

    if($query_run & $query_run2 & $query_run3)
    {
        echo '<script> alert("Data Deleted") </script>';
    }
    else
    {
        echo '<script> alert("DATA NOT Deleted!!") </script>';
    }
}
?>