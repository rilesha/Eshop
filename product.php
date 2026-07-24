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
    <title><?php echo $product['name']; ?></title>
</head>
<body>
    <a href="index.php">← Back to Shop</a>
    <h2><?php echo $product['name']; ?></h2>
    <img src="images/<?php echo $product['image']; ?>" width="250"><br>
    <p><?php echo $product['description']; ?></p>
    <p><strong>Price:</strong> Rs. <?php echo $product['price']; ?></p>
    <p><strong>In Stock:</strong> <?php echo $product['stock']; ?></p>
    <a href="add_to_cart.php?id=<?php echo $product['id']; ?>"><button>Add to Cart</button></a>
</body>
</html>