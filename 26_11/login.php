<?php
ob_start();
session_start();
require 'dbconnect.php';

// if session is set direct to index

if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $upass = $_POST['pass'];
    $pin = $_POST['pin'];
$active='active';

    $password = hash('sha256', $upass); // password hashing using SHA256
	$sql = "SELECT id, email, password, usertype, pin, status FROM users WHERE email = '$email' AND password = '$password' AND pin = '$pin' ";
	$res = mysqli_query($conn,$sql);
	if(mysqli_num_rows($res) > 0 )
	{
		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
		$_SESSION['user'] = $row['id'];
		$_SESSION['email'] = $row['email'];
		

		if($row['status']==$active)
		{
		echo "<div class='col-sm-12'><h3 class='msg'>you already login to a one system...! Please click <a href='logout.php' >here to Logout</a></h3></div>" ;
		}
		else {
		$sql1="UPDATE `users` SET `status` = 'active' WHERE `users`.`email` = '$email'";
		print_r($sql1);
		mysqli_query($conn, $sql1);
	
		$_SESSION['user_type'] = $row['usertype'];
		
		$utype = $row['usertype'];
		
		if($utype == 2) {
			header("Location: admin.php");
		}
		elseif($utype == 3){
			header("Location: dashboard_user.php");
		}

		else{
			header("Location: user.php");
		}
	

		}
}
	else
	{
		$errMSG = 'The username / password / pin is incorrect!';
	}
