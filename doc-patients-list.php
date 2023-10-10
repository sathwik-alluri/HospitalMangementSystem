<?php
include "connect.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
if( !isset($_SESSION['doc_id']) )
    echo "<script>document.location='index.php'</script>";
$today=date("Y-m-d");
$dname=$_SESSION['doc_name'];
$dtype=$_SESSION['type'];
$res="select *  from patients where type='$dtype'";
$res=mysqli_query($con,$res);
// $res=mysqli_fetch_assoc($res)

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
<li><a href="doc-dashboard.php">Dashboard</a></li>
<!-- <li><a href="teacher-dashboard.html" class="active">Teacher Dashboard</a></li>
<li><a href="student-dashboard.html">Student Dashboard</a></li> -->
</ul>
</li>
<li class="submenu active">
<a href="#"><i class="fas fa-graduation-cap"></i> <span> Patients</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="doc-patients-list.php" class="active">Patients List</a></li>
<li><a href="doc-op-list.php">OP-List</a></li>
<li><a href="doc-inpatientlist.php">Inpatient-List</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span>Revenue</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="doc-revenue.php">OP Revenue details</a></li>
<li><a href="doc-pharma-revenue.php">Pharma Revenue details</a></li>
</li>
</ul>
</div>
</div>
</div>


<div class="page-wrapper">
    <div class="content container-fluid">
    
    <div class="page-header">
    <div class="row">
    <div class="col-sm-12">
    <div class="page-sub-header">
    <h3 class="page-title">Patients</h3>
    <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="students.html">Patients</a></li>
    <li class="breadcrumb-item active">All Patients</li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    
    <form>
<div class="student-group-form">
<div class="row">

<div class="col-lg-3 col-md-6">
<div class="form-group">
<input type="text" class="form-control" name="pname" placeholder="Search by Name ...">
</div>
</div>
<div class="col-lg-2">
<div class="search-student-btn">
<button type="btn" class="btn btn-primary" name="search">Search</button>
</form>
</div>
</div>
</div>
</div>
    <div class="row">
    <div class="col-sm-12">
    <div class="card card-table comman-shadow">
    <div class="card-body">
    
    <div class="page-header">
    <div class="row align-items-center">
    <div class="col">
    <h3 class="page-title">Patients</h3>
    </div>
    <div class="col-auto text-end float-end ms-auto download-grp">
<button  class="btn btn-outline-primary me-2" type="button" onclick="tableToCSV()">
<i class="fas fa-download"></i>download CSV
        </button>
    <!-- <a href="students.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
    <a href="students-grid.html" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a> -->
    <!-- <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download" onclick="tableToCSV()"></i> Download</a> -->
    <!-- <a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a> -->
    </div>
    </div>
    </div>
    
    <div class="table-responsive">
    <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
    <thead class="student-thread">
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Type</th>
    <th>Date</th>
    <th>Age</th>
    <th>Address</th>
    </tr>
    </thead>
    
    <tbody>
 <?php
 if(isset($_GET['search']))
 {
     if(isset($_GET['pname']))
     {
         $pname=$_GET['pname'];
         $dtype1=$_SESSION['type'];
         $res="select *  from patients where type='$dtype1' and p_name like '%$pname%'";
         $res=mysqli_query($con,$res);
     }
 }
while($run=mysqli_fetch_assoc($res))
{
    $visited=$run['visited'];
echo '<tr>
<td>'.$run['p_id'].'</td>
<td>'.$run['p_name'].'</td
><td>'.$run['sex'].'</td>
<td>'.$run['type'].'</td>
<td>'.$run['d_o_c'].'</td>
<td>'.$run['age'].'</td>
<td>'.$run['address'].'</td>
</tr>';
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
<script type="text/javascript">
        function tableToCSV() {
 
            // Variable to store the final csv data
            var csv_data = [];
 
            // Get each row data
            var rows = document.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
 
                // Get each column data
                var cols = rows[i].querySelectorAll('td,th');
 
                // Stores each csv row data
                var csvrow = [];
                for (var j = 0; j < cols.length; j++) {
 
                    // Get the text data of each cell
                    // of a row and push it to csvrow
                    csvrow.push(cols[j].textContent);

                }
 
                // Combine each column value with comma
                csv_data.push(csvrow.join(","));
            }
 
            // Combine each row data with new line character
            csv_data = csv_data.join('\n');
 
            // Call this function to download csv file 
            downloadCSVFile(csv_data);
 
        }
 
        function downloadCSVFile(csv_data) {
 
            // Create CSV file object and feed
            // our csv_data into it
            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            });
 
            // Create to temporary link to initiate
            // download process
            var temp_link = document.createElement('a');
 
            // Download csv file
            temp_link.download = "lathahospital_OPs.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;
 
            // This link should not be displayed
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);
 
            // Automatically click the link to
            // trigger download
            temp_link.click();
            document.body.removeChild(temp_link);
        }
    </script>
</body>
</html>