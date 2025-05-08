<?php
session_start();

if (!isset($_SESSION['logged_in_user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['logged_in_user'];
$view = $_GET['view'] ?? 'myuploads'; // Default view
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px; background-color: #f0f2f5;">

<h1 style="text-align: center;">Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>

<!-- Upload Form -->
<h2 style="text-align: center;">Upload Image</h2>
<form method="POST" enctype="multipart/form-data" action="upload.php" style="max-width: 400px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
    <label style="display: block; margin-bottom: 10px;">
        <span style="display: block; margin-bottom: 5px;">Image:</span>
        <input type="file" name="image" required style="width: 100%;">
    </label>
    <label style="display: block; margin-bottom: 10px;">
        <span style="display: block; margin-bottom: 5px;">Title:</span>
        <input type="text" name="title" required style="width: 100%; padding: 8px;">
    </label>
    <label style="display: block; margin-bottom: 10px;">
        <span style="display: block; margin-bottom: 5px;">Description:</span>
        <textarea name="description" required style="width: 100%; padding: 8px;"></textarea>
    </label>
    <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px;">Upload</button>
</form>

<!-- Navigation -->
<div style="text-align: center; margin: 30px 0;">
    <a href="?view=myuploads"><button style="padding: 10px 20px; margin-right: 10px;">My Profile</button></a>
    <a href="?view=location"><button style="padding: 10px 20px; margin-right: 10px;">Home</button></a>
    <a href="login.php"><button style="padding: 10px 20px;">Logout</button></a>
</div>

<hr>

<!-- Display Images -->
<?php
if (!isset($_SESSION['images']) || empty($_SESSION['images'])) {
    echo "<p style='text-align:center; color:#777;'>No images uploaded yet.</p>";
} else {
    echo "<div style='display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;'>";

    $hasImages = false;

    if ($view === 'location') {
        echo "<h2 style='color: #6c757d; width: 100%; text-align: center;'>Images from Your Location: " . htmlspecialchars($user['location']) . "</h2>";
        foreach ($_SESSION['images'] as $image) {
            if ($image['location'] === $user['location']) {
                $hasImages = true;
                echo "<div style='width: 220px; border:1px solid #ccc; border-radius:8px; padding:15px; background:#fff; text-align:center;'>";
                echo "<img src='" . htmlspecialchars($image['path']) . "' alt='Image' style='width:200px; height:200px; object-fit: cover; border-radius: 5px;'><br><br>";
                echo "<strong>Uploaded By:</strong> " . htmlspecialchars($image['name']) . "<br>";
                echo "<strong>Title:</strong> " . htmlspecialchars($image['title']) . "<br>";
                echo "<strong>Description:</strong> " . htmlspecialchars($image['description']) . "<br>";
                echo "</div>";
            }
        }
        if (!$hasImages) {
            echo "<p style='text-align:center; width:100%; color:#999;'>No images found from your location.</p>";
        }
    } else {
        echo "<h2 style='color: #6c757d; width: 100%; text-align: center;'>Your Uploaded Images</h2>";
        foreach ($_SESSION['images'] as $image) {
            if (isset($image['email']) && $image['email'] === $user['email']) {
                $hasImages = true;
                echo "<div style='width: 220px; border:1px solid #ccc; border-radius:8px; padding:15px; background:#fff; text-align:center;'>";
                echo "<img src='" . htmlspecialchars($image['path']) . "' alt='Image' style='width:200px; height:200px; object-fit: cover; border-radius: 5px;'><br><br>";
                echo "<strong>Title:</strong> " . htmlspecialchars($image['title']) . "<br>";
                echo "<strong>Description:</strong> " . htmlspecialchars($image['description']) . "<br>";
                echo "</div>";
            }
        }
        if (!$hasImages) {
            echo "<p style='text-align:center; width:100%; color:#999;'>You have not uploaded any images.</p>";
        }
    }

    echo "</div>";
}
?>

</body>
</html>
