<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ResearchArchive</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
        }

        .container {
            display: flex;
            width: 70%;
            max-width: 900px;
            height: 500px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
            background: #ffffff;
        }

        /* Left Panel */
        .form-panel {
            flex: 1;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-panel h2 {
            margin-bottom: 1rem;
            font-size: 1.8rem;
            color: #ff7e5f;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="email"],
        input[type="password"] {
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #ff7e5f;
            outline: none;
            box-shadow: 0 0 5px rgba(255, 126, 95, 0.5);
        }

        button {
            background-color: #ff7e5f;
            color: #fff;
            border: none;
            padding: 0.8rem;
            margin-top: 1rem;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #feb47b;
        }

        .form-panel .options {
            display: flex;
            justify-content: space-between;
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: #333;
        }

        .form-panel .options a {
            color: #ff7e5f;
            text-decoration: none;
        }

        .form-panel .options a:hover {
            text-decoration: underline;
        }

        /* Right Panel */
        .info-panel {
            flex: 1;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
        }

        .info-panel h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .info-panel p {
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .info-panel a {
            display: inline-block;
            padding: 0.8rem 2rem;
            border: 2px solid white;
            border-radius: 4px;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .info-panel a:hover {
            background-color: white;
            color: #ff7e5f;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Panel -->
        <div class="form-panel">
            <h2>Sign In</h2>
            <form action="../scripts/process_login.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign In</button>
            </form>
            <div class="options">
                <label><input type="checkbox"> Remember Me</label>
                <a href="#">Forgot Password</a>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="info-panel">
            <h2>Welcome to login</h2>
            <p>Don't have an account?</p>
            <a href="signup.php">Sign Up</a>
        </div>
    </div>

    <?php if (isset($_GET['error'])): ?>
        <script>
            alert("<?php echo htmlspecialchars($_GET['error']); ?>");
        </script>
    <?php endif; ?>
</body>
</html>
