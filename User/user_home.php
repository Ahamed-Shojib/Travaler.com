<?php
//include('../conn.php');
//session_start();
include('../re_use/session_user_name.php');
error_reporting(0);
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
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Traveler Dashboard</title>
  <?php
    include('../re_use/links.php');
    ?>

</head>

<body id="dashboard">
  <!-- Navbar Start -->
  <?php
    include('../re_use/nev.php');
    ?>
  <!-- Navbar End -->
  <div class="container my-3" id="desh_area">
    <div class="row">
      <div class="col-md-12 mx-auto my-5 text-center">
        <h1 style="font-family: Rubik Wet Paint;">Welcome to Travel Dashboard</h1>
        <hr>
        <div class="text-center h4 text-success mt-5" id="book_success">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php if(isset($_POST['submit'])){echo "Booking Successful!";}?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
    </div>

    <!-- Section Book Start -->
    <section class="book" id="book">
      <div class="container">
        <div class="main-text">
          <h1><span>B</span>ooking</h1>
        </div>

        <?php
                if(isset($_POST['submit'])){
                    $location = $_POST['locations'];
                    $seat = $_POST['seats'];
                    $price = $_POST['price'];
                    $date = $_POST['dates'];
                    $ticket_no = mt_rand(1000, 1000000);
                        // $already_sql = "SELECT locations,price,dates FROM avail_tour WHERE locations='$locations' AND price='$price' AND dates='dates'";
                        // $already_result = mysqli_query($conn,$already_sql);

                        $sql = "INSERT INTO book(ticket_no,locations,seats,total_price,dates,email) VALUES ('$ticket_no','$location','$seat','$price','$date','$fatch')";
                        $result = mysqli_query($conn,$sql);
          
                }

        ?>

        <div class="row">
          <div class="col-md-8 py-3 py-md-0 mx-auto">
            <div class="book_area">
              <form action="#" method="POST">
                <label class="my-2" for="location">Select a Destination:</label>
                <select class="form-select" id="location" name="locations" required>
                  <?php 
                    $sql = "SELECT * FROM avail_tour";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while($tour_fatch = mysqli_fetch_assoc($result) ){
                            $tour_id = $tour_fatch['tour_id'];
                            $location = $tour_fatch['locations'];
                            $details = $tour_fatch['details'];   
                            $date = $tour_fatch['dates'];  
                            $price = $tour_fatch['price'];  
                            $seats = $tour_fatch['seats'];                       
                ?>
                  <option value="<?php echo "$location"?>"><?php echo $location?></option>
                  <?php
                  
                    }
                  }
                ?>
                </select>
                <label class="my-2" for="amount">Select Booking Amount:</label>
                <input type="number" name="seats" class="form-control" id="amount" value="1" required>
                <label class="my-2" for="amount">Select Booking Date:</label>
                <input type="date" name="dates" class="form-control" placeholder="Arrivals" required><br>

                <!--<input type="text" name="price" class="form-control" value="<?php echo $price ?> " readonly>-->
                <input type="submit" name="submit" value="Book Now" class="submit btn btn-outline-warning"
                  onsubmit="book_success_msg()" required>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- Section Book End -->


    <div class="tour_now">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mx-auto">
            <h4 class="text-success my-3" style="font-family: Rubik Wet Paint;">Available Tour List : </h4>
            <table class="table  table-hover">
              <thead class="table-danger">
                <tr class="text-center">
                  <th scope="col">Tour Code</th>
                  <th scope="col">Location</th>
                  <th scope="col">Date</th>
                  <th scope="col">Price(TK)</th>
                  <th scope="col">Seats</th>
                </tr>
              </thead>
              <?php 
                    $sql = "SELECT * FROM avail_tour ";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while($tour_fatch = mysqli_fetch_assoc($result) ){
                            $tour_id = $tour_fatch['tour_id'];
                            $location = $tour_fatch['locations'];
                            $details = $tour_fatch['details'];   
                            $date = $tour_fatch['dates'];  
                            $price = $tour_fatch['price'];  
                            $seats = $tour_fatch['seats'];                       
                ?>
              <tbody>
                <tr class="text-center">
                  <th scope="row"><?php echo $tour_id?></th>
                  <td><?php echo $location?></td>
                  <td><?php echo $date?></td>
                  <td><?php echo $price?></td>
                  <td><?php echo $seats?></td>
                </tr>
              </tbody>
              <?php
          }
        }
      ?>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="container">

      <div class=" row available_tour my-3">
        <h4 class="text-danger my-3" style="font-family: Rubik Wet Paint;">Upcomming Tour :</h4>
        <?php 
                    $sql = "SELECT * FROM upcomming";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while($tour_fatch = mysqli_fetch_assoc($result) ){
                            $tour_id = $tour_fatch['tour_id'];
                            $location = $tour_fatch['locations'];
                            $details = $tour_fatch['details'];   
                            $date = $tour_fatch['dates'];  
                            $price = $tour_fatch['price'];  
                            $seats = $tour_fatch['seats'];                       
                ?>
        <div class="col-md-4  my-3">
          <div class="card">
            <img
              src="https://img.freepik.com/premium-photo/young-people-together-planning-trip-europe-top-view-empty-white-space-notebook-where-you-time-plan-text-travel-concept_292052-1627.jpg"
              class="card-img-top" alt="cox's">
            <div class="card-body">
              <h5 class="card-title text-info h2" style="font-family: Rubik Wet Paint;"><?php echo $location?></h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item text-primary"><strong>Price : <?php echo $price?>Tk</strong></li>
              <li class="list-group-item text-warning"><strong>Date : <?php echo $date?></strong></li>
              <li class="list-group-item text-danger"><strong>Available Seat : <?php echo $seats?></strong></li>
            </ul>
            <div class="card-body">
              <a href="#" class="btn btn-outline-warning">Book</a>
              <a href="#" class="btn btn-outline-success">Detail</a>
            </div>
          </div>
        </div>
        <?php
              }
            }
        ?>
      </div>
      <div class="row">
        <div class="col">
          <h2 class="text-success my-3" style="font-family: Rubik Wet Paint;">Recent Activities</h2>
          <ul>
            <li>Log in User : <?php echo $user['first_name'];?></li>
            <li>User Email : <?php echo $user['email'];?></li>
            <li>User Phone : <?php echo $user['mobile'];?></li>
          </ul>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <h2 class="text-success" style="font-family: Rubik Wet Paint;">Quick Links</h2>
          <ul class="quick_link">
            <li><a href="index.php">Back to Home</a></li>
            <li><a href="view_profile.php">View Profile</a></li>
            <li><a href="update_profile.php">Edit Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="../transport/transport_gate.php">Transport</a></li>
            <li><a href="user_logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php
  include('../re_use/footer.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
</body>

</html>