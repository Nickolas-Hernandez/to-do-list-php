<?php

  if(isset($_GET['id'])){
    require_once 'db.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM to_dos WHERE id = ?";
    $statement = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($statement, 's', $id);
    mysqli_stmt_execute($statement);
  }
  if(mysqli_error($db)){
    echo "Unable to access database" . mysqli_error($db);
    exit;
  }
?>
