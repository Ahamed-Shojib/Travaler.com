<?php
include('../re_use/session_user_name.php');
include('../re_use/link.php');

// Check if the cart is empty
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    $empty_cart = true;
} else {
    $empty_cart = false;
}

// Remove item from cart
if (isset($_GET['remove'])) {
    $itemIndex = $_GET['remove'];
    unset($_SESSION['cart'][$itemIndex]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
    header('Location: cart.php'); // Redirect to refresh the page after removal
    exit;
}

// Update quantity in cart
if (isset($_POST['update'])) {
    foreach ($_POST['quantity'] as $index => $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$index]); // Remove item if quantity is zero
        } else {
            $_SESSION['cart'][$index]['quantity'] = $quantity;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
    header('Location: cart.php'); // Redirect to refresh the page after update
    exit;
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity']; // Calculate total cost
}

// if(isset($_GET['price'])) {
//     unset($_SESSION['cart']);
//     $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
//     header('Location: checkout.php'); 
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Add your CSS file here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
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
    <div class="row">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div class="container my-5">
                <h2>Your Cart</h2>

                <?php if ($empty_cart): ?>
                <p>Your cart is empty. <a href="../index.php#packages">Go back to the Packages</a>.</p>
                <?php else: ?>
                <form method="POST">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Package Name</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td><?php echo htmlspecialchars($item['place']); ?></td>
                                <td><?php echo htmlspecialchars($item['date']); ?></td>
                                <td>৳<?php echo number_format($item['price'], 2); ?></td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $index; ?>]"
                                        value="<?php echo $item['quantity']; ?>" min="0" class="form-control"
                                        style="width: 80px;">
                                </td>
                                <td> ৳ <?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                <td><a href="cart.php?remove=<?php echo $index; ?>"
                                        class="btn btn-outline-danger">Remove</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <button type="submit" name="update" class="btn btn-outline-warning my-3">Update Cart</button>
                    <a href="/" class="btn btn-outline-danger">Go Back</a>

                </form>

                <h3>Total: <?php echo number_format($total, 2); ?> BDT</h3>
                <a href="checkout.php?price=<?php echo $total ?>" class="btn btn-outline-success mt-3">Proceed
                    to Checkout</a>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php include('../re_use/footer.php');?>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>