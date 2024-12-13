<?php
include('../re_use/session.php');
// session_start();
// $fatch = $_SESSION['user_log']['email'];
// if(empty($_SESSION['user_log']))
// {
//   header('location:user_home.php');
// }
//require("conn.php");

if(isset($_POST['submit'])){
   $email        = $_POST['email'];
   $dob          = $_POST['dob'];
   $pass         = $_POST['pass'];
   $mobile       = $_POST['mobile'];
   $gender       = $_POST['gender'];
   $religion     = $_POST['religion'];
   $nation       = $_POST['nation'];
   $blood        = $_POST['blood'];
   $marit        = $_POST['marit'];
   $gurdian_n  = $_POST['gurdian_n'];
   $present_add  = $_POST['present_add'];
   $parmament_add = $_POST['parmament_add'];

   /**/
            $sql = "UPDATE users SET  email ='$email', mobile ='$mobile',dob ='$dob', password='$pass', mobile ='$mobile', gender ='$gender', religion ='$religion', nation ='$nation', blood ='$blood', marit ='$marit', gurdian_n='$gurdian_n', present_add ='$present_add', parmanent_add ='$parmament_add' WHERE email= '$fatch_email' ";
            $query = mysqli_query($conn,$sql);
            $update_mgs = "Congratulation! Profile Updated.";

}
   
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveler Dashboard</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
    <!-- Google Fonts -->
</head>

<body id="dashboard">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container" id="nav_bar">
            <a class="navbar-brand" href="index.php" id="logo"><span>T</span>ravaler</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">

                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-warning" type="button">Search</button>
                </form> -->
                <a class="btn btn-outline-danger mx-2 my-2" href="user_logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="container my-3" id="desh_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto my-4 text-center">
                    <h1 style="padding:10px;font-family: Rubik Wet Paint;" class="text-warning">Hello
                        <?php echo $fatch_first_name;?></h1>
                    <hr>
                </div>
            </div>
        </div>
        <div class="container">


            <form action="update_profile.php" method="POST">
                <!-- Name and Department-->
                <div class="container">
                    <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);font-family: Rubik Wet Paint;"
                        class="my-3">User Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="first_name" class="my-2">First Name : </label><input class="form-control"
                                type="text" name="first_name" value="<?php echo $fatch_first_name;?>" disabled>
                            <label for="email" class="my-2">Email : </label><input class="form-control" type="text"
                                name="email" value="<?php echo $fatch_email;?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="my-2">Last Name : </label><input class="form-control"
                                type="text" name="last_name" value="<?php echo $fatch_last_name;?>" disabled>
                            <label for="mobile" class="my-2">Mobile : </label><input class="form-control" type="text"
                                name="mobile" value="<?php echo $fatch_mobile;?>" disabled>
                        </div>
                    </div>
                </div>

                <!-- Personal Address-->
                <div class="container">
                    <h3 style="padding:10px;border-bottom:2px solid rgb(17, 143, 143);color:rgb(17, 143, 143);font-family: Rubik Wet Paint;"
                        class="my-3">
                        Basic Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="mail" class="my-2 ml-2">Email : </label><input class="form-control" type="mail"
                                name="email" value="<?php echo $fatch_email;?>">
                            <label for="dob" class="my-2 ml-2">Password : </label><input class="form-control"
                                type="text" name="pass" value="<?php echo $fatch_password;?>">

                            <label for="gender" class="my-2 ml-2">Gender : </label><input class="form-control"
                                type="text" name="gender" value="<?php echo $fatch_gender;?>">
                            <label for="religion" class="my-2 ml-2">Religion : </label><input class="form-control"
                                type="text" name="religion" value="<?php echo $fatch_religion;?>">
                            <label for="matrial_status" class="my-2 ml-2">Matrial Status : </label><input
                                class="form-control" type="text" name="marit" value="<?php echo $fatch_marit;?>">
                            <label for="present_add" class="my-2 ml-2">Current Address : </label><input
                                class="form-control" type="text" name="present_add"
                                value="<?php echo $fatch_present_add;?>">
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="my-2 ml-2">Mobile Number : </label><input class="form-control"
                                type="text" name="mobile" value="<?php echo $fatch_mobile;?>">
                            <label for="dob" class="my-2 ml-2">Date of Birth : </label><input class="form-control"
                                type="date" name="dob" value="<?php echo $fatch_dob;?>">
                            <label for="blood" class="my-2 ml-2">Blood Group : </label><input class="form-control"
                                type="text" name="blood" value="<?php echo $fatch_blood;?>">
                            <label for="nation" class="my-2 ml-2">Nationality : </label><input class="form-control"
                                type="text" name="nation" value="<?php echo $fatch_nation;?>">
                            <label for="gurdian_n" class="my-2 ml-2">Emergency Number : </label><input
                                class="form-control" type="text" name="gurdian_n" value="<?php echo $fatch_gurdian;?>">
                            <label for="parmament_address" class="my-2 ml-2">Parmament Address : </label><input
                                class="form-control" type="text" name="parmament_add"
                                value="<?php echo $fatch_parmanent_add;?>">
                        </div>
                    </div>
                </div>
                <div class="text-center my-4">
                    <input class="btn btn-outline-success" type="submit" name="submit" value="Update Profile">
                    <label
                        style="color:green;display:block;margin-left:15px;margin-top:10px;"><?php if(isset($_POST['submit'])){echo $update_mgs;}?>
                    </label>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-success" style="font-family: Rubik Wet Paint;">Quick Links</h1>
                    <ul class="quick_link" style="font-weight:600">
                        <li><a href="index.php">Back to Home</a></li>
                        <li><a href="user_home.php">User Home</a></li>
                        <li><a href="view_profile.php">View Profile</a></li>
                        <li><a href="#">Edit Profile</a></li>
                        <li><a href="user_logout.php">Logout</a></li>
                    </ul>
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