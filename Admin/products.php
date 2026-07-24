<?php
include '../config.php';
/** @var mysqli $conn */

$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
</head>
<body>
    <h2>All Products</h2>
    <a href="add_product.php">+ Add New Product</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
                |
                <a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this product?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>