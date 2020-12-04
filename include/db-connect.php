<?php

function generate($dbname, $nick, $pwd){
  try{
    $conn = new PDO("mysql:host=localhost;dbname=$dbname", $nick, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    header("location: /");
    die();
  }
  return $conn;
}

$conn = generate("beam-ms","root", "AdminLuser");
