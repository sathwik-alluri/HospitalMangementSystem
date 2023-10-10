<?php
include "connect.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
if( !isset($_SESSION['doc_id']) )
    echo "<script>window.alert('login required!');
          document.location='index.php'</script>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Dashboard</title>
<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">


</head>
<body>
<div class="main-wrapper">
<div class="header">

<div class="header-left">
<a href="pharmacist-dashboard.php" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="pharmacist-dashboard.php" class="logo logo-small">
<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
</a>
</div>

<div class="menu-toggle">
<a href="javascript:void(0);" id="toggle_btn">
<i class="fas fa-bars"></i>
</a>
</div>




<a class="mobile_btn" id="mobile_btn">
<i class="fas fa-bars"></i>
</a>


<ul class="nav user-menu">
  


<li class="nav-item zoom-screen me-2">
<a href="#" class="nav-link header-nav-list">
<img src="assets/img/icons/header-icon-04.svg" alt>
</a>
</li>

<li class="nav-item dropdown has-arrow new-user-menus">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img">
<img src="assets/img/icons/manager.svg" class="rounded-circle" src="xyz.jpg" width="31" alt="Ryan Taylor">
<div class="user-text">
<h6>Pharmacist</h6>
<p class="text-muted mb-0"></p>
</div>
</span>
</a>
<div class="dropdown-menu">
<div class="user-header">
<div class="user-text">
<h6>Latha Hospital</h6>
<p class="text-muted mb-0">Pharmacist</p>
</div>
</div>
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>

</ul>

</div>






<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li class="menu-title">
<span>Main Menu</span>
</li>
<li class="submenu active">
<a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
<ul>
<li ><a href="pharmacist-dashboard.php" class="active">Dashboard</a></li>
</ul>
</li>


<li class="submenu">
<a href="#"><i class="fa fa-list-ol"></i> <span> Invoices</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="pharmacist-manage-invoices.php">Pharmacy Invoices</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fa fa-ambulance"></i> <span> Medicines</span> <span class="menu-arrow"></span></a>
<ul>

<li><a href="pharmacist-manage-medicines.php">Medicine Details</a></li>
<li><a href="pharmacist-outofstock.php">Out Of Stock Medicines</a></li> 
</ul>
</li>

</ul>
</li>
</ul>
</div>
</div>

</div>







<!-- <link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css"> -->

<div class="page-wrapper">
<div class="content container-fluid">
<!--
<div class="page-header">
<div class="row">
<div class="col-sm-12">
<div class="page-sub-header">
<h3 class="page-title">Welcome !</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Manager</li>
</ul>
</div>
</div>
</div>
</div>  -->


<div class="row">
    <div class="col-xl-4 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Total Medicines Available</h6>
                        <?php
                        $query95 = "SELECT COUNT(*) AS total FROM `medicines` where quantity_present > 0";
                        $res95 = mysqli_query($con, $query95);
                        $countData = mysqli_fetch_assoc($res95);
                        $count = $countData['total'];
                        ?>
                        <h3><?php echo $count; ?></h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/medicine_adobe_express.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Invoices Generated</h6>
                        <?php
                        $query94 = "SELECT COUNT(*) AS total FROM `invoices`";
                        $res94 = mysqli_query($con, $query94);
                        $countData = mysqli_fetch_assoc($res94);
                        $count = $countData['total'];
                        ?>
                        <h3><?php echo $count; ?></h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/invoices_adobe_express.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Out Of stock</h6>
                        <?php
                        $query93 = "SELECT COUNT(*) AS total FROM `medicines` where quantity_present=0";
                        $res93 = mysqli_query($con, $query93);
                        $countData = mysqli_fetch_assoc($res93);
                        $count = $countData['total'];
                        ?>
                        <h3><?php echo $count; ?></h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/outofstocks_adobe_express.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="row">
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-comman w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Out Of stock</h6>
<?php
    $query93 = "SELECT COUNT(*) AS total FROM `medicines` where quantity_present=0";
    $res93 = mysqli_query($con, $query93);
    $countData = mysqli_fetch_assoc($res93);
    $count = $countData['total'];
    ?>

     <h3><?php echo $count;  ?></h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/outofstocks_adobe_express.svg" alt="Dashboard Icon">
</div>
</div>
</div>
</div>
</div>

<!--
<div class="col-xl-3 col-sm-6 col-12 d-flex">
<div class="card bg-comman w-100">
<div class="card-body">
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Expired</h6>
<h3>100</h3>
</div>
<div class="db-icon">
<img src="assets/img/icons/expired_adobe_express.svg" alt="Dashboard Icon">
</div>
</div>
</div>
</div>
</div>   -->
<!-- </div>


<!--
<div class="row">
<!--    <div class="col-xl-3 col-sm-6 col-12 d-flex">    -->

<!--
<div class="col-sm-5">
<div class="card bg-comman w-100">
<div class="card-body">
<center> <h6>TODAY'S SALES REPORT</h6> </center>
<div class="db-widgets d-flex justify-content-between align-items-center">
<div class="db-info">
<h6>Doctor 1</h6>
<h3>240</h3>
</div>
<!--  <div class="db-info">
<h6>Doctor 2</h6>
<h3>240</h3>  
</div>  -->
<!--
<div class="db-icon">
<img src="assets/img/icons/teacher-icon-01.svg" alt="Dashboard Icon">
</div>  
</div>
</div>
</div>
</div>  

</div>    -->



<div class="row">
<div class="col-md-6">
    <div class="ribbon-wrapper card">
        <div class="card-body">
            <div class="ribbon ribbon-success">Pediatric</div>
            <div class="db-widgets d-flex justify-content-between align-items-center">
                <div class="db-info">
                    <h6>Today's Pharmacy income</h6>
                    <?php
                    $todayDate = date("d/m/y");
                    $query91 = "SELECT SUM(price) AS total FROM `invoices` WHERE `date` = '$todayDate' AND `doctor` = 'Dr. ABC'";
                    $res91 = mysqli_query($con, $query91);
                    $countData = mysqli_fetch_assoc($res91);
                    $countDoctor1 = $countData['total'];
                    ?> 
                    <h3> &#8377; <?php echo $countDoctor1; ?></h3>
                </div>
                <div class="db-icon">
                    <img src="assets/img/icons/pediatric.svg" alt="Dashboard Icon">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="ribbon-wrapper card">
        <div class="card-body">
            <div class="ribbon ribbon-secondary">Maternity</div>
            <div class="db-widgets d-flex justify-content-between align-items-center">
                <div class="db-info">
                    <h6>Today's Pharmacy income</h6>
                    <?php
         $todayDate = date("d/m/y");
         $query91 = "SELECT SUM(price) AS total FROM `invoices` WHERE `date` = '$todayDate' AND `doctor` = 'Dr. ABC'";
         $res91 = mysqli_query($con, $query91);
         $countData = mysqli_fetch_assoc($res91);
         $count = $countData['total'];
    ?> 

     <h3> &#8377; <?php echo $count;  ?></h3>
                </div>
                <div class="db-icon">
<img src="assets/img/icons/meternity.svg" alt="Dashboard Icon">
</div> 
            </div>
        </div>
    </div>
</div>



<div class="row">                       
        <div class="col-sm-6">
	<a href="pharmacist-generate-invoices.php">
            <button type="button" class="btn btn-primary pad"><i class="fas fa-plus-circle me-2"></i>Generate New Invoice</button>
	</a>
            
        </div>
</div>

     
               

</div>

</body>




<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="assets/js/calander.js"></script>

<script src="assets/js/circle-progress.min.js"></script>

