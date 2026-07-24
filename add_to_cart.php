<?php
session_start();
include 'config.php';

$product_id = $_GET['id'];

// Initialize cart array if it doesn't exist yet
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// If product already in cart, increase quantity; else add it
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += 1;
} else {
    $_SESSION['cart'][$product_id] = 1;
}

header("Location: cart.php");
exit();
?>