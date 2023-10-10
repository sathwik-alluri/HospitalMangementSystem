<?php
include "connect.php";
session_start();
error_reporting(E_ERROR | E_PARSE);
if( !isset($_SESSION['doc_id']) ){
    echo "<script>window.alert('login required!');
          document.location='index.php'</script>";
}

    if(isset($_POST['submit']))
    {
      // $invoice = $_POST['invoice'];
       $doctor = $_POST['doctor'];
       $customer = $_POST['customer'];
       $phone = $_POST['phone'];
      //$medicine = $_POST['medicine'];
      //$quantity = $_POST['quantity'];
       $d=date("d/m/y");

       $medicineNames = $_POST['name'];
       $quantities = $_POST['quantity'];
        // Loop through and display dynamic field values
       for ($i = 0; $i < count($medicineNames); $i++)
       {
           $medicineName = $_POST['name'][$i];
           $quantity = $_POST['quantity'][$i];

           //echo "Medicine Name: $medicineName, Quantity: $quantity<br>";
           $query89 = "SELECT quantity_present AS total FROM `medicines` WHERE doctor = '$doctor' AND mname ='$medicineName'";
           $res89 = mysqli_query($con, $query89);
            $numRows = mysqli_num_rows($res89);
            if (!($numRows > 0))
            {
                //echo "Not Enough Medicines.";
                function function_alert($message)
                {      
               echo "<script type ='text/JavaScript'>";  
               echo "alert('$message')";  
               echo "</script>";   
                }   
               function_alert("Not Enough Medicines Left In The Stock For Corresponding Doctor");
            }  //----------------------------------------------------------------------------------------------------------------
          else
          {
           $quanpresent = mysqli_fetch_assoc($res89);
           $qp = $quanpresent['total'];


           $query91 = "SELECT price AS total FROM `medicines` WHERE doctor = '$doctor' AND mname ='$medicineName'";
           $res91 = mysqli_query($con, $query91);
           $Data = mysqli_fetch_assoc($res91);
           $price = $Data['total'];


           $tp = $price * $quantity; 

           
           if($qp >= $quantity)
           {
             $sqlquery33 = "UPDATE `medicines` SET `quantity_present`= `quantity_present` - " . (int)$quantity . " WHERE mname = '$medicineName' and  doctor = '$doctor'";
             $res33 = mysqli_query($con,$sqlquery33);


           //  $sqlquery = "INSERT INTO `invoices` VALUES ('$customer', '$doctor','$d','$tp')";
           $sqlquery = "INSERT INTO `invoices` (customer_name, doctor,date,price) VALUES ('$customer', '$doctor','$d','$tp')";
           
             $res = mysqli_query($con,$sqlquery);


            $sqlquery99 = "INSERT INTO customers (name, phone)
                         SELECT '$customer','$phone'
                        WHERE NOT EXISTS (
                         SELECT 1
                         FROM customers
                       WHERE name = '$customer' AND phone = '$phone'
                        LIMIT 1
                           ) ";
            $res99 = mysqli_query($con,$sqlquery99);

            echo "<script>window.alert('Added invoice Successfully');
            document.location =pharmacist-generate-invoices.php;
            </script>";

          }
          else
            {
                function function_alert($message)
                 {      
                echo "<script type ='text/JavaScript'>";  
                echo "alert('$message')";  
                echo "</script>";   
                 }   
       
                function_alert("Not Enough Medicines Left In The Stock");   
            }
       }
      }

      //  $query89 = "SELECT quantity_present AS total FROM `medicines` WHERE doctor = '$doctor' AND mname ='$medicine'";
      //  $res89 = mysqli_query($con, $query89);
      //  $quanpresent = mysqli_fetch_assoc($res89);
      //  $qp = $quanpresent['total'];


      //  $query91 = "SELECT price AS total FROM `medicines` WHERE doctor = '$doctor' AND mname ='$medicine'";
      //  $res91 = mysqli_query($con, $query91);
      //  $Data = mysqli_fetch_assoc($res91);
      //  $price = $Data['total'];
  
      //  $tp = $price * $quantity; 
    
      //  if($qp >= $quantity)
      //  {

      //        $sqlquery33 = "UPDATE `medicines` SET `quantity_present`= `quantity_present` - " . (int)$quantity . " WHERE mname = '$medicine' and  doctor = '$doctor'";
      //        $res33 = mysqli_query($con,$sqlquery33);


      //       $sqlquery = "INSERT INTO `invoices` VALUES ('$invoice', '$customer', '$doctor','$d','$tp')";
      //       $res = mysqli_query($con,$sqlquery);


      //       $sqlquery99 = "INSERT INTO customers (name, phone)
      //                    SELECT '$customer','$phone'
      //                   WHERE NOT EXISTS (
      //                    SELECT 1
      //                    FROM customers
      //                  WHERE name = '$customer' AND phone = '$phone'
      //                   LIMIT 1
      //                      ) ";
      //       $res99 = mysqli_query($con,$sqlquery99);
      //   }
      //   else
      //   {
              
      //       function function_alert($message) {      
      //       echo "<script type ='text/JavaScript'>";  
      //       echo "alert('$message')";  
      //       echo "</script>";   
      //        }   
   
      //      function_alert("Not Enough Medicines Left In The Stock");   
      //   }

      // header("Location: pharmacist-generate-invoices.php");
      // exit();
    }   
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Generate Invoice</title>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    <!-- for dynamically adding fields -->
<style>
        .button-container {
            margin-bottom: 20px; /* Adjust the margin as needed */
        }
    </style>    <!--    for add medicine button  -->


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
<li><a href="pharmacist-dashboard.php" class="active">Dashboard</a></li>
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



