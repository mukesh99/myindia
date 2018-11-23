<?php
ob_start();
session_start();
require 'dbconnect.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['user_type'] != '0') {
	header("Location: logout.php");
	exit;
}
// select logged in users detail

$sql =("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$res = mysqli_query($conn,$sql);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wizardoutlook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="js/user_detail.js"></script>

   
  <style>
  table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 7px;
}

tr:nth-child(even) {background-color:lightblue!important;}
.table_head{    background: darkblue;color: #fff;font-size: 1.22em;}
.my-new-list{overflow:auto;}
.my-new-list tr th{position:fixed;}
  </style>
 
</head>
<body>
<div class="container-fluid paddLR0">
			<div class="main container paddLR0">
				<div class="row top-bar">
					<div class="col-md-12">
                        <div class="info-login">
                            <div class="head-info-login">
                                <p> 20/07/2018 </p>
                                <span>
                                    <a href="template-register-area.html">Date :</a>
                                </span>
                            </div>
							<div class="head-info-login">
                                <p>20:20:10</p>
                                <span>
                                    <a href="template-register-area.html">Time : </a>
                                </span>
                            </div>
                        </div>
                    </div>
				</div>
				
			</div>
			
			 
			
			
<div class="container-fluid paddLR0 bg-white">	
<div class="container paddLR0">	
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="user.php" class="logo"> <img src="img/wo_logo.png" alt="logo" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
  <!--              <li class="active"><a href="#">First Link</a></li>
                <li><a href="#">Second Link</a></li>
                <li><a href="#">Third Link</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span
                            class="glyphicon glyphicon-user"></span>&nbsp;Logged
                        in: <?php echo $userRow['email']; ?>
                        &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
   
  </div>
</div> 
</div>
<!-- /.dash -->
<section>
            <section class="main-content">
              
               <h3>Dashboard
               </h3>

                     <div class="row">
				  <div class="col-md-12">
					<input type="hidden" id="user_type" value="user" />
                        <div class="panel panel-primary ">
                           <div class="panel-heading text-center"><h2><b>MARKET SCREENER</b></h2>
                              <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                              <em class="fa fa-minus"></em>
                              </a>
                           </div>
						   
                           <div id="tableContentAll">  </div>

						   
						  
                           
                        </div>
                     </div>
				  </div>
				  </div>
                 
               </div>
               
            </section>
         </section>


<!-- /.dash -->
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
		
		document.getElementById("day").innerHTML = mm + '/' + dd + '/' + yyyy;
  </script>
</body>
</html>
