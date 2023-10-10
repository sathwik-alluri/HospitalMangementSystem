<?php
include "connect.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
if( !isset($_SESSION['doc_id']) )
    echo "<script>document.location='index.php'</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Receptionist</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/plugins/icons/feather/feather.css">

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
<a href="irecept-dashboard.php" class="logo logo-small">
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
<li class="submenu active">
<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Billing Activity</span> <span class="menu-arrow"></span></a>
<ul>
<!-- <li><a href="teachers.php">Teacher List</a></li> -->
<li><a href="recept-bill-activity.php">View Billing Activity</a></li>
<li><a href="recept-add-charges.php" class="active">Add Charges</a></li>
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
<a href="#"><i class="fas fa-book-reader"></i> <span> Online Appointments</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="recept-online-appointments.php">Appointments List</a></li> -->
<!-- <li><a href="add-subject.html">Subject Add</a></li>
<li><a href="edit-subject.html">Subject Edit</a></li> -->
<!-- </ul>
</li> -->
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





<?php
$pid=$_GET['pid'];
$query=" select * from patients where p_id='$pid'";
$run=mysqli_query($con,$query);
$run=mysqli_fetch_assoc($run);
$pid=$run['p_id'];
$q2="select * from billing_data where p_id='$pid'";
$run1=mysqli_query($con,$q2);

if(isset($_POST['submit']))
{
  $type=$_POST['type'];
  $c_id=$_POST['charges'];
  $pid1=$_POST['id'];
  $q1="select * from charges where c_id='$c_id'";
  $r1=mysqli_query($con,$q1);
  $r1=mysqli_fetch_assoc($r1);
  $cid=$r1['c_id'];
  $cname=$r1['c_name'];
  $price=$r1['c_amt'];
  $date=date("Y-m-d");
  $q33="INSERT INTO `billing_data`(`p_id`, `c_id`, `c_name`, `price`, `type`, `date`) VALUES ('$pid1','$cid','$cname','$price','$type','$date')";
  $run33=mysqli_query($con,$q33);
  echo "
  <script>window.alert('added charge Successfully!');
  document.location='recept-in-pat-addcharge.php?pid='+$pid1;
  </script>";


}

?>

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header invoices-page-header">
<div class="row align-items-center">
<h3 class="page-title"><?php echo $run['p_name']?> </h3>
    </div>

    <div class="row">
  <div class="col-md-12">
    <div class="card invoices-add-card">
      <div class="card-body">
        <form action="" method="post" class="invoices-form">
          <div class="invoices-main-form">
            <div class="row">
              <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                  <div class="form-group local-forms">
                    <label>Speciality <span class="login-danger">*</span></label>
                    <select class="form-control select" name="type">
                      <option>Please Select Speciality </option>
                      <option  value="Pediatric">Pediatric</option>
                      <option value="Maternity">Maternity </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xl-5 col-md-6 col-sm-12 col-12">
                <div class="form-group local-forms">
                  <label>Charges <span class="login-danger">*</span></label>
                  <?php
                  $q1="select * from charges";
                  $runs=mysqli_query($con,$q1);
																echo '<td>';
																echo '<select name="charges" id="charges" class="form-control form-select">
																<option value="">Select</option>';
																while($data = mysqli_fetch_assoc($runs))
																{
																	echo '<option value='.$data['c_id'].'>'.$data['c_name'].'</option>';
																}
																echo '</select></td>';
															?>
                </div>
              </div>
              <input type="hidden" name="id" value="<?php echo $pid; ?>" />
              <div class="col-3"> <!-- Adjust the column width as needed -->
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="invoice-add-table">
<h4>Charge Details</h4>
<div class="table-responsive">
<table class="table table-center add-table-items">
<thead>
<tr>
<th>Charge id</th>
<th>Charge Name</th>
<th class="text-end">Price</th>
</tr>
</thead>
<tbody>
<tr class="add-row">
<?php
$i = 0;
$sum=0;
foreach($run1 as $data) 
{
  $i++;
	$id= $data['c_id'];
	$name=$data['c_name'];
  $price=$data['price'];
	$sum = $sum + $price;
	echo
	'<tr>
	<td>'.$id.'</td>
	<td>'.$name.'</td>
	<td class="text-end">'.$price.'</td>
	</tr>';
}
?>
</tr>
</tbody>
</table>
<div class="col-3   invoice-total-card">
<div class="invoice-total-box">
<div class="invoice-total-footer" >
<h4 >Total Amount <span><?php echo $sum?></span></h4>
</div>
</div>
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


<div class="modal custom-modal fade invoices-preview" id="invoices_preview" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-body">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="card invoice-info-card">
<div class="card-body pb-0">
<div class="invoice-item invoice-item-one">
<div class="row">
<div class="col-md-6">
<div class="invoice-logo">
<img src="assets/img/logo.png" alt="logo">
</div>
</div>
<div class="col-md-6">
<div class="invoice-info">
<div class="invoice-head">
<h2 class="text-primary">Invoice</h2>
<p>Invoice Number : In983248782</p>
</div>
</div>
</div>
</div>
</div>

