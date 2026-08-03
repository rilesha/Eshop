<?php
session_start();
include 'config.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart - eShop</title>
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
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Cart -->
    <div class="container fade-in">
        <a href="index.php" class="back-link">&#8592; Continue Shopping</a>

        <div class="page-header" style="text-align:left; margin-bottom:30px;">
            <h2>Shopping Cart</h2>
            <div class="divider" style="margin:16px 0 0;"></div>
        </div>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($cart as $product_id => $quantity):
                    $result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
                    $product = mysqli_fetch_assoc($result);
                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td>Rs. <?php echo $product['price']; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>Rs. <?php echo $subtotal; ?></td>
                    <td><a href="remove_from_cart.php?id=<?php echo $product_id; ?>" class="remove-link">Remove</a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="cart-total">
            <h3>Total: <span>Rs. <?php echo $total; ?></span></h3>
            <?php if (count($cart) > 0): ?>
                <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 <span>eShop</span>. All rights reserved.</p>
    </footer>

</body>
</html>