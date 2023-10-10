<?php
include "connect.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
if( !isset($_SESSION['doc_id']) )
    echo "<script>document.location='index.php'</script>";
$today=date("Y-m-d");
$dname=$_SESSION['doc_name'];
$dtype=$_SESSION['type'];
$res="select price as p,date as d from billing_data where type='$dtype'";
$res=mysqli_query($con,$res);
// $res=mysqli_fetch_assoc($res);
$rev=0;
foreach($res as $r){
    $rev=$rev+$r['p'];
    $dates[]=$r['d'];
    $re[$r['d']]=$r['p']+$re[$r['d']];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Preskool - Dashboard</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/simple-calendar/simple-calendar.css">

<link rel="stylesheet" href="assets/css/style.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="main-wrapper">

<div class="header">

<div class="header-left">
<a href="doc-dashboard.php" class="logo">
<img src="assets/img/logo.png" alt="Logo">
</a>
<a href="doc-dashboard.php" class="logo logo-small">
<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
</a>
</div>

<div class="menu-toggle">
<a href="javascript:void(0);" id="toggle_btn">
<i class="fas fa-bars"></i>
</a>
</div>

<div class="top-nav-search">
<form>
<input type="text" class="form-control" placeholder="Search here">
<button class="btn" type="submit"><i class="fas fa-search"></i></button>
</form>
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
<img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor">
<div class="user-text">
<h6><?php echo $dname ?></h6>
</div>
</span>
</a>
<div class="dropdown-menu">
<div class="user-header">
<div class="avatar avatar-sm">
<img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
</div>
<div class="user-text">
<h6><?php echo $dname ?></h6>
<p class="text-muted mb-0">Latha Hospital</p>
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
<li><a href="doc-dashboard.php" >Dashboard</a></li>

</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-graduation-cap"></i> <span> Patients</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="doc-patients-list.php">Patients List</a></li>
<li><a href="doc-op-list.php">OP-List</a></li>
<li><a href="doc-inpatientlist.php">Inpatient-List</a></li>
</ul>
</li>
<li class="submenu active">
<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span>Op-Revenue</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="doc-revenue.php" class="active">OP Revenue details</a></li>
<li><a href="doc-pharma-revenue.php">Pharma Revenue details</a></li>
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
<a href="doc-revenue.php" align="center">REVENUE</a>
</ul>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div>
    Total-Revenue : <?php echo $rev ?>
</div>
<div id="chart-body" >
<canvas id="revenue"></canvas>
</div>

                        
                        <script>
                            
                        const ctx_2 = document.getElementById('revenue');
                        const myChart = new Chart(ctx_2, {
                            type: 'bar',
                            data: {
                                labels: <?php echo json_encode(array_values(array_unique($dates)))?>,
                                datasets: [{
                                    label: 'Daily revenue',
                                    data: <?php echo json_encode($re)?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                maintainAspectRatio: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        
                        
                        </script>
                        



</div>
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

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="assets/js/calander.js"></script>

<script src="assets/js/circle-progress.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>