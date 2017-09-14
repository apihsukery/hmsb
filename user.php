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
  $user1 = mysql_query("SELECT * FROM user" );
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
                        <li>
                            <a href="mainAdmin.php?name=<?php echo $rec['name'] ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="product.php?name=<?php echo $rec['name'] ?>">
                                <i class="ion ion-bag"></i> <span>Product Registrations</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="">
                                <i class="ion ion-person-add"></i> <span>User Registrations</span>
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
                        User Registrations
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> Home</li>
                        <li class="active">User Registrations</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-xs-6 col-md-5"></div>
                        <div class="col-xs-6 col-md-2">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <br>
                                    <h3>
                                        <?php 
                                          $bil=0;
                                          while ($rec1 = mysql_fetch_array($user)) { $bil++; } echo $bil-1;?>
                                    </h3>
                                    <p>
                                        Total User<br>Registrations
                                    </p>
                                </div>
                                <br>
                                <div class="icon">
                                    <i class="fa fa-fw fa-users"></i>
                                </div>

                            </div>
                        </div><!-- ./col -->
                        <div class="col-xs-6 col-md-5"></div>
                    </div><!-- /.row -->

                    <div class="col-md-6 col-md-offset-3" >
                        <button type="button" class="btn btn-warning btn-block" style=" height: 50px; " id="myBtn1"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Register New User</button>
                    </div><br>

                    <div class="col-md-6 col-md-offset-3" >

                        <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">List User</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">

                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Password</th>
                                                <th>Date Join</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

                                        <?php 
                                          
                                          while($rec2 = mysql_fetch_array($user1)) { 

                                            if($rec2['name']!="Admin"){ ?>  
                                            <tbody>
                                                <tr>
                                                <td><?php echo $rec2['name'] ?></td>
                                                <td><?php echo $rec2['pass'] ?></td>
                                                <td><?php echo $rec2['dateJoin'] ?></td>
                                                <td width="1">
                                                    <a href="#myModal2" data-toggle="modal" data-id="<?php echo $rec2['id'] ?>" data-name="<?php echo $rec2['name'] ?>" data-pass="<?php echo $rec2['pass'] ?>" data-gender="<?php echo $rec2['gender'] ?>"  class="btn btn-flat" id="myBtn2" title="Edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                </td>
                                                <td width="1">
                                                    <a href="deleteUser.php?id=<?php echo $rec2['id']?>" onClick="return confirm('Are you sure to delete this user?');" class="btn btn-flat" title="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                </td>
                                                </tr>
                                            </tbody>

                                         <?php   } } ?>
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-header-warning" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Register</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
            <form role="form" name="addPekerja" action="addUserProcess.php" method="post" enctype="multipart/form-data">

            <!-- <div class="form-group">
                <div class="icon-addon addon-md">
                    <input type="text" placeholder="No Kad Pengenalan" class="form-control" id="noIC" name="noIC">
                    <label for="noIC" class="glyphicon glyphicon-option-horizontal" rel="tooltip" title="noIC"></label>
                </div>
            </div> -->

            <div class="form-group">
                <div class="icon-addon addon-md">
                    <input type="text" placeholder="Name" class="form-control" id="name" name="name" required>
                    <label for="nama" class="glyphicon glyphicon-user" rel="tooltip" title="nama"></label>
                </div>
            </div>

            <div class="form-group">
                <div class="icon-addon addon-md">
                    <input type="text" placeholder="Password" class="form-control" id="pass" name="pass" required>
                    <label for="pass" class="glyphicon glyphicon-lock" rel="tooltip" title="tel"></label>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="gender" aria-label="Male" Value="Male" required>
                        </span>
                        <input type="text" class="form-control" aria-label="Male" value="Male" readonly>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" name="gender" aria-label="Female" Value="Female" required>
                        </span>
                        <input type="text" class="form-control" aria-label="Female" value="Female" readonly>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><br><br>
            <!-- <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
 -->              <button type="Submit" class="btn btn-warning"><span class="glyphicon glyphicon-plus-sign"></span> Add User</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
          <!-- <p>Not a member? <a href="#">Sign Up</a></p> -->
          <!-- <p>Lupa <a href="#">kata laluan?</a></p> -->
        </div>
      </div>
      </div>
  </div>


  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-header-info" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit User</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" name="editPekerja" action="editUser.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
                <div class="icon-addon addon-md">
                    <input type="text" placeholder="Name" class="form-control" id="name" name="name" required>
                    <label for="name" class="glyphicon glyphicon-user" rel="tooltip" title="name"></label>
                </div>
            </div>

            <div class="form-group">
                <div class="icon-addon addon-md">
                    <input type="text" placeholder="Password" class="form-control" id="pass" name="pass" required>
                    <label for="pass" class="glyphicon glyphicon-lock" rel="tooltip" title="pass"></label>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" id="gender" name="gender" aria-label="Male" Value="Male" required>
                        </span>
                        <input type="text" class="form-control" aria-label="Male" value="Male" disabled>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <input type="radio" id="gender" name="gender" aria-label="Female" Value="Female" required>
                        </span>
                        <input type="text" class="form-control" aria-label="Female" value="Female" disabled>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><br><br>
            <!-- <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
 -->              <button type="Submit" class="btn btn-info btn-info1"><span class="glyphicon glyphicon-floppy-saved"></span> Edit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</button>
          <!-- <p>Not a member? <a href="#">Sign Up</a></p> -->
          <!-- <p>Lupa <a href="#">kata laluan?</a></p> -->
        </div>
      </div>
      
    </div>
  </div>


  <script>
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#myModal1").modal();
    });
});
</script>

<script>
$('#myModal2').on('show.bs.modal', function(e) {
    var name = $(e.relatedTarget).data('name');
    var pass = $(e.relatedTarget).data('pass');
    var id = $(e.relatedTarget).data('id');

    //alert($(e.relatedTarget).data('gambar'));
    //$('#myImg').attr('src', $(this).attr('data-gambar'));
    //$(e.currentTarget).find('input[id="file"]').val(gambar);
    //$(e.currentTarget).find('input[name="gambar"]').val(gambar);
    $(e.currentTarget).find('input[id="id"]').val(id);
    $(e.currentTarget).find('input[id="name"]').val(name);
    $(e.currentTarget).find('input[id="pass"]').val(pass);
    // $(e.currentTarget).find('input[type=radio][id="gender"]').val(gender);
    // $(e.currentTarget).find('select[id="jawatan"]').val(jawatan);
});
</script>

</body>
</html>