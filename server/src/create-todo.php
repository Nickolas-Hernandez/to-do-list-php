<?php
  if(isset($_GET["task"])) {
    echo 'yes';
    require_once 'db.php';
    $statement = mysqli_prepare($db, "INSERT INTO to_dos (task, isCompleted) VALUES (?, ?)");
    $task = $_GET["task"];
    $isCompleted = "false";
    mysqli_stmt_bind_param($statement, 'ss', $task, $isCompleted);
    mysqli_stmt_execute($statement);
    if(mysqli_error($db)){
      echo "oops";
      exit;
    }
  }
?>
