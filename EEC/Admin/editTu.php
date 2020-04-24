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
$sql = 'SELECT * FROM user WHERE user_id=:id';
$statement = $dbhandler->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['login'])  && isset($_POST['username']) && isset ($_POST['address'])  && isset($_POST['city']) && isset ($_POST['phone'])  && isset($_POST['email']) ) {
  $login = $_POST['login'];
  $username = $_POST['username'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  
  $sql = 'UPDATE user SET login=:login, username=:username, address=:address, city=:city, phone=:phone, email=:email WHERE user_id=:id';
  $statement = $dbhandler->prepare($sql);
  if ($statement->execute([':login' => $login, ':username' => $username,':address' => $address, ':city' => $city,':phone' => $phone, ':email' => $email ,':id' => $id])) {
    header("Location: viewTutor.php");
  }



}


 ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header" style="background: #D0D0D0">
      <h2 align="center">Tutor</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
            <label for="name" style="font-size: 17px;">Login Id</label>
          <input value="<?= $person->login; ?>" type="text" name="login" id="login" class="form-control">
        </div>
        <div class="form-group">
          <label for="email" style="font-size: 17px;">UserName</label>
          <input type="text" value="<?= $person->username; ?>" name="username" id="username" class="form-control">
          </div>
        <div class="form-group">
          <label for="email" style="font-size: 17px;">Address</label>
          <textarea value="<?= $person->address; ?>" name="address" id="address" class="form-control">
          </textarea></div>
        <div class="form-group">
          <label for="name" style="font-size: 17px;">City</label>
          <input value="<?= $person->city; ?>" type="text" name="city" id="city" class="form-control">
        </div>
        <div class="form-group">
          <label for="name" style="font-size: 17px;">Phone</label>
          <input value="<?= $person->phone; ?>" type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
          <label for="name" style="font-size: 17px;">Email</label>
          <input value="<?= $person->email; ?>" type="email" name="email" id="email" class="form-control">
        </div>
        
          
          
          <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
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
