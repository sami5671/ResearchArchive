<?php
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../index.php");
        } else {
            header("Location: ../pages/login.php?error=Invalid credentials");
        }
    } catch (PDOException $e) {
        header("Location: ../pages/error.php?message=" . urlencode($e->getMessage()));
    }
}
?>