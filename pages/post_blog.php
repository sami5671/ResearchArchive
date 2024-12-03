<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog - ResearchArchive</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased">
    <?php include('../includes/header.php'); ?>

    <!-- Main Content -->
    <div class="flex justify-center items-center min-h-screen px-4 bg-orange-500">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Post Technical Blog</h2>
            <form action="../scripts/process_post_blog.php" method="POST" class="space-y-6">
                <!-- Blog Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Blog Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        placeholder="Enter your blog title" 
                        class="input input-bordered w-full" 
                        required>
                </div>

                <!-- Blog Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Blog Content</label>
                    <textarea 
                        name="content" 
                        id="content" 
                        placeholder="Write your blog content here..." 
                        rows="8" 
                        class="textarea textarea-bordered w-full" 
                        required></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-full">Post Blog</button>
            </form>
        </div>
    </div>
</body>
</html>
