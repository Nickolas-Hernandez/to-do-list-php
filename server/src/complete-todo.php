<?php
echo 'poop';
if(isset($_GET['id'])){
  require_once 'db.php';
  $id = $_GET['id'];
  $status = $_GET['isCompleted'] === 'false' ? 'true' : "false";
  $sql = 'UPDATE to_dos SET isCompleted = ? WHERE id = ?';
  $statement = mysqli_prepare($db, $sql);
  mysqli_stmt_bind_param($statement, 'ss', $status, $id);
  mysqli_stmt_execute($statement);
  if(mysqli_error($db)){
    echo "Unable to access database" . mysqli_error($db);
    exit;
  }
}