<!--
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Generate Invoice</h3>
                    <ul class="breadcrumb">
                        <!-- Breadcrumb content here -->
         <!--           </ul>
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
                                        <label>Enter Invoice Number <span class="login-danger">*</span></label>
                                        <input name="invoice" value="" class="form-control" type="text" placeholder="Enter Invoice Number">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Doctor <span class="login-danger">*</span></label>
                                        <select name="doctor" value="" class="form-control select">
                                            <option>Select Doctor</option>
                                            <option>Dr. ABC</option>
                                            <option>Dr. CDE</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Customer Name <span class="login-danger">*</span></label>
                                        <input name="customer" value="" class="form-control" type="text" placeholder="Enter Customer Name">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">  
                                    <div class="form-group local-forms">
                                        <label>Phone Number<span class="login-danger">*</span></label>
                                        <input name="phone" value="" class="form-control" type="text" placeholder="Enter Phone Number">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div id="additionalMedicines">
                                        <!-- Dynamic medicine fields will be added here -->
                           <!--         </div>
                                    <button type="button" id="addField">Add Medicine</button>
                                </div>
                            </div>

                            <div class="row">
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
    </div>
</div>

<script>
$(document).ready(function(){
    $("#addField").click(function(){
        $("#additionalMedicines").append(`
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group local-forms">
                        <label>Medicine Name <span class="login-danger">*</span></label>
                        <select name="name[]" value="" class="form-control select">
                            <?php
                            $query12 = "select distinct mname from `medicines`";
                            $res12 = mysqli_query($con, $query12);
        
                            while ($row = mysqli_fetch_array($res12)) {
                            ?>
                                <option><?php echo $row['mname']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group local-forms">
                        <label>Quantity Brought <span class="login-danger">*</span></label>
                        <input name="quantity[]" value="" class="form-control datetimepicker" type="number" placeholder="Enter Quantity">
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <button type="button" class="btn btn-danger delete-field">Delete</button>
                </div>
            </div>
        `);
        
        $(".delete-field").click(function(){
            $(this).closest(".row").remove();
        });
    });
});
</script>          -->






<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Generate Invoice</h3>
                    <ul class="breadcrumb">
                        <!-- Breadcrumb content here -->
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
                              <!--  <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Enter Invoice Number <span class="login-danger">*</span></label>
                                        <input name="invoice" value="" class="form-control" type="text" placeholder="Enter Invoice Number" requires>
                                    </div>
                                </div>     --> 

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Doctor <span class="login-danger">*</span></label>
                                        <select name="doctor" value="" class="form-control" required>
                                            <option selected>Select Doctor</option>
                                            <?php
                                            $que="select doc_name from doctors where designation='doctor'";
                                            $rev=mysqli_query($con,$que);
                                            
                                            while($re=mysqli_fetch_array($rev)){
                                             echo '<option>'.$re["doc_name"].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Customer Name <span class="login-danger">*</span></label>
                                        <input name="customer" value="" class="form-control" type="text" placeholder="Enter Customer Name" required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">  
                                    <div class="form-group local-forms">
                                        <label>Phone Number<span class="login-danger">*</span></label>
                                        <input name="phone" value="" class="form-control" type="text" placeholder="Enter Phone Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 button-container">
                                    <button type="button" id="addField">Add Medicine</button>
                                </div>
                            </div>

                            <div class="row" id="additionalMedicines">
                                <!-- Dynamic medicine fields will be added here -->
                            </div>

                            <div class="row">
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
    </div>
</div>


<script>
$(document).ready(function(){
    $("#addField").click(function(){
        $("#additionalMedicines").append(`
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="form-group local-forms">
                        <label>Medicine Name <span class="login-danger">*</span></label>
                        <select name="name[]" value="" class="form-control" required>
                            <?php

                           //  $doctor=$_POST['doctor'];

                            $query12 = "select distinct mname from `medicines`";
                            $res12 = mysqli_query($con, $query12);
        
                            while ($row = mysqli_fetch_array($res12)) {
                            ?>
                                <option><?php echo $row['mname']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group local-forms">
                        <label>Quantity Brought <span class="login-danger">*</span></label>
                        <input name="quantity[]" value="" class="form-control" type="number" placeholder="Enter Quantity" required>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <button type="button" class="btn btn-danger delete-field">Delete</button>
                </div>
            </div>
        `);
        
        $(".delete-field").click(function(){
            $(this).closest(".row").remove();
        });
    });
});
</script>  






<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/plugins/simple-calendar/jquery.simple-calendar.js"></script>
<script src="assets/js/calander.js"></script>

<script src="assets/js/circle-progress.min.js"></script>