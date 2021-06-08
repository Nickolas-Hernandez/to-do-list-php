<?php

require_once "db.php";

$result = mysqli_query($db, "SELECT * FROM to_dos", MYSQLI_USE_RESULT);

?>
