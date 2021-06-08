<?php

  if(count($_POST) > 0) {
    require_once 'db.php';
    $statement = mysqli_prepare($db, "INSERT INTO to_dos (task, isCompleted) VALUES (?, ?)");
    $task = $_POST["task"];
    $isCompleted = "false";
    mysqli_stmt_bind_param($statement, 'ss', $task, $isCompleted);
    mysqli_stmt_execute($statement);
    if(mysqli_error($db)){
      echo "oops";
    }
  }
?>
