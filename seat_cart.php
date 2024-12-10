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

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Safely retrieve the session and POST data
    $user_id = $_SESSION['user_id'] ?? null;
    $transport_id = $_POST['transport_id'] ?? null;
    $seat_numbers = $_POST['seat_number'] ?? [];  // Changed to an array for multiple selections

    // Validate input data
    if ($user_id && $transport_id && !empty($seat_numbers)) {
        // Insert booking for each selected seat
        foreach ($seat_numbers as $seat_number) {
            $stmt = $conn->prepare("INSERT INTO bookings (user_id, transport_id, seat_number) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $user_id, $transport_id, $seat_number);
            $stmt->execute();
            $stmt->close();
        }

        // Update remaining seats
        $conn->query("UPDATE transport SET available_seats = available_seats - " . count($seat_numbers) . " WHERE id = $transport_id");

        $message = "<div class='alert alert-success'>Booking successful! Seat Numbers: " . implode(", ", $seat_numbers) . "</div>";
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
    <title>Booking Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center mb-4">Booking Status</h3>
    <?php echo $message; ?>
    <div class="text-center mt-4">
        <a href="profile.php" class="btn btn-primary">Back to Profile</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
