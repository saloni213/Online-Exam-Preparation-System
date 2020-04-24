<?php
require '../database.php';
$id = $_GET['id'];
$sql = 'DELETE FROM topic WHERE top_id=:id';
$statement = $dbhandler->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: viewTopic.php");
}