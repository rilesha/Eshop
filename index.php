<?php
include 'config.php';

$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Shop</title>
</head>
<body>
    <h1>Welcome to My Shop</h1>

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div style="border: 1px solid #ccc; padding: 10px; width: 200px;">
            <img src="images/<?php echo $row['image']; ?>" width="150" height="150"><br>
            <h3><?php echo $row['name']; ?></h3>
            <p>Rs. <?php echo $row['price']; ?></p>
            <a href="product.php?id=<?php echo $row['id']; ?>">View Details</a>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>