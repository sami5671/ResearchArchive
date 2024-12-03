<?php
require '../includes/db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php?error=Please login first");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];

    try {
        $stmt = $conn->prepare("INSERT INTO blogs (title, content, author_id) VALUES (:title, :content, :author_id)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->execute();

        header("Location: ../technical/knowledge.php?success=Blog posted successfully");
    } catch (PDOException $e) {
        header("Location: ../pages/error.php?message=" . urlencode($e->getMessage()));
    }
}
?>
