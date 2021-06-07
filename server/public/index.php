<?php

  require_once "../api/_resources.php";

  switch($request["path"]){
    case '/':
      readfile('index.html');
      exit;
    case '/api/todos':
      $path = $request['path'];
      require_once "..$path.php";
  }
?>
