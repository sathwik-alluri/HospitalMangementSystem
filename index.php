<?php
include "connect.php";
session_start();
if(isset($_POST['submit'])){
    $uname=$_POST['username'];
    $pass=$_POST['password'];
    $que="select * from doctors where doc_id='$uname' and doc_id='$pass' and designation='doctor'";
    $res=mysqli_query($con,$que);
    $run = mysqli_fetch_assoc($res);
    if(!empty($run)){
        $_SESSION['type']=$run['type'];
        $_SESSION['doc_name']=$run['doc_name'];
        $_SESSION['doc_id']=$run['doc_id'];
        echo "<script>document.location='doc-dashboard.php'</script>";
    }
    else{
        echo"<script> window.alert('Log into your proper designation and Check Your Username and Password')</script>";
    }
}
if(isset($_POST['rsubmit'])){
    $uname=$_POST['username'];
    $pass=$_POST['password'];
    $que="select * from doctors where doc_id='$uname' and doc_id='$pass' and designation='receptionist'";
    $res=mysqli_query($con,$que);
    $run = mysqli_fetch_assoc($res);
    if(!empty($run)){
        $_SESSION['type']=$run['type'];
        $_SESSION['doctor_name']=$run['doc_name'];
        $_SESSION['doc_id']=$run['doc_id'];
        echo "<script>document.location='recept-dashboard.php'</script>";

    }
    else{
        echo"<script> window.alert('Check Username and Password/log into your proper designation')</script>";
    }
}
if(isset($_POST['psubmit'])){
    $uname=$_POST['username'];
    $pass=$_POST['password'];
    $que="select * from doctors where doc_id='$uname' and doc_id='$pass' and designation='pharmacist'";
    $res=mysqli_query($con,$que);
    $run = mysqli_fetch_assoc($res);
    if(!empty($run)){
        $_SESSION['type']=$run['type'];
        $_SESSION['doctor_name']=$run['doc_name'];
        $_SESSION['doc_id']=$run['doc_id'];
        echo "<script>document.location='pharmacist-dashboard.php'</script>";

    }
    else{
        echo"<script> window.alert('Check Username and Password/log into your proper designation')</script>";
    }
}
if(isset($_POST['msubmit'])){
    $uname=$_POST['username'];
    $pass=$_POST['password'];
    $que="select * from doctors where doc_id='$uname' and doc_id='$pass' and designation='manager'";
    $res=mysqli_query($con,$que);
    $run = mysqli_fetch_assoc($res);
    if(!empty($run)){
        $_SESSION['type']=$run['type'];
        $_SESSION['doctor_name']=$run['doc_name'];
        $_SESSION['doc_id']=$run['doc_id'];
        echo "<script>document.location='manager-dashboard.php'</script>";

    }
    else{
        echo"<script> window.alert('Check Username and Password/log into your proper designation')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title> Latha-Hospital Login </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="shortcut icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/feather/feather.css">

<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<style>
    .myDiv{
        display:none;
    }  
   
    #Manager{
        
    }
    #Doctor{

    }
    #Pharmacist{

    }
    #Receptionist{

    }
</style>
<script>
    $(document).ready(function(){
        $('button').click(function(){
            var demovalue = $(this).val(); 
            $("div.myDiv").hide();
        
            $("#"+demovalue).show();
        });
    });

    function myFunction() {
  var x = document.getElementById("but");
    x.style.display = "none";
  }

    </script>
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
<img class="img-fluid" src="assets/img/login.png" alt="Logo">
</div>
<div class="login-right"> 
<div class="login-right-wrap">
    <h2>Sign in</h2>
 
    <div class="vstack gap-3" id="but">
        <button type="button" name="demo" onclick="myFunction()" class="btn btn-secondary but"  value="Manager">Manager</button>
        <button type="button" name="demo" onclick="myFunction()" class="btn btn-primary but"  value="Doctor">Doctor</button>
        <button type="button" name="demo" onclick="myFunction()" class="btn btn-warning but"  value="Receptionist">Receptionist</button>
        <button type="button" name="demo" onclick="myFunction()" class="btn btn-success but"  value="Pharmacist">Pharmacist</button>
    </div>    
    

<!-- <p class="account-subtitle">Need an account? <a href="register.html">Sign Up</a></p> -->



<div id="Doctor" class="myDiv">
<form action="index.php" method="post">
<div class="form-group">
<label>Username <span class="login-danger">*</span></label>
<input class="form-control" type="text" name="username">
<span class="profile-views"><i class="fas fa-user-circle"></i></span>
</div>
<div class="form-group">
<label>Password <span class="login-danger">*</span></label>
<input class="form-control pass-input" type="password" name="password">
<span class="profile-views feather-eye toggle-password"></span>
 </div>
<div class="form-group">
<button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
</div>
</form>
<button class="btn btn-secondary btn-block" onclick="window.location.reload()" >go back</button>
</div>

<div id="Manager" class="myDiv">
<form action="index.php" method="post">
    <div class="form-group">
    <label>Username <span class="login-danger">*</span></label>
    <input class="form-control" type="text" name="username">
    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
    </div>
    <div class="form-group">
    <label>Password <span class="login-danger">*</span></label>
    <input class="form-control pass-input" type="password" name="password">
    <span class="profile-views feather-eye toggle-password"></span>
     </div>
    <div class="form-group">
    <button class="btn btn-primary btn-block" type="submit" name="msubmit">Login</button>
    </div>
</form>
<button class="btn btn-secondary btn-block" onclick="window.location.reload()">go back</button>
</div>

<div id="Pharmacist" class="myDiv">
<form action="index.php" method="post">
    <div class="form-group">
    <label>Username <span class="login-danger">*</span></label>
    <input class="form-control" type="text" name="username">
    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
    </div>
    <div class="form-group">
    <label>Password <span class="login-danger">*</span></label>
    <input class="form-control pass-input" type="password" name="password">
    <span class="profile-views feather-eye toggle-password"></span>
     </div>
    <div class="form-group">
    <button class="btn btn-primary btn-block" type="submit" name="psubmit">Login</button>
    </div>
</form>
<button class="btn btn-secondary btn-block" onclick="window.location.reload()">go back</button>
</div>

<div id="Receptionist" class="myDiv">
<form action="index.php" method="post">
    <div class="form-group">
    <label>Username <span class="login-danger">*</span></label>
    <input class="form-control" type="text" name="username">
    <span class="profile-views"><i class="fas fa-user-circle"></i></span>
    </div>
    <div class="form-group">
    <label>Password <span class="login-danger">*</span></label>
    <input class="form-control pass-input" type="password" name="password">
    <span class="profile-views feather-eye toggle-password"></span>
     </div>
    <div class="form-group">
    <button class="btn btn-primary btn-block" type="submit" name="rsubmit">Login</button>
    </div>
    </form>
    <button class="btn btn-secondary btn-block" onclick="window.location.reload()">go back</button>
    </div>


</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>