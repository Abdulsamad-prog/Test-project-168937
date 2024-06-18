<?php
include 'connectdb.php'; // Ensure this path is correct

$loginError = ''; // To hold login error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // Prepare a select statement to check if the username exists
        $stmt = $connect->prepare("SELECT password FROM signup WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify the password with the hashed password in the database
            if (password_verify($password, $user['password'])) {
                // Password is correct, redirect or start session
                echo "<script type='text/javascript'>alert('Login successful!'); window.location = 'home.html';</script>";

            } else {
                $loginError = 'Invalid username or password.';
            }
        } else {
            $loginError = 'Invalid username or password.';
        }
        $stmt->close();
    } else {
        $loginError = 'Please fill in all fields.';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Sparkle Cleaners</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            height: 100vh;
        }
        nav {
            width: 100%;
            background-color: #333;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }
        section {
            max-width: 400px;
            width: 100%;
            background-color: white;
            padding: 55px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: calc(100% - 22px); /* Subtract padding and border */
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .about-link,
        .signup-link {
            text-align: center;
            margin-top: 10px;
            color: #555;
        }
        .about-link a,
        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }
        .about-link a:hover,
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <section>
        <h2>Login</h2>
        <form action="login_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <div class="signup-link">
            <p>If this is your first time, please <a href="signup.php">sign up</a>.</p>
        </div>
        <div class="about-link">
            <p>Learn more about us on the <a href="about.html">About Us</a> page.</p>
        </div>
    </section>
</body>
</html>


