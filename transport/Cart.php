<?php
// Start the session
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add item to the cart
    if (isset($_POST['add_to_cart'])) {
        $item = [
            'name' => $_POST['item_name'],
            'price' => $_POST['item_price'],
            'quantity' => $_POST['item_quantity']
        ];
        $_SESSION['cart'][] = $item;
    }

    // Clear the cart
    if (isset($_POST['clear_cart'])) {
        $_SESSION['cart'] = [];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .product {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .cart-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .cart-table th, .cart-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .cart-table th {
            background-color: #f8f8f8;
        }
        .buttons {
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            color: white;
            background-color: #3498db;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .btn.clear {
            background-color: #e74c3c;
        }
        .btn.clear:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shopping Cart</h1>
        
        <!-- Product List -->
        <div class="product">
            <span>Adventure Trekking</span>
            <span>Price: $100</span>
            <form method="POST">
                <input type="hidden" name="item_name" value="Adventure Trekking">
                <input type="hidden" name="item_price" value="100">
                <label for="quantity">Qty:</label>
                <input type="number" name="item_quantity" value="1" min="1" required>
                <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
            </form>
        </div>
        <div class="product">
            <span>Skydiving Experience</span>
            <span>Price: $200</span>
            <form method="POST">
                <input type="hidden" name="item_name" value="Skydiving Experience">
                <input type="hidden" name="item_price" value="200">
                <label for="quantity">Qty:</label>
                <input type="number" name="item_quantity" value="1" min="1" required>
                <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
            </form>
        </div>

        <!-- Cart -->
        <h2>Your Cart</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item):
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td>$<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                            <td>$<?php echo number_format($subtotal, 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Grand Total</th>
                        <th>$<?php echo number_format($total, 2); ?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="buttons">
                <form method="POST">
                    <button type="submit" name="clear_cart" class="btn clear">Clear Cart</button>
                </form>
            </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>
