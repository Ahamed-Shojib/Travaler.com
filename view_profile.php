<?php
include('conn.php');
session_start();
$fatch = $_SESSION['user_log']['email'];
if(empty($_SESSION['user_log']))
{
  header('location:user_home.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveler Dashboard</title>

    <link rel="stylesheet" href="style.css">

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
                <a class="btn btn-outline-danger mx-2 my-2" href="user_logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="container my-3" id="desh_area">
        <div class="row">
            <div class="col-md-12 mx-auto my-4 text-center">
                <h1 style="font-family: Rubik Wet Paint;" class="text-warning">Hello
                    <?php echo $_SESSION['user_log']['first_name'];?></h1>
                <hr>
                <h4 style="font-family: Rubik Wet Paint;" class="text-warning text-center"> </h4>
            </div>
        </div>
        <div class="log_img text-center">
            <img src="https://static.vecteezy.com/system/resources/previews/003/689/228/non_2x/online-registration-or-sign-up-login-for-account-on-smartphone-app-user-interface-with-secure-password-mobile-application-for-ui-web-banner-access-cartoon-people-illustration-vector.jpg"
                width="60%" alt="" class="rounded-2">
        </div>
        <div class="tour_now">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <h5 class="text-success my-3" style="font-family: Rubik Wet Paint;">Personal Info : </h5>
                        <hr>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>First Name :
                                </strong><?php echo$_SESSION['user_log']['first_name'];?></li>
                            <li class="list-group-item"><strong>Email :
                                </strong><?php echo$_SESSION['user_log']['email'];?></li>
                            <li class="list-group-item"><strong>User ID :
                                </strong><?php echo$_SESSION['user_log']['t_id'];?></li>
                            <li class="list-group-item"><strong>Date of Birth :
                                </strong><?php echo$_SESSION['user_log']['dob'];?></li>

                            <li class="list-group-item"><strong>Religion :
                                </strong><?php echo$_SESSION['user_log']['religion'];?></li>
                            <li class="list-group-item"><strong>Gender :
                                </strong><?php echo$_SESSION['user_log']['gender'];?></li>
                            <li class="list-group-item"><strong>Emergency Contact :
                                </strong><?php echo$_SESSION['user_log']['gurdian_n'];?></li>
                            <li class="list-group-item"><strong>Current Address :
                                </strong><?php echo$_SESSION['user_log']['present_add'];?></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Last Name :
                                </strong><?php echo$_SESSION['user_log']['last_name'];?></li>
                            <li class="list-group-item"><strong>Mobile :
                                </strong><?php echo$_SESSION['user_log']['mobile'];?></li>
                            <li class="list-group-item"><strong>Password :
                                </strong><?php echo$_SESSION['user_log']['pass'];?></li>
                            <li class="list-group-item"><strong>Nationality :
                                </strong><?php echo$_SESSION['user_log']['nation'];?></li>
                            <li class="list-group-item"><strong>Gender :
                                </strong><?php echo$_SESSION['user_log']['gender'];?></li>
                            <li class="list-group-item"><strong>Marital Status:
                                </strong><?php echo$_SESSION['user_log']['marit'];?></li>
                            <li class="list-group-item"><strong>Blood Group :
                                </strong><?php echo$_SESSION['user_log']['blood'];?></li>
                            <li class="list-group-item"><strong>Permanent Address :
                                </strong><?php echo$_SESSION['user_log']['parmanent_add'];?></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <h5 class="text-success my-3" style="font-family: Rubik Wet Paint;">Booking Info : </h5>
                        <hr>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-12">
                        <table class="table  table-hover">
                            <thead class="table-danger">
                                <tr class="text-center">
                                    <th scope="col">Tour Code</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Price(TK)</th>
                                    <th scope="col">Number of Ticket</th>
                                    <th scope="col">Ticket Number</th>
                                </tr>
                            </thead>
                            <?php 
                                $sql = "SELECT * FROM book WHERE email = '$fatch'";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($tour_fatch = mysqli_fetch_assoc($result) ){
                                        $tour_id = $tour_fatch['tour_id'];
                                        $location = $tour_fatch['locations'];   
                                        $date = $tour_fatch['dates'];  
                                        $price = $tour_fatch['price'];  
                                        $seats = $tour_fatch['seats'];
                                        $ticket_num = $tour_fatch['ticket_no'];                        
                            ?>
                            <tbody>
                                <tr class="text-center">
                                    <th scope="row"><?php echo $tour_id?></th>
                                    <td><?php echo $location?></td>
                                    <td><?php echo $date?></td>
                                    <td><?php echo $price?></td>
                                    <td><?php echo $seats?></td>
                                    <td><?php echo $ticket_num?></td>
                                </tr>
                            </tbody>
                            <?php
          }
        }
      ?>
                        </table>
                        <p class="text-center h4 text-danger my-2 mb-3" style="font-family: Rubik Wet Paint;">
                            <?php if(mysqli_num_rows($result) <= 0) {echo "No Record Found!";}?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-success" style="font-family: Rubik Wet Paint;">Quick Links</h1>
                    <ul class="quick_link">
                        <li><a href="index.php">Back to Home</a></li>
                        <li><a href="#">View Profile</a></li>
                        <li><a href="update_profile.php">Edit Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="user_logout.php">Logout</a></li>
                    </ul>
                </div>
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