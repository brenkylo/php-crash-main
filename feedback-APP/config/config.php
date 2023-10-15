<?php
  define('DB_HOST', 'localhost');
  define('DB_USER', 'bren');
  define('DB_PASS', '1234');
  define('DB_NAME', 'feedback_app');

  //Create Connection
  //Instantiate

  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  //check connection
  if ($conn->connect_error){
    die('Connection Failed'. $conn->connect_error);//die function wich is cuts all
  }
 