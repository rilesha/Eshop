<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    $user = mysqli_fetch_assoc($result);

if ($user && $password == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: admin/products.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>