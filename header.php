<?php 
require 'dbconnect.php';



if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['user_type'] != '2') 
{
         echo '<script type="text/javascript"> window.open("logout.php","_self");</script>';            //  On Successful Login redirects to home.php
	exit;
}

$sql = ("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$res = mysqli_query($conn,$sql);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

if($userRow['status'] != 'active'){
         echo '<script type="text/javascript"> window.open("logout.php","_self");</script>';            //  On Successful Login redirects to home.php
	exit;
}

$sql = "SELECT id, username, email, password, usertype, user_permission FROM users where usertype = 0";
$result = mysqli_query($conn,$sql);
?>
 <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
    <title>Wizardoutlook</title>
	<link rel="stylesheet" href="css/index.css">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"/>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet" />
	<link href="css/admin-archana.css" rel="stylesheet" />
	
	<style>
	.logo{width: 95px; height: 49px;}	
	</style>
	
  </head>  
  <body onload="startTime()">
   <nav class="navbar navbar-expand navbar-dark bg-dark static-top dashboard-header">

      <a class="navbar-brand mr-1" href="admin.php"><img src="img/wo_logo.png" alt="logo" class="logo" /></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          
        </div>
      </form>
	<div class="container-fluid">
	<div class="container-fluid paddLR0">
		<div class="row top-bar">
			<div class="col-md-12 paddLR0">
				<div class="info-login">
					<div class="head-info-login">
						<p id="day"> </p>
						<span>
							<a href="#">Date :</a>
						</span>
					</div>
					<div class="head-info-login last">
						<p id="txt"></p>
						<span>
							<a href="#" >Time :</a>
						</span>
						
					</div>
					<span class="text"></span> 
				</div>
			</div>
		</div>
	</div>
</div>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
        
		<li class="email_text"><?php echo $_SESSION['email']; ?></li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php?logout">Logout</a>
          </div>
        </li>
      </ul>

    </nav>
	
 <script>
		  var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();

		if(dd<10) {
			dd = '0'+dd
		} 

		if(mm<10) {
			mm = '0'+mm
		} 

		today = mm + '/' + dd + '/' + yyyy;
		
		document.getElementById("day").innerHTML = dd + '/' + mm + '/' + yyyy;
		

  </script>