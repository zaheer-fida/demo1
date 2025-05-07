<?php
include 'connection.php'; // Include the connection file
session_start();

// Handle login request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows === 1) {
        $_SESSION['email'] = $email;
        header("Location: dashboard.php"); // Redirect to dashboard upon successful login
        exit();
    } else {
        $error_message = "Invalid email or password. Please try again.";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin MEC</title>
    
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
     <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="uploads/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="uploads/favicon-16x16.png">
   
    <style>
        body {
            background-color: #15233C !important;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .logo {
            width: 150px;
            height: auto;
            margin-bottom: 30px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #15233C;
        }

        .form-control {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .btn-success {
            padding: 15px;
            font-size: 18px;
            border-radius: 10px;
            background-color: #1c2e4a;
            border: none;
            color: white;
            width: 100%;
        }

        p.text-muted {
            font-size: 14px;
        }

        .alert {
            font-size: 16px;
            margin-top: 10px;
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-container" data-aos="fade-up">
        <!-- Logo -->
        <img src="uploads/logo.png" alt="Logo" class="logo">

        <h3>Welcome Back!</h3>

        <?php
        // Display error message if login fails
        if (isset($error_message)) {
            echo "<div class='alert'>$error_message</div>";
        }
        ?>

        <form method="POST">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
        
    </div>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Animation duration
            once: true, // Whether animation should happen only once
        });
    </script>
</body>

</html>
