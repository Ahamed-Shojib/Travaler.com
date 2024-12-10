<?php
require('conn.php');
session_start();
error_reporting(0);
$fatch = $_SESSION['user_log']['email'];
if(empty($_SESSION['user_log']))
{
  header('location:agency_home.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agency Panel</title>
  <link rel="icon" href="images/Tour-Logo.png">
  <link rel="stylesheet" href="css/style.css">

  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awesome Cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
</head>

<body id="dashboard">
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container" id="nav_bar">
      <a class="navbar-brand" href="index.php" id="logo"><span>A</span>gency</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span><i class="fa-solid fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#book">Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#packages">Your Packages</a>
          </li>
        </ul>
        <a class="btn btn-outline-danger mx-2 my-2" href="agency_logout.php">Logout</a>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <div class="container my-3" id="desh_area">
    <div class="row">
      <div class="col-md-12 mx-auto my-5 text-center">
        <h1 style="font-family: Rubik Wet Paint;">Welcome to Agency Panel</h1>
        <hr>
      </div>
    </div>

    <!-- Booking Section Start -->
    <section class="book" id="book">
      <div class="container">
        <div class="main-text">
          <h1><span>B</span>ooking</h1>
        </div>

        <?php
        if(isset($_POST['submit'])){
          $tour_code = $_POST['tour_code'];
          $location = $_POST['locations'];
          $date = $_POST['dates'];
          $price = $_POST['price'];
          $seat = $_POST['seats'];

          $sql = "INSERT INTO book(tour_code, locations, dates, total_price, seats, email) 
                  VALUES ('$tour_code', '$location', '$date', '$price', '$seat', '$fatch')";
          $result = mysqli_query($conn,$sql);
        }
        ?>

        <div class="row">
          <div class="col-md-8 py-3 py-md-0 mx-auto">
            <div class="book_area">
              <form action="#" method="POST">
                <label class="my-2" for="tour_code">Tour Code:</label>
                <input type="text" name="tour_code" class="form-control" id="tour_code" placeholder="Enter Tour Code" required>

                <label class="my-2" for="location">Select a Destination:</label>
                <select class="form-select" id="location" name="locations" required>
                  <?php 
                  $sql = "SELECT * FROM avail_tour";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result) > 0){
                      while($tour_fatch = mysqli_fetch_assoc($result)){
                        echo "<option value='{$tour_fatch['locations']}'>{$tour_fatch['locations']}</option>";
                      }
                  }
                  ?>
                </select>

                <label class="my-2" for="dates">Select Date:</label>
                <input type="date" name="dates" class="form-control" id="dates" required>

                <label class="my-2" for="price">Price (TK):</label>
                <input type="number" name="price" class="form-control" id="price" required>

                <label class="my-2" for="seats">Seats:</label>
                <input type="number" name="seats" class="form-control" id="seats" required>

                <input type="submit" name="submit" value="Book Now" class="submit btn btn-outline-warning mt-3">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Booking Section End -->

    <!-- Your Tour Packages Section -->
    <div class="container">
      <div class="row available_tour my-3">
        <h4 class="text-danger my-3" style="font-family: Rubik Wet Paint;">Your Tour Packages:</h4>
        <?php 
        $sql = "SELECT * FROM upcomming";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            while($tour_fatch = mysqli_fetch_assoc($result)){
        ?>
        <div class="col-md-4 my-3">
          <div class="card">
            <img src="images/tour-placeholder.jpg" class="card-img-top" alt="<?php echo $tour_fatch['locations']; ?>">
            <div class="card-body">
              <h5 class="card-title text-info h2" style="font-family: Rubik Wet Paint;"><?php echo $tour_fatch['locations']; ?></h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-primary"><strong>Price: <?php echo $tour_fatch['price']; ?> TK</strong></li>
              <li class="list-group-item text-warning"><strong>Date: <?php echo $tour_fatch['dates']; ?></strong></li>
              <li class="list-group-item text-danger"><strong>Available Seats: <?php echo $tour_fatch['seats']; ?></strong></li>
            </ul>
          </div>
        </div>
        <?php
            }
        }
        ?>
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
