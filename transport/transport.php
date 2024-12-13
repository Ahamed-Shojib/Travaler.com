<?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', 'travel');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Transport
if (isset($_POST['add_transport'])) {
    $type = $_POST['type'];
    $vehicle_type = $_POST['vehicle_type'];
    $vehicle_name = $_POST['vehicle_name'];
    $date = $_POST['date'];
    $seats = $_POST['available_seats'];

    if (!empty($type) && !empty($vehicle_type) && !empty($vehicle_name) && !empty($date) && !empty($seats)) {
        $stmt = $conn->prepare("INSERT INTO transport (type, vehicle_type, vehicle_name, date, available_seats) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $type, $vehicle_type, $vehicle_name, $date, $seats);
        $stmt->execute();
        $stmt->close();

        // Prevent resubmission on page reload
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Remove Transport
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM transport WHERE id = $id");

    // Prevent accidental re-deletion on page reload
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Fetch Transport Data
$result = $conn->query("SELECT * FROM transport ORDER BY date ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-5">
        <h2 class="mb-4">Transport Service Management</h2>

        <!-- Add Transport Form -->
        <form method="POST" class="mb-5">
            <div class="row g-3">
                <div class="col-md-2">
                    <select name="type" class="form-select" required>
                        <option value="">Select Transport Type</option>
                        <option value="Bus">Bus</option>
                        <option value="Plane">Plane</option>
                        <option value="Car">Car</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="vehicle_type" class="form-select" required>
                        <option value="">Select Vehicle Type</option>
                        <option value="AC">AC</option>
                        <option value="Non-AC">Non-AC</option>
                        <option value="Business">Business</option>
                        <option value="Economy">Economy</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="vehicle_name" class="form-control" placeholder="Vehicle Name" required>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="col-md-2 ">
                    <input type="number" name="available_seats" class="form-control" placeholder="Available Seats"
                        required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="add_transport" class="btn btn-outline-primary">Add Transport</button>
                </div>
            </div>
        </form>

        <!-- Transport Cards -->
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo htmlspecialchars($row['type']); ?></h3>
                        <p class="card-text">
                            <b>Vehicle Name: </b><?php echo htmlspecialchars($row['vehicle_name']); ?>
                        </p>
                        <p class="card-text">
                            <b> Vehicle Type: </b> <?php echo htmlspecialchars($row['vehicle_type']); ?>
                        </p>
                        <p class="card-text">
                            <b>Date: </b> <?php echo htmlspecialchars($row['date']); ?>
                        </p>
                        <p class="card-text">
                            <b> Available Seats: </b><?php echo htmlspecialchars($row['available_seats']); ?>
                        </p>
                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php
    include('../re_use/footer.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>