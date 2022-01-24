<?php include("header1.php"); ?>
<?php
    session_start();
    session_regenerate_id(true);
    if(!isset($_SESSION['AdminLoginId'])){
        header("location: Admin Login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>ADMIN DASHBOARD</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <body style='background-color: #ADD8E6'>
    <style>
            body{
                margin: 0;
            }
            div.header{
                color: #f0f0f0;
                font-family: poppins;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                padding: 0 60px;
            }
            div.header button{
                background-color: #f0f0f0;
                font-size: 16px;
                font-weight: 550;
                padding: 8px 12px;
                border: 2px solid #21618c;
                border-radius: 5px;
            }
        </style>

       
        
    </div>
</head>
</nav>
<body>

    <div class="container">
        <a href="./edit.php?id= ' .$row['id'] .'" class="btn btn-success">Edit</a>
        <a href="./delete.php?vcn= ' .$row['vcn'] .'" class="btn btn-danger">Delete</a>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>Sl_No</th>
                    <th>Unq_username</th>
                    <th>NID</th>
                    <th>Passport</th>
                    <th>bcn</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>hc</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $c=1;
                    $con=mysqli_connect("localhost","root","","covid_vaccine_reg");
                    $sel="SELECT * FROM user";
                    $query=$con->query($sel);
                    while($row=$query->fetch_assoc()){
                ?>
                <tr>
                <td><?php echo $c++; ?></td>
                <td><?php echo $row['Unq_username']; ?></td>
                <td><?php echo $row['NID']; ?></td>
                <td><?php echo $row['Passport']; ?></td>
                <td><?php echo $row['bcn']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Password']; ?></td>
                <td><?php echo $row['hc']; ?></td>

                    
                </tr>
                
                <?php
                }
                ?>
                
            </tbody>
        </table> 
    </div>
    </body>
</body>
</html>