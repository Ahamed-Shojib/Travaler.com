<?php
//include('../conn.php');
//session_start();
error_reporting(0);

session_start();
$conn = new mysqli('localhost', 'root', '', 'travel');

// Check if user is logged in by verifying the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if no session exists
    header('location:index.php');
    exit;
}

// Fetch user details from the database using the user ID
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM users WHERE id = $user_id");

// Check if user exists in the database
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // Redirect to login page if user does not exist
    header('location:index.php');
    exit;
}
$fatch = $user['email'];
$fatch_first_name = $user['first_name'];
$fatch_last_name = $user['last_name'];
$fatch_email = $user['email'];
$fatch_mobile = $user['mobile'];
$fatch_gender = $user['gender'];
$fatch_password = $user['password'];
$fatch_dob = $user['dob'];
$fatch_nation = $user['nation'];
$fatch_religion = $user['religion'];
$fatch_blood = $user['blood'];
$fatch_gurdian = $user['gurdian_n'];
$fatch_present_add = $user['present_add'];
$fatch_parmanent_add = $user['parmanent_add'];
$fatch_marit = $user['marit'];
?>