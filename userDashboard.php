<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

  <body style='background-color: #ADD8E6'>
    <nav class="navbar navbar-expand-sm bg-info navbar-dark">
      <h3 class="navbar-brand text-white">Covid Vaccine Registration System</h3>


      <div class="mr-auto"></div>

      <ul class="navbar-nav">
        <?php
        $uname = $_SESSION['user'];
        if (isset($_SESSION['user'])) { ?>
          <li class="nav-item">
            <a href="#" class="nav-link"><?php echo $_SESSION['user']; ?></a>
          </li>
          <li class="nav-item">
            <a href="changeInfo.php" class="nav-link"><?php echo "Settings"; ?></a>
          </li>

          <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
          </li>
        <?php } else if (isset($_SESSION['agent'])) { ?>
          <li class="nav-item">
            <a href="login.php" class="nav-link"><?php echo $_SESSION['agent']; ?></a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
          </li>
        <?php } else { ?>

          <li class="nav-item">
            <a href="home.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">Logout</a>
          </li>
        <?php }
        ?>

        <?php
        include("includes/connection.php");
        $sql = "select * from user where Unq_username ='$uname'";
        $records = mysqli_query($connect, $sql) or die(mysqli_error($connect)); // fetch data from database
        $user_data = mysqli_fetch_array($records);

        $sql1 = "select N.Name, N.Gender, N.Date_of_Birth from nid_table N, user U where N.NID = '$user_data[1]'";
        $records1 = mysqli_query($connect, $sql1) or die(mysqli_error($connect)); // fetch data from database
        $nid_info = mysqli_fetch_array($records1);

        $sql2 = "select V.Vaccine_card_no, V.No_of_doses, V.First_Dose_Date, V.Second_Dose_Date, Vaccine_Name from vaccine_info V where V.Vaccine_card_no = '$user_data[7]';";
        $records2 = mysqli_query($connect, $sql2) or die(mysqli_error($connect)); // fetch data from database
        $vaccine_info = mysqli_fetch_array($records2);

        $sql3 = " select Center_Name, Selected_date from user_location where Vaccine_Card_no = $user_data[7]";
        $records3 = mysqli_query($connect, $sql3) or die(mysqli_error($connect)); // fetch data from database
        $center_info = mysqli_fetch_array($records3);

        ?>


        <?php
        //    $user_data = $user_data[0];
        $userName = $nid_info[0];
        $gender = $nid_info[1];
        $date_of_birth = $nid_info[2];

        $Vaccine_Card_No = $user_data[7];
        $Vaccine_Name = $vaccine_info[4];
        $No_of_Dose = $vaccine_info[1];
        $First_Dose = $vaccine_info[2];
        $Second_Dose = $vaccine_info[3];
        $email = $user_data[4];
        $center = $center_info[0];
        $selected_date = $center_info[1];
        $next_date = date('Y-m-d', strtotime("+35 days", strtotime($First_Dose)));
        ?>

      </ul>
    </nav>
    <h2 style="text-align:center;padding-top:55px;color: black;font-size:35px;">User Dashboard</h2>
    <h3 style="text-align:left;padding-left:35px;padding-top:35px;color: black#A9A9A9;font-size:25px;">Name : <?php echo "<b>" . $userName . "</b>" ?> (from your NID card)</h3>
    <h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">Gender : <?php echo "<b>" .  $gender . "<b>" ?></h3>
    <h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">Date of Birth : <?php echo "<b>" . $date_of_birth . "<b>" ?></h3>
    <h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black#A9A9A9;font-size:25px;">NID : <?php echo "<b>" . $user_data[1] . "<b>" ?></h3>
    <h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black#A9A9A9;font-size:25px;">Username : <?php echo "<b>" . $uname . "<b>" ?></h3>
    <h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black#A9A9A9;font-size:25px;">Email : <?php echo "<b>" . $email . "<b>" ?></h3>

    <h2 style="text-align:center;padding-top:35px;color: black;font-size:35px;">Vaccine Information</h2>
    <h3 style="text-align:left;padding-left:35px;padding-top:35px;color: black;font-size:25px;">Vaccine Card No: <?php echo "<b>" . $Vaccine_Card_No . "<b>" ?></h3>

    <?php
    if ($selected_date == '0000-00-00') {
      echo "<h2  style='text-align:center;padding-top:35px;color: red ;font-size:35px;'> <b> You did not selected your vaccine center and prefered vaccination date yet.  </b></h2> ";
    } else if ($No_of_Dose == 0) {
      echo "<h3  style='text-align:center;padding-top:35px;color: red ;font-size:35px;'> <b> You will give your first dose in " . $selected_date . ". </b></h3> ";
    } else if ($No_of_Dose == 1) {
      echo '<h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">Vaccine Name : <b>' . $Vaccine_Name . '</b> </h3>';
      echo '<h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">No of Dose taken : <b>' . $No_of_Dose . '</b> </h3>';
      echo '<h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">First Dose Date : <b>' . $First_Dose . '</b></h3>';
      echo "<h3  style='text-align:center;padding-top:35px;color: red ;font-size:35px;'> <b> You will give your second dose in " . $next_date . ". </b></h3> ";
    } else {
      echo '<h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">Vaccine Name : <b>' . $Vaccine_Name . '</b> </h3>';
      echo '<h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">No of Dose taken : <b>' . $No_of_Dose . '</b> </h3>';
      echo '<h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">First Dose Date : <b>' . $First_Dose . '</b> </h3>';
      echo '<h3 style="text-align:left;padding-left:35px;padding-top:3px;color: black;font-size:25px;">Second Dose Date : <b>' . $Second_Dose . '</b> </h3>';
      echo "<h3  style='text-align:center;padding-top:35px;color: green ;font-size:35px;'> <b> Congratulations! You are fully vaccinated. </b></h3> ";
    }
    ?>



    <?php if ($No_of_Dose == 2) {
      echo "<a href = 'certificate.php'> <h2  style='text-align:center;padding-top:25px;color: red;font-size:35px;'>Download Vaccine Certificate </h2> </a>";
    } elseif ($No_of_Dose == 0 && $selected_date != '0000-00-00') {
      echo "<a href = 'updateloc.php'> <h2  style='text-align:center;padding-top:35px;color: black ;font-size:35px;'>  Update Vaccine Center Location </h2> </a>";
    } elseif ($No_of_Dose == 0 && $selected_date == '0000-00-00') {
      echo "<a href = 'updateloc.php'> <h2  style='text-align:center;padding-top:35px;color: red ;font-size:35px;'> <b> Choose your Vaccine Center Location Now! </h2> <b> </a>";
    } else {
      echo "<a href = 'updateloc2.php'> <h2  style='text-align:center;padding-top:35px;color: black;font-size:35px;'> Update Vaccine Center Location </h2> </a>";
    } ?>

    <a href='vaccine_card.php'>
      <h2 style='text-align:center;padding-top:25px;color: blue;font-size:35px;'>Download Vaccine Card </h2>
    </a>




  </body>

</html>