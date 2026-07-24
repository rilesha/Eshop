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
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Thank you! Your order has been placed.</h2>
    <a href="orders.php">View My Orders</a> | <a href="index.php">Continue Shopping</a>
</body>
</html>