<!DOCTYPE html>
<?php
  include('db.php');
  session_start();
  // session_destroy(); 
  // unset($_SESSION);
  $name = $_GET['name'];
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


<script type="text/javascript">

function calculateTotal(id){
  var noItem = parseInt(document.calc.noItem.value);

  // var price;
  //   var qty;
    var result = parseFloat(0);
    // alert("haha");

  for (var i = 0; i < noItem; i++) { 
    var price = parseFloat(document.calc.price[i].value);
    var qty = document.calc.qty[i].value;
    if(qty == ""){
        qty = parseFloat(0);
    }
    else{
        parseFloat(document.calc.qty[i].value);
    }
    result = result + (price*qty);
    // alert(result);
  }
  var total = result*1.06;
  document.querySelector('.results').innerHTML = total.toFixed(2);
}

</script>

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
                        <li class="active">
                            <a href="">
                                <i class="fa fa-laptop"></i> <span>Main</span>
                            </a>
                        </li>
                        <li>
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
                        Main Page
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-laptop"></i> Main Page</li>
                        <!-- <li class="active">User Registrations</li> -->
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-xs-6 col-md-5"></div>
                        <div class="col-xs-6 col-md-2">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <sup style="font-size: 20px">RM</sup><div class="results">0.00</div>
                                    </h3>
                                    <p>
                                        Net Total
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <a href="javascript:;" onclick="document.getElementById('calc').submit();" class="small-box-footer">
                                <!-- <a href="#" class="small-box-footer"> -->
                                    Print Receipt <i class="fa fa-print"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-xs-6 col-md-5"></div>
                    </div><!-- /.row -->

                   <!--  <div class="col-md-6 col-md-offset-3" >
                        <button type="button" class="btn btn-warning btn-block" style=" height: 50px; " id="myBtn1"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Register New User</button>
                    </div><br> -->

                    <div class="col-md-6 col-md-offset-3" >

                        <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Our Product</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <form name="calc" id="calc" action="receipt.php" method="POST">
                                        <input type="hidden" name="name1" value="<?php echo $rec['name'] ?>">
                                    <table id="example2" class="table table-bordered table-hover">

                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>price(RM)</th>
                                                <th>Qty</th>
                                            </tr>
                                        </thead>

                                        <?php 
                                          $no=0;
                                          while($rec2 = mysql_fetch_array($product1)) { ?>


                                            <tbody>
                                                <tr>
                                                <td><input type="hidden" name="id[]" value="<?php echo $rec2['id'] ?>"><input type="hidden" name="name[]" value="<?php echo $rec2['name'] ?>"><?php echo $rec2['name'] ?></td>
                                                <td><?php echo number_format($rec2['price'],2) ?></td>
                                                <td width="1">
                                                    <input type="hidden" name="price[]" id="price" onchange="calculateTotal(this.id)" value="<?php echo $rec2['price'] ?>" readonly><input type="number" name="qty[]" id="qty" value="0" onchange="calculateTotal(this.id)">
                                                </td>
                                                </tr>
                                            </tbody>

                                         <?php  $no++;  } ?>
                                         
                                         <input type="hidden" name="noItem" id="noItem" value="<?php echo $no ?>" onchange="calculateTotal(this.id)">
                                        
                                        <!-- <tr>
                                         <td colspan="3">Total:<input type="type" name="total" id="total" value="0" onchange="calculateTotal(this.id)"></td>
                                        </tr> -->
                                    </table>
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

</body>
</html>