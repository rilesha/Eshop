<?php
include '../config.php';
/** @var mysqli $conn */
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
    echo "Error:". mysqli_error($conn);
  }        
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="POST" action="add_product.php">
        <label>Product Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="4" cols="30"></textarea><br><br>

        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>

        <label>Stock:</label><br>
        <input type="number" name="stock" required><br><br>

        <label>Image filename (e.g. tshirt.jpg):</label><br>
        <input type="text" name="image"><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
