<?php
session_start();

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Add your CSS file here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
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
                                    <th>Item</th>
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
                                        <td>₹<?php echo number_format($item['price'], 2); ?></td>
                                        <td>
                                            <input type="number" name="quantity[<?php echo $index; ?>]" value="<?php echo $item['quantity']; ?>" min="0" class="form-control" style="width: 80px;">
                                        </td>
                                        <td>₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                        <td><a href="cart.php?remove=<?php echo $index; ?>" class="btn btn-outline-danger">Remove</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <button type="submit" name="update" class="btn btn-outline-primary my-3">Update Cart</button>
                    </form>

                    <h3>Total: ₹<?php echo number_format($total, 2); ?></h3>

                    <a href="checkout.php?price=<?php echo $total ?>" class="btn btn-outline-success mt-3">Proceed to Checkout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>