<?php
session_start();
include 'config.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>
</head>
<body>
    <a href="index.php">← Continue Shopping</a>
    <h2>My Cart</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>

        <?php foreach ($cart as $product_id => $quantity):
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
            $product = mysqli_fetch_assoc($result);
            $subtotal = $product['price'] * $quantity;
            $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td>Rs. <?php echo $product['price']; ?></td>
            <td><?php echo $quantity; ?></td>
            <td>Rs. <?php echo $subtotal; ?></td>
            <td><a href="remove_from_cart.php?id=<?php echo $product_id; ?>">Remove</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3>Total: Rs. <?php echo $total; ?></h3>

    <?php if (count($cart) > 0): ?>
        <a href="checkout.php"><button>Proceed to Checkout</button></a>
    <?php endif; ?>
</body>
</html>