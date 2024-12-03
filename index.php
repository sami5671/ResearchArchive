<?php
require './includes/db.php';
session_start();

// Fetch username if user is logged in
$username = null;
$useremail = null;
if (isset($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT name FROM users WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $result['name'] ?? null; 
    $useremail = $result['email'] ?? null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResearchArchive - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    

    <!-- Navbar -->
    <div class="navbar bg-base-100 shadow-lg">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl text-cyan-600">ResearchArchive</a>
        </div>
        <div class="flex-none">
            <?php if (isset($_SESSION['user_id'])): ?>


               
                
            <div class="flex items-center gap-4 mr-4">
            <div><p>
            <span class=""><span class=""><?php echo htmlspecialchars($username); ?>!</span></span>

            </p></div>
            <div>
            <a href="./scripts/logout.php">
            <button class="bg-red-400 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white" >Logout</button>
            </a>
            </div>
            </div>
            <!-- Dropdown for User Profile -->
            <div class="">
            <div tabindex="0" class="btn btn-circle avatar">
            <div class="w-10 rounded-full">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRI9lRck6miglY0SZF_BZ_sK829yiNskgYRUg&s" alt="User Avatar">
            </div>
            </div>

            </div>

              
            <?php else: ?>
                <!-- Login & Signup Buttons -->
                <div class="flex gap-4">
                    <a href="./pages/view_blog.php" class="bg-cyan-400 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">View Blogs</a>
                    <a href="./pages/login.php" class="bg-pink-400 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">Login</a>
                    <a href="./pages/signup.php" class="bg-slate-800 px-4 py-1 rounded-full flex justify-center items-center font-bold text-white">Sign Up</a>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Main Content -->
    <!-- Main Content -->
<div class="h-screen mx-auto p-6 bg-white rounded-lg shadow-md relative bg-[url('https://st3.depositphotos.com/1071909/19574/i/450/depositphotos_195745644-stock-photo-artificial-intelligence-concept.jpg')] bg-cover bg-center opacity-85">
   <div class="mt-44"> 
    <h1 class="text-6xl font-bold text-center  text-white">Welcome to <span class="bg-white text-gray-800">ResearchArchive</span></h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <p class="text-center mt-12 text-3xl">
            <span class="text-white font-semibold">Hello, <span class="bg-white font-bold text-black py-1"><?php echo htmlspecialchars($username); ?>!</span></span>
        </p>
        <div class="flex justify-center mt-6">
            <a href="./pages/upload.php" class="btn btn-accent mx-2 rounded-full">Upload Resource</a>
            <a href="./pages/post_blog.php" class="btn btn-accent mx-2 rounded-full">Post Blog</a>
            <a href="./technical/knowledge.php" class="btn btn-accent mx-2 rounded-full">View Blogs</a>
        </div>
    <?php else: ?>
        <section class="flex items-center justify-center">
            <!-- Banner Section -->
            <div class="rounded-lg p-8 w-1/3 text-center flex flex-col justify-center">
                <p class="text-white text-2xl mb-6">Discover, share, and explore research resources effortlessly. Please login or sign up to access our features.</p>
            </div>
        </section>
    <?php endif; ?></div>
</div>

</body>
</html>
