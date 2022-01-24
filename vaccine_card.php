<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Card</title>
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
table {
    table-layout: fixed;
    width: 60%;
}
td {
    width: 25%;
}
</style>

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


    <figure class="half" style="display:flex">
    <img style="height:90px" src="bd.png">
    <img style="height:90px" src="mujib.jpg">
    </figure>
    <h2 style = "color : black; text-align : center"> Government of the People's Republic of Bangladesh </h2>
    <h3 style = "color : black; text-align : center"> Ministry of Health and Family Welfare </h3>
    <h1 style = "color : #00008B; text-align : center"> COVID-19 VACCINATION CARD </h1>
    <table class = "center">
        <tr>
            <th colspan = "2"> <b> Beneficiary Details </b></th>
            <th colspan = "2"> <b> COVID-19 VACCINE FACT </b></th>
        </tr>
        <tr>
            <td>Vaccine card Number:</td>
            <td><?php echo "<b>" . $Vaccine_Card_No . "<b>"?></td>
            <td colspan = "2" rowspan = "5"> <b> 1. Please take your vaccine card with you in your given date. <br>
            2.Getting a COVID-19 vaccination is a safer and more dependable way to build immunity to COVID-19 than getting sick with COVID-19. <br>
            3. You will not die after taking vaccine. Its safe trust me. <br>
            4. COVID-19 vaccines do not create or cause variants of the virus that causes COVID-19. Instead, COVID-19 vaccines can help prevent new variants from emerging. <br>
            5. COVID-19 vaccines do not change or interact with your DNA in any way. <br>
            6. Please give vaccine so that Brac University can take offline classes. I don't want to graduate in online.
            <b></td>
        </tr>
        <tr>
            <td>NID Number:</td>
            <td><?php echo "<b>" . $nid . "<b>"?></td>
        </tr>
        <tr>
            <td>Passport Number:</td>
            <td><?php echo "<b>" . $passport . "<b>"?></td>
            
        </tr>
        <tr>
            <td>Full Name: </td>
            <td><?php echo "<b>" . $userName . "<b>"?></td>
           
        </tr>
        <tr>
            <td>Date of Birth: </td>
            <td><?php echo "<b>" . $date_of_birth . "<b>"?></td>
        </tr>
    </table>
    <h1></h1>
    <style>
        table, th, td {
        border: 1px solid gainsboro;
        border-collapse: collapse;
        }
    </style>
    <table class="center">
        <tr> 
            <th colspan="3"> COVID 19 Vaccine Related Info </th>
        </tr> 
        <tr> 
            <th> <b> Vaccine Dose </b> </th>
            <th> <b> Date </b> </th>
            <th> <b> Signature of Agent </b> </th>
        </tr> 
        <tr> 
            <th> <b>COVID 19 Vaccine <br> 1st Dose <br></b> </th>
            <td> </td> 
            <td> </td> 
        </tr>
        <tr> 
            <th> <b>COVID 19 Vaccine <br> 2nd Dose <br> </b> </th>
            <td> </td> 
            <td> </td> 
        </tr> 
        <tr> 
            <th rowspan = "2"> <b> Vaccine Name, Manufacturer </b> </th>
            <td colspan = "2" > Dose 1: </td>
        </tr> 
        <tr> 
            <td colspan = "2"> Dose 2: </td>
        </tr> 
    </table>
    <p style = "text-align : center">For any further assistance, please visit www.dghs.gov.bd or e-mail: info@dghs.gov.bd</p>
    <image src = "cooperators.jpg" width = "500" height = "115" alt = "Cooperators" class = "center">


</body>
</html>