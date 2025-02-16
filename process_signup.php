<?php
include('includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        header("Location: signup.php?error=All fields are required");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: signup.php?error=Passwords do not match");
        exit();
    }

    // Check for existing email/username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if ($stmt->rowCount() > 0) {
        header("Location: signup.php?error=Username or Email already exists");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashed_password]);

    header("Location: login.php?success=Signup successful! Please login");
    exit();
}
?>