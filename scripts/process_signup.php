<?php
require '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $expertise = $_POST['expertise'];

    try {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, expertise) VALUES (:name, :email, :password, :expertise)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':expertise', $expertise);
        $stmt->execute();

        header("Location: ../pages/login.php?success=Account created successfully");
    } catch (PDOException $e) {
        header("Location: ../pages/signup.php?error=" . urlencode($e->getMessage()));
    }
}
?>