<?php
ob_start();
session_start();
require 'dbconnect.php';

echo $_SESSION['user'] . '<br>';

	$id = $_SESSION['user'];
	echo $sql1="UPDATE `users` SET `status` = 'inactive' WHERE `users`.`id` = $id";
	
if(isset($_SESSION['user']) && $_SESSION['user'] != "") {
	echo '<br>This inside';
	$id = $_SESSION['user'];
	$sql1="UPDATE `users` SET `status` = 'inactive' WHERE `users`.`id` = $id";
	//$res1=mysqli_query($conn, $sql1);
}
else
{
	// header("Location: login.php");
}

/* session_destroy();
unset($_SESSION['user']);
unset($_SESSION['user_type']);
exit; */
