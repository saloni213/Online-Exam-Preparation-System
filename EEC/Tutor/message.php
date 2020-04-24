<?php
session_start();
?>

<?php
error_reporting(1);
extract($_POST);
extract($_GET);
extract($_SESSION);

if(!isset($_SESSION[login]) || $_SESSION[tu]!='tutor')
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
        <meta charset="UTF-8">
        <title>Tutor</title>
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

    
$rs=$dbhandler->query("select * from user where email='$emailid'");
$count = $rs->rowcount();
if ($count<=0)
{
    
	echo "<div class=head1 align='center'>This User is not Exists</div>";
}
 else {
     
//$query="insert into message(login,pass,username,address,city,phone,email,isStudent,isTutor) values('$lid','$pass','$name','$address','$city','$phone','$emailid',1,0)";
//$rs=$dbhandler->query($query)or die("Could Not Perform the Query");
//echo "<div class=head1 align='center'>Email is succesfully sent to $rs[1]</div>";


   
   extract($_POST);
    $mailto = $emailid;
    $mailSub = $mail_sub;
    $mailMsg = $mail_msg;

    
    require '../Admin/PHPMailer-master/PHPMailerAutoload.php';
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
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg ;
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
   }





}
}
?>
   
   


  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0"  style="background: #D0D0D0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              </div>
                <h4 style="font-size: 30px; font-style: bold;" align="center">Message</h4><br>
              <h6 class="font-weight-light"></h6>
              <form class="pt-3"  name="form1" method="post" action="message.php" onSubmit="return check();">
                <div class="form-group">
                  <input type="text" name="emailid" pattern="[a-z]{3,17}[0-9]{0,5}@gmail.com" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                  <div class="form-group">
                  <input type="text" name="mail_sub" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Subject">
                </div>
                  
                   <div class="form-group">
                       <textarea  name="mail_msg" class="form-control form-control-lg" id="address" placeholder="Message"></textarea>
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
   
<script src="../style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../style/js/off-canvas.js"></script>
  <script src="../style/js/hoverable-collapse.js"></script>
  <script src="../style/js/template.js"></script>
  

    </body>
</html>
