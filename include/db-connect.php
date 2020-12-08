<?php

$servername = "localhost";
$username = "root";
$password = "AdminLuser";

// function generate($dbname, $nick, $pwd){
//   try{
//     $conn = new PDO("mysql:host=localhost;dbname=$dbname", $nick, $pwd);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   } catch(PDOException $e) {
//     header("location: /");
//     die();
//   }
//   return $conn;
// }
//
//

try {
  $conn = new PDO("mysql:host=$servername;dbname=beam-ms", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
