<?php
//session_start();
$conn = new mysqli('localhost', 'root', '', 'travel');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for Explore Bangladesh
$bangladesh_query = "SELECT * FROM destinations WHERE country = 'Bangladesh' LIMIT 10";
$bangladesh_result = $conn->query($bangladesh_query);

// Fetch data for Trending Destinations
$trending_query = "SELECT * FROM destinations WHERE trending = 1 LIMIT 10";
$trending_result = $conn->query($trending_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Destinations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <!-- Explore Bangladesh Carousel -->
        <h2 class="mb-3">Explore Bangladesh</h2>
        <div id="exploreBangladeshCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php 
            $active = true; 
            while ($row = $bangladesh_result->fetch_assoc()) { 
            ?>
                <?php if ($active) { $active = false; ?>
                <div class="carousel-item active">
                    <?php } else { ?>
                    <div class="carousel-item">
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6 mx-auto my-2 p-1">
                                <img src="<?php echo $row['image']; ?>" class="d-block rounded-3 w-100" height="400px"
                                    alt="<?php echo $row['name']; ?>">
                                <h5><?php echo $row['name']; ?></h5>
                                <p><?php echo $row['properties']; ?> properties</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#exploreBangladeshCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#exploreBangladeshCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon " aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Trending Destinations Grid -->
            <h2 class="mt-5 mb-3">Trending Destinations</h2>
            <div class="row">
                <?php while ($row = $trending_result->fetch_assoc()) { ?>
                <div class="col-md-3 mt-3">
                    <div class="card">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" height="200px"
                            alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>