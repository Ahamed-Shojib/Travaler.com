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
  <!-- Favicon -->
  <link rel="icon" href="images/Tour-Logo.png">

  <link rel="stylesheet" href="../css/style.css">

  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Bootstrap Link -->

  <!-- Font Awesome Cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <!-- Font Awesome Cdn -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <!-- Google Fonts -->
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
            <h4 class="text-center my-2"><a href="index.php">Log In</a></h4>
          </div>
          <form action="#" method="post">
            <label class="my-2" for="mail">Email :</label>
            <input class="form-control" type="email" name="email" id="mail" placeholder="exmaple@mail.com">
            <label class="my-2" for="password">Password
              :</label><br>
            <input class="form-control" type="password" name="password" id="password" placeholder="* * * * * * * * *">
            <input class="btn btn-outline-warning my-3" type="submit" name="submit" value="Log In">
            <label class="my-4 mx-2" for="forget">Are You New?<a style="margin-left:5px;" href="user_signup.php">Sign
                Up</a></label>

            <label class="d-block mx-auto text-danger">
              <?php if(isset($_POST['submit'])){echo $error_mgs;}?></label>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer Start -->
  <footer id="footer">
    <h1><span>T</span>ravaler</h1>
    <p>Stay up-to-date with the latest travel news, trends, and tips through
      our blog and newsletter.</p>
    <div class="social-links">
      <a href="https://www.facebook.com/ahamedshojib69"><i class="fa-brands fa-facebook"></i></a>
      <a
        href="https://www.linkedin.com/in/mehedi-hasan-shojib-645699249?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i
          class="fa-brands fa-linkedin"></i></a>
      <a href="https://github.com/Ahamed-Shojib"><i class="fa-brands fa-github"></i></a>
      <a href="https://www.youtube.com/channel/UCnqSrFTK2JLRhHWlPkVTTkw"><i class="fa-brands fa-youtube"></i></a>
    </div>
    <!-- <div class="credit">
        <p>Designed By <a href="https://github.com/Ahamed-Shojib">VallyNore
            Coding</a></p>
      </div> -->
    <div class="copyright">
      <p><sup>&copy;</sup> 2024 Copyright || All Rights Reserved</p>
    </div>
  </footer>
  <!-- Footer End -->
</body>

</html>