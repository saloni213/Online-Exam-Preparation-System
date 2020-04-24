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



<?php
require '../database.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM question WHERE que_id=:id';
$statement = $dbhandler->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['quedesc'])  && isset($_POST['tans']) ) {
  $quedesc = $_POST['quedesc'];
  $tans = $_POST['tans'];
  
  $sql = 'UPDATE question SET que_desc=:quedesc, true_ans=:tans WHERE que_id=:id';
  $statement = $dbhandler->prepare($sql);
  if ($statement->execute([':quedesc' => $quedesc, ':tans' => $tans,':id' => $id])) {
    header("Location: viewTestList.php");
  }



}


 ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header"  style="background: #D0D0D0">
      <h2 style="font-size: 35px; font-style: bold;" align="center">Edit</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
       <!-- <div class="form-group">
          <label for="email">Question</label>
          <textarea value="<?= $person->que_desc; ?>" name="quedesc" id="quedesc" class="form-control">
          </textarea></div>
       --> <div class="form-group">
          <label for="name" style="font-size: 20px; font-style: bold;">Question</label>
          <input value="<?= $person->que_desc; ?>" type="text" name="quedesc" id="quedesc" class="form-control">
        </div>
        
          <div class="form-group">
          <label for="name" style="font-size: 20px; font-style: bold;">True Answer</label>
          <input value="<?= $person->true_ans; ?>" type="text" name="tans" id="tans" class="form-control">
        </div>
        
          
          
          <div class="form-group">
          <button type="submit" class="btn btn-info">Update Question</button>
        </div>
      </form>
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

