
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $title;?></title>


    <?php
        echo $meta;//place to pass data / plugable hook zone
        Assets::css([
            Url::templatePath('Console').'css/bootstrap.min.css',
            Url::templatePath('Console').'fonts/css/font-awesome.min.css',
            Url::templatePath('Console').'css/animate.min.css',
            Url::templatePath('Console').'css/custom.css',
            Url::templatePath('Console').'css/maps/jquery-jvectormap-2.0.3.css',
            Url::templatePath('Console').'css/icheck/flat/green.css',
            Url::templatePath('Console').'css/floatexamples.css',
            Url::templatePath('Console').'css/maps/jquery-jvectormap-2.0.3.css', 
        ]);
        echo $css; //place to pass data / plugable hook zone
    
    Assets::js([
         Url::templatePath('Console').'js/jquery.min.js',
         Url::templatePath('Console').'js/nprogress.js',
    ]);?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
    <?php
     Assets::js([
         "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js",
         "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"
    ]);?>
	<![endif]-->

</head>


<body class="nav-md">

	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">

					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span><?=SITETITLE . ' '  .$title?></span></a>
					</div>
					<div class="clearfix"></div>

					<!-- menu prile quick info -->
					<div class="profile">
						<div class="profile_pic">
							<img src="<?= Url::templatePath('Console').'images/img.jpg' ?>" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php echo $firstname. " " . $lastname;?></h2>
						</div>
					</div>
					<!-- /menu prile quick info -->

					<br />

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li class="nv active"><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: block;">
                                        <li class="current-page"><a href="/console/">Dashboard</a>
                                        </li>
                                    </ul>
                                </li>
								 <li class="nv active"><a><i class="fa fa-edit"></i> Users <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: block;">
                                        <li class="current-page"><a href="/console/users/">Show All Users</a>
                                        </li>
                                        <li><a href="/console">Add Users</a>
                                        </li>
                                    </ul>
                                </li>
						</div>
                    </div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href='logout'>
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">

				<div class="nav_menu">
					<nav class="" role="navigation">
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>
					</nav>
				</div>

			</div>
			<!-- /top navigation -->

			