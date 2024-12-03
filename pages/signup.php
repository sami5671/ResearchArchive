<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .left-section {
            flex: 1;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }

        .left-section h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .left-section p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }

        .left-section a {
            color: #fff;
            text-decoration: underline;
            font-weight: bold;
        }

        .right-section {
            flex: 1;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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
            background-color: #ff7e9f;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .social-buttons button {
            background: #fff;
            border: 1px solid #ddd;
            color: #333;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            margin: 0 0.5rem;
            cursor: pointer;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
        }

        .social-buttons button:hover {
            border-color: #007bff;
        }

        .footer {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h1>Come join us!</h1>
            <p>We are so excited to have you here. If you haven't already, create an account to get access to exclusive offers, rewards, and discounts.</p>
            <a href="../pages/login.php">Already have an account? Sign in.</a>
        </div>
        <div class="right-section">
            <div class="form-container">
                <h2>Signup</h2>
                <form action="../scripts/process_signup.php" method="POST">
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Signup</button>
                </form>
                <div class="social-buttons">
                    <button class="">Google</button>
                    <button>Facebook</button>
                    <button>LinkdIn</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
