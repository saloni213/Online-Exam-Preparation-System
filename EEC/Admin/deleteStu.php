<?php
require '../database.php';
$id = $_GET['id'];
$sql = 'DELETE FROM user WHERE user_id=:id';
$statement = $dbhandler->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: viewStudent.php");
}