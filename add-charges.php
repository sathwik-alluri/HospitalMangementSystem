<?php
include "connect.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
if( !isset($_SESSION['doc_id']) ){
    echo "<script>window.alert('login required!');
          document.location='index.php'</script>";
}
$sql='select * from charges ORDER BY c_id DESC LIMIT 1';
$run1=mysqli_query($con,$sql);
$run1=mysqli_fetch_assoc($run1);
$value2 = substr($run1['c_id'],1);
$value2 = (int)$value2 + 1;
$value2 = 'C'.sprintf('%s',$value2);
    if(isset($_POST['submit']))
    {
        $cid=$_POST['cid'];
        $cname=$_POST['cname'];
        $cost=$_POST['cost'];
        $q1="INSERT INTO `charges`(`c_id`, `c_name`, `c_amt`) VALUES ('$cid','$cname','$cost')";
        $q1=mysqli_query($con,$q1);
        echo "
        <script>window.alert('added charge Successfully!');
        document.location='add-charges.php';
        </script>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>ADD EXISTING MEDICINES</title>

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
<a href="index.php" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="index.html" class="logo logo-small">
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
<li><a href="revenue-generated.php">Revenue Report</a></li>

</ul>
</li>
<li class="submenu">
<a href="#"><i class="fa fa-list-ol"></i> <span> Invoices</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="manage-invoices.php">Manage invoices</a></li>

</ul>
</li>
<li class="submenu ">
<a href="#"><i class="fa fa-ambulance"></i> <span> Medicines</span> <span class="menu-arrow"></span></a>
<ul>

<li><a href="add-new-medicines.php">Add New Medicines</a></li>

<li><a href="add-old-medicine.php" >Add Existing Medicines</a></li>
<li><a href="manage-medicines.php">Manage Medicines</a></li>
<li><a href="manage-medicines-stock.php">Manage Medicines Stock</a></li> 
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Purchases</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="add-supplier.php">Add supplier</a></li>
<li><a href="manage-suppliers.php">Suppliers Data</a></li> 

<li><a href="manage-purchases.php">Manage Purchase</a></li> 

</ul>
</li>

<li class="submenu active">
<a href="#"><i class="fas fa-file-invoice-dollar"></i> <span>charges</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="add-charges.php" class="active">Add charges</a></li>
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
    <h3 class="page-title">Add Charges</h3>
    <ul class="breadcrumb">
  
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
<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Charge ID<span class="login-danger">*</span></label>
<input name="cid" value="<?php echo $value2;?>" class="form-control" type="text" readonly="readonly">
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Charge Name<span class="login-danger">*</span></label>
<input name="cname" class="form-control " type="text" placeholder="Enter Name of the Charge" required>
</div>
</div>


<div class="col-12 col-sm-4">
<div class="form-group local-forms">
<label>Charge Amount<span class="login-danger">*</span></label>
<input name="cost"  class="form-control" type="number" placeholder="Enter  Cost" required>
</div>
</div>   





<div class="col-12">
<div class="student-submit">
<button name="submit" type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="invoice-item invoice-table-wrap">
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="invoice-table table table-center mb-0">
<thead>
<tr>
<th>Charge Id</th>
<th>Charge Name</th>
<th >Amount</th>
</tr>
</thead>
<tbody>
<?php
$s22="select * from charges";
$s22=mysqli_query($con,$s22);
$i = 0;
foreach($s22 as $data) 
{
    $i++;
	$id= $data['c_id'];
	$name=$data['c_name'];
    $price=$data['c_amt'];
	echo
	'<tr>
	<td>'.$id.'</td>
	<td>'.$name.'</td>
	<td>'.$price.'</td>
	<td ></tr>';
}
?>
</tbody>
</table>
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