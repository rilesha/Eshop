<?php
include 'config.php';

$error = "";
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
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - eShop</title>
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
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>
    </nav>

    <!-- Register Form -->
    <div class="container-narrow fade-in">
        <div class="form-card">
            <h2>Create Account</h2>
            <p class="form-subtitle">Join eShop for an exclusive shopping experience</p>

            <?php if($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST" action="register.php">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Create a password">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div>
            </form>

            <p class="form-footer">Already have an account? <a href="login.php">Sign in</a></p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 <span>eShop</span>. All rights reserved.</p>
    </footer>

</body>
</html>