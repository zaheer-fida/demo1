<?php
// Include the connection file
include 'connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software House Services</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns for a more balanced look */
            gap: 20px;
            padding: 50px 0;
        }
        .service {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .service:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .service i {
            font-size: 50px; /* Increased icon size */
            color: #007bff;
            margin-bottom: 15px;
        }
        .service h3 {
            color: #333;
            font-size: 20px; /* Increased font size */
            margin: 0 0 10px;
        }
        .service p {
            color: #555;
            font-size: 14px;
        }
        .service a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
 
    <div class="container">
<div class="service">
    <a href="home_manage.php">
        <i class="fas fa-cogs"></i> <!-- Changed icon here -->
        <h3>Home Page Management</h3>
        <p>Offering dedicated support for your website’s homepage. Customize layout, content, and more.</p>
    </a>
</div>
        <div class="service">
            <a href="employee.php">
                <i class="fas fa-user-tie"></i>
                <h3>Staff Management</h3>
                <p>treamline your employee-related operations effectively.</p>
            </a>
        </div>
        <div class="service">
    <a href="logout.php">
        <i class="fas fa-users-cog"></i> <!-- Updated icon -->
        <h3>LogOut</h3>
        <p>logout from system</p> <!-- Updated description -->
    </a>
</div>


</body>
</html>
