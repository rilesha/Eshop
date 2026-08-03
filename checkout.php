<?php
session_start();
include 'config.php';

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$user_id = $_SESSION['user_id'];

if (count($cart) > 0) {
    foreach ($cart as $product_id => $quantity) {
        $result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
        $product = mysqli_fetch_assoc($result);
        $total = $product['price'] * $quantity;

        $sql = "INSERT INTO orders (user_id, product_id, quantity, total) 
                VALUES ('$user_id', '$product_id', '$quantity', '$total')";
        mysqli_query($conn, $sql);
    }

    // Clear the cart after placing order
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed - eShop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="index.php" class="logo">eShop</a>
        <div class="nav-links">
            <a href="index.php">Shop</a>
            <a href="cart.php">Cart</a>
            <a href="orders.php">Orders</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <!-- Confirmation -->
    <div class="confirmation-card fade-in">
        <div class="check-icon">&#10003;</div>
        <h2>Order Confirmed!</h2>
        <p>Thank you for your purchase. Your order has been placed successfully.</p>
        <div class="confirmation-links">
            <a href="orders.php" class="btn btn-secondary">View My Orders</a>
            <a href="index.php" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 <span>eShop</span>. All rights reserved.</p>
    </footer>

</body>
</html>