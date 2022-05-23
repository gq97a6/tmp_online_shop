<?php
include_once 'db_credentials.php';

$token = $_GET['t'];

$conn = new mysqli($servername, $username, $password, $database);
if (!$conn->connect_error) {
  $sql = "UPDATE `users` SET `confirm` = '' WHERE `users`.`confirm` = '".$token."';";

  $conn->query($sql);
  $conn->close();
}

header("Location: login");
