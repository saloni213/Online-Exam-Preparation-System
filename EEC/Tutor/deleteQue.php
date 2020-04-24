<?php
require '../database.php';
$id = $_GET['id'];
$sql = 'DELETE FROM question WHERE que_id=:id';
$statement = $dbhandler->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: viewTestList.php");
}