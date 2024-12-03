<?php
session_start();
require '../includes/db.php'; // Include database connection

// Fetch username if user is logged in
$username = null;
if (isset($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT name FROM users WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $result['name'] ?? null; // Fetch the username, or null if not found
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResearchArchive</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- DaisyUI Header -->
    <header class="navbar bg-base-100 shadow-lg">
        <!-- Logo Section -->
        <div class="flex-1">
            <a href="../index.php" class="font-bold text-2xl text-cyan-600 ml-12">ResearchArchive</a>
        </div>

        <!-- Navigation Section -->
        <nav class="flex-none">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="flex gap-4 items-center">
                    <span class="text-gray-700 font-semibold">Hello, <?php echo htmlspecialchars($username); ?>!</span>
                    <a href="../pages/upload.php" class="bg-pink-800 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">Upload Resource</a>
                    <a href="../pages/post_blog.php" class="bg-cyan-600 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">Post Blog</a>
                    <a href="../technical/knowledge.php" class="bg-slate-800 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">View Blogs</a>
                    <a href="../scripts/logout.php" class="bg-red-600 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">Logout</a>
                </div>
            <?php else: ?>
                <div class="flex gap-4">
                    <a href="../pages/login.php" class="bg-pink-400 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">Login</a>
                    <a href="../pages/signup.php" class="bg-slate-800 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">Sign Up</a>
                </div>
            <?php endif; ?>
        </nav>
    </header>
</body>
</html>
