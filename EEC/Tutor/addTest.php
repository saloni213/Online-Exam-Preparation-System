<?php
session_start();
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
<?php
session_start();
require("../database.php");
error_reporting(1);
?>
<head>
  <!-- Required meta tags -->
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

extract($_POST);

echo "<br>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($testname)>0 )
{
$rs=$dbhandler->query("select * from test where test_name='$testname' && cat_id='$catid'");
$count=$rs->rowCount();
if ($count>0)
{
	echo "<br><br><br><div class=head1>Test is Already Exists</div>";
	exit;
}
$dbhandler->query("insert into test(test_name,top_id,cat_id) values ('$testname','$topid','$catid')") or die();
echo "<p align=center>Test  <b> \"$testname \"</b> Added Successfully.</p>";
$submit="";
}
?>

<div>
<div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2  style="font-size: 35px; font-style: bold;" align="center">Test</h2>
    </div>
    <div class="card-body">

<form name="form1" method="post" onSubmit="return check();" class="box">
     <div class="form-group">
          <label for="name" style="font-size: 20px; font-style: bold;">Category</label>
          <select name="catid" class="form-control" id="catid">
              
<?php
$rs=$dbhandler->query("select * from category order by cat_name");
while($row=$rs->fetch(PDO::FETCH_NUM))
{
if($row[0]==$catid)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
              </select>
       <!--   <input name="testname" placeholder="enter Test name" type="text" id="testname" class="form-control">
       --> </div>    
    
    <div class="form-group">
          <label for="name"  style="font-size: 20px; font-style: bold;">Test Name</label>
          <input name="testname" placeholder="enter Test name" type="text" id="testname" class="form-control">
        </div>
    
     <div class="form-group">
          <label for="name" style="font-size: 20px; font-style: bold;">Topic</label>
          <select name="topid" class="form-control" id="topid">
              
<?php
$rs=$dbhandler->query("select * from topic order by top_name");
while($row=$rs->fetch(PDO::FETCH_NUM))
{
if($row[0]==$topid)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
              </select>
       <!--   <input name="testname" placeholder="enter Test name" type="text" id="testname" class="form-control">
       --> </div>    
          <button type="submit" name="submit" class="btn btn-info">Add</button>
        </div>
       
     
</form>
        
        
        </div>
  </div>
</div>

<p>&nbsp; </p>
</div>

</div>
    
<script src="../style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../style/js/off-canvas.js"></script>
  <script src="../style/js/hoverable-collapse.js"></script>
  <script src="../style/js/template.js"></script>
  
    
</body>