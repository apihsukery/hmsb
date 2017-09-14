<!DOCTYPE html>
<?php
  include('db.php');
  session_start();
  // session_destroy(); 
  // unset($_SESSION);
  $name = $_GET['name'];
  if($_SESSION['name']!=$name){
    unset($_SESSION);
  }
  $result = mysql_query("SELECT * FROM user WHERE name='$name'" );
  $user = mysql_query("SELECT * FROM user" );
  $product = mysql_query("SELECT * FROM product" );
  //$result = mysql_query($query) or die("Query failed");
  $rec = mysql_fetch_array($result);
  if (!$_SESSION['name']) {
    $loginError = "You are not logged in.";
    header("location:index.php");
  }
?>
<html lang="en">
<head>
  <title>Handel Marketing Sdn Bhd</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

  <style>
  .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  .btn-success {
      width: 100%;
      padding: 10px;
  }
  </style>

</head>
<body class="skin-blue">
<header class="header">
            <a href="mainAdmin.php?name=<?php echo $rec['name'] ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Handel Marketing
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $rec['name'] ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <?php if($rec['name']=="Admin"){?> <img src="img/avatar5.png" class="img-circle" alt="user image"/> <?php } 
                                    else if($rec['name']!="Admin"){ ?>
                                    <img src="img/male.png" class="img-circle" alt="user image"/> 
                                    <?php } ?>
                                    <p>
                                        <?php echo $rec['name'] ?>
                                        <small>Member since <?php echo $rec['dateJoin'] ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


<div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <!-- <img src="img/avatar3.png" class="img-circle" alt="User Image" /> -->
                            <?php if($rec['name']=="Admin"){?> <img src="img/avatar5.png" class="img-circle" alt="user image"/> <?php } 
                    else if($rec['name']!="Admin"){ ?>
                    <img src="img/male.png" class="img-circle" alt="user image"/> 
                    <?php } ?>
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $rec['name'] ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                      <div class="col-lg-3 col-xs-6"></div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                          $bil=0;
                                          while ($rec4 = mysql_fetch_array($product)) { $bil++; } echo $bil;?>
                                    </h3>
                                    <p>
                                        Product Registrations
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="product.php?name=<?php echo $rec['name'] ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                          $bil=0;
                                          while ($rec1 = mysql_fetch_array($user)) { $bil++; } echo $bil-1;?>
                                    </h3>
                                    <p>
                                        User Registrations
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="user.php?name=<?php echo $rec['name'] ?>" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6"></div>
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

</body>
</html>
