<?php
error_reporting(0);
session_start();
include('../re_use/session_user_name.php');
include('../re_use/link.php');

$packages = [
    ["name" => "3 Days & 2 Nights", "price" => 12000, "image" => "https://example.com/sylhet1.jpg", "description" => "Ratargul Swamp Forest"],
    ["name" => "5 Days & 4 Nights", "price" => 18000, "image" => "https://example.com/sylhet2.jpg", "description" => "Jaflong & Tea Gardens"],
    ["name" => "7 Days & 6 Nights", "price" => 25000, "image" => "https://example.com/sylhet3.jpg", "description" => "Bichanakandi & Lalakhal"]
];

// Check if the cart is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to cart functionality
if (isset($_POST['add_to_cart'])) {
    $item = [
        'name' => $_POST['package_name'],
        'price' => $_POST['package_price'],
        'quantity' => $_POST['package_quantity']
    ];

    // Add the item to the cart
    $_SESSION['cart'][] = $item;
    $add_message = "Item added to cart successfully.";
    echo "<script>alert('$add_message');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sylhet Tourism</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <!-- Packages Section -->
        <section class="mb-5">
            <h3>Tour Packages</h3>
            <div class="row">
                <?php foreach ($packages as $package): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img width="250px" height="250px" src="<?php echo $package['image']; ?>" class="card-img-top"
                            alt="<?php echo $package['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $package['name']; ?></h5>
                            <p class="card-text">Price: BDT <?php echo number_format($package['price']); ?></p>
                            <p class="card-text">Destination: <?php echo $package['description']; ?></p>
                            <form method="POST">
                                <input type="hidden" name="package_name" value="<?php echo $package['name']; ?>">
                                <input type="hidden" name="package_price" value="<?php echo $package['price']; ?>">
                                <input type="number" name="package_quantity" value="1" min="1"
                                    class="form-control mb-2">
                                <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- Additional sections can follow here -->
    </div>
    <?php include('../re_use/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>