<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            $_SESSION['logged_in_user'] = $user;
            header("Location: profile.php");
            exit();
        }
    }
    echo "<p style='color:red; font-weight:bold;'>Invalid email or password.</p>";
}
?>

<form method="POST" style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; font-family: Arial, sans-serif;">
    <label style="display:block; margin-bottom: 10px;">
        Email:
        <input type="email" name="email" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </label>
    <label style="display:block; margin-bottom: 20px;">
        Password:
        <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </label>
    <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
        Login
    </button>
</form>
