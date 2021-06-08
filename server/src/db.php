<?php

$db = mysqli_connect('localhost:8889', 'root', 'root', 'to_do_app');

if(mysqli_connect_errno()){
  echo "Failed to connect to MYSQL database: " . mysqli_connect_error();
  exit;
}
