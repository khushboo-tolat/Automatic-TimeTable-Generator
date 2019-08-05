<?php
  session_start();
  if(!isset($_SESSION['unm']))
  {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="image/logo.jpg" type="image/ico" />

    <title>Automatic TimeTable Generator</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://unpkg.com/jspdf-autotable@3.1.1/dist/jspdf.plugin.autotable.js"></script>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.php"><img src="image/logo.jpg" width="100%" style="border: 2px solid;"></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">                
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-chevron-right"></i> Add Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="new_logic.php"> Lecture </a></li>
                      <li><a href="add_lab.php"> Lab </a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-chevron-right"></i> Generate TimeTable <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="lecture.php"> Lecture </a></li>
                      <li><a href="lab.php"> Lab </a></li>
                    </ul>
                  </li>
                  <li><a href="program.php"><i class="fa fa-chevron-right"></i> Program </a></li>
                 
                  <li><a href="course.php"><i class="fa fa-chevron-right"></i> Course </a></li>
                  <li><a href="faculty.php"><i class="fa fa-chevron-right"></i> Faculty </a></li>
                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <h3>
                UserName:
                <?=$_SESSION['unm'];
                ?></h3>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <div style="padding-top: 15px; padding-right: 10px;">
                    <a href="logout.php"><button class="btn" style="background-color: #2A3F54; color: white; border-radius: 10px;"><i class="fa fa-power-off" style="font-size: 17px; padding-top: 3px;"></i></button></a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>