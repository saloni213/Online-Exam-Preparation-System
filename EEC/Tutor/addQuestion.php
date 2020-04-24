<?php
session_start();
require("../database.php");
error_reporting(1);
?>

<?php
extract($_POST);
extract($_GET);
extract($_SESSION);

if(!isset($_SESSION[login]) || $_SESSION[tu]!='tutor')
{
	header("location: ../index.php");
}
?>


<html>
    <head>
        <title> QUESTION ADD </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Tutor</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../style/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../style/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../style/images/favicon.png" />

</head>
<body>
    <?php
extract($_GET);

echo "<BR>";
if($_POST[submit]=='Save' )
{
extract($_POST);
$dbhandler->query("insert into question(test_id,que_desc,true_ans) values ('$id','$addque','$anstrue')") or die();
echo "<p align=center>Question Added Successfully.</p>";
unset($_POST);
}
?>
    
    
  <div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center"  style="font-size: 35px; font-style: bold;">Test</h2>
    </div>
    <div class="card-body">
  
<form name="form1" method="post" onSubmit="return check();">
      <table class="table table-striped table-responsive-xl">
    <tr>
        <td height="26"><div align="left" style="font-size: 20px; font-style: bold;"> Enter Question</div></td>
        <td>&nbsp;</td>
        <td><textarea name="addque" cols="60" rows="2" id="addque" required/></textarea></td>
    </tr>
    <tr>
      <td height="26" style="font-size: 20px; font-style: bold;">Enter True Answer </td>
      <td>&nbsp;</td>
      <td><input name="anstrue" type="text" id="anstrue" size="50" maxlength="50" required/></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-primary" name="submit" value="Save" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>

    
    
<script src="../style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../style/js/off-canvas.js"></script>
  <script src="../style/js/hoverable-collapse.js"></script>
  <script src="../style/js/template.js"></script>

</body>
</html>