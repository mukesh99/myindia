<?php
error_reporting (E_ALL ^ E_NOTICE);
$username="Mahesh657";
$password ="Mahesh@345";
$number=$_POST['mobile'];
$sender="WZINFO";
$rndno=rand(1000, 9999);
$message = urlencode("PIN".$rndno);
if($_POST['submitted']=='true')
{ 
$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo "SMS Result:<br>";
echo $curl_scraped_page = curl_exec($ch);
curl_close($ch); 
}

?>
<?php
ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: dashboard_user.php");
}
include_once 'dbconnect.php';


if (isset($_POST['signup'])) {

    $uname = trim($_POST['uname']); // get posted data and remove whitespace
    $email = trim($_POST['email']);
    $upass = trim($_POST['pass']);
    $mobile = trim($_POST['mobile']);

    // hash password with SHA256;
    $password = hash('sha256', $upass);


// if email is not found add user
        $sql="INSERT INTO users(username,email,password,mobile,pin) VALUES('$uname','$email' ,'$password','$mobile','$rndno' )";
        $user = mysqli_query($conn,$sql);
		//print_r($sql);
		    header("Location: login_reg.php");

		        $user_id = mysqli_insert_id($conn);
        if ($user_id > 0) {
            $_SESSION['user'] = $user_id; // set session and redirect to index page
            if (isset($_SESSION['user'])) {
                print_r($_SESSION);
                header("Location:user.php");
                exit;
            }

        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again";
        }

                header("Location:login_reg.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>abc</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/popup.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script type="text/javascript" src="js/validator.min.js"></script>
   <?php include 'css/css.html'; ?>
</head>

<body onload = "startTime()">

<div class="container-fluid paddLR0">
			<div class="main container paddLR0">
				<div class="row top-bar">
					<div class="col-md-12">
                        <div class="info-login">
                            <div class="head-info-login">
                                <p id="day">21/07/2018 </p>
                                <span>
                                    <a href="template-register-area.html">Date :</a>
                                </span>
                            </div>
							<div class="head-info-login">
                                <p id="text"></p>
                                <span>
                                    <a href="template-register-area.html">Time :</a>
                                </span>
                            </div>
							<span class="text"></span> 
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
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Works</a></li>
            <li><a href="#">News</a></li>
            <li><a class="btn btn-default btn-outline btn-circle" data-toggle="modal" data-target=".login-register-form">Register / Login</a></li>
          </ul>
          
        </div><!-- /.navbar-collapse -->
     
    </nav><!-- /.navbar -->
   </header>
  </div>
</div> 
  
<div class="container-fluid banner paddLR0">
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<h1>Lorem ipsum dolor sit</h1>
			<h4 class="normal-text-w">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci porta, eget porttitor felis suscipit. Sed a nisl ullamcorper, tempus augue at, rutrum lacus. Duis et turpis eros.</h4>
			<h4 class="normal-text-w">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci porta, eget porttitor felis suscipit. Sed a nisl ullamcorper, tempus augue at, rutrum lacus. Duis et turpis eros.</h4>
			<a href="index.html" class="btn btn-custom"><i class="fa fa-line-chart"></i> Market</a>
			<a href="index.html" class="btn btn-custom"><i class="fa fa fa-play"></i> Market</a>
		</div>
		<div class="col-sm-6">
		<!-- login start here -->
		<div id="login-form" class="divbg">
			
        <form method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Register for our Website</h2>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="uname" class="form-control" placeholder="Enter Username" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password"
                               required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile no" required/>
                    </div>
                </div>				

                <div class="checkbox_area">
                    <input type="checkbox" id="TOS" value="This" required>
					
                </div>
				<div class="disarea"><p class="terms"><a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">I agree with terms of service</a></p></label></div>

        <div id="light" class="bright_content">
            <asp:Label ID="lbltext" runat="server" Text="Hey there!"></asp:Label>
            <a class="close" href="javascript:void(0)" onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">x</a>

            <p class="terms">
                <b>CSS Popup Box Responsive</b><br />
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
                The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. 
                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
            </p>
        </div>
                <div class="form-group">
			<input type="hidden" name="submitted" value="true" />
                    <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg">Register</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="login.php" type="button" class="btn btn-block btn-success" name="btn-login">Login</a>
                </div>

            </div>

        </form>
   
    </div>
		<!-- login End here -->
    </div>
</div>
</div>

	<div class="container">
		<div class="row paddTB40" style="margin-top:85px;">
			<div class="col-sm-12">
				<div class="title-box text-center">
					<h5><span class="fa fa-bar-chart color-blue"></span> What We Do</h5>
					<h2 class="text-uppercase">Trade Confidently</h2>
				</div>
			</div>
			<div class="col-lg-8 col-lg-offset-2 text-center">
				<hr class="light">
				<p class="text-faded">
				We provide Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci porta, eget porttitor felis suscipit. Sed a nisl ullamcorper, tempus augue at, rutrum lacus. Duis et turpis eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci porta, eget porttitor felis suscipit. Sed a nisl ullamcorper, tempus augue at, rutrum lacus. Duis et turpis eros.
				</p>
				<div class="row"><a href="index-2.html" class="btn btn-primary">Get Started Now <i class="fa fa-sign-in"></i></a></div>
			</div>
		</div>
	</div>


</div>

<div class="container-fluid paddLR0 bg-white">	
	<div class="container paddTB40">	
		<div class="row paddTB40">
                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <i class="fa fa-money fa-3x color-green"></i>
                   <h3 class="title">Low Fee</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci porta,</p>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <i class="fa fa-lock fa-3x color-green"></i>
                   <h3 class="title">Security</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci porta,</p>
                </div>


                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <i class="fa fa-users fa-3x color-green"></i>
                   <h3 class="title">Experienced Team</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci porta,</p>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                    <i class="fa fa-support fa-3x color-green"></i>
                   <h3 class="title">24/7 Support</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci porta,</p>
                </div>
        </div>
	</div>
</div>

<!-- Login / Register Modal-->
  <div class="container-fluid paddLR0 ">	
	<div class="container paddTB40">
	<div class="row">

                    <div class="col-md-4 col-sm-12">
                        <h3>wizards outlook</h3>
                        <p>Architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel sapien et lacus tempus varius. In finibus lorem vel.</p>

                        <ul class="list-inline social-icons">
                            <li>
                                <a href="javascript:void(0);" class="bg-twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                           
                            <li>
                                <a href="javascript:void(0);" class="bg-linkedin"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="bg-googleplus"><i class="fa fa-google"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="bg-facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6 col-md-offset-2">
                        <h4>Solutions</h4>
                        <ul class="list-unstyled footer-list">
                           <li><a href="#">Fee Info</a></li>
                           <li><a href="#">Start Trading</a></li>
                           <li><a href="#">We are Hiring</a></li>
                           <li><a href="#">Blog Posts</a></li>
                           <li><a href="#">API Docs</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5>Useful Links</h5>
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Help &amp; Support</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
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
								        <div id="fade" class="dark_overlay"></div>

<!-- Login / Register Modal-->
<script src="js/index.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
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
</body>
</html>
