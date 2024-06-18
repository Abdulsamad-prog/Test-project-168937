<?php
include 'connectdb.php'; // Ensure this path is correct

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $password_hash= password_hash($password, PASSWORD_DEFAULT) ;
    // This is not saved but used for validation
    $phoneNumber = $_POST['phoneNumber'];
     $sql = "INSERT INTO signup(username,email,password,phoneNumber) VALUES('$username','$email','$password_hash',$phoneNumber)";
            $result = mysqli_query($connect, $sql);
             if ($result) {
                echo "SignedUp successfully";
                $success = 1;
                $success_message = "Registered successfully";
                header("Location:new2.php");
                exit; // Terminate the script after redirect
        }else {
        die(mysqli_error($connect));
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Your styles here */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        input[type="text"], input[type="email"], input[type="password"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        body {
    background-image: url("https://th.bing.com/th/id/OIP.5VK49mEbeokKnTqN02_ixgHaEK?rs=1&pid=ImgDetMain");
    background-size: cover;
    background-position: center;
    height: 70vh;
    margin: 0;
    padding: 0;
    font-family: "Protest Riot", sans-serif; /* Added font-family property */
}

h1 {
    color: red;
    text-align: center;
}

header {
    text-align: center;
    background-color: burlywood; /* Changed light brown to burlywood */
    padding: 1em;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: space-around;
    background-color: #333;
    overflow: hidden;
}

nav li {
    display: block;
    color: lightyellow;
    text-align: center;
    padding: 13px 16px;
    text-decoration: none;
}

nav a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

section {
    color: #333;
    margin: 20px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 10px;
    text-align: center;
    font-family: "Protest Riot", sans-serif;
    font-weight: 400;
    font-style: normal;
}

table {
    margin: 0 auto;
    width: 50%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #333;
    padding: 10px;
    text-align: center;
}

form {
    background-color: #ffffff;
    padding: 20px; 
    border-radius: 10px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    max-width: 500px; 
    width: 100%;
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin-top: 10px;
    color: #666;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="date"],
input[type="confirm password"],
input[type="password"],
input[type="username"],
select,
textarea {
    width: 100%; 
    padding: 8px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ddd;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

img {
    display: block;
    margin: 40px auto;
    width: 100%; /
}

image-list {
    display: flex;
}

image-item {
    margin-right: 0%;
    margin-bottom: 80px;
    display: flex;
    justify-content: space-between;
}

image-item img {
    max-width: 100%; 
    height: auto; 
    border: 2px solid #B47B84;
    border-radius: 10px;
}

caption {
    font-size: 20px;
    color: #000000;
    margin-top: 15px;
    text-align: left;
    font-family: "Peralta", serif;
    font-weight: 400;
    font-style: normal;
}
    </style>
      <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
    </nav>
</head>
<body>
    <form method="post" onsubmit="return validateForm()">
        <label>Username: </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label>Email: </label>
        <input type="email" name="email" placeholder="Enter Email" id="email" required>
        <label>Password: </label>
        <input type="password" name="password" placeholder="Enter password" id="password" required>
        <label>Confirm Password: </label>
        <input type="password" name="confirmPassword" placeholder="Confirm password" id="confirmPassword" required>
        <label>Phone Number:</label>
        <input type="text" name="phoneNumber" id="phoneNumber" required>
        <div id="result" style="color: red; text-align: center;"></div>
        <input type="submit" name="signup" value="SignUp">
    </form>
    <script>
          function validateForm() {
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('confirmPassword').value;
            let result = document.getElementById('result');

            if (password !== confirmPassword) {
                result.innerHTML = "Passwords do not match";
                return false;
            }
            if (password.length < 8) {
                result.innerHTML = "Password should be at least 8 characters";
                return false;
            }
            result.innerHTML = ""; // Clear any previous error message
            return true; // Validation passed
        }
    </script>
</body>
</html>
