<?php
include('../conn.php');
session_start();
error_reporting(0);
$fatch = $_SESSION['admin_log']['email'];
if(empty($_SESSION['admin_log']))
{
  header('location:admin_home.php');
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
            <a class="navbar-brand" href="../index.php" id="logo"><span>T</span>ravaler</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
        </div>
        <div style="text-align: right;" class="collapse navbar-collapse" id="mynavbar">
            <a class="btn btn-outline-danger mx-2 my-2" href="admin_logout.php">Logout</a>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="container my-3" id="desh_area">
        <div class="row">
            <div class="col-md-12 mx-auto my-5 text-center">
                <h1 style="font-family: Rubik Wet Paint;">Welcome to Admin Dashboard</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h2 class="text-success my-3" style="font-family: Rubik Wet Paint;">Recent Activities</h2>
                <ul>
                    <li>Log in Admin : <?php echo$_SESSION['admin_log']['name'];?></li>
                    <li>Admin Email : <?php echo$_SESSION['admin_log']['email'];?></li>
                </ul>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <h2 class="text-success" style="font-family: Rubik Wet Paint;">Quick Links</h2>
                <ul class="quick_link">
                    <li><a href="../index.php">Back to Home</a></li>
                    <li><a href="view_profile.php">View Profile</a></li>
                    <li><a href="update_profile.php">Edit Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="admin_logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>