<?php
	include 'conn.php';
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EDWS- Service Oriented Architecture</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstraps/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstraps/css/sweetalert.css" rel="stylesheet">
    <link href="bootstraps/css/acordion.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="bootstraps/css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstraps/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<div id="skipnav"><a href="#maincontent">Skip to main content</a></div>

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">EDWS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Login</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">API-Documentation</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="bootstraps/img/edws.ico" alt="">
                    <div class="intro-text">
                        <h1 class="name">About Food</h1>
                        <hr class="star-light">
                        <span class="skills">EDWS API</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" style="background-color:#ECECEA">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Login</h2>
                    <hr class="star-primary">
                </div>
            </div>
			<div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentLogin" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" placeholder="Username" id="username" required data-validation-required-message="Please enter your username.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Please enter your password.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <!--<div id="success"></div>-->
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" onclick="ceklogin()" class="btn btn-success btn-lg">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="bootstraps/img/portfolio/cabin.png" class="img-responsive" alt="Cabin">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="bootstraps/img/portfolio/cake.png" class="img-responsive" alt="Slice of cake">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="bootstraps/img/portfolio/circus.png" class="img-responsive" alt="Circus tent">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="bootstraps/img/portfolio/game.png" class="img-responsive" alt="Game controller">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="bootstraps/img/portfolio/safe.png" class="img-responsive" alt="Safe">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="bootstraps/img/portfolio/submarine.png" class="img-responsive" alt="Submarine">
                    </a>
                </div>
            </div>-->
        </div>
    </section>

    <!-- About Section -->
    <section class="portfolio" id="about" style="background-color:#FDF3E7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>API-Documentation</h2>
                    <hr class="star-light">
                </div>
            </div>
			<div class="col-lg-6 col-lg-offset-0">
				<button type='button' class='accordion' onclick='acor()'>Find All Restaurant</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Find All Restaurant</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/findAll <b><i>(GET)</i></b></thead>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1">
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('Semua Resto')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion' onclick='acor()'>Find Restaurant By Id</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Find Restaurant By Id</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/findById/{id} <b><i>(GET)</i></b></thead>
								</tr>
								<tr>
									<td>Attribute</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>id</td>
									<td>5 (Recommended)</td>
								</tr>
							</table>
							<form name="sentresto" id="contactForm" novalidate>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="restoid">Restaurant ID</label>
										<input type="text" class="form-control" placeholder="Restaurant ID" id="restoid">

									</div>
								</div>
							</form>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('Resto By Id')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion' onclick='acor()'>Find Restaurant Rating By Id</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Restaurant Rating By Id</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/rating/{id} <b><i>(GET)</i></b></thead>
								</tr>
								<tr>
									<td>Attribute</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>id</td>
									<td>5 (Recommended)</td>
								</tr>
							</table>
							<form name="sentresto" id="contactForm" novalidate>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="restoid">Restaurant ID</label>
										<input type="text" class="form-control" placeholder="Restaurant ID" id="restoid1">

									</div>
								</div>
							</form>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('Resto Rating By Id')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion' onclick='acor()'>Find Restaurant</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Find Restaurant</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/findRestaurant <b><i>(GET)</i></b> <br>NOT ALL DATA MUST BE FILLED</thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>name</td>
									<td>Depot 52 (Recommended)</td>
								</tr>
								<tr>
									<td>latitude</td>
									<td>12.45 (Recommended)</td>
								</tr>
								<tr>
									<td>longitude</td>
									<td>15.45 (Recommended)</td>
								</tr>
								<tr>
									<td>time_now</td>
									<td>08:00:00 (Recommended)</td>
								</tr>
							</table>
							<form name="sentresto" id="contactForm" novalidate>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="Name">Name</label>
										<input type="text" class="form-control" placeholder="Name" id="nameresto">

									</div>
								</div>

								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="latitude">Latitude</label>
										<input type="text" class="form-control" placeholder="Latitude" id="latituderesto">

									</div>
								</div>

								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="longitude">Longitude</label>
										<input type="text" class="form-control" placeholder="Longitude" id="longituderesto">

									</div>
								</div>

								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="timenow">Time Now</label>
										<input type="text" class="form-control" placeholder="Time Now" id="timenowresto">
										<p class="help-block text-danger"></p>
									</div>
								</div>
							</form>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('findrestaurant')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion' onclick='acor()'>Find Restaurant By Menu</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Find Restaurant By Menu</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/findByMenu <b><i>(GET)</i></b><br>NOT ALL DATA MUST BE FILLED</thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>menuName</td>
									<td>Nasi Ayam Bacem (Recommended)</td>
								</tr>
								<tr>
									<td>minPrice</td>
									<td>10000 (Recommended)</td>
								</tr>
								<tr>
									<td>maxPrice</td>
									<td>20000 (Recommended)</td>
								</tr>
							</table>
							<form name="sentresto" id="contactForm" novalidate>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="menuName">Menu Name</label>
										<input type="text" class="form-control" placeholder="Menu Name" id="menuname">

									</div>
								</div>

								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="minprice">Minimal Price</label>
										<input type="text" class="form-control" placeholder="Minimal Price" id="minprice">

									</div>
								</div>

								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="maxprice">Maximal Price</label>
										<input type="text" class="form-control" placeholder="Maximal Price" id="maxprice">

									</div>
								</div>
							</form>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('findbymenu')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion' onclick='acor()'>Find Restaurant Near By</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Find Restaurant Near By</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/findNearbyRestaurant <b><i>(GET)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>latitudeHere</td>
									<td>12.45 (Recommended)</td>
								</tr>
								<tr>
									<td>longitudeHere</td>
									<td>15.45 (Recommended)</td>
								</tr>
							</table>
							<form name="sentresto" id="contactForm" novalidate>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="latitude">Latitude</label>
										<input type="text" class="form-control" placeholder="Latitude" id="latituderesto1">

									</div>
								</div>

								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="longitude">Longitude</label>
										<input type="text" class="form-control" placeholder="Longitude" id="longituderesto1">

									</div>
								</div>
							</form>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('findnearby')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion' onclick='acor()'>Rate Restaurant by User</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Rate Restaurant by User</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/rate <b><i>(POST)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>USER_NO</td>
									<td>Your User id</td>
								</tr>
								<tr>
									<td>RESTAURANT_NO</td>
									<td>Restaurant Id that You Want to Rate</td>
								</tr>
								<tr>
									<td>RATE</td>
									<td>Your Restaurant Rate</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('rate')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion' onclick='acor()'>Register Restaurant</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Register Restaurant</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/register <b><i>(POST)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>TIME_OPEN_MONDAY</td>
									<td>Restaurant Open Time in Monday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_MONDAY</td>
									<td>Restaurant Close Time in Monday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_TUESDAY</td>
									<td>Restaurant Open Time in Tuesday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_TUESDAY</td>
									<td>Restaurant Close Time in Tuesday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_WEDNESDAY</td>
									<td>Restaurant Open Time in Wednesday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_WEDNESDAY</td>
									<td>Restaurant Close Time in Wednesday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_THURSDAY</td>
									<td>Restaurant Open Time in Thursday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_THURSDAY</td>
									<td>Restaurant Close Time in Thursday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_FRIDAY</td>
									<td>Restaurant Open Time in Friday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_FRIDAY</td>
									<td>Restaurant Close Time in Friday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_SATURDAY</td>
									<td>Restaurant Open Time in Saturday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_SATURDAY</td>
									<td>Restaurant Close Time in Saturday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_SUNDAY</td>
									<td>Restaurant Open Time in Sunday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_SUNDAY</td>
									<td>Restaurant Close Time in Sunday</td>
								</tr>
								<tr>
									<td>NAME</td>
									<td>Your Restaurant Name</td>
								</tr>
								<tr>
									<td>ADDRESS</td>
									<td>Your Restaurant Address</td>
								</tr>
								<tr>
									<td>PHONE</td>
									<td>Your Restaurant Phone</td>
								</tr>
								<tr>
									<td>EMAIL</td>
									<td>Your Restaurant Email</td>
								</tr>
								<tr>
									<td>TIME_OPEN</td>
									<td>Your Restaurant Time Open Id</td>
								</tr>
								<tr>
									<td>LATITUDE</td>
									<td>Your Restaurant Latitude</td>
								</tr>
								<tr>
									<td>LONGITUDE</td>
									<td>Your Restaurant Longitude</td>
								</tr>
								<tr>
									<td>BIO</td>
									<td>Your Restaurant Bio</td>
								</tr>
								<tr>
									<td>USERNAME</td>
									<td>Your Restaurant Username</td>
								</tr>
								<tr>
									<td>PASSWORD</td>
									<td>Your Restaurant Password</td>
								</tr>
								<tr>
									<td>STATUS</td>
									<td>Your Restaurant Status</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('Register Restaurant')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<button type='button' class='accordion' onclick='acor()'>Update Restaurant</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Update Restaurant</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/update/{id} <b><i>(PUT)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>NAME</td>
									<td>Your Restaurant Name</td>
								</tr>
								<tr>
									<td>ADDRESS</td>
									<td>Your Restaurant Address</td>
								</tr>
								<tr>
									<td>PHONE</td>
									<td>Your Restaurant Phone</td>
								</tr>
								<tr>
									<td>EMAIL</td>
									<td>Your Restaurant Email</td>
								</tr>
								<tr>
									<td>LATITUDE</td>
									<td>Your Restaurant Latitude</td>
								</tr>
								<tr>
									<td>LONGITUDE</td>
									<td>Your Restaurant Longitude</td>
								</tr>
								<tr>
									<td>BIO</td>
									<td>Your Restaurant Bio</td>
								</tr>
								<tr>
									<td>USERNAME</td>
									<td>Your Restaurant Username</td>
								</tr>
								<tr>
									<td>PASSWORD</td>
									<td>Your Restaurant Password</td>
								</tr>
								<tr>
									<td>STATUS</td>
									<td>Your Restaurant Status</td>
								</tr>
								<tr>
									<td>TIME_OPEN_MONDAY</td>
									<td>Restaurant Open Time in Monday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_MONDAY</td>
									<td>Restaurant Close Time in Monday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_TUESDAY</td>
									<td>Restaurant Open Time in Tuesday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_TUESDAY</td>
									<td>Restaurant Close Time in Tuesday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_WEDNESDAY</td>
									<td>Restaurant Open Time in Wednesday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_WEDNESDAY</td>
									<td>Restaurant Close Time in Wednesday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_THURSDAY</td>
									<td>Restaurant Open Time in Thursday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_THURSDAY</td>
									<td>Restaurant Close Time in Thursday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_FRIDAY</td>
									<td>Restaurant Open Time in Friday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_FRIDAY</td>
									<td>Restaurant Close Time in Friday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_SATURDAY</td>
									<td>Restaurant Open Time in Saturday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_SATURDAY</td>
									<td>Restaurant Close Time in Saturday</td>
								</tr>
								<tr>
									<td>TIME_OPEN_SUNDAY</td>
									<td>Restaurant Open Time in Sunday</td>
								</tr>
								<tr>
									<td>TIME_CLOSE_SUNDAY</td>
									<td>Restaurant Close Time in Sunday</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('Update Restaurant')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<button type='button' class='accordion' onclick='acor()'>Restaurant Login</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Restaurant Login</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/restaurant/login <b><i>(POST)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>username</td>
									<td>Your Username</td>
								</tr>
								<tr>
									<td>password</td>
									<td>Your Username</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#7e4910;" onclick="callreq('Restaurant Login')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<button type='button' class='accordion2' onclick='acor()'>Find All Menu</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Find All Menu</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/menu/findAll <b><i>(GET)</i></b></thead>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#07d65e;" onclick="callreq('Semua Menu')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<button type='button' class='accordion2' onclick='acor()'>Register Menu</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Register Menu</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/menu/register <b><i>(POST)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>NAME</td>
									<td>Your Menu Name</td>
								</tr>
								<tr>
									<td>PRICE</td>
									<td>Your Menu Price</td>
								</tr>
								<tr>
									<td>RECOMMENDED</td>
									<td>Your Menu Recommended Value</td>
								</tr>
								<tr>
									<td>RESTAURANT_NO</td>
									<td>Which Restaurant Id You Want to Add</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#07d65e;" onclick="callreq('Register Menu')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<button type='button' class='accordion2' onclick='acor()'>Update Menu</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Update Menu</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/menu/update/{id} <b><i>(PUT)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>NAME</td>
									<td>Your Menu Name</td>
								</tr>
								<tr>
									<td>PRICE</td>
									<td>Your Menu Price</td>
								</tr>
								<tr>
									<td>RECOMMENDED</td>
									<td>Your Menu Recommended Value</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#07d65e;" onclick="callreq('Update Menu')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<button type='button' class='accordion2' onclick='acor()'>Delete Menu</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Delete Menu</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/menu/delete/{id} <b><i>(DELETE)</i></b></thead>
								</tr>
								<tr>
									<td>Attribute</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>id</td>
									<td>Your Menu Id</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#07d65e;" onclick="callreq('Delete Menu')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<button type='button' class='accordion1' onclick='acor()'>Find User By Id</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Find User By Id</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/user/findById/{id} <b><i>(GET)</i></b></thead>
								</tr>
								<tr>
									<td>Attribute</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>id</td>
									<td>4 (Recommended)</td>
								</tr>
							</table>
							<form name="sentresto" id="contactForm" novalidate>
								<div class="row control-group">
									<div class="form-group col-xs-12 floating-label-form-group controls">
										<label for="userid">User ID</label>
										<input type="text" class="form-control" placeholder="User ID" id="userid">

									</div>
								</div>
							</form>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#3760b2;" onclick="callreq('User By Id')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion1' onclick='acor()'>Find All User</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Find All User</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/user/findAll <b><i>(GET)</i></b></thead>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#3760b2;" onclick="callreq('Semua User')" class="btn btn-success btn-lg">Send Request</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type='button' class='accordion1' onclick='acor()'>Register User</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Register User</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/user/register <b><i>(POST)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>NAME</td>
									<td>Your Name</td>
								</tr>
								<tr>
									<td>ADDRESS</td>
									<td>Your ADDRESS</td>
								</tr>
								<tr>
									<td>PHONE</td>
									<td>Your PHONE</td>
								</tr>
								<tr>
									<td>DOB</td>
									<td>Your DOB</td>
								</tr>
								<tr>
									<td>EMAIL</td>
									<td>Your EMAIL</td>
								</tr>
								<tr>
									<td>GENDER</td>
									<td>Your GENDER</td>
								</tr>
								<tr>
									<td>USERNAME</td>
									<td>Your USERNAME</td>
								</tr>
								<tr>
									<td>PASSWORD</td>
									<td>Your PASSWORD</td>
								</tr>
								<tr>
									<td>STATUS</td>
									<td>Your STATUS</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#3760b2;" onclick="callreq('Register User')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<button type='button' class='accordion1' onclick='acor()'>Update User</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>Update User</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/user/update/{id} <b><i>(PUT)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>NAME</td>
									<td>Your Name</td>
								</tr>
								<tr>
									<td>ADDRESS</td>
									<td>Your ADDRESS</td>
								</tr>
								<tr>
									<td>PHONE</td>
									<td>Your PHONE</td>
								</tr>
								<tr>
									<td>DOB</td>
									<td>Your DOB</td>
								</tr>
								<tr>
									<td>EMAIL</td>
									<td>Your EMAIL</td>
								</tr>
								<tr>
									<td>GENDER</td>
									<td>Your GENDER</td>
								</tr>
								<tr>
									<td>USERNAME</td>
									<td>Your USERNAME</td>
								</tr>
								<tr>
									<td>PASSWORD</td>
									<td>Your PASSWORD</td>
								</tr>
								<tr>
									<td>STATUS</td>
									<td>Your STATUS</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#3760b2;" onclick="callreq('Update User')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<button type='button' class='accordion1' onclick='acor()'>User Login</button><div class='panel'>
					<div class="row">
						<div class="col-lg-12 text-left">
							<h3>User Login</h3>
							<!--<hr class="star-light">-->
							<table class="table">
								<tr>
									<thead>URL : localhost/edws-master/user/login <b><i>(POST)</i></b></thead>
								</tr>
								<tr>
									<td>Parameter</td>
									<td>Value</td>
								</tr>
								<tr>
									<td>username</td>
									<td>Your Username</td>
								</tr>
								<tr>
									<td>password</td>
									<td>Your Username</td>
								</tr>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-10 col-lg-offset-1" >
								<div class="row">
									<div class="col-xs-12">
										<button type="submit" style="background-color:#3760b2;" onclick="callreq('User Login')" class="btn btn-success btn-lg">See Example</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>



			<div class="col-lg-6 col-lg-offset-0" style="background-color:black;">
				<div class="row">
					<div class="col-lg-12 text-left">
						<h3>Request Result</h3>
						<!--<hr class="star-light">-->
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-12 floating-label-form-group controls">
						<textarea class="col-lg-12" style="height:1250px;" id="result1" placeholder="Request Result" readonly=""></textarea>
					</div>
				</div>

			</div>

        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" style="background-color:#ECECEA">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Register</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentRegister" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="usernamereg">Username</label>
                                <input type="text" class="form-control" placeholder="Username" id="usernamereg" required data-validation-required-message="Please enter your username.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="passwordreg">Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="passwordreg" required data-validation-required-message="Please enter your password.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <!--<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>-->
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" onclick="buatuser()" class="btn btn-success btn-lg">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; EDWS 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="bootstraps/vendor/jquery/jquery.min.js"></script>
    <script src="bootstraps/js/register.js"></script>
    <script src="bootstraps/js/login.js"></script>
    <script src="bootstraps/js/curltest.js"></script>
    <script src="bootstraps/js/sweetalert.min.js"></script>
    <script src="bootstraps/js/sweetalert-dev.js"></script>
    <script src="bootstraps/js/acordion.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstraps/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="bootstraps/js/jqBootstrapValidation.js"></script>
    <script src="bootstraps/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="bootstraps/js/freelancer.min.js"></script>

</body>

</html>
