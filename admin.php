<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>HOTEL Feedback - <?php require('get_title.php'); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <!-- Ionicons 2.0.0 --> 
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>HOTEL </b>Feedback</a>
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['fullname']; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
            <li class="treeview <?php if(!isset($_GET['page'])) { echo "active"; } ?>">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="treeview <?php if(isset($_GET['page']) && ($_GET['page'] == "hotel_data" || $_GET['page'] == "hotel_add")) { echo "active"; } ?>">
              <a href="admin.php?page=hotel_data">
                <i class="fa fa-file"></i> <span>Hotel List</span> 
              </a>
            </li>
            <li class="treeview <?php if(isset($_GET['page']) && $_GET['page'] == "profile_data") { echo "active"; } ?>">
              <a href="admin.php?page=profile_data">
                <i class="fa fa-user"></i> <span>User Profile</span> 
              </a>
            </li>
            
            <?php if(!isset($_SESSION['username'])): ?>
              <li class="treeview">
                <a href="login.php">
                  <i class="fa fa-lock"></i> <span>Login</span> 
                </a>
              </li>
            <?php else: ?>
              <li class="header">MENU ADMIN</li>
              <li class="<?php if(isset($_GET['page']) && ($_GET['page'] == "user_data" || $_GET['page'] == "user_add")) { echo "active"; } ?>">
              <a href="admin.php?page=user_data"><i class="fa fa-user text-warning"></i> User Management</a></li>
              <li class="treeview">
                <a href="logout.php">
                  <i class="fa fa-backward text-danger"></i> <span>Log Out</span> 
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?php require_once('get_title.php'); ?>
          </h1>
        </section>

        <section class="content">
          <?php 
            if (!isset($_GET['page'])) {
              require_once('info.php');
            }
          ?>

          <div class="row">
            <section class="col-lg-12">
              <?php require_once('views.php'); ?>
            </section>
          </div>
        </section><!-- /. Main content -->
      </div>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Hotel Feedback</a></strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery UI 1.11.2 -->
    <script src="plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>
    <script src="dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>