<div class="invoice-item invoice-item-bg">
<div class="invoice-circle-img">
<img src="assets/img/invoice-circle1.png" alt class="invoice-circle1">
<img src="assets/img/invoice-circle2.png" alt class="invoice-circle2">
</div>
<div class="row">
<div class="col-lg-4 col-md-12">
<div class="invoice-info">
<strong class="customer-text-one">Billed to</strong>
<h6 class="invoice-name">Customer Name</h6>
<p class="invoice-details invoice-details-two">
9087484288 <br>
Address line 1, <br>
Address line 2 <br>
Zip code ,City - Country
</p>
</div>
</div>
<div class="col-lg-4 col-md-12">
<div class="invoice-info">
<strong class="customer-text-one">Invoice From</strong>
<h6 class="invoice-name">Company Name</h6>
<p class="invoice-details invoice-details-two">
9087484288 <br>
Address line 1, <br>
Address line 2 <br>
Zip code ,City - Country
</p>
</div>
</div>
<div class="col-lg-4 col-md-12">
<div class="invoice-info invoice-info-one border-0">
<p>Issue Date : 27 Jul 2022</p>
<p>Due Date : 27 Aug 2022</p>
<p>Due Amount : $ 1,54,22 </p>
<p>Recurring Invoice : 15 Months</p>
<p class="mb-0">PO Number : 54515454</p>
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
<th>Description</th>
<th>Category</th>
<th>Rate/Item</th>
<th>Quantity</th>
<th>Discount (%)</th>
<th class="text-end">Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td>Dell Laptop</td>
<td>Laptop</td>
<td>$1,110</td>
<th>2</th>
<th>2%</th>
<td class="text-end">$400</td>
</tr>
<tr>
<td>HP Laptop</td>
<td>Laptop</td>
<td>$1,500</td>
<th>3</th>
<th>6%</th>
<td class="text-end">$3,000</td>
</tr>
<tr>
<td>Apple Ipad</td>
<td>Ipad</td>
<td>$11,500</td>
<th>1</th>
<th>10%</th>
<td class="text-end">$11,000</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="row align-items-center justify-content-center">
<div class="col-lg-6 col-md-6">
<div class="invoice-payment-box">
<h4>Payment Details</h4>
<div class="payment-details">
<p>Debit Card XXXXXXXXXXXX-2541 HDFC Bank</p>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="invoice-total-card">
<div class="invoice-total-box">
<div class="invoice-total-inner">
<p>Taxable <span>$6,660.00</span></p>
<p>Additional Charges <span>$6,660.00</span></p>
<p>Discount <span>$3,300.00</span></p>
<p class="mb-0">Sub total <span>$3,300.00</span></p>
</div>
<div class="invoice-total-footer">
<h4>Total Amount <span>$143,300.00</span></h4>
</div>
</div>
</div>
</div>
</div>
<div class="invoice-sign-box">
<div class="row">
<div class="col-lg-8 col-md-8">
<div class="invoice-terms">
<h6>Notes:</h6>
<p class="mb-0">Enter customer notes or any other details</p>
</div>
<div class="invoice-terms mb-0">
<h6>Terms and Conditions:</h6>
<p class="mb-0">Enter customer notes or any other details</p>
</div>
</div>
<div class="col-lg-4 col-md-4">
<div class="invoice-sign text-end">
<img class="img-fluid d-inline-block" src="assets/img/signature.png" alt="sign">
<span class="d-block">Harristemp</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content">
<div class="modal-header">
<div class="form-header text-start mb-0">
<h4 class="mb-0">Add Bank Details</h4>
</div>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="bank-inner-details">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>Account Holder Name</label>
<input type="text" class="form-control" placeholder="Add Name">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>Bank name</label>
<input type="text" class="form-control" placeholder="Add Bank name">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>IFSC Code</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>Account Number</label>
<input type="text" class="form-control">
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<div class="bank-details-btn">
<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
<a href="javascript:void(0);" class="btn bank-save-btn">Save Item</a>
</div>
</div>
</div>
</div>
</div>


<div class="modal custom-modal fade" id="delete_invoices_details" role="dialog">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<div class="form-header">
<h3>Delete Invoice Details</h3>
<p>Are you sure want to delete?</p>
</div>
<div class="modal-btn delete-action">
<div class="row">
<div class="col-6">
<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Delete</a>
</div>
<div class="col-6">
<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="modal custom-modal fade" id="save_invocies_details" role="dialog">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body">
<div class="form-header">
<h3>Save Invoice Details</h3>
<p>Are you sure want to save?</p>
</div>
<div class="modal-btn delete-action">
<div class="row">
<div class="col-6">
<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Save</a>
</div>
<div class="col-6">
<a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
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

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>