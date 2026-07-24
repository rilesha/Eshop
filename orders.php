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
    <title>My Orders</title>
</head>
<body>
    <a href="index.php">← Continue Shopping</a>
    <h2>My Orders</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td>Rs. <?php echo $row['total']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>