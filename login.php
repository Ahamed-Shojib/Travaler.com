<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'travel');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user['username']) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: profile.php");
    } else {
        echo "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <form method="POST">
        <input type="text" name="username" required placeholder="Username">
        <input type="password" name="password" required placeholder="Password">
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
