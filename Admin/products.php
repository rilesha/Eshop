<?php
include '../config.php';
/** @var mysqli $conn */

$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products - eShop Admin</title>
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
                <a href="products.php" class="active">Products</a>
                <a href="add_product.php">Add Product</a>
                <a href="orders.php">Orders</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <div class="page-title">
                <span>All Products</span>
                <a href="add_product.php" class="btn btn-primary btn-sm">+ Add Product</a>
            </div>

            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td>#<?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>Rs. <?php echo $row['price']; ?></td>
                        <td><?php echo $row['stock']; ?></td>
                        <td class="action-links">
                            <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Delete this product?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </main>
    </div>
</body>
</html>