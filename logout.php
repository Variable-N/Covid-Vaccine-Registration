<?php 
session_start();


if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	header("Location:login.php");
}else if(isset($_SESSION['agent'])){
	unset($_SESSION['agent']);
	header("Location:agentlogin.php");
}



 ?>