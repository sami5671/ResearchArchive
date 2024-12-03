<?php
require '../includes/db.php';

try {
    $stmt = $conn->prepare("SELECT blogs.id, blogs.title, blogs.content, users.name, users.expertise, blogs.created_at 
                            FROM blogs 
                            JOIN users ON blogs.author_id = users.id 
                            ORDER BY blogs.created_at DESC");
    $stmt->execute();
    $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    header("Location: error.php?message=" . urlencode($e->getMessage()));
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blogs - ResearchArchive</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <?php include('../includes/header.php'); ?>

    <div class="container mx-auto px-6 py-8">
        <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-10">Latest Technical Blogs</h2>

        <?php if (count($blogs) > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($blogs as $blog): ?>
                    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 transition-all duration-300 ease-in-out transform hover:shadow-2xl hover:scale-105">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4 hover:text-blue-600 transition-colors duration-300">
                            <?php echo htmlspecialchars($blog['title']); ?>
                        </h3>
                        <p class="text-sm text-gray-600 mb-2">
                            By: <span class="font-semibold text-blue-500"><?php echo htmlspecialchars($blog['name']); ?></span> 
                        </p>
                        <p class="mb-8 font-bold">
                        Expert In: (<span class="italic text-gray-500 text-orange-500"><?php echo htmlspecialchars($blog['expertise']); ?></span>)
                        </p>
                        <p class="text-gray-700 text-base mb-6">
                            <?php echo htmlspecialchars(substr($blog['content'], 0, 150)) . '...'; ?>
                        </p>
                        <div class="text-right">
                            <a href="../pages/view_blog_details.php?id=<?php echo $blog['id']; ?>" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition-colors duration-300">
                                Read More
                            </a>
                        </div>
                        <small class="block text-gray-500 mt-4 text-right">
                            Posted on: <?php echo htmlspecialchars($blog['created_at']); ?>
                        </small>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600 text-lg">No blogs found. Check back later!</p>
        <?php endif; ?>
    </div>
    <?php
    require '../includes/footer.php';  // Include your footer for consistency
    ?>
</body>
</html>
