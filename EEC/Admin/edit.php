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

<?php
require '../database.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM topic WHERE top_id=:id';
$statement = $dbhandler->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['top_name'])  && isset($_POST['top_desc']) ) {
  $top_name = $_POST['top_name'];
  $top_desc = $_POST['top_desc'];
  $sql = 'UPDATE topic SET top_name=:top_name, top_desc=:top_desc WHERE top_id=:id';
  $statement = $dbhandler->prepare($sql);
  if ($statement->execute([':top_name' => $top_name, ':top_desc' => $top_desc, ':id' => $id])) {
    header("Location: viewTopic.php");
  }



}


 ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center">Topic</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
            <label for="name" style="font-size: 20px;">Name</label>
          <input value="<?= $person->top_name; ?>" type="text" name="top_name" id="top_name" class="form-control">
        </div>
        <div class="form-group">
            <label  style="font-size: 20px;">Description</label>
          <textarea value="<?= $person->top_desc; ?>" name="top_desc" id="top_desc" class="form-control">
          </textarea></div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update Topic</button>
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
