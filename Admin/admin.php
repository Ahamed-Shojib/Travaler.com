<?php
session_start();
require('../conn.php');

if(isset($_POST['submit'])){

  $email     = $_POST['mail'];
  $password = $_POST['password'];

    $sql= "SELECT * FROM admin_info WHERE email = '$email' AND admin_pass= '$password'";
    $query = $conn->query($sql);

  if($query -> num_rows > 0)
  {
      $compar = $query-> FETCH_ASSOC();
      $_SESSION['admin_log'] = $compar;
      header('location:admin_home.php');
  }
  else{
    $error_mgs = "Wrong Combination !";
  }
}
?>

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
            <!-- <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#book">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#packages">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallary">Gallary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-warning" type="button">Search</button>
                </form>
                <a class="btn btn-outline-danger mx-2 my-2" href="user_login.php">Log
                    In</a>
            </div> -->
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="container" id="log">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center my-2"><a href="index.php">Admin Log In</a></h4>
                    </div>
                    <form action="#" method="post">
                        <label class="my-2" for="mail">Email :</label>
                        <input class="form-control" type="email" name="mail" id="mail" placeholder="exmaple@mail.com">
                        <label class="my-2" for="password">Password
                            :</label><br>
                        <input class="form-control" type="password" name="password" id="password"
                            placeholder="* * * * * * * * *">
                        <input class="btn btn-outline-warning my-3 d-block mx-auto" type="submit" name="submit"
                            value="Log In">
                        <!-- <label class="my-4 mx-2" for="forget">Are You New?<a style="margin-left:5px;"
                                href="user_signup.php">Sign Up</a></label> -->

                        <label style="display: block; text-align:center" class="d-block mx-auto text-danger">
                            <?php if(isset($_POST['submit'])){echo $error_mgs;}?></label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>