<?php 

$servername = "mysql_container"; 
$username = "root"; 
$password = "rootpassword"; 
$dbname = "recipe_finder"; 



$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}
else
{
 if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $usernm = $_POST['username'];
            $passwd = $_POST['password'];
            $sql = "SELECT id FROM login WHERE username='$usernm' AND password='$passwd'";
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                echo ' <Script>alert("Login Success")</script>';
                echo '<script>window.location.href="dashboard.php";</script>';
            }
            else
            {
                echo ' <Script>alert("Incorrect username and password")</script>';
                echo '<script>window.location.href="login.php";</script>';
                exit();
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
    <title>Login | Recipe Finder</title>
    
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

        .login-container {
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

        .login-container h2 {
            margin-top: 20px;
            margin-bottom: 35px;
            font-size: 26px;
            font-weight: bold;
            color: #e67e22;
        }

        .login-container form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            text-align: left;
            color: #555;
        }

        .login-container form input {
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

        .login-container form input:focus {
            border-color: #e67e22;
            box-shadow: 0px 0px 5px rgba(230, 126, 34, 0.5);
        }

        .login-container form button {
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
        }

        .login-container form button:hover {
            background: #d35400;
        }

        .login-container a {
            text-decoration: none;
            color: #e67e22;
            font-size: 17px;
            display: block;
            margin-top: 40px;
            transition: 0.3s;
            font-weight: bold;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>🍽️ Recipe Finder Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required />
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
        
        <button type="submit">Login</button>
    </form>
        <a href="register.php">🚀 Join Us Now!</a>

</div>

</body>
</html>
