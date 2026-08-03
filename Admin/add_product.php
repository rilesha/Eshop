<?php
include '../config.php';
/** @var mysqli $conn */

$error = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $image = $_POST['image'];

  $sql = "INSERT INTO products (name, description, price, stock, image)
          VALUES ('$name','$description','$price','$stock','$image')";

  if(mysqli_query($conn,$sql)){
    header("Location: products.php");
    exit();
  } else {
    $error = "Error: " . mysqli_error($conn);
  }        
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product - eShop Admin</title>
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
                <a href="add_product.php" class="active">Add Product</a>
                <a href="orders.php">Orders</a>
                <a href="../index.php">View Store</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="admin-main">
            <div class="page-title">Add New Product</div>

            <div class="form-card" style="max-width: 600px;">

                <?php if($error): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="add_product.php">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" required placeholder="Enter product name">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="4" placeholder="Enter product description"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Price (Rs.)</label>
                        <input type="number" step="0.01" name="price" required placeholder="0.00">
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" name="stock" required placeholder="0">
                    </div>

                    <div class="form-group">
                        <label>Image Filename</label>
                        <input type="text" name="image" placeholder="e.g. tshirt.jpg">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
