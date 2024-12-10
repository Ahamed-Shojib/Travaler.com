<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'travel');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize date and query result
$selected_date = $_GET['date'] ?? date('Y-m-d');
$result = $conn->query("SELECT * FROM transport WHERE available_seats > 0 AND date = '$selected_date'");

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Safely retrieve the session and POST data
    $user_id = $_SESSION['user_id'] ?? null;
    $transport_id = $_POST['transport_id'] ?? null;
    $seat_number = $_POST['seat_number'] ?? null;

    // Validate input data
    if ($user_id && $transport_id && $seat_number) {
        // Insert booking into the database
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, transport_id, seat_number) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $user_id, $transport_id, $seat_number);
        $stmt->execute();
        $stmt->close();

        // Update remaining seats
        $conn->query("UPDATE transport SET available_seats = available_seats - 1 WHERE id = $transport_id");

        $message = "<div class='alert alert-success'>Booking successful! Seat Number: $seat_number</div>";
    } else {
        $message = "<div class='alert alert-danger'>Invalid booking data. Please try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Transport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Available Transport</h3>

        <!-- Date Picker -->
        <form method="GET" action="">
            <div class="row " >
                <div class="col-lg-8 col-md-4 col-sm-12 my-2">
                    <input type="date" id="date" name="date" class="form-control" value="<?php echo $selected_date; ?>" required>
                </div>
                <div class=" col-lg-4 col-md-6 col-sm-12 my-2">
                    <button type="submit" class="btn btn-outline-primary d-block mx-auto">Show Available Transport</button>
                </div>
            </div>

        </form>

        <hr>

        <!-- Display available transport for selected date -->
        <?php if ($result->num_rows > 0) { ?>
            <div class="row g-4">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-4 my-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Transport Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo ucfirst($row['type']); ?> Transport</h5>
                                <p class="card-text">
                                    <strong>Date:</strong> <?php echo $row['date']; ?><br>
                                    <strong>Available Seats:</strong> <?php echo $row['available_seats']; ?>
                                </p>
                                <!-- <form action="seat_cart.php" method="POST">
                                <input type="hidden" name="transport_id" value="<?php echo $row['id']; ?>">
                                <label for="seat_number">Select Seat:</label>
                                <select class="form-select" name="seat_number" required>
                                    <?php
                                    for ($i = 1; $i <= $row['available_seats']; $i++) {
                                        echo "<option value='$i'>Seat $i</option>";
                                    }
                                    ?>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Book Now</button>
                            </form> -->
                                <a href="select_seat.php?transport_id=<?php echo $row['id']; ?>" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>No available transport for the selected date.</p>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>