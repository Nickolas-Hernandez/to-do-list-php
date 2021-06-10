<?php

require_once "db.php";

$result = mysqli_query($db, "SELECT * FROM to_dos", MYSQLI_USE_RESULT);

if(mysqli_error($db)){
  echo "Unable to access database" . mysqli_error($db);
  exit;
}

?>
