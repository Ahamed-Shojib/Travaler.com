<?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', 'tour_agent');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Package
if (isset($_POST['add_package'])) {
    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];

    if (!empty($name) && !empty($duration) && !empty($description)) {
        $stmt = $conn->prepare("INSERT INTO packages (name, duration, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $duration, $description);
        $stmt->execute();
        $stmt->close();

        // Redirect to prevent resubmission on page reload
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Add Meal
if (isset($_POST['add_meal'])) {
    $package_id = $_POST['package_id'];
    $meal_type = $_POST['meal_type'];

    if (!empty($package_id) && !empty($meal_type)) {
        $stmt = $conn->prepare("INSERT INTO meals (package_id, meal_type) VALUES (?, ?)");
        $stmt->bind_param("is", $package_id, $meal_type);
        $stmt->execute();
        $stmt->close();
    }
}

// Add Room
if (isset($_POST['add_room'])) {
    $package_id = $_POST['package_id'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];

    if (!empty($package_id) && !empty($room_type) && !empty($price)) {
        $stmt = $conn->prepare("INSERT INTO rooms (package_id, room_type, price) VALUES (?, ?, ?)");
        $stmt->bind_param("isd", $package_id, $room_type, $price);
        $stmt->execute();
        $stmt->close();
    }
}

// Add Transport
if (isset($_POST['add_transport'])) {
    $package_id = $_POST['package_id'];
    $transport_type = $_POST['transport_type'];
    $vehicle_name = $_POST['vehicle_name'];
    $seats = $_POST['available_seats'];

    if (!empty($package_id) && !empty($transport_type) && !empty($vehicle_name) && !empty($seats)) {
        $stmt = $conn->prepare("INSERT INTO transport (package_id, transport_type, vehicle_name, available_seats) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $package_id, $transport_type, $vehicle_name, $seats);
        $stmt->execute();
        $stmt->close();
    }
}

// Add Schedule
if (isset($_POST['add_schedule'])) {
    $package_id = $_POST['package_id'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    if (!empty($package_id) && !empty($date) && !empty($description)) {
        $stmt = $conn->prepare("INSERT INTO schedules (package_id, date, description) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $package_id, $date, $description);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch Data
$packages_result = $conn->query("SELECT * FROM packages ORDER BY duration ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tour Packages Management</h2>

        <!-- Add Package Form -->
        <form method="POST" class="mb-5">
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Package Name" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="duration" class="form-control" placeholder="Duration" required>
                </div>
                <div class="col-md-5">
                    <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="add_package" class="btn btn-outline-primary">Add Package</button>
                </div>
            </div>
        </form>

        <!-- Display Packages -->
        <div class="row">
            <?php while ($package = $packages_result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo htmlspecialchars($package['name']); ?></h3>
                        <p class="card-text"><b>Duration:</b> <?php echo htmlspecialchars($package['duration']); ?></p>
                        <p class="card-text"><b>Description:</b>
                            <?php echo htmlspecialchars($package['description']); ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>