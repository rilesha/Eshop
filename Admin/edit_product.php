<?php
include '../config.php';
/** @var mysqli $conn */

$id = $_GET['id'];

$error = "";
// Handle form submission (update)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image'];

    $sql = "UPDATE products 
            SET name = '$name', description = '$description', price = '$price', stock = '$stock', image = '$image' 
            WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: products.php");
        exit();
    } else {
        $error = "Error updating product: " . mysqli_error($conn);
    }
}

// Fetch current product data to pre-fill the form
$result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product - eShop Admin</title>
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
                <a href="../index.php">View Store</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <div class="page-title">Edit Product</div>

            <div class="form-card" style="max-width: 600px;">

                <?php if($error): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="edit_product.php?id=<?php echo $product['id']; ?>">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="4"><?php echo $product['description']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Price (Rs.)</label>
                        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Image Filename</label>
                        <input type="text" name="image" value="<?php echo $product['image']; ?>">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>