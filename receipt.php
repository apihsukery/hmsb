<!DOCTYPE html>
<?php
  include('db.php');
  session_start();
  // session_destroy(); 
  // unset($_SESSION);
  $name = $_POST['name1'];
  if($_SESSION['name']!=$name){
    unset($_SESSION);
  }
  $nameProduct = $_POST['name'];
  $price = $_POST['price'];
  $id = $_POST['id'];
  $qty = $_POST['qty'];
  // print_r($_POST);
  // print_r($_POST['price']);

  // echo $price;
  // print_r($_POST['id']);

  // $name = $_POST['name'];
  // $email = $_POST['account'];

// foreach( $id as $key => $n ) {
//   echo "id ".$n."<br>Price ".$price[$key]."<br>nameProduct ".$price[$key]."<br>qty ".$qty[$key]."<br><br>";
// }
// exit;
  $result = mysql_query("SELECT * FROM user WHERE name='$name'" );
  $product = mysql_query("SELECT * FROM product" );
  $product1 = mysql_query("SELECT * FROM product" );
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
      /*background-color: #5cb85c;*/
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header-success {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5cb85c;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
  .modal-header-warning {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #f0ad4e;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-info {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5bc0de;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
  .modal-footer {
      background-color: #f9f9f9;
  }
  .btn-success {
      width: 100%;
      padding: 10px;
  }
  .btn-warning {
      width: 100%;
      padding: 10px;
  }
  .btn-info1 {
      width: 100%;
      padding: 10px;
  }


  /* enable absolute positioning */
.inner-addon { 
    position: relative; 
}

/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }


.center-block {
    float: none;
    margin-left: auto;
    margin-right: auto;
}

.input-group .icon-addon .form-control {
    border-radius: 0;
}

.icon-addon {
    position: relative;
    color: #555;
    display: block;
}

.icon-addon:after,
.icon-addon:before {
    display: table;
    content: " ";
}

.icon-addon:after {
    clear: both;
}

.icon-addon.addon-md .glyphicon,
.icon-addon .glyphicon, 
.icon-addon.addon-md .fa,
.icon-addon .fa {
    position: absolute;
    z-index: 2;
    left: 10px;
    font-size: 14px;
    width: 20px;
    margin-left: -2.5px;
    text-align: center;
    padding: 10px 0;
    top: 1px
}

.icon-addon.addon-lg .form-control {
    line-height: 1.33;
    height: 46px;
    font-size: 18px;
    padding: 10px 16px 10px 40px;
}

.icon-addon.addon-sm .form-control {
    height: 30px;
    padding: 5px 10px 5px 28px;
    font-size: 12px;
    line-height: 1.5;
}

.icon-addon.addon-lg .fa,
.icon-addon.addon-lg .glyphicon {
    font-size: 18px;
    margin-left: 0;
    left: 11px;
    top: 4px;
}

.icon-addon.addon-md .form-control,
.icon-addon .form-control {
    padding-left: 30px;
    float: left;
    font-weight: normal;
}

.icon-addon.addon-sm .fa,
.icon-addon.addon-sm .glyphicon {
    margin-left: 0;
    font-size: 12px;
    left: 5px;
    top: -1px
}

.icon-addon .form-control:focus + .glyphicon,
.icon-addon:hover .glyphicon,
.icon-addon .form-control:focus + .fa,
.icon-addon:hover .fa {
    color: #2580db;
}

.disable {
       pointer-events: none;
       cursor: default;
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
                                    <?php if($rec['gender']=="Male"){?> <img src="img/male.png" class="img-circle" alt="user image"/> <?php } 
                                    else if($rec['gender']=="Female"){ ?>
                                    <img src="img/female.png" class="img-circle" alt="user image"/> 
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
                            <?php if($rec['gender']=="Male"){?> <img src="img/male.png" class="img-circle" alt="user image"/> <?php } 
                    else if($rec['gender']=="Female"){ ?>
                    <img src="img/female.png" class="img-circle" alt="user image"/> 
                    <?php } ?>
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $rec['name'] ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="main.php?name=<?php echo $rec['name'] ?>">
                                <i class="fa fa-laptop"></i> <span>Main</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="" class="disable">
                                <i class="fa fa-ticket"></i> <span>Receipt</span>
                            </a>
                        </li>
<!--                         <li >
                            <a href="">
                                <i class="ion ion-person-add"></i> <span>User Registrations</span>
                            </a>
                        </li> -->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Receipt
                        <!-- <small>#007612</small> -->
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-ticket"></i> Receipt</li>
                        <!-- <li><a href="#">Examples</a></li>
                        <li class="active">Blank page</li> -->
                    </ol>
                </section>

                <div class="pad margin no-print">
                    <div class="alert alert-info" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>Note:</b> Click the print button at the bottom of the receipt to print.
                    </div>
                </div>

                <!-- Main content -->
                <section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Handel Marketing Sdn. Bhd.
                                <small class="pull-right">Date: <?php date_default_timezone_set("Asia/Kuala_Lumpur");
                                echo $date=date("j/m/Y"); ?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong><?php echo $rec['name'] ?></strong><br>
                                <strong>Handel Marketing Sdn. Bhd.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (804) 123-5432<br/>
                                Email: info@almasaeedstudio.com<br/>
                            </address>
                        </div><!-- /.col -->
                        <!-- <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>John Doe</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                Phone: (555) 539-1037<br/>
                                Email: john.doe@example.com
                            </address>
                        </div> --><!-- /.col -->
                        <!-- <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br/>
                            <br/>
                            <b>Order ID:</b> 4F3S8J<br/>
                            <b>Payment Due:</b> 2/22/2014<br/>
                            <b>Account:</b> 968-34567
                        </div> --><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Price(RM)</th>
                                        <th>TEsttttttttttt</th>
                                        <th>Qty</th>
                                        <th>Subtotal(RM)</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                  <?php 
                                    $bil=0;
                                    $total=0;
                                    foreach( $id as $key => $n ) { $bil++; 
                                      
                                      if($qty[$key]>0){?>
                                      <tr>
                                        <td><?php echo $bil ?></td>
                                        <td><?php echo $nameProduct[$key] ?></td>
                                        <td><?php echo number_format($price[$key],2) ?></td>
                                        <td>testttt</td>
                                        <td><?php echo $qty[$key] ?></td>
                                        <td><?php echo number_format(($price[$key]*$qty[$key]),2) ?></td>
                                      </tr>

                                      <?php $total=$total+($price[$key]*$qty[$key]); }

                                    // echo "The name is ".$n." and id is ".$price[$key].", thank you\n";
                                    }

                                  ?> 
                                </tbody>
                            </table>                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">

                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <!-- <p class="lead">Amount Due 2/22/2014</p> -->
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Total(RM):</th>
                                        <td><?php echo number_format($total,2) ?></td>
                                    </tr>
                                    <tr>
                                        <th>GST (6%):</th>
                                        <td><?php echo number_format($total*0.06,2) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Net Total(RM):</th>
                                        <td><?php echo number_format($total*1.06,2) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

</body>
</html>