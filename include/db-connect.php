<?php
try {
  $conn = new PDO("mysql:host=localhost;dbname=beam-ms", "root", "AdminLuser");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  header("location: /");
  die();
}
