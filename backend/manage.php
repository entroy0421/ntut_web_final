<!DOCTYPE html>
<?php
require_once('include.php');
?>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
	<meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
	<meta name="author" content="ThemeSelect">
	<title>Dashboard - Chameleon Admin - Modern Bootstrap 4 WebApp & Dashboard HTML Template + UI Kit</title>
	<link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
	<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
	<!-- BEGIN VENDOR CSS-->
	<link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
	<link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
	<!-- END VENDOR CSS-->
	<!-- BEGIN CHAMELEON  CSS-->
	<link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
	<!-- END CHAMELEON  CSS-->
	<!-- BEGIN Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
	<link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
	<link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
	<link rel="stylesheet" type="text/css" href="css/app-lite.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- END Page Level CSS-->
	<!-- BEGIN Custom CSS-->
	<!-- END Custom CSS-->
	<style>
		.modal {
			text-align: center;
			padding: 0 !important;
		}

		.modal:before {
			content: '';
			display: inline-block;
			height: 100%;
			vertical-align: middle;
			margin-right: -4px;
		}

		.modal-dialog {
			display: inline-block;
			text-align: left;
			vertical-align: middle;
		}

		.form-group.required .control-label:after {
			content: "*";
			color: red;
		}
	</style>
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

	<!-- fixed-top-->
	<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
		<div class="navbar-wrapper">
			<div class="navbar-container content">
				<div class="collapse navbar-collapse show" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">
						<li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
						<li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
						<!-- <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
				<ul class="dropdown-menu">
				<li class="arrow_box">
					<form>
					<div class="input-group search-box">
						<div class="position-relative has-icon-right full-width">
						<input class="form-control" id="search" type="text" placeholder="Search here...">
						<div class="form-control-position navbar-search-close"><i class="ft-x">   </i></div>
						</div>
					</div>
					</form>
				</li>
				</ul>
			</li> -->
					</ul>
					<!-- <ul class="nav navbar-nav float-right">         
			<li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>
				<div class="dropdown-menu" aria-labelledby="dropdown-flag">
				<div class="arrow_box"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i> Russian</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
				</div>
			</li>
			</ul> -->
					<ul class="nav navbar-nav float-right">
						<!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
				<div class="dropdown-menu dropdown-menu-right">
				<div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i> Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read Later</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark all Read       </a></div>
				</div>
			</li> -->
						<li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="<?php echo $_SESSION["imageURL"] ?>" alt="avatar"><i></i></span></a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="<?php echo $_SESSION["imageURL"] ?>" alt="avatar"><span class="user-name text-bold-700 ml-1"><?php echo $_SESSION["username"]; ?></span></span></a>
									<div class="dropdown-divider"></div><a class="dropdown-item" href="/backend/logout.php"><i class="la la-sign-out"></i> Logout</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<!-- ////////////////////////////////////////////////////////////////////////////-->


	<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
		<div class="navbar-header">
			<ul class="nav navbar-nav flex-row">
				<li class="nav-item mr-auto"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="Chameleon admin logo" src="theme-assets/images/logo/logo.png" />
						<h3 class="brand-text">Chameleon</h3>
					</a></li>
				<li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
			</ul>
		</div>
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<li class=" nav-item"><a href="index.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
				</li>
				<li class=" nav-item"><a href="manage.php"><i class="la la-users"></i><span class="menu-title" data-i18n="">Manage Users</span></a>
				</li>
				<li class=" nav-item"><a href="post.php"><i class="la la-file-text"></i><span class="menu-title" data-i18n="">Manage Posts</span></a>
				</li>
			</ul>
		</div><a class="btn btn-success btn-block btn-glow btn-upgrade-pro mx-1" href="/index.php" target="_blank">Goto Frontend</a>
		<div class="navigation-background"></div>
	</div>

	<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-wrapper-before"></div>
			<div class="content-header row">
				<div class="content-header-left col-md-4 col-12 mb-2">
					<h3 class="content-header-title">Manage Users</h3>
				</div>
				<div class="content-header-right col-md-8 col-12">
					<div class="breadcrumbs-top float-md-right">
						<div class="breadcrumb-wrapper mr-1">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a>
								</li>
								<li class="breadcrumb-item active">Manage Users
								</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="content-body">
				<!-- Basic Tables start -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title" style="float: left; ">User Management</h4>
								<div style="float: right; cursor: pointer;" class="nav" data-toggle="modal" data-target="#exampleModal"><i class="la la-user-plus"></i></div>
								<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content" style="width: 200%;">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="#" onsubmit="return false">
												<div class="modal-body">
													<div class="form-group required">
														<label for="exampleInputEmail1" class='control-label'>Username</label>
														<input name="username" type="text" class="form-control" id="username" placeholder="Enter Username" required="required">
													</div>
													<div class="form-group required">
														<label for="exampleInputPassword1" class='control-label'>Password</label>
														<input name="password" type="password" class="form-control" id="password" placeholder="Password" required="required">
													</div>
													<div class="form-group required row">

														<label class="control-label col-md-6">Role</label>
														<div class="col-md-6">
															<div class="form-check">
																<input name="isadmin" value="1" class="form-check-input" type="radio" id="admin">
																<label class="form-check-label" for="gridRadios1">
																	Admin
																</label>
															</div>
															<div class="form-check">
																<input name="isadmin" value="0" class="form-check-input" type="radio" id="user">
																<label class="form-check-label" for="gridRadios2">
																	User
																</label>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1" class='control-label'>ImageURL</label>
														<input name="ImageURL" type="text" class="form-control" id="ImageURL" placeholder="ImageURL">
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1" class='control-label'>Description</label>
														<input name="description" type="text" class="form-control" id="description" placeholder="Description">
													</div>
													<!-- <input type="hidden" name="action" value="add_user" id="action"> -->
												</div>
												<div class="modal-footer">
													<button type="submit" onsubmit="return false" class="btn btn-primary" id="add_user">Add User</button>
												</div>
												<script>
													$(document).ready(function() {
														var isadmin = '';
														$("#user").click();

														$("#add_user").on('click', function(event) {
															event.defaultPrevented;
															if ($("#admin").is(':checked')) {
																isadmin = '1'
															} else {
																isadmin = '0';
															}
															$.post("/backend/user.php", {
																username: $("#username").val(),
																password: $("#password").val(),
																isadmin: isadmin,
																ImageURL: $("#ImageURL").val(),
																description: $("#description").val(),
																action: "add_user"
															}, function(response) {
																console.log(response.status);
																if (response.status == "Success") {
																	alert(response.message);
																	document.location.reload(true);
																} else if (response.status == "Error") {
																	alert(response.message);
																}
															}, 'json');
														})
													})
												</script>
											</form>
										</div>
									</div>
								</div>
								<!-- <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
						<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
						<li><a data-action="close"><i class="ft-x"></i></a></li>
					</ul>
				</div> -->
							</div>
							<div class="card-content collapse show">
								<div class="card-body">
									<!-- <p class="card-text">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables. </p>
					<p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> -->
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Username</th>
													<th>Role</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$pdo = get_pdo();
												$res = $pdo->query(sprintf(
													'SELECT * FROM backend_users ORDER BY `isadmin` DESC'
												), PDO::FETCH_ASSOC);
												$rows = $res->fetchAll();

												$i = 1;
												foreach ($rows as $row) {
													$role = "user";
													if ($row["isadmin"] == 1) {
														$role = "admin";
													}

													$userSetting = <<<EOT
													<div style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal_{$row["username"]}"><i class="la la-gear"></i></div>
													<div class="modal fade " id="exampleModal_{$row["username"]}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content" style="width: 200%;">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<form action="#" onsubmit="return false">
																<div class="modal-body">
																	<div class="form-group ">
																		<label for="username" class='control-label'>Username</label>
																		<input name="username" type="text" class="form-control" id="username_{$row["username"]}" value="{$row["username"]}" disabled>
																	</div>
																	<div class="form-group required">
																		<label for="exampleInputPassword1" class='control-label'>Password</label>
																		<input name="password" type="password" class="form-control" id="password_{$row["username"]}" placeholder="Change password" required="required">
																	</div>
																	<div class="form-group required row">

																		<label class="control-label col-md-6">Role</label>
																		<div class="col-md-6">
																			<div class="form-check">
																				<input name="isadmin" value="1" class="form-check-input" type="radio" id="admin_{$row["username"]}">
																				<label class="form-check-label" for="gridRadios1">
																					Admin
																				</label>
																			</div>
																			<div class="form-check">
																				<input name="isadmin" value="0" class="form-check-input" type="radio" id="user_{$row["username"]}">
																				<label class="form-check-label" for="gridRadios2">
																					User
																				</label>
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<label for="exampleInputPassword1" class='control-label'>ImageURL</label>
																		<input name="ImageURL" type="text" class="form-control" id="ImageURL_{$row["username"]}" placeholder="ImageURL" value="{$row["imageURL"]}">
																	</div>
																	<div class="form-group">
																		<label for="exampleInputPassword1" class='control-label'>Description</label>
																		<input name="description" type="text" class="form-control" id="description_{$row["username"]}" placeholder="Description" value="{$row["description"]}">
																	</div>
																	<!-- <input type="hidden" name="action" value="add_user" id="action"> -->
																</div>
																<div class="modal-footer">
																	<button type="submit" onsubmit="return false" class="btn btn-primary" id="edit_user_{$row["username"]}">Edit User</button>
																</div>
																<script>
																$(document).ready(function() {
																	var isadmin = '';
																	$("#user_{$row["username"]}").click();
			
																	$("#edit_user_{$row["username"]}").on('click', function(event) {
																		event.defaultPrevented;
																		if ($("#admin_{$row["username"]}").is(':checked')) {
																			isadmin = '1'
																		} else {
																			isadmin = '0';
																		}
																		$.post("/backend/user.php", {
																			username: $("#username_{$row["username"]}").val(),
																			password: $("#password_{$row["username"]}").val(),
																			isadmin: isadmin,
																			ImageURL: $("#ImageURL_{$row["username"]}").val(),
																			description: $("#description_{$row["username"]}").val(),
																			action: "edit_user"
																		}, function(response) {
																			console.log(response.status);
																			if (response.status == "Success") {
																				alert(response.message);
																				document.location.reload(true);
																			} else if (response.status == "Error") {
																				alert(response.message);
																			}
																		}, 'json');
																	})
																})	
																</script>
																</form>
															</div>
														</div>
													</div>
													EOT;

													echo <<<EOT
														<tr>
															<th scope="row">$i</th>
															<td>{$row["username"]}</td>
															<td>$role</td>
															<td>
															<div class="nav">$userSetting
															<i style="cursor: pointer;" class="la la-times-circle" id="delete_user_{$row["username"]}"></i>
															</div>
															</td>
														</tr>
														<script>
														$("#delete_user_{$row["username"]}").on('click', function(event) {
															event.defaultPrevented;
															if(confirm('Are you sure to delete the user?')) {
															$.post("/backend/user.php", {
																username: "{$row["username"]}",
																action: "delete_user"
															}, function(response) {
																console.log(response.status);
																if (response.status == "Success") {
																	alert(response.message);
																	document.location.reload(true);
																} else if (response.status == "Error") {
																	alert(response.message);
																}
															}, 'json');
														}
														})
														</script>
														EOT;
													$i++;
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Basic Tables end -->
				<!-- Striped rows start -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Usage</h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
										<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
										<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
										<li><a data-action="close"><i class="ft-x"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="card-body">
									<p class="card-text">In this page, admin users are able to create/edit/delete users in the website.</p>
									<p class="card-text"><i class="la la-user-plus"></i> to add user.</p>
									<p class="card-text"><i class="la la-gear"></i> to edit user.</p>
									<p class="card-text"><i class="la la-times-circle"></i> to delete user.</p>
									<p class="card-text"><code>ImageURL</code> and <code>Description</code> are not necessary for <code>user</code> level users.</p>
									<p class="card-text"><code>ImageURL</code> is necessary for <code>admin</code> level users.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Striped rows end -->

				<!-- Table head options start -->

				<!-- Bordered table end -->
			</div>
		</div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////-->


	<footer class="footer footer-static footer-light navbar-border navbar-shadow">
		<div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-right d-block d-md-inline-block">2021 &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank">ThemeSelection</a></span>
			<!-- <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
		<li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More themes</a></li>
		<li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank"> Support</a></li>
		<li class="list-inline-item"><a class="my-1" href="https://themeselection.com/products/chameleon-admin-modern-bootstrap-webapp-dashboard-html-template-ui-kit/" target="_blank"> Purchase</a></li>
		</ul> -->
		</div>
	</footer>

	<!-- BEGIN VENDOR JS-->
	<script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
	<!-- BEGIN VENDOR JS-->
	<!-- BEGIN PAGE VENDOR JS-->
	<!-- END PAGE VENDOR JS-->
	<!-- BEGIN CHAMELEON  JS-->
	<script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
	<script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
	<!-- END CHAMELEON  JS-->
	<!-- BEGIN PAGE LEVEL JS-->
	<!-- END PAGE LEVEL JS-->
</body>

</html>