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
        <title>Topic</title>
    </head>
    <body>
   <?php
   
include("database.php");
extract($_GET);

$rs1=$dbhandler->query("select * from topic where top_id='$topid'");
$row=$rs1->fetch(PDO::FETCH_BOTH);
//echo "<h1 align=center class='style8'><font color=black> $row[1]</font></h1>";
echo "<div class='container'>
  <div class='card mt-5'>
    <div class='card-header' style='background: #D0D0D0'>
      <h2 align='center' style='font-size: 30px; font-style: bold;'><font color=black> $row[1]</font></h2>
    </div>
    <div class='card-body'>
      <table class='table table-striped table-responsive-xl'>
";
echo "<tr align='center'><td align='center' style='font-size: 20px; font-style: bold;'>$row[2]</td></tr>";
 

echo "</table>";
?>
 </body>
</html>
