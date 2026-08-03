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
    <title>All Orders - eShop Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="logo">eShop</div>
            <div class="admin-badge">Admin Panel</div>
            <nav>
                <a href="products.php">Products</a>
                <a href="add_product.php">Add Product</a>
                <a href="orders.php" class="active">Orders</a>
                <a href="../index.php">View Store</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <div class="page-title">All Orders</div>

            <div class="table-wrapper">
                <table>
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
                        <td>#<?php echo $row['id']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>Rs. <?php echo $row['total']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </main>
    </div>
</body>
</html>