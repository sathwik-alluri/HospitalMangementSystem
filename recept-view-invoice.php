<?php
include "connect.php";
session_start();
if( !isset($_SESSION['doc_id']) )
    echo "<script>document.location='index.php'</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Latha Hospitals </title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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

<!-- <div class="top-nav-search">
<form>
<input type="text" class="form-control" placeholder="Search here">
<button class="btn" type="submit"><i class="fas fa-search"></i></button>
</form>
</div> -->


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
<!-- <h6>Ryan Taylor</h6> -->
<p class="text-muted mb-0">Receptionist</p>
</div>
</span>
</a>
<div class="dropdown-menu">
<div class="user-header">
<div class="avatar avatar-sm">
<img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
</div>
<div class="user-text">
<h6>Latha Hospital</h6>
<p class="text-muted mb-0">Receptionist</p>
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
<li><a href="recept-dashboard.php">Dashboard</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="feather-grid"></i> <span> Out-Patient</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="recept-add-out-pat.php">Add Out-Patient</a></li>
<li><a href="recept-out-pat-list.php">Out-Patient List</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-graduation-cap"></i> <span> In-Patient</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="recept-add-in-pat.php">Add In-Patient</a></li>
<li><a href="recept-in-pat-list.php">In-Patient List</a></li>
<!--  <li><a href="add-student.php">Student Add</a></li> -->
<!-- <li><a href="recept-in-pat-edit-list.php">Edit In-Patient</a></li>  -->
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Billing Activity</span> <span class="menu-arrow"></span></a>
<ul>
<!-- <li><a href="teachers.php">Teacher List</a></li> -->
<li><a href="recept-bill-activity.php">View Billing Activity</a></li>
<li><a href="recept-add-charges.php">Add Charges</a></li>
<!-- <li><a href="edit-teacher.php">Teacher Edit</a></li> -->
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-building"></i> <span> Patient History</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="recept-patients-list.php">Patients List</a></li>
<li><a href="recept-out-pat-edit-list.php">Edit Out-Patient</a></li>
<!-- <li><a href="add-department.php">Department Add</a></li>
<li><a href="edit-department.php">Department Edit</a></li> -->
</ul>
</li>

