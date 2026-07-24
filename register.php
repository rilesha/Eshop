<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name, email, password, role) 
            VALUES ('$name', '$email', '$password', 'customer')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Create an Account</h2>
    <form method="POST" action="register.php">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>