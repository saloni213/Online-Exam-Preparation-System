<?php
session_start();
?>
<html>
<head>
<title>Wel come to Online Exam</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="style/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="style/images/favicon.png" /></head>

<body>
<?php

include("header.php");
include("database.php");
extract($_POST);

$_SESSION[stu]="";
$_SESSION[tu]="";
$_SESSION[ad]="";
if(isset($submit))// && !($_POST['vercode1'] != $_SESSION['vercode'] OR $_SESSION['vercode']==''))
{
	$rs=$dbhandler->query("select * from user where login='$loginid' and pass='$pass'");
        $count = $rs->rowcount();
	if($count<1)
	{
		$found="N";
                echo 'Invalid UserName or  Password';
	}
	else
	{
		$_SESSION[login]=$loginid;
	}
   
}
$rs1=$dbhandler->query("select * from user where login='$loginid' and pass='$pass'");
        $r=$rs1->fetch(PDO::FETCH_BOTH);
if($loginid==="username" | $pass==="password")
{   header("Location: index.php");
    exit;
}
else if (isset($_SESSION[login]) & $r[8]==1 & $r[9]!=1 )//&& !($_POST['vercode1'] != $_SESSION['vercode'] OR $_SESSION['vercode']==''))
{
    $_SESSION[stu]='student';
        header("Location: Menu.php");
	exit;
}
else if (isset($_SESSION[login]) & $r[8]!=1 & $r[9]==1)//&& !($_POST['vercode1'] != $_SESSION['vercode'] OR $_SESSION['vercode']==''))
{     
    $_SESSION[tu]='tutor';
     header("Location: Tutor/tutorMenu.php");
     exit;
}

else if($loginid == "ADMIN" & $pass=="ad20@#")// && !($_POST['vercode1'] != $_SESSION['vercode'] OR $_SESSION['vercode']==''))
 {
    $_SESSION[login]=$loginid;
    $_SESSION[ad]='admin';
    header("Location: Admin/Menu.php");
    exit;
}
?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
              </div>
                <h4 style="font-size: 35px;">Login</h4>
                <h6 class="font-weight-light">Happy to see you again!</h6><br>
              <form class="pt-3"  name="form1" method="post" action="" class="box">
                <div class="form-group">
                    <label for="exampleInputEmail" style="font-size: 15px;">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="loginid" value="username" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword" style="font-size: 15px;">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                      <input type="password" name="pass" value="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      </label>
                  </div>
                  <a href="forget.php" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="my-3">
                    <div colspan=2 align=center class="errors"><input style="font-size: 17px;" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit" value="submit" />
                   </div>
     <!--             <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="index.html">LOGIN</a>
         -->       </div>
                <div class="mb-2 d-flex">
                 <!-- <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
               --> </div>
               <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                </div>
              --></form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">EEC</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="style/js/off-canvas.js"></script>
  <script src="style/js/hoverable-collapse.js"></script>
  <script src="style/js/template.js"></script>
  
</body>
</html>
