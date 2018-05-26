<?php
	session_start();
	if(isset($_GET['out'])&& isset($_SESSION['iflogin']))
	{
		session_destroy();
		include("login.php");
		exit(0);
	}
	if(isset($_SESSION['iflogin']) && $_SESSION['iflogin'] == 1)
	{
		?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Environment Monitoring System - <?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url(); ?>/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- MAP APIs-->
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=H03aPMgKdFuuSPwHDGDokrsE"></script>
    <script type="text/javascript" src="https://api.map.baidu.com/library/Heatmap/2.0/src/Heatmap_min.js"></script>

	<link rel="SHORTCUT ICON" href="<?php echo base_url(); ?>/img/icon.ico"> 
</head>

<body style="cursor:url('<?php echo base_url(); ?>/img/shubiao.cur'),default;">

    <div id="wrapper">

                <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Environment Monitoring System</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Admin <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?out=1"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
             

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                                <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/pages/view/overview"><i class="fa fa-dashboard fa-fw"></i>  Overview</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/pages/view/realtime"><i class="fa fa-bar-chart-o fa-fw"></i> Real-time Status</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/pages/view/analyze"><i class="fa fa-edit fa-fw"></i> Data Analysis</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/pages/view/aircraft"><i class="fa fa-send fa-fw"></i> Aircraft</a>
                        </li>
                        <!--<li>
                            <a href="<?php echo base_url(); ?>index.php/pages/view/event"><i class="fa fa-sitemap fa-fw"></i> Event List</a>
                        </li>-->
                        <!--
                        <li>
                            <a href="settings.html"><i class="fa fa-wrench fa-fw"></i> Settings</a>
                        </li>
                        -->
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		
		
<?php
	}
	else
	{
		// login
		if(isset($_GET['username']))
		{
			if($_GET['username'] == "admin" && $_GET['password'] == "admin")
			{
				$_SESSION['iflogin'] = 1;
				$str = base_url();
				//echo $str;
				header("Location:".$str); 
			}
			else
			{
				include("logine.php");
				exit(0);
			}
			
		}
		include("login.php");
		exit(0);
	}
?>
