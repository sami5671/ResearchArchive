<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Resource - ResearchArchive</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased">
    <?php include('../includes/header.php'); ?>

    <!-- Main Content -->
    <div class="flex justify-center items-center min-h-screen px-4 bg-orange-500">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Upload Resource</h2>
            <form action="../scripts/process_upload.php" method="POST" enctype="multipart/form-data" class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        placeholder="Enter resource title" 
                        class="input input-bordered w-full" 
                        required>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        placeholder="Enter resource description" 
                        rows="4" 
                        class="textarea textarea-bordered w-full" 
                        required></textarea>
                </div>

                <!-- File Upload -->
                <div>
                    <label for="resource_file" class="block text-sm font-medium text-gray-700 mb-1">Resource File</label>
                    <input 
                        type="file" 
                        name="resource_file" 
                        id="resource_file" 
                        class="file-input file-input-bordered w-full" 
                        required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-orange-500 px-6 py-3 rounded-xl text-white font-bold">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>
