<?php
// error.php
require '../includes/header.php';  // Include your header for consistency

// Check if the error message is passed in the URL
if (isset($_GET['message'])) {
    $error_message = htmlspecialchars($_GET['message']);  // Sanitizing the error message
} else {
    $error_message = "An unknown error occurred. Please try again later.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - ResearchArchive</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-gray-50">

    <div class="container max-w-7xl mx-auto py-20 px-4 text-center">
        <!-- Error Image -->
        <img src="https://e7.pngegg.com/pngimages/10/205/png-clipart-computer-icons-error-information-error-angle-triangle-thumbnail.png" alt="Error Image" class="mx-auto mb-8">
        
        <div class="error-message bg-white shadow-lg rounded-lg p-8 max-w-md mx-auto">
            <h2 class="text-3xl font-semibold text-red-600 mb-4">Something went wrong</h2>
            <p class="text-lg text-gray-800 mb-4"><strong>Error:</strong> <?php echo $error_message; ?></p>
            
            <!-- Error message action buttons -->
            <div class="flex justify-center gap-4">
                <a href="../index.php" class="button bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">Go back to Home</a>
                <a href="../pages/login.php" class="button bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition">Login Again</a>
            </div>
        </div>
    </div>

    <?php
    require '../includes/footer.php';  // Include your footer for consistency
    ?>

</body>
</html>
