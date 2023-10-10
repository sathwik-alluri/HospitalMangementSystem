<?php
include "connect.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
if( !isset($_SESSION['doc_id']) ){
    echo "<script>window.alert('login required!');
          document.location='index.php'</script>";}
  
    if(isset($_POST['submit']))
    {
       $sname = $_POST['sname'];
       $phone = $_POST['phone'];
       $lic_num = $_POST['licnum'];
       $place = $_POST['place'];
    
       //$sqlquery = "INSERT INTO `supplier` VALUES ('$sname', '$phone', '$lic_num','$place')";

       $sqlquery =   "INSERT INTO supplier (sname, phone,licence_number,place)
       SELECT '$sname','$phone','$lic_num','$place'
       WHERE NOT EXISTS (
       SELECT 1
       FROM supplier
           WHERE sname = '$sname' AND phone = '$phone' AND licence_number = '$lic_num' AND place = '$place'
       LIMIT 1
       ) ";

       $res = mysqli_query($con,$sqlquery);


       echo "<script>window.alert('Added Supplier Successfully');
             document.location='add-supplier.php';</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>ADD SUPPLIER</title>

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
<a href="manager-dashboard.php" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="manager-dashboard.php" class="logo logo-small">
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
<li class="submenu">
<a href="#"><i class="fa fa-address-card"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="revenue-generated.php">Pharmacy Revenue</a></li>

</ul>
</li>
<li class="submenu">
<a href="#"><i class="fa fa-list-ol"></i> <span> Invoices</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="manage-invoices.php">Pharmacy Invoices</a></li>

</ul>
</li>
<li class="submenu ">
<a href="#"><i class="fa fa-ambulance"></i> <span> Medicines</span> <span class="menu-arrow"></span></a>
<ul>

<li><a href="add-new-medicines.php">Add New Medicines</a></li>

<li><a href="add-old-medicine.php">Add Existing Medicines</a></li>
<li><a href="manage-medicines.php">Medicine Details</a></li>
<li><a href="manage-medicines-stock.php">Medicines Stock</a></li> 
</ul>
</li>
<li class="submenu active">
<a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Purchases</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="add-supplier.php" class="active">Add supplier</a></li>
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
    
    <div class="page-header">
    <div class="row align-items-center">
    <div class="col">
    <h3 class="page-title">Add New Supplier</h3>
    <ul class="breadcrumb">
    <!-- <li class="breadcrumb-item"><a href="fees.html">Fees</a></li>
    <li class="breadcrumb-item active">Add Fees</li> -->
    </ul>
    </div>
    </div>
    </div>
    
    <div class="row">
<div class="col-sm-12">
<div class="card comman-shadow">
<div class="card-body">
<form method="POST">
<div class="row">
<div class="col-12">
<h5 class="form-title student-info">Supplier Information <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Supplier Name <span class="login-danger">*</span></label>
<input name="sname" value="" class="form-control" type="text" placeholder="Enter Name" required>
</div>
</div>
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Licence Number <span class="login-danger">*</span></label>
<input name="licnum" value="" class="form-control" type="text" placeholder="Enter Licence Number" required>
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Place <span class="login-danger">*</span></label>
<input name="place" value="" class="form-control" type="text" placeholder="Enter Place" required>
</div>
</div> 

<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Phone <span class="login-danger">*</span></label>
<input name="phone" value="" class="form-control" type="text" placeholder="Enter Phone Number" required>
</div>
</div> 



<div class="col-12">
<div class="student-submit">
<button type="submit" class="btn btn-primary" name="submit">ADD</button>
</div>
</div>
</div>
</form>
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