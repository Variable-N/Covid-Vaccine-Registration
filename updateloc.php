<!-- For Vaccine Dose 0 -->

<?php session_start();
include("includes/connection.php");

$errors = array('firstdose' => '');
$records = mysqli_query($connect, "select * from user_location");

$data = mysqli_fetch_array($records);

$uname = $_SESSION['user'];

$sql = "select * from user_location where Unq_username ='$uname'";
$records = mysqli_query($connect, $sql) or die(mysqli_error($connect));
$user_data = mysqli_fetch_array($records);

$cnum = $user_data[0];

if (isset($_POST['change'])) {
    $center = $_POST['center'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $str = $_POST['firstdose'];
    if (empty($str)) {
        $errors['firstdose'] = 'No Date Selected !!!!';
    } else {
        $str = explode("/", $str);
        $date = $str[2] . "-" . $str[0] . "-" . $str[1];

        $ddate = date('Y-m-d', strtotime($date . ' + 35 days'));

        $today = date("Y-m-d");

        if ($date < $today) {
            $errors['firstdose'] = 'Preferred 1st Dose Date Not Valid !!!!';
        } else if ($center == "" || $city == "" || $area == "") {
            $errors['firstdose'] = 'Center, City or Area Invalid !!!!';
        } else {

            $edit = mysqli_query($connect, "update user_location set Vaccine_card_no = '$cnum',
    Unq_username = '$uname', Center_Name = '$center', City = '$city', Area = '$area', 
    Selected_date = '$date' WHERE Unq_username = '$uname' ");

            if ($edit) {
                mysqli_close($connect);
                include("includes/header.php");
?>

                <body style='background-color: #ADD8E8'>
                    <div class="container">
                        <div class="col-md-12">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                                    <h3 style="color: #0000CF;">Your Updated First Dose Location:</h3>
                                    New Center: <b> <?php echo $center  ?> </b><br>
                                    New City: <b> <?php echo $city ?></b><br>
                                    New Area: <b><?php echo $area ?></b><br>
                                    New First Dose Date: <b><?php echo $date ?></b><br>
                                    <a href='userDashboard.php'>
                                        <h2 style='text-align:center;padding-top:25px;color: red;font-size:35px;'> Go to User Dashboard </h2>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="" style="margin-top: 30px;"></div>
                </body>
<?php

                // mysqli_close($connect);
                // include("includes/header.php");
                // echo "<h3>Script of new entries:</h3>";
                // echo "New Center: " . "<b>" . $center . "</b>" . '<br>';
                // echo "New City: " . "<b>" . $city . "</b>" . '<br>';
                // echo "New Area: " . "<b>" . $area . "</b>" . '<br>';
                // echo "New First Dose Date: " . "<b>" . $date . "</b>" . '<br>';
                // echo "New Second dose date: " . "<b>" . $ddate . "</b>" . " [35 days after First Dose]" . '<br>';
                // echo "<a href = 'userDashboard.php'> <h2  style='text-align:center;padding-top:25px;color: red;font-size:35px;'> Go to User Dashboard </h2> </a>";
                exit;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Info</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <script>
        var subjectObject = {
            "Dhaka": {
                "Mirpur": ["Mirpur Maternity Hospital", "Mirpur Lalkuthi Hospital ", "Regent Hospital Mirpur"],
                "Uttara": ["Bangladesh Kuwait Moitree Hospital", "Uttara Lalkuthi Hospital"],
                "Mohakhali": ["DNCC Dedicated Covid-19 Hospital", "Labaid Hospital", "Mohakhali Government Hospital"]
            },
            "Chattogram": {
                "Jalalabad": ["Combined Military Hospital", "CCC Covid Hospital"],
                "Momin Road": ["Centre Point Hospital (Pvt) Ltd.", "BNSB General Hospital", "Chittagong Medical College"]
            }
        }
        window.onload = function() {
            var subjectSel = document.getElementById("city");
            var topicSel = document.getElementById("area");
            var chapterSel = document.getElementById("center");
            for (var x in subjectObject) {
                subjectSel.options[subjectSel.options.length] = new Option(x, x);
            }
            subjectSel.onchange = function() {
                chapterSel.length = 1;
                topicSel.length = 1;
                for (var y in subjectObject[this.value]) {
                    topicSel.options[topicSel.options.length] = new Option(y, y);
                }
            }
            topicSel.onchange = function() {
                chapterSel.length = 1;
                var z = subjectObject[subjectSel.value][this.value];
                for (var i = 0; i < z.length; i++) {
                    chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
                }
            }
        }
    </script>

    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
</head>

<body>

    <body style='background-color: #ADD8E8'>
        <?php include("includes/header.php"); ?>

        <div class="container">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                        <form method="post">

                            <?php
                            echo "<h2 
                        <span> <p style='color: green;'class=text-center my-3;'>Change Location and Dates <br> [First Dose]</p>
                            </h2>";
                            ?><br>

                            <?php
                            echo "Your Vaccine Card Number: " . '<b>' . $cnum . '</b>' . '<br>';
                            echo "Your Username: " . '<b>' . $uname . '</b>' . '<br>';
                            ?><br>


                            <label>City: </label>
                            <select name="city" id="city">
                                <option value="" selected="selected">Select city</option>
                            </select>
                            <br>
                            <label>Area: </label>
                            <select name="area" id="area">
                                <option value="" selected="selected">Please select city first</option>
                            </select>
                            <br>
                            <label>Center: </label>
                            <select name="center" id="center">
                                <option value="" selected="selected">Please select area first</option>
                            </select>
                            <br>


                            <?php
                            echo "<br>" . "Today is " . "<b>" . date("d/m/Y") . "</b>" . " (D/M/Y)" . "<br>";
                            echo "Choose a date after this as your preferred date: " . "<b>" . date("d/m/Y") . "</b>" . " (D/M/Y)" . "<br>";
                            ?>
                            <label>Preferred 1st Dose Date</label>
                            <input type="text" id="datepicker" name="firstdose"></p>
                            <h4 class="text-center my-3" style ="color : red;"><?php echo $errors['firstdose']; ?></h4>



                            <input type="submit" name="change" class="btn btn-success" value="Change">
                            <a href='userDashboard.php'>
                                <h2 style='text-align:center;padding-top:25px;color: red;font-size:25px;'> Go to User Dashboard </h2>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="" style="margin-top: 30px;"></div>



    </body>

</html>