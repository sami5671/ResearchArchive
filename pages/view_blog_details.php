<?php
require '../includes/db.php';

if (isset($_GET['id'])) {
    $blogId = $_GET['id'];

    try {
        // Fetch the full blog content using the blog ID
        $stmt = $conn->prepare("SELECT blogs.id, blogs.title, blogs.content, users.name, users.expertise, blogs.created_at 
                                FROM blogs 
                                JOIN users ON blogs.author_id = users.id 
                                WHERE blogs.id = :id");
        $stmt->bindParam(':id', $blogId, PDO::PARAM_INT);
        $stmt->execute();
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        header("Location: error.php?message=" . urlencode($e->getMessage()));
        exit;
    }
} else {
    header("Location: index.php"); // Redirect if ID is not passed
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['title']); ?> - ResearchArchive</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <?php include('../includes/header.php'); ?>

    <div class="container mx-auto px-6 py-8">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-6"><?php echo htmlspecialchars($blog['title']); ?></h2>

        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
            <p class="text-sm text-gray-600 mb-4">
                By: <span class="font-medium"><?php echo htmlspecialchars($blog['name']); ?></span> 
                (<span class="italic"><?php echo htmlspecialchars($blog['expertise']); ?></span>)
            </p>
            <div class="text-gray-700 mb-4">
                <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
            </div>
            <small class="block text-gray-500 mt-4">
                Posted on: <?php echo htmlspecialchars($blog['created_at']); ?>
            </small>
        </div>
    </div>
    <?php
    require '../includes/footer.php';  // Include your footer for consistency
    ?>
</body>
</html>
