<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['users'][] = [
        'name' => $_POST['name'],
        'father_name' => $_POST['father_name'],
        'location' => $_POST['location'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ];
    header("Location: index.php");
    exit();
}
?>

<form method="POST" style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; font-family: Arial, sans-serif;">
    <label style="display:block; margin-bottom: 10px;">
        Name:
        <input type="text" name="name" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </label>
    <label style="display:block; margin-bottom: 10px;">
        Father's Name:
        <input type="text" name="father_name" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </label>
    <label style="display:block; margin-bottom: 10px;">
        Location:
        <input type="text" name="location" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </label>
    <label style="display:block; margin-bottom: 10px;">
        Email:
        <input type="email" name="email" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </label>
    <label style="display:block; margin-bottom: 20px;">
        Password:
        <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </label>
    <button type="submit" style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Sign Up
    </button>
</form>
