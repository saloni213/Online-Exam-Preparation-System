<?php
require '../database.php';
$id = $_GET['id'];
$sql = 'DELETE FROM test WHERE test_id=:id';
$statement = $dbhandler->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: viewTestList.php");
}