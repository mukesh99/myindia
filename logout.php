<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
	session_destroy();
	exit;
} else if (isset($_SESSION['user']) != "") {
    header("Location: login.php");
	session_destroy();
	exit;
}

if (isset($_GET['logout'])) {
	//$inactive='inactive';
		$sql1="UPDATE `users` SET `status` = 'inactive' WHERE `users`.`id` = '$_SESSION['user']'";
		$res1=mysqli_query($conn, $sql1);
    session_destroy();
    unset($_SESSION['user']);
	unset($_SESSION['user_type']);
   // header("Location: login.php");
    exit;
}