$res = mysqli_query($conn,$sql) or die('Query error:');

}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>AMP Scanner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
  <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script type="text/javascript" src="js/validator.min.js"></script>
   <?php include 'css/css.html'; ?>
   <style>
   @media only screen and(max-width:640px)  {
	.divbg{position: static;}
}
	.msg{
    padding: 1em;
    text-align: center;
	position:absolute;
	margin-top:2.3em;
	margin-left:11em;
	z-index:999;}
	.msg a{color:#63c70c;}
   </style>
</head>

<body onload = "startTime()">

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
						<p id="text"></p>
						<span>
							<a href="#">Time :</a>
						</span>
					</div>
					<span class="text"></span> 
				</div>
			</div>
		</div>
	</div>
</div>	
			 
			
			
<div class="container-fluid paddLR0 bg-white">	
<div class="container paddLR0">	
	<header id="header">
	<nav class="navbar navbar-default">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>        
             <a href="index.html" class="logo"> <img src="img/wo_logo.png" alt="logo" /></a>   
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
   <!--         <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Works</a></li>
            <li><a href="#">News</a></li   -->
            <li><a class="btn btn-default btn-outline btn-circle" data-toggle="modal" data-target=".login-register-form">Register / Login</a></li>
          </ul>
          
        </div><!-- /.navbar-collapse -->
     
    </nav><!-- /.navbar -->
   </header>
  </div>
</div> 
  
<div class="container-fluid banner paddLR0">
<div class="container">

		<div class="col-sm-6">
			<h1>The AMP Scanner That Finds More Profitable Trades than You Can On Your Own</h1>
			<h4 class="normal-text-w">Become a better trader faster...The scanner will show you what a good trade setup looks like</h4>
			<h4 class="normal-text-w">The Strategy Scanner makes trading more enjoyable and more profitable by allowing you to spend less time in front of the computer while making more profitable trades. Trade more efficiently and effectively and enjoy the fruits of your trading labor</h4>
			<h4 class="normal-text-w">One of the biggest advantages in trading is to know which way the trend of the market is going.</h4>
			<h4 class="normal-text-w">You can ask the scanner to show you the trend of Future Stocks that are ready to make a move. When you get the scan signal you can entre trade by low risk and high returns in a day trading .This will save you time and frustration in finding good trades.</h4>
			<h4 class="normal-text-w"><b>What is an AMP Stock Scanner?</b></h4>
			<h4 class="normal-text-w">AMP Stock scanners are automated tools that filter through the markets to find stocks that match a pre-selected set of Strategy criteria. It scans can consist of specific price patterns, Scan Signal alters Scanners can be very effective utilizing the speed of technology to provide potential candidates to trade. </h4>
			<h4 class="normal-text-w">AMP Scanner is prime opportunities!</h4>
			<h4 class="normal-text-w"></h4>
			
		<!--	<a href="index.html" class="btn btn-custom"><i class="fa fa-line-chart"></i> Market</a> -->
			<a href="index.html" class="btn btn-custom"><i class="fa fa-line-chart"></i> Market</a>
			<a href="login_user_display.php" class="btn btn-custom"><i class="fa fa-user"></i> Super Admin Market</a>
		</div>
		</hr>
		<div class="col-sm-6">
		<!-- login start here -->
		<div id="login-form" class="divbg">
        <form method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h4 class="login-reg">Login / Register for Market Update:</h4>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-send"></span></span>
                        <input type="text" name="pin" class="form-control" placeholder="PIN" required/>
                    </div>
                </div>				
                <hr/>
              
				
                <div class="loginpge-checkbox">
                   <input type="checkbox" id="disclosure" value="This" required />
					<span class="forgot-pass"><a href="disclaimer.php">Disclosure</a>
					<a href="forgotPassword.php">Forgot password?</a></span>

                </div> 
				<hr/>

              
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="btn-login">Login</button>
                </div>

               

                <div class="form-group">
                    <a href="register.php" type="button" class="btn btn-block btn-reg"
                       name="btn-login">Register</a>
                </div>

            </div>

        </form>
    </div>
		<!-- login End here -->
    </div>
</div>
</div>

	<div class="container">
		<div class="row paddTB40">
			<div class="col-sm-12">
				<div class="title-box text-center">
					<h5><span class="fa fa-bar-chart color-blue"></span> What We Do</h5>
					<h2 class="text-uppercase">Trade Confidently</h2>
					<h3 class="text-uppercase">What is the Goal of Creating a AMP Strategy Scan?</h3>
				</div>
			</div>
			<div class="col-lg-10 col-lg-offset-1 text-center">
				<hr class="light">
				<h4 class="normal-text-w">The goal for creating a scan is to find those few gems that are ripe for high probability trade set-ups. By auto selecting criteria selected By AMP Scan, it can help to filter through the noise detect stocks that are viable for trading. Our scanners have pre-programmed scans that maybe most effective.</h4>
				<div class="row"><a href="index-2.html" class="btn btn-primary">Get Started Now <i class="fa fa-sign-in"></i></a></div>
			</div>
		</div>
	</div>


</div>
<!-- Login / Register Modal-->
  <div class="container-fluid paddLR0 paddLR0-mob">	
	<div class="container paddTB40">
	<div class="row">

                    <div class="col-md-4 col-sm-12">
                        <h3 class="bold">Wizards Outlook</h3>
             <a href="login.html" class="logo"> <img src="img/wo_logo.png" alt="logo" /></a>   
                        <ul class="list-inline social-icons">
                            <li>
                                <a href="https://twitter.com/wizardsoutlook" class="bg-twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                           
                            <li>
                                <a href="javascript:void(0);" class="bg-linkedin"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="bg-googleplus"><i class="fa fa-google"></i></a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/wizardsoutlook/" class="bg-facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <h3 class="bold">Contact us</h3>
                        <ul class="list-unstyled footer-list">
                           <li><a href="info@wizardsoutlook.com"><span class="glyphicon glyphicon-envelope"></span> info@wizardsoutlook.com</a></li>
                           <li><a href="sales@wizardsoutlook.com"><span class="glyphicon glyphicon-envelope"></span> sales@wizardsoutlook.com</a></li>
                           <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> mobile:+9177600 70009</a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <h3 class="bold">Useful Links</h3>
                        <ul class="list-unstyled footer-list">
                            <li><a href="http://wizardsoutlook.com/">About Us</a></li>
                            <li><a href="http://wizardsoutlook.com/contact-us/">Help &amp; Support</a></li>
                            <li><a href="http://wizardsoutlook.com/privacy-policy/">Privacy Policy</a></li>
                            <li><a href="http://wizardsoutlook.com/terms-conditions/">Terms &amp; Conditions</a></li>
                            <li><a href="http://wizardsoutlook.com/refund-and-cancellation-policy/">Refund And Cancellation Policy</a></li>
                            <li><a href="disclaimer.php">Disclaimer/Disclosures</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>

                </div>

	</div>
	</div>
<!-- Login / Register Modal-->
<div class="modal fade login-register-form" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </button>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#login-form"> Login <span class="glyphicon glyphicon-user"></span></a></li>
                                            <li><a data-toggle="tab" href="#registration-form"> Register <span class="glyphicon glyphicon-pencil"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tab-content">
                                            <div id="login-form" class="tab-pane fade in active">
                                                <form action="/">
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pwd">Password:</label>
                                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="remember"> Remember me</label>
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Login</button>
                                                </form>
                                            </div>
                                            <div id="registration-form" class="tab-pane fade">
                                                <form action="/">
                                                    <div class="form-group">
                                                        <label for="name">Your Name:</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newemail">Email:</label>
                                                        <input type="email" class="form-control" id="newemail" placeholder="Enter new email" name="newemail">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="newpwd">Password:</label>
                                                        <input type="password" class="form-control" id="newpwd" placeholder="New password" name="newpwd">
                                                    </div>
                                                    <button type="submit" class="btn btn-default">Register</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
<!--                                    <div class="modal-footer">-->
<!--                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
<!-- Login / Register Modal-->
<script src="js/index.js"></script>
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
