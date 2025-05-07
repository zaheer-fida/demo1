
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; display: flex; align-items: center; justify-content: center; height: 100vh;">

<div style="background-color: white; padding: 40px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); width: 300px;">
    <h2 style="text-align: center;">Login</h2>

    <?php if ($message): ?>
        <p style="color: red; text-align: center;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action="" style="display: flex; flex-direction: column;">
        <label for="username" style="margin-bottom: 5px;">Username:</label>
        <input type="text" id="username" name="username" required style="padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <label for="password" style="margin-bottom: 5px;">Password:</label>
        <input type="password" id="password" name="password" required style="padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <button type="submit" style="padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Login
        </button>
    </form>
</div>

</body>
</html>
