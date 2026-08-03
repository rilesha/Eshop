<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT orders.*, products.name AS product_name 
        FROM orders 
        JOIN products ON orders.product_id = products.id 
        WHERE orders.user_id = '$user_id' 
        ORDER BY orders.created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders - eShop</title>
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

    <!-- Orders -->
    <div class="container fade-in">
        <a href="index.php" class="back-link">&#8592; Continue Shopping</a>

        <div class="page-header" style="text-align:left; margin-bottom:30px;">
            <h2>My Orders</h2>
            <div class="divider" style="margin:16px 0 0;"></div>
        </div>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>#<?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>Rs. <?php echo $row['total']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 <span>eShop</span>. All rights reserved.</p>
    </footer>

</body>
</html>