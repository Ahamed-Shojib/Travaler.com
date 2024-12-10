<?php
// Database Connection
$conn = new mysqli('localhost', 'root', '', 'travel');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add Transport
if (isset($_POST['add_transport'])) {
    $type = $_POST['type'];
    $date = $_POST['date'];
    $seats = $_POST['available_seats'];

    if (!empty($type) && !empty($date) && !empty($seats)) {
        $stmt = $conn->prepare("INSERT INTO transport (type, date, available_seats) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $type, $date, $seats);
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
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Transport Service Management</h2>

    <!-- Add Transport Form -->
    <form method="POST" class="mb-5">
        <div class="row g-3">
            <div class="col-md-4">
                <select name="type" class="form-select" required>
                    <option value="">Select Transport Type</option>
                    <option value="Bus">Bus</option>
                    <option value="Plane">Plane</option>
                    <option value="Car">Car</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="available_seats" class="form-control" placeholder="Available Seats" required>
            </div>
        </div>
        <button type="submit" name="add_transport" class="btn btn-primary mt-3">Add Transport</button>
    </form>

    <!-- Transport Cards -->
    <div class="row">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['type']); ?></h5>
                        <p class="card-text">Date: <?php echo htmlspecialchars($row['date']); ?></p>
                        <p class="card-text">Available Seats: <?php echo htmlspecialchars($row['available_seats']); ?></p>
                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
