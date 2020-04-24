<?php
session_start();
?>

<?php
error_reporting(1);
extract($_POST);
extract($_GET);
extract($_SESSION);

if(!isset($_SESSION[login]) || $_SESSION[login]!="ADMIN")
{
	header("location: ../index.php");
}
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
<title>New user signup </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../style/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../style/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../style/images/favicon.png" />

</head>

<body>
          
<?php
extract($_POST);
include("../database.php");

if(isset($Submit) )
{

    
$rs=$dbhandler->query("select * from user where login='$lid'");
$count = $rs->rowcount();
if ($count>0)
{
    
	echo "<div class=head1 align='center'>Login Id Already Exists</div>";
}
 else {
     
$rs4=$dbhandler->query("select * from user where email='$emailid'");
$count4 = $rs4->rowcount();
if ($count4>0)
{
	echo "<div class=head1 align='center'>Email Id Already Exists</div>";
}
 else {
if($pass==$cpass)
{
$query="insert into user(login,pass,username,address,city,phone,email,isStudent,isTutor) values('$lid','$pass','$name','$address','$city','$phone','$emailid',1,0)";
$rs=$dbhandler->query($query)or die("Could Not Perform the Query");
echo "<div class=head1 align='center'>Student Id $lid is Created Sucessfully</div>";


   
   extract($_POST);
    $mailto = $emailid;
//    $mailSub = $_POST['mail_sub'];
//    $mailMsg = $_POST['mail_msg'];
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
   require 'PHPMailer-master/PHPMailerAutoload.php';
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
   $mail ->Subject = "EEC Registration";
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
      // echo "Mail Sent";
   }





}
else{
    echo "<div class=head1>ENTER VALID PASSWORD</div>";
      echo "<div align='center' valign='top'><strong><a href='registerStu.php'> Register again </a> <br><br>  <a href='../index.php'> Login </a></strong></div>";
}
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
             <!--   <img src="../style/images/logo.svg" alt="logo">
              --></div>
                <h4 align="center" style="font-size: 30px; font-style: bold;">Register</h4>
        <!--      <h6 class="font-weight-light">Signing up is easy.</h6>
            -->  <form class="pt-3"  name="form1" method="post" action="registerStu.php" onSubmit="return check();">
                <div class="form-group">
                  <input type="text" name="lid" pattern="[a-zA-Z]{3}[a-zA-Z]*" class="form-control form-control-lg" id="exampleInputUserId1" placeholder="UserId">
                </div>
                  <div class="form-group">
                  <input type="text" name="name" pattern="[a-z]{3}[a-z]*" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="text" name="emailid" pattern="[a-z]{3,17}[0-9]{0,5}@gmail.com" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password"  name="pass" pattern="[a-zA-Z][a-zA-Z0-9]{0,5}" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password"  name="cpass" pattern="[a-zA-Z][a-zA-Z0-9]{0,5}" class="form-control form-control-lg" id="exampleInputcPassword1" placeholder="Confirm Password">
                </div>
                  
                   <div class="form-group">
                       <textarea  name="address" class="form-control form-control-lg" id="address" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                  <input type="text"  name="city" class="form-control form-control-lg" pattern="[a-z]{3}[a-z]*" id="city" placeholder="city">
                </div>
                   <div class="form-group">
                  <input type="text"  name="phone" class="form-control form-control-lg" pattern="[1-9][0-9]{9}" id="phone" placeholder="phn no">
                </div>
               
                
                
                  <div class="mb-4">
                  <div class="form-check">
             <!--       <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                -->  </div>
                </div>
                <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="Submit" value="register">
           <!--         <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="registerTutor.php">SIGN UP</a>
            -->    </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="../index.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../style/js/off-canvas.js"></script>
  <script src="../style/js/hoverable-collapse.js"></script>
  <script src="../style/js/template.js"></script>
  <!-- endinject -->

    
    
    
      
         
 <p>&nbsp; </p>
</body>
</html>
