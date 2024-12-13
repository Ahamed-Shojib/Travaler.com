<?php
include('../re_use/session_user_name.php');
// $fatch = $_SESSION['user_log'];
// if (empty($_SESSION['user_log'])) {
//     header('location:user_home.php');
//     exit;
// }

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not authenticated
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'travel');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch transport details
$transport_id = $_GET['transport_id'] ?? 0;
$result = $conn->query("SELECT available_seats FROM transport WHERE id = $transport_id");
$transport = $result->fetch_assoc();

if (!$transport) {
    echo "<p>Invalid transport selected</p>";
    exit;
}

// Fetch booked seats for the selected transport
$booked_seats_result = $conn->query("SELECT seat_number FROM bookings WHERE transport_id = $transport_id");
$booked_seats = [];
while ($row = $booked_seats_result->fetch_assoc()) {
    $booked_seats[] = $row['seat_number'];
}

// Total seats (can be customized based on vehicle type)
$total_seats = 32; // Example for bus/plane/car
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 65%;
        }

        .seat-selection label {
            cursor: pointer;
        }

        .selected {
            background-color: #D3D3D3;
        }
    </style>
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
        <div style="text-align: right;" class="collapse navbar-collapse" id="mynavbar">
            <?php if (!empty($user_first_name)): ?>
            <span class="navbar-text mx-2">Hi, <?php echo $user_first_name; ?></span>
            <a class="btn btn-outline-danger mx-2 my-2" href="../User/logout.php">Logout</a>
            <?php else: ?>
            <a class="btn btn-outline-primary mx-2 my-2" href="../User/user_login.php">Log In</a>
            <?php endif; ?>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="container my-3">
        <h3 class="text-center">Select Seats</h3>
        <form action="seat_cart.php" method="POST">
            <input type="hidden" name="transport_id" value="<?php echo $transport_id; ?>">

            <div class="row g-2 border py-3 px-3 my-2 mx-2 seat-selection">
                <?php for ($i = 1; $i <= $total_seats; $i++) { ?>
                <div class="col-3">
                    <label
                        class="d-block text-center p-2 border <?php echo in_array($i, $booked_seats) ? 'bg-danger text-white' : 'bg-light'; ?>">
                        <input type="checkbox" name="seat_number[]" value="<?php echo $i; ?>"
                            <?php echo in_array($i, $booked_seats) ? 'disabled' : ''; ?>>
                        Seat <?php echo $i; ?>
                    </label>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-outline-success my-3 mx-auto ">Book Now</button>
                    <button type="reset" class="btn btn-outline-danger my-3 mx-auto ">Reset Selection</button>
                </div>
            </div>

        </form>
    </div>
    <?php
    include('../re_use/footer.php');
    ?>
    <script>
        // Optional: Add dynamic behavior to reset the "selected" state when the reset button is clicked
        const resetButton = document.querySelector('button[type="reset"]');
        resetButton.addEventListener('click', function () {
            const checkboxes = document.querySelectorAll('.seat-selection input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        });
    </script>
</body>

</html>