<?php
if (!isset($_SESSION)) session_start();

if(isset($_SESSION['user_id'])) {
  include_once 'db_credentials.php';
  
  $token = $_GET['id'];

  $conn = new mysqli($servername, $username, $password, $database);
  if (!$conn->connect_error) {
    $sql = "INSERT INTO `carts`(`user_id`, `book_id`) VALUES (".$_SESSION['user_id'].",".$_GET['id'].")";
  
    $conn->query($sql);
    $conn->close();
  }
}

header("Location: index");
