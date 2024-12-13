<?php 
session_start();
$user_first_name = ''; // Default value
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  // Fetch user first name from database based on user_id
  $conn = new mysqli('localhost', 'root', '', 'travel');
  $result = $conn->query("SELECT first_name FROM users WHERE id='$user_id'");
  $user = $result->fetch_assoc();
  if ($user) {
    $user_first_name = $user['first_name'];
  }
  $conn->close();
}?>