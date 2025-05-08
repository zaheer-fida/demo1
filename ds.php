<?php
session_start();

// Unset all session variables
$_SESSION = array();

// If session uses cookies, destroy the session cookie as well
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), 
        '', 
        time() - 42000,
        $params["path"], 
        $params["domain"],
        $params["secure"], 
        $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Optional: Redirect to login page or homepage
header("Location: login.php");
exit();
?>
