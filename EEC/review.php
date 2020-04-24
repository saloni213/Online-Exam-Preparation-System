<?php
session_start();
extract($_POST);
extract($_SESSION);
include("database2.php");
 
?>
<?php

extract($_GET);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz - Review Quiz </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
include("header.php");
//echo "<h1 class=head1> Review Test Question</h1>";

if(!isset($_SESSION[qn]))
{
		$_SESSION[qn]=0;
}
else if($submit=='Next Question' )
{
	$_SESSION[qn]=$_SESSION[qn]+1;
	
}

$rs=mysqli_query($cn,"select * from useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo '<div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center" style="font-size: 35px; font-style: bold;">Review</h2>
    </div>
  
';
echo "<form name=myfm method=post action=review.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo '<br><br>';

echo "<tR><td style='font-size: 20px; font-style: bold;'><span class=style2>Que ".  $n .": $row[2]</style>";
echo '<br><br>';
echo "<tr><td style='font-size: 20px; font-style: bold;' class=".($row[7]==1?  'tans':'style8').">Ans: $row[3]";
echo '<br><br>';

if($_SESSION[qn]<mysqli_num_rows($rs)-1){
echo "<tr><td><input type=submit name=submit value='Next Question' class='btn btn-info'></form>";
}
else
{
echo "<tr><td><input type=submit name=submit value='Finish' class='btn btn-info'></form>";
}
echo "</table></table>";
if($submit=='Finish')
{
	mysqli_query($cn,"delete from useranswer where sess_id='" . session_id() ."'") or die();
	unset($_SESSION[qn]);
	header("Location: Menu.php");
	exit;
}
?>

<script src="../style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../style/js/off-canvas.js"></script>
  <script src="../style/js/hoverable-collapse.js"></script>
  <script src="../style/js/template.js"></script>
