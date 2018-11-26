<?php
ob_start();
session_start();
require 'dbconnect.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
if ($_SESSION['user_type'] != '3') {
	header("Location: logout.php");
	exit;
}
// select logged in users detail

$sql =("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$res = mysqli_query($conn,$sql);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
if($userRow['status'] != 'active'){
	header("Location: logout.php");
	exit;
}
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
  <link href="css/admin-archana.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script src="js/user1.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>

  <style>


tr:nth-child(odd) {background-color: #7f608b66;}
.time{width:5%important;}
.head1{background: #2f6505;color: gold;padding: 0.5em;}
.my-new-list.table-bordered tr th {background: darkkhaki;color: darkred;text-align: center;padding: 0.8em;font-size: 1.2em;}
.table_head{background: darkkhaki;color: darkred;font-size: 1.1em;}
.table_head th{padding:0.8em;}
.panel{margin-top:1em;!important;}
@media screen and (max-width: 600px) {
.logo img {
    width: 15%;
}}
  </style>
 
</head>
<body>
<div class="container-fluid paddLR0">
			
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
            <a href="index.html" class="logo"> <img src="img/wo_logo.png" alt="logo" /></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">First Link</a></li>
                <li><a href="#">Second Link</a></li>
                <li><a href="login_user_display.php">Third Link</a></li>
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

            <section class="main-content user-dashboard">
              
               <h3>Dashboard
               </h3>
               <div class="row-container">				 
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="panel panel-default">
                              <div class="panel-heading">All Markets
                                 <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title="" class="pull-right" data-original-title="Close Panel">
                                 <em class="fa fa-times"></em>
                                 </a>
                                 <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                                 <em class="fa fa-plus"></em>
                                 </a>
                              </div>
                              <div class="panel-wrapper collapse" aria-expanded="false">
                                 <div class="panel panel-default">
                                    <div class="panel-heading">All Markets |
                                       <small>All Availble Markets</small>
                                    </div>
                                    <div class="panel-body">
                                       <div id="datatable1_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="row"><div class="col-xs-6"><div class="dataTables_length" id="datatable1_length"><label><select name="datatable1_length" aria-controls="datatable1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div class="col-xs-6"><div id="datatable1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable1"></label></div></div></div><table id="datatable1" class="table table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">
                                          <thead>
                                             <tr role="row"><th class="tableSmallPad sorting_asc" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Coin: activate to sort column descending" style="width: 0px;">Coin</th><th class="tableSmallPad sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 0px;">Price</th><th class="tableSmallPad sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" aria-label="Vol: activate to sort column ascending" style="width: 0px;">Vol</th><th class="tableSmallPad sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" aria-label="CHG: activate to sort column ascending" style="width: 0px;">CHG</th><th class="tableSmallPad sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 0px;">Name</th></tr>
                                          </thead>
                                          <tbody>
                                                                                          
                                          <tr class="clickable-row odd" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1">
                                                   <!--RADIO 1-->
                                                   <input type="radio" class="radio_item" value="" name="BCH" id="radio1">
                                                   <label class="label_item" for="radio1"> <i class="fa fa-star text-c-blue"></i> </label> BCH
                                                </td>
                                                <td class="tableSmallPad">0.16000009</td>
                                                <td class="tableSmallPad">2967.720</td>
                                                <td class="text-c-blue tableSmallPad">+17.84</td>
                                                <td class="tableSmallPad">Bitcoin Cash</td>
                                             </tr><tr class="clickable-row even" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1"><input type="radio" class="radio_item" value="" name="ETH" id="radio8">
                                                   <label class="label_item" for="radio8"> <i class="fa fa-star text-c-blue"></i> </label> DGB
                                                </td>
                                                <td class="tableSmallPad">0.00000402</td>
                                                <td class="tableSmallPad">90.224</td>
                                                <td class="text-c-blue tableSmallPad">+0.00</td>
                                                <td class="tableSmallPad">DigiByte</td>
                                             </tr><tr class="clickable-row odd" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1"><input type="radio" class="radio_item" value="" name="ETH" id="radio7">
                                                   <label class="label_item" for="radio7"> <i class="fa fa-star text-c-blue"></i> </label> DOGE
                                                </td>
                                                <td class="tableSmallPad">0.00000055</td>
                                                <td class="tableSmallPad">169.631</td>
                                                <td class="text-c-red tableSmallPad">-1.79</td>
                                                <td class="tableSmallPad">Dogecoin</td>
                                             </tr><tr class="clickable-row even" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1"><input type="radio" class="radio_item" value="" name="ETH" id="radio10">
                                                   <label class="label_item" for="radio10"> <i class="fa fa-star text-c-blue"></i> </label> ETH
                                                </td>
                                                <td class="tableSmallPad">0.10039995</td>
                                                <td class="tableSmallPad">2887.720</td>
                                                <td class="text-c-blue tableSmallPad">+1.35</td>
                                                <td class="tableSmallPad">Ethereum</td>
                                             </tr><tr class="clickable-row odd" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1"><input type="radio" class="radio_item" value="" name="ETH" id="radio5">
                                                   <label class="label_item" for="radio5"> <i class="fa fa-star text-c-blue"></i> </label> LTC
                                                </td>
                                                <td class="tableSmallPad">0.01790003</td>
                                                <td class="tableSmallPad">1115.235</td>
                                                <td class="text-c-blue tableSmallPad">+1.58</td>
                                                <td class="tableSmallPad">Litecoin</td>
                                             </tr><tr class="clickable-row even" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1"><input type="radio" class="radio_item" value="" name="ETH" id="radio9">
                                                   <label class="label_item" for="radio9"> <i class="fa fa-star text-c-blue"></i> </label> NXT
                                                </td>
                                                <td class="tableSmallPad">0.00002241</td>
                                                <td class="tableSmallPad">100.305</td>
                                                <td class="text-c-blue tableSmallPad">+2.56</td>
                                                <td class="tableSmallPad">NXT</td>
                                             </tr><tr class="clickable-row odd" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1"><input type="radio" class="radio_item" value="" name="ETH" id="radio6">
                                                   <label class="label_item" for="radio6"> <i class="fa fa-star text-c-blue"></i> </label> SC
                                                </td>
                                                <td class="tableSmallPad">0.00000272</td>
                                                <td class="tableSmallPad">131.014</td>
                                                <td class="text-c-blue tableSmallPad">+1.87</td>
                                                <td class="tableSmallPad">Siacoin</td>
                                             </tr><tr class="clickable-row even" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1"><input type="radio" class="radio_item" value="" name="ETH" id="radio4">
                                                   <label class="label_item" for="radio4"> <i class="fa fa-star text-c-blue"></i> </label> STR
                                                </td>
                                                <td class="tableSmallPad">0.00004322</td>
                                                <td class="tableSmallPad">1196.608</td>
                                                <td class="text-c-red tableSmallPad">-0.05</td>
                                                <td class="tableSmallPad">Stellar</td>
                                             </tr><tr class="clickable-row odd" data-href="index.html" role="row">
                                                <td class="tableSmallPad sorting_1"><input type="radio" class="radio_item" value="" name="ETH" id="radio3">
                                                   <label class="label_item" for="radio3"> <i class="fa fa-star text-c-blue"></i> </label> XRP
                                                </td>
                                                <td class="tableSmallPad">0.00009485</td>
                                                <td class="tableSmallPad">1633.576</td>
                                                <td class="text-c-blue tableSmallPad">+5.10</td>
                                                <td class="tableSmallPad">Ripple</td>
                                             </tr></tbody>
                                       </table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="datatable1_info" role="status" aria-live="polite">Showing 1 to 9 of 9 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_simple_numbers" id="datatable1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" aria-controls="datatable1" tabindex="0" id="datatable1_previous"><a href="javascript:void(0);">Previous</a></li><li class="paginate_button active" aria-controls="datatable1" tabindex="0"><a href="javascript:void(0);">1</a></li><li class="paginate_button next disabled" aria-controls="datatable1" tabindex="0" id="datatable1_next"><a href="javascript:void(0);">Next</a></li></ul></div></div></div></div>
                                    </div>
                                 </div>
                                 <div class="panel-footer">All Markets</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Chart Starts Here -->
					 <div class="row">
					 <div class="col-md-4"><div class="panel panel-default">
                           <div class="panel-heading"><b>Quick Search</b>
                              <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                              <em class="fa fa-minus"></em>
                              </a>
                           </div>
							<img src="img/chat.png" class="img-responsive">
                        </div>
						</div>
					 <div class="col-md-8"><div class="panel panel-default">
                           <div class="panel-heading"><b>AMP Desk Notification ( Auto Information )</b>
                              <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                              <em class="fa fa-minus"></em>
                              </a>
                           </div> <div id="auto" style="font-size: 1em; color: purple; padding:10px; min-height:224px;"></div>


						<script>


						function msg1(){
							http= new XMLHttpRequest();
							http.open("GET","select.php",false);
							http.send(null);
							document.getElementById('auto').innerHTML = http.responseText;
						}
						msg1();
						setInterval(function(){ msg1()},3000);


						</script> 
                        </div></div>
					 </div>
                     <div class="row">
					 <h1 class="head1 text-center"><b>AMP STRATEGY SCANNER</b></h1>
						  <div class="col-md-12"><div class="panel panel-success">
							   <div class="panel-heading text-center"><h4><b>MARKET GENERATED REAL TIME INFO</b></h4>
								  <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
								  <em class="fa fa-minus"></em>
								  </a>
							   </div>  
							   <div id="tableContentAMP">  
							   </div>  
								</div>
							</div>
						</div>

				  
				<div class="row">
					<div class="col-md-12">
                        <div class="panel panel-danger">
                           <div class="panel-heading text-center"><h3><b>MARKET SCREENER</b></h3>
                              <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                              <em class="fa fa-minus"></em>
                              </a>
                           </div>
						   
                           <div id="tableContentAll"></div>
                           
                        </div>
                    </div>
				</div>
				  
				  </div>
                 
               
			   
               
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
