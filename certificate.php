<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Certificate</title>

</head>

<style>
.center {
  margin-left: auto;
  margin-right: auto;
}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
table {
    table-layout: fixed;
    width: 60%;
}
td {
    width: 25%;
}
</style>
</head>
<body>
<?php
    $uname = $_SESSION['user'];
    include("includes/connection.php");
	$sql = "select * from user where Unq_username ='$uname'";
	$records = mysqli_query($connect, $sql) or die( mysqli_error($connect));// fetch data from database
    $user_data = mysqli_fetch_array($records);

    $sql1 = "select N.Name, N.Gender, N.Date_of_Birth from nid_table N, user U where N.NID = '$user_data[1]'";
	$records1 = mysqli_query($connect, $sql1) or die( mysqli_error($connect));// fetch data from database
    $nid_info = mysqli_fetch_array($records1);

    $sql2 = "select V.Vaccine_card_no, V.No_of_doses, V.First_Dose_Date, V.Second_Dose_Date, Vaccine_Name from vaccine_info V where V.Vaccine_card_no = '$user_data[7]';";
	$records2 = mysqli_query($connect, $sql2) or die( mysqli_error($connect));// fetch data from database
    $vaccine_info = mysqli_fetch_array($records2);
    
    $userName = $nid_info[0];
    $gender = $nid_info[1];
    $date_of_birth = $nid_info[2];
    $nid = $user_data[1];
    $passport = $user_data[2];
    $Vaccine_Card_No = $user_data[7];
    $Vaccine_Name = $vaccine_info[4];
    $No_of_Dose = $vaccine_info[1];
    $First_Dose = $vaccine_info[2];
    $Second_Dose =  $vaccine_info[3];

    $sql3 = "select Center_name from user_location where Vaccine_card_no = '$user_data[7]'"; 
    $records3 = mysqli_query($connect, $sql3) or die( mysqli_error($connect));
    $Vaccine_Center = mysqli_fetch_array($records3)[0];
?>

<body>
    <image src = "bd.png" width = "90" height = "90" alt = "Bangladesh logo" class = "center">
    <h2 style = "color : black; text-align : center"> Government of the People's Republic of Bangladesh </h2>
    <h3 style = "color : black; text-align : center"> Ministry of Health and Family Welfare </h3>
    <h1 style = "color : blue; text-align : center"> VACCINE CERTIFICATE </h1>
    <?php echo '<p style = "text-align : center">This is to certify that, <b>' . $userName . '</b> is a citizen of Bangladesh and a <b>vaccinated</b> person. <b>' . $userName . '</b>\'s beneficiary and vaccination details are given below:</p>' ?>
    <table class = "center">
        <tr>
            <th colspan = "2"> <b> Beneficiary Details </b></th>
            <th colspan = "2"> <b> Vaccination Details </b></th>
        </tr>
        <tr>
            <td>Vaccine card Number:</td>
            <td><?php echo "<b>" . $Vaccine_Card_No . "<b>"?></td>
            <td>Vaccination Center:</td>
            <td><?php echo "<b>" . $Vaccine_Center. "<b>"?></td>
        </tr>
        <tr>
            <td>NID Number:</td>
            <td><?php echo "<b>" . $nid . "<b>"?></td>
            <td>Date of vaccinaton (Dose 1):</td>
            <td><?php echo "<b>" . $First_Dose . "<b>"?></td>
        </tr>
        <tr>
            <td>Passport Number:</td>
            <td><?php echo "<b>" . $passport . "<b>"?></td>
            <td>Date of vaccinaton (Dose 2):</td>
            <td><?php echo "<b>" . $Second_Dose . "<b>"?></td>
        </tr>
        <tr>
            <td>Full Name: </td>
            <td><?php echo "<b>" . $userName . "<b>"?></td>
            <td>Name of Vaccine:</td>
            <td><?php echo "<b>" . $Vaccine_Name. "<b>"?></td>
        </tr>
        <tr>
            <td>Date of Birth: </td>
            <td><?php echo "<b>" . $date_of_birth . "<b>"?></td>
            <td>Vaccinated by:</td>
            <td><?php echo "<b>Directorate General of Health Services (DGHS)<b>"?></td>
        </tr>
    </table>
    <p style = "text-align : center">For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd</p>
    <image src = "cooperators.jpg" width = "500" height = "115" alt = "Cooperators" class = "center">
    

</html>