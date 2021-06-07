<?php

  require_once('db.php');

  if($request["method"] === 'GET') {
    $response['status'] = 300;
    $sql = "SELECT * FROM to_dos";
    $result = mysqli_query($db, $sql, MYSQLI_USE_RESULT);
    sendResponse($response);
  }
