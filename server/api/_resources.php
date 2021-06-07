<?php

$request = array(
  "method"=>$_SERVER["REQUEST_METHOD"],
  "path"=> parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),
  "headers"=>getallheaders(),
  "querySting"=>$_GET,
  "body"=>json_decode("php://input", true) ?? array()
);

$response = array(
  "status" => 200,
  "headers" => array(
    'Content-Type' => 'application/json'
  )
);

function sendResponse($response) {
  http_response_code($response["status"]);
  if(empty($response["body"])){
    unset($response["body"]);
    unset($response["headers"]["Content-Type"]);
  }
  foreach($response["headers"] as $key=>$value){
    header("$key: $value");
  }
  if(array_key_exists("body", $response )) {
    print (json_encode($response["body"]));
  }
  exit;
}
