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
<title>Online EXAM  - Result </title>
    <link rel="stylesheet" href="style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="style/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="style/images/favicon.png" />

<style type="text/css">

	
		body { background-image:url(mark2.jpg); }
		h1 { margin: 0 0 3px 0; }
	   h1 { color: darkblue;
                font: bold 52px Helvetica, Arial, Sans-Serif;
		      
		      }
		h1:hover {
		   
                     text-shadow:4px 4px lightskyblue
		   		}
                h2 { margin: 0 0 3px 0; }
	   h2 { color: darkblue;
                font: bold 22px Helvetica, Arial, Sans-Serif;
		      
		      }
		h2:hover {
		   
                     text-shadow: 4px 4px lightskyblue
                }
                 
	</style>



</head>

<body>
<?php
include("header.php");

include("database.php");
extract($_SESSION);
$rs=$dbhandler->query("select t.test_name,r.score from test t, result r where
t.test_id=r.test_id and r.login='$login'");
	
$count = $rs->rowcount();
echo '<div class="container">
  <div class="card mt-5">
    <div class="card-header"  style="background: #D0D0D0">
      <h2 align="center" style="font-size: 35px; font-style: bold;">Test Modules</h2>
    </div>
    <div class="card-body">';

//echo "<h1 align='center'> Result </h1>";
if($count<1)
{
	echo "<br><br><h2 align='center'> You have not given any quiz</h1>";
	
	exit;
}
echo "<table align=center class='table table-striped table-responsive-xl'><tr><th style='font-size: 20px; font-style: bold;'>Test Name </th><th style='font-size: 20px; font-style: bold;'> Score";
while($r=$rs->fetch(PDO::FETCH_BOTH))
{
echo "<tr><td>$r[0] <td> $r[1]";
}
echo "</table>";
	
?>
    
    
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
