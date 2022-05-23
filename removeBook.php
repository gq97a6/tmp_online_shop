<?php
if (!isset($_SESSION)) session_start();

if(isset($_SESSION['user_id'])) {
  include_once 'db_credentials.php';

  $conn = new mysqli($servername, $username, $password, $database);
  if (!$conn->connect_error) {
    $sql = "DELETE FROM `carts` WHERE id = ".$_GET['id'];
  
    $conn->query($sql);
    $conn->close();
  }
}

header("Location: shopcart");