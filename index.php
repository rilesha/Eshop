<?php
include 'config.php';

$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>eShop</title>
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
            <?php session_start(); if(isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="page-header">
            <h1>Our Collection</h1>
            <p>Discover premium products curated just for you</p>
            <div class="divider"></div>
        </div>

        <div class="product-grid">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="product-card">
                <div class="product-image-wrapper">
                    <img src="images/<?php echo $row['image']; ?>" class="product-image" alt="<?php echo $row['name']; ?>">
                </div>
                <div class="product-info">
                    <div class="product-name"><?php echo $row['name']; ?></div>
                    <div class="product-price">Rs. <?php echo $row['price']; ?></div>
                    <a href="product.php?id=<?php echo $row['id']; ?>" class="btn-view">View Details</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 <span>eShop</span>. All rights reserved.</p>
    </footer>

</body>
</html>