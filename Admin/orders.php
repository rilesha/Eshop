<?php
include '../config.php';
/** @var mysqli $conn */

$sql = "SELECT orders.*, users.name AS customer_name, products.name AS product_name 
        FROM orders 
        JOIN users ON orders.user_id = users.id 
        JOIN products ON orders.product_id = products.id 
        ORDER BY orders.created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Orders</title>
</head>
<body>
    <h2>All Orders (Admin)</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['customer_name']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td>Rs. <?php echo $row['total']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>