<!-- <li class="submenu">
<a href="#"><i class="fas fa-clipboard"></i> <span> Invoices</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="invoices.html">Invoices List</a></li>
<li><a href="invoice-grid.html">Invoices Grid</a></li>
<li><a href="add-invoice.html">Add Invoices</a></li>
<li><a href="edit-invoice.html">Edit Invoices</a></li>
<li><a href="view-invoice.html">Invoices Details</a></li>
<li><a href="invoices-settings.html">Invoices Settings</a></li>
</ul>
</li> -->
<!-- <li class="menu-title">
<span>Management</span>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Accounts</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="fees-collections.html">Fees Collection</a></li>
<li><a href="expenses.html">Expenses</a></li>
<li><a href="salary.html">Salary</a></li>
<li><a href="add-fees-collection.html">Add Fees</a></li>
<li><a href="add-expenses.html">Add Expenses</a></li>
<li><a href="add-salary.html">Add Salary</a></li>
</ul>
</li>
<li>
<a href="index.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
</li>
<li>
<a href="index.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
</li>
<li>
<a href="index.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
</li>
<li>
<a href="index.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
</li>
<li>
<a href="index.html"><i class="fas fa-table"></i> <span>Time Table</span></a>
</li>
<li>
<a href="index.html"><i class="fas fa-book"></i> <span>Library</span></a>
</li>
<li class="submenu">
<a href="#"><i class="fa fa-newspaper"></i> <span> Blogs</span>
<span class="menu-arrow"></span>
</a>
<ul>
<li><a href="blog.html">All Blogs</a></li>
<li><a href="add-blog.html">Add Blog</a></li>
<li><a href="edit-blog.html">Edit Blog</a></li>
</ul>
</li>
<li>
<a href="settings.html"><i class="fas fa-cog"></i> <span>Settings</span></a>
</li>
<li class="menu-title">
<span>Pages</span>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-shield-alt"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="login.html">Login</a></li>
<li><a href="register.html">Register</a></li>
<li><a href="forgot-password.html">Forgot Password</a></li>
<li><a href="error-404.html">Error Page</a></li>
</ul>
</li>
<li>
<a href="blank-page.html"><i class="fas fa-file"></i> <span>Blank Page</span></a>
</li>
<li class="menu-title">
<span>Others</span>
</li>
<li>
<a href="sports.html"><i class="fas fa-baseball-ball"></i> <span>Sports</span></a>
</li>
<li>
<a href="hostel.html"><i class="fas fa-hotel"></i> <span>Hostel</span></a>
</li>
<li>
<a href="transport.html"><i class="fas fa-bus"></i> <span>Transport</span></a>
</li>
<li class="menu-title">
<span>UI Interface</span>
</li>
<li class="submenu active">
<a href="#"><i class="fab fa-get-pocket"></i> <span>Base UI </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="alerts.html">Alerts</a></li>
<li><a href="accordions.html">Accordions</a></li>
<li><a href="avatar.html">Avatar</a></li>
<li><a href="badges.html">Badges</a></li>
<li><a href="buttons.html">Buttons</a></li>
<li><a href="buttongroup.html">Button Group</a></li>
<li><a href="breadcrumbs.html">Breadcrumb</a></li>
<li><a href="cards.html">Cards</a></li>
<li><a href="carousel.html">Carousel</a></li>
<li><a href="dropdowns.html">Dropdowns</a></li>
<li><a href="grid.html">Grid</a></li>
<li><a href="images.html">Images</a></li>
<li><a href="lightbox.html">Lightbox</a></li>
<li><a href="media.html">Media</a></li>
<li><a href="modal.html">Modals</a></li>
<li><a href="offcanvas.html">Offcanvas</a></li>
<li><a href="pagination.html">Pagination</a></li>
<li><a href="popover.html">Popover</a></li>
<li><a href="progress.html">Progress Bars</a></li>
<li><a href="placeholders.html">Placeholders</a></li>
<li><a href="rangeslider.html">Range Slider</a></li>
<li><a href="spinners.html">Spinner</a></li>
<li><a href="sweetalerts.html">Sweet Alerts</a></li>
<li><a href="tab.html">Tabs</a></li>
<li><a href="toastr.html">Toasts</a></li>
<li><a href="tooltip.html">Tooltip</a></li>
<li><a href="typography.html">Typography</a></li>
<li><a href="video.html" class="active">Video</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i data-feather="box"></i> <span>Elements </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="ribbon.html">Ribbon</a></li>
<li><a href="clipboard.html">Clipboard</a></li>
<li><a href="drag-drop.html">Drag & Drop</a></li>
<li><a href="rating.html">Rating</a></li>
<li><a href="text-editor.html">Text Editor</a></li>
<li><a href="counter.html">Counter</a></li>
<li><a href="scrollbar.html">Scrollbar</a></li>
<li><a href="notification.html">Notification</a></li>
<li><a href="stickynote.html">Sticky Note</a></li>
<li><a href="timeline.html">Timeline</a></li>
<li><a href="horizontal-timeline.html">Horizontal Timeline</a></li>
<li><a href="form-wizard.html">Form Wizard</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i data-feather="bar-chart-2"></i> <span> Charts </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="chart-apex.html">Apex Charts</a></li>
<li><a href="chart-js.html">Chart Js</a></li>
<li><a href="chart-morris.html">Morris Charts</a></li>
<li><a href="chart-flot.html">Flot Charts</a></li>
<li><a href="chart-peity.html">Peity Charts</a></li>
<li><a href="chart-c3.html">C3 Charts</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i data-feather="award"></i> <span> Icons </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
<li><a href="icon-feather.html">Feather Icons</a></li>
<li><a href="icon-ionic.html">Ionic Icons</a></li>
<li><a href="icon-material.html">Material Icons</a></li>
<li><a href="icon-pe7.html">Pe7 Icons</a></li>
<li><a href="icon-simpleline.html">Simpleline Icons</a></li>
<li><a href="icon-themify.html">Themify Icons</a></li>
<li><a href="icon-weather.html">Weather Icons</a></li>
<li><a href="icon-typicon.html">Typicon Icons</a></li>
<li><a href="icon-flag.html">Flag Icons</a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-columns"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="form-basic-inputs.html">Basic Inputs </a></li>
<li><a href="form-input-groups.html">Input Groups </a></li>
<li><a href="form-horizontal.html">Horizontal Form </a></li>
<li><a href="form-vertical.html"> Vertical Form </a></li>
<li><a href="form-mask.html"> Form Mask </a></li>
<li><a href="form-validation.html"> Form Validation </a></li>
</ul>
</li>
<li class="submenu">
<a href="#"><i class="fas fa-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="tables-basic.html">Basic Tables </a></li>
<li><a href="data-tables.html">Data Table </a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i class="fas fa-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
<ul>
<li class="submenu">
<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
<li class="submenu">
<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="javascript:void(0);">Level 3</a></li>
<li><a href="javascript:void(0);">Level 3</a></li>
</ul>
</li>
<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
</ul>
</li>
<li>
<a href="javascript:void(0);"> <span>Level 1</span></a>
</li> -->
</ul>
</li>
</ul>
</div>
</div>

