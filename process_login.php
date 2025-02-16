<?php
include('includes/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username_email = trim($_POST['username_email']);
    $password = $_POST['password'];

    if (empty($username_email) || empty($password)) {
        header("Location: login.php?error=All fields are required");
        exit();
    }

    // Fetch user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username_email, $username_email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=Invalid credentials");
        exit();
    }
}
?>