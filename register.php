<?php 

$servername = "localhost"; 
$username = "root";
$password = "rootpassword";
$dbname = "recipie_finder";
$port = "3307";

$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        
        $usnm = $_POST["username"];
        $psswd = $_POST["password"];
        
        // Check if username exists
        $check = "SELECT username FROM login WHERE username='$usnm'";
        $result = $conn->query($check);
        
        if ($result->num_rows > 0) {
            echo '<script>alert("Username already exists. Choose a different username!"); window.location.href="register.php";</script>';
        } else {
            $sql = $conn->prepare("INSERT INTO login(username, password) VALUES (?, ?)");
            $sql->bind_param("ss", $usnm, $psswd);
            
            if ($sql->execute()) {
                echo '<script>alert("Registration successful."); window.location.href="login.php";</script>';
            } else {
                echo '<script>alert("Error: ' . $sql->error . '"); window.location.href="register.php";</script>';
            }
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Recipe Finder</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('bg.jpg') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
        }

        .register-container {
            height: 460px;
            width: 420px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: #333;
        }

        .register-container h2 {
            margin-top: 20px;
            margin-bottom: 25px;
            font-size: 26px;
            font-weight: bold;
            color: #e67e22;
        }

        .register-container form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            text-align: left;
            color: #555;
        }

        .register-container form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            background: #fff;
            color: #333;
            font-size: 14px;
        }

        .register-container form input:focus {
            border-color: #e67e22;
            box-shadow: 0px 0px 5px rgba(230, 126, 34, 0.5);
        }

        .register-container form button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #e67e22;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            margin-top:10px;
        }

        .register-container form button:hover {
            background: #d35400;
        }

        .register-container a {
            text-decoration: none;
            color: #e67e22;
            font-size: 16px;
            display: block;
            margin-top: 30px;
            transition: 0.3s;
            font-weight: bold;
        }

        .register-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="register-container">
    <h2>🍽️ Create an Account</h2>
    <form action="register.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required />
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
        
        <button type="submit">Register</button>
    </form>
    
    <a href="login.php">Already have an account? Login</a>

</div>

</body>
</html>
