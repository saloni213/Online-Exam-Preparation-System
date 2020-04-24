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
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
  
require '../database.php';
$sql = "SELECT * FROM user where isStudent='0' && isTutor='1'";
$statement = $dbhandler->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center" style="font-size: 35px; font-style: bold;">Tutors</h2>
    </div>
    <div class="card-body">
      <table class="table table-striped table-responsive-xl">
        <tr>
          <th style="font-size: 20px; font-style: bold;">ID</th>
          <th style="font-size: 20px; font-style: bold;">LogId</th>
          <th style="font-size: 20px; font-style: bold;">UserName</th>
          <th style="font-size: 20px; font-style: bold;">Address</th>
          
          <th style="font-size: 20px; font-style: bold;">City</th>
          <th style="font-size: 20px; font-style: bold;">Phone</th>
          <th style="font-size: 20px; font-style: bold;">Email</th>
          
          <th style="font-size: 20px; font-style: bold;">Action</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->user_id; ?></td>
            <td><?= $person->login; ?></td>
            <td><?= $person->username; ?></td>
            
            <td><?= $person->address; ?></td>
            <td><?= $person->city; ?></td>
            <td><?= $person->phone; ?></td>
            
            <td><?= $person->email; ?></td>
            <td>
              <a href="editTu.php?id=<?= $person->user_id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="deleteTu.php?id=<?= $person->user_id ?>" class='btn btn-danger'>Delete</a>
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