</div>









<div class="page-wrapper">
<script>
function CreatePDFfromHTML(buttonElement) {
	var patientName = buttonElement.getAttribute("data-patient");
    var HTML_Width = $(".html-content").width();
    var HTML_Height = $(".html-content").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".html-content")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save(patientName+".pdf");
    });
	
}
</script>
<?php
$pid=$_GET['pid'];
$sql1="select *  from patients where p_id='$pid'";
$run=mysqli_query($con,$sql1);
$run=mysqli_fetch_assoc($run);
$sql2="select * from billing_data where p_id='$pid'";
$run1=mysqli_query($con,$sql2);
$type=$run['type'];
$sql3="select doc_name from doctors where type='$type'";
$run2=mysqli_query($con,$sql3);
$run2=mysqli_fetch_assoc($run2);
?>
<div class="html-content">
<div class="content container-fluid">

<div class="row justify-content-center">

<div class="col-xl-10">
<div class="card invoice-info-card">
<div class="card-body">
<div class="invoice-item invoice-item-one">
<div class="row">
<div class="col-md-6">
<div class="invoice-logo">
<img src="assets/img/logo.png" alt="logo">
</div>

<div class="invoice-head">
<h2>Invoice</h2>
<p>Patient Id : <?php echo $pid ?></p>
</div>
</div>
<div class="col-md-6">
<div class="invoice-info">
<strong class="customer-text-one">Invoice From</strong>
<h6 class="invoice-name">Latha Hospital</h6>
<p class="invoice-details">
9182898892<br>
Vetapalem Road, Sipayipeta<br>
Ramakrishnapuram, Chirala Mandalam, Bapatla<br>
522102, Andhra Pradesh, India
</p>
</div>
</div>
</div>
</div>

<div class="invoice-item invoice-item-two">
<div class="row">
<div class="col-md-6">
<div class="invoice-info">
<strong class="customer-text-one">Billed to</strong>
<h6 class="invoice-name"><?php echo $run['p_name'] ?></h6>
<p class="invoice-details invoice-details-two">
<?php echo $run['p_num'] ?> <br>
<?php echo $run['address'] ?><br>
</p>
</div>
</div>
<div class="col-md-6">
<!-- <div class="invoice-info invoice-info2">
<strong class="customer-text-one">Payment Details</strong>
<p class="invoice-details">
Debit Card <br>
XXXXXXXXXXXX-2541 <br>
HDFC Bank
</p>
<div class="invoice-item-box">
<p>Recurring : 15 Months</p>
<p class="mb-0">PO Number : 54515454</p>
</div>
</div> -->
</div>
</div>
</div>


<div class="invoice-issues-box">
<div class="row">
<div class="col-lg-4 col-md-4">
<div class="invoice-issues-date">
<p>OP Date : <?php echo $run['d_o_c'] ?></p>
</div>
</div>
<div class="col-lg-4 col-md-4">

</div>
<div class="col-lg-4 col-md-4">
<div class="invoice-issues-date">
<p>OP Amount : ₹ 150 </p>
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
<th>Charge Name</th>
<th class="text-end">Amount</th>
</tr>
</thead>
<tbody>
<?php
$i = 0;
$sum=0;
foreach($run1 as $data) 
{
    $i++;
	$name=$data['c_name'];
    $price=$data['price'];
	$sum = $sum + $price;
	echo
	'<tr>
	<td>'.$name.'</td>
	<td class="text-end">'.$price.'</td>
	</tr>';
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="row align-items-center justify-content-center">
<div class="col-lg-6 col-md-6">
<!-- <div class="invoice-terms">
<h6>Notes:</h6>
<p class="mb-0">Enter customer notes or any other details</p>
</div>
<div class="invoice-terms">
<h6>Terms and Conditions:</h6>
<p class="mb-0">Enter customer notes or any other details</p>
</div> -->
</div>
<div class="col-lg-6 col-md-6">
<div class="invoice-total-card">
<div class="invoice-total-box">
<div class="invoice-total-footer">
<h4>Total Amount <span><?php echo $sum ?></span></h4>
</div>
</div>
</div>
</div>
</div>
<div class="invoice-sign text-end">
<h3><?php echo $run2['doc_name'];?></h3>
<span class="d-block">Latha Hospital</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="page-header">
<div class="row align-items-center">
<div class="col-auto ms-auto download-grp">
	<?php
	echo
'<button  data-patient="'.$run['p_name'].'" class="btn btn-outline-primary me-4" type="button" onclick="CreatePDFfromHTML(this)">
<i class="fas fa-download"></i>download invoice
</button>'?>
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

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>

<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>