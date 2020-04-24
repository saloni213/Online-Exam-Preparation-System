<?php
session_start();
?>

<?php
error_reporting(1);
extract($_POST);
extract($_GET);
extract($_SESSION);
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forget</title>
        <link rel="stylesheet" href="style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="style/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="style/images/favicon.png" />

    </head>
    <body>

<?php
extract($_POST);
include("database.php");

if(isset($Submit) )
{

    
$rs=$dbhandler->query("select * from user where email='$emailid'");
$row=$rs->fetch(PDO::FETCH_BOTH);
$lid=$row[1];
$pass=$row[2];

$count = $rs->rowcount();
if ($count<=0)
{
    
	echo "<div class=head1 align='center'>This User is not Exists</div>";
}
 else {

   
   extract($_POST);
    $mailto = $emailid;
 //   $mailSub = $mail_sub;
 //   $mailMsg = $mail_msg;
 $msg="<html>
<head>
<title>HTML email</title>
</head>
<body>
<h1>ENJOY YOUR STUDIES</h1>

<h2>LoginId</h2>
$lid
    <br><br>
<h2>Password</h2>
$pass
</body>
</html>
          ";
   require 'admin/PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "blackpanther412563@gmail.com";
   $mail ->Password = "blackpanther@#";
   $mail ->SetFrom("Student@gmail.com");
   $mail ->Subject = "Forgot Password";
   $mail ->Body = $msg ;
   $mail ->AddAddress($mailto);
   //$mail ->headerLine($mailto, "salonipatellllllll");
   //$mail ->msgHTML("Your Login Id is  & Password is ");
   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "<div align='center'>Mail Sent</div>";
       header("location: index.php");
   }

}
}
?>
   
   


  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="background: #D0D0D0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              </div>
              <h4>FORGOT PASSWORD</h4>
              <h6 class="font-weight-light"></h6>
              <form class="pt-3"  name="form1" method="post" action="forget.php" onSubmit="return check();">
                <div class="form-group">
                  <input type="text" name="emailid" pattern="[a-z]{3,17}[0-9]{0,5}@gmail.com" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
               
                
                
                <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="Submit" value="Send">
           <!--         <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="registerTutor.php">SIGN UP</a>
            -->    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
   
<script src="style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="style/js/off-canvas.js"></script>
  <script src="style/js/hoverable-collapse.js"></script>
  <script src="style/js/template.js"></script>
  

    </body>
</html>
