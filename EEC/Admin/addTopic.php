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
<?php
session_start();
require("../database.php");
error_reporting(1);
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
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
if($submit=='submit' || strlen($topname)>0 )
{
$rs=$dbhandler->query("select * from topic where top_name='$topname'");
$count=$rs->rowCount();
if ($count>0)
{
	echo "<br><br><br><div class=head1>Topic is Already Exists</div>";
	exit;
}
$dbhandler->query("insert into topic(top_name,top_desc) values ('$topname','$topdesc')") or die();
echo "<p align=center>Topic  <b> \"$topname \"</b> Added Successfully.</p>";
$submit="";
}
?>

<div>
<div class="container" > 
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center">Topic</h2>
    </div>
    <div class="card-body">

<form name="form1" method="post" onSubmit="return check();" class="box">
      <div class="form-group">
          <label for="name" style="font-size: 17px;">Topic Name</label>
          <input name="topname" placeholder="enter topic name" type="text" id="topname" class="form-control">
        </div>
        <div class="form-group">
          <label for="desc" style="font-size: 17px;">Topic Description</label>
          <textarea name="topdesc" placeholder="enter topic description"  id="topdesc" class="form-control">
          </textarea></div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-info">Add</button>
        </div>
       
     
   <!--     <input type="submit" name="submit" value="Add" ></td>
   -->
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