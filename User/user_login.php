<?php
ini_set('display_errors', 0);

session_start();
$conn = new mysqli('localhost', 'root', '', 'travel');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'  AND password = '$password'");
    $user = $result->fetch_assoc();

    if ($user['email']) {
        $_SESSION['user_id'] = $user['id'];
        header('location:user_home.php');
    } else {
        $error_mgs = "Wrong Combination !";
    }
}
?>

</html>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Traveler Log In</title>
  <?php
    include('../re_use/links.php');
    ?>
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container" id="nav_bar">
      <a class="navbar-brand" href="../index.php" id="logo"><span>T</span>ravaler</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span><i class="fa-solid fa-bars"></i></span>
      </button>
    </div>
  </nav>
  <!-- Navbar End -->
  <div class="container" id="log">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center my-2"><a href="../index.php">Log In</a></h4>
          </div>
          <form action="#" method="post">
            <label class="my-2" for="mail">Email :</label>
            <input class="form-control" type="email" name="email" id="mail" placeholder="exmaple@mail.com">
            <label class="my-2" for="password">Password
              :</label><br>
            <input class="form-control" type="password" name="password" id="password" placeholder="* * * * * * * * *">
            <input class="btn btn-outline-primary my-3" type="submit" name="submit" value="Log In">
            <label class="my-4 mx-2 text-primary" for="forget">Are You New?<a style="margin-left:5px;"
                class="text-danger" href="user_signup.php">Sign
                Up</a></label>

            <label class="d-block mx-auto text-danger">
              <?php if(isset($_POST['submit'])){echo $error_mgs;}?></label>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer Start -->
  <?php
  include('../re_use/footer.php');
  ?>
  <!-- Footer End -->
</body>

</html>