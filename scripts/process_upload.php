<?php
require '../includes/db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php?error=Please login first");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    $file = $_FILES['resource_file'];

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        try {
            $stmt = $conn->prepare("INSERT INTO resources (title, description, file_path, uploaded_by) VALUES (:title, :description, :file_path, :uploaded_by)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':file_path', $target_file);
            $stmt->bindParam(':uploaded_by', $user_id);
            $stmt->execute();

            header("Location: ../pages/upload.php?success=Resource uploaded successfully");
        } catch (PDOException $e) {
            header("Location: ../pages/error.php?message=" . urlencode($e->getMessage()));
        }
    } else {
        header("Location: ../pages/upload.php?error=Failed to upload file");
    }
}
?>