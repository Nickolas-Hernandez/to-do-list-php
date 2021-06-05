<?php

$to_do = $_POST['to_do'];

$isCompleted = "false";

$sql = "INSERT INTO to_dos (toDo, isCompleted) VALUES ('$to_do', '$isCompleted')";

$result = mysqli_query( $conn, $sql);
