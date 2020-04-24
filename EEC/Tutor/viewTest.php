<?php
session_start();
error_reporting(1);

extract($_POST);
extract($_GET);
extract($_SESSION);

if(!isset($_SESSION[login]) || $_SESSION[tu]!='tutor' )
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
           <link href="space.css" rel="stylesheet" type="text/css">
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

extract($_GET);

require '../database.php';
$sql = "SELECT * FROM question where test_id='$id'";
$statement = $dbhandler->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center" style="font-size: 35px; font-style: bold;">Questions</h2>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive-xl">
        <tr>
          <th style="font-size: 20px; font-style: bold;">ID</th>
          <th style="font-size: 20px; font-style: bold;">Question</th>
          <th style="font-size: 20px; font-style: bold;">True Ans</th>
          
          <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->que_id; ?></td>
            <td><?= $person->que_desc; ?></td>
            <td><?= $person->true_ans; ?></td>
            
            <td>
              <a href="editQue.php?id=<?= $person->que_id ?>" class="btn btn-info">Edit</a>
             <br><br> <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteQue.php?id=<?= $person->que_id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
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
