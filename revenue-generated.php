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
<title>REVENUE GENERATED</title>

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
<a href="recept-dashboard.php" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="recept-dashboard.php" class="logo logo-small">
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
<h6>Manager</h6>
<p class="text-muted mb-0"></p>
</div>
</span>
</a>
<div class="dropdown-menu">
<div class="user-header">
<div class="user-text">
<h6>Latha Hospital</h6>
<p class="text-muted mb-0">Manager</p>
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
<li class="submenu">
<a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="manager-dashboard.php">Dashboard</a></li>
</ul>
</li>
<li class="submenu active">
<a href="#"><i class="fa fa-address-card"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="revenue-generated.php" class="active">Pharmacy Revenue</a></li>

</ul>
</li>
<li class="submenu">
<a href="#"><i class="fa fa-list-ol"></i> <span> Invoices</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="manage-invoices.php " >Pharmacy Invoices</a></li>

</ul>
</li>
<li class="submenu">
<a href="#"><i class="fa fa-ambulance"></i> <span> Medicines</span> <span class="menu-arrow"></span></a>
<ul>

<li><a href="add-new-medicines.php">Add New Medicines</a></li>

<li><a href="add-old-medicine.php">Add Existing Medicines</a></li>
<li><a href="manage-medicines.php">Medicine Details</a></li>
<li><a href="manage-medicines-stock.php">Medicines Stock</a></li> 
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Purchases</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="add-supplier.php">Add supplier</a></li>
<li><a href="manage-suppliers.php">Suppliers Data</a></li> 

<li><a href="manage-purchases.php">Medicine Purchases</a></li> 

</ul>
</li>

<li class="submenu">
<a href="#"><i class="fas fa-file-invoice-dollar"></i> <span>charges</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="add-charges.php">Add charges</a></li>
</ul>
</li>

</ul>
</li>
</ul>
</div>
</div>

</div>







<div class="page-wrapper">
<div class="content container-fluid">


<form method="post">
<div class="student-group-form">
<div class="row">
    
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Enter Start Date <span class="login-danger"></span></label>
<input name="sdate" value="" class="form-control" type="text" placeholder="DD/MM/YY">
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Enter End Date <span class="login-danger"></span></label>
<input name="edate" value="" class="form-control" type="text" placeholder="DD/MM/YY">
</div>
</div>

<div class="col-lg-2">
<div class="search-student-btn">
<button name="dates" type="btn" class="btn btn-primary">Generate</button>
</div>
</div> 


<div class="col-lg-2">
<div class="search-student-btn">
<button name="last7" type="btn" class="btn btn-primary">Last 7 Days</button>
</div>
</div>   


</div>

<!-- <div class="row">  -->
    <!--
<div class="col-lg-2">
<div class="search-student-btn">
<button name="last7" type="btn" class="btn btn-primary">Last 7 Days</button>
</div>
</div>    --> 
<!--
<div class="col-lg-2">
<div class="search-student-btn">
<button name="last30" type="btn" class="btn btn-primary">Last 30 Days</button>
</div>
</div>  -->
<!-- </div>  -->

</div>
</div>
</form>

<div class="row">

<div class="card-body">



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
                    <img src="assets/img/icons/meternity.svg" alt="Dashboard Icon">
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
<img src="assets/img/icons/pediatric.svg" alt="Dashboard Icon">
</div> 
            </div>
        </div>
    </div>
</div>


</div>
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