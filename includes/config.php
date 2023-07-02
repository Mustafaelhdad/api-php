<?php

  $host = 'localhost';
  $db   = 'phprest';
  $user = 'root';
  $pass = '';

  try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($pdo) {
      echo 'Connected to the ' . $db . ' successfully!';
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }