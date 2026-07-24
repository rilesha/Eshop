<?php
include '../config.php';
/** @var mysqli $conn */

$id = $_GET['id'];

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
        echo "Error updating product: " . mysqli_error($conn);
    }
}

// Fetch current product data to pre-fill the form
$result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form method="POST" action="edit_product.php?id=<?php echo $product['id']; ?>">
        <label>Product Name:</label><br>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="4" cols="30"><?php echo $product['description']; ?></textarea><br><br>

        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required><br><br>

        <label>Stock:</label><br>
        <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required><br><br>

        <label>Image filename:</label><br>
        <input type="text" name="image" value="<?php echo $product['image']; ?>"><br><br>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>