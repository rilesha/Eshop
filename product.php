<?php
session_start();
include 'config.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?> - eShop</title>
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

    <!-- Product Detail -->
    <div class="container fade-in">
        <a href="index.php" class="back-link">&#8592; Back to Shop</a>

        <div class="product-detail">
            <img src="images/<?php echo $product['image']; ?>" class="product-image-large" alt="<?php echo $product['name']; ?>">

            <div class="product-info-detail">
                <h2><?php echo $product['name']; ?></h2>
                <p class="product-description"><?php echo $product['description']; ?></p>
                <div class="product-price-detail">Rs. <?php echo $product['price']; ?></div>
                <p class="product-stock">Availability: <span><?php echo $product['stock']; ?> in stock</span></p>
                <a href="add_to_cart.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 <span>eShop</span>. All rights reserved.</p>
    </footer>

</body>
</html>