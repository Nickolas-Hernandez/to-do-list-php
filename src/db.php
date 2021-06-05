<?php

  $database = mysqli_connect('localhost', 'root', 'root', 'to_do_list_php');

  if(!$database){
    echo("unable to connect to database");
  }

?>
