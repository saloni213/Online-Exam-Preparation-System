<?php
session_start();
error_reporting(1);

extract($_POST);
extract($_GET);
extract($_SESSION);

if(!isset($_SESSION[login]) || $_SESSION[stu]!='student')
{
	header("location: index.php");
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
        <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Topic</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="style/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="style/images/favicon.png" />

    </head>
    <body>
        
        <?php
include("database.php");
//echo "<h1 class='style8' align=center> Select Topic</h1>";
$rs=$dbhandler->query("select * from topic");
echo "<div class='container'>
  <div class='card mt-5'>
    <div class='card-header' style='background: #D0D0D0'>
      <h2 align='center' style='font-size: 30px; font-style: bold;'>Select Topic</h2>
    </div>
    <div class='card-body'>
      <table class='table table-striped table-responsive-xl'>
";
//$count = $rs->rowcount();
			
while($r=$rs->fetch(PDO::FETCH_BOTH))
{   
	echo "<tr><td align='center' style='font-size: 20px; font-style: bold;'><a href='showtopic.php?topid=$r[0]' class='btn'><font size=4>$r[1]</font></a></td></tr>";
}
echo "</table>";
?>
        
        <script src="style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="style/js/off-canvas.js"></script>
  <script src="style/js/hoverable-collapse.js"></script>
  <script src="style/js/template.js"></script>
  
    </body>
</html>
