<?php
session_start();
error_reporting(1);

extract($_POST);
extract($_GET);
extract($_SESSION);
$_SESSION[trueans]=0;
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
 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student</title>
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

extract($_GET);
$id = $_GET['id'];
require 'database.php';
$sql = "SELECT * FROM test as t,topic as c where t.cat_id='$id' and t.top_id=c.top_id";
$statement = $dbhandler->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center" style="font-size: 35px; font-style: bold;">Test Modules</h2>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive-xl">
        <tr>
          <th style="font-size: 20px; font-style: bold;">Sr Num</th>
          <th style="font-size: 20px; font-style: bold;">Test Name</th>
           <?php 
                echo '<th style="font-size: 20px; font-style: bold;">Topic</td>';
            
                ?>
           
          <th>Action</th>
        </tr>
        <?php $i=1?>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= $person->test_name; ?></td>
            <td> <?php 
            if($id==2)
            {
           //    echo $person->top_name;
               ?> <a href="showtopic.php?topid=<?=$person->top_id; ?>" class="btn btn-info"><?= $person->top_name;?></a>
            <?php
            }
             else if($id==1 || $id==3)
            {
           //    echo $person->top_name;
               ?> <a href="showtopic.php?topid=<?=$person->top_id; ?>" class="btn btn-info"><?= $person->top_name;?></a>
            <?php
            }    
          
            ?></td>
            <td>
              <a href="giveTest.php?testid=<?= $person->test_id; ?>" class="btn btn-info">Give</a>
            </td>
          </tr>
          <?php $i++ ?>
        <?php endforeach; ?>
      </table>
    </div>
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
</html>
