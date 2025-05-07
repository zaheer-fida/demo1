<?php
// Database connection
include 'connection.php';

// Handle form submission for adding/editing images
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_image'])) {
        // Add image
        $image_name = $_POST['image_name'];
        $image_file = $_FILES['image_file'];

        if ($image_file['error'] === UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/';
            $image_path = $upload_dir . basename($image_file['name']);

            if (move_uploaded_file($image_file['tmp_name'], $image_path)) {
                $sql = "INSERT INTO home (image_name, image_path) VALUES ('$image_name', '$image_path')";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>Image uploaded successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Failed to upload image.</div>";
            }
        }
    } elseif (isset($_POST['edit_image'])) {
        // Edit image
        $id = $_POST['id'];
        $image_name = $_POST['image_name'];

        if (!empty($_FILES['image_file']['name'])) {
            $image_file = $_FILES['image_file'];
            $upload_dir = 'uploads/';
            $image_path = $upload_dir . basename($image_file['name']);

            if (move_uploaded_file($image_file['tmp_name'], $image_path)) {
                $sql = "UPDATE home SET image_name='$image_name', image_path='$image_path' WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>Image updated successfully!</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Failed to upload new image.</div>";
            }
        } else {
            $sql = "UPDATE home SET image_name='$image_name' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Image name updated successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        }
    }
}

// Handle image deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM home WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Image deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Fetch all images from the database
$sql = "SELECT * FROM home";
$result = $conn->query($sql);
$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
}

// Fetch image data for editing
$edit_image = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM home WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $edit_image = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #15233C;
            color: white;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            background-color: white;
            color: #15233C;
        }
        .table th, .table td {
            border-color: #15233C;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Add Image</h1>
        <form method="POST" enctype="multipart/form-data" class="mb-4">
            <div class="mb-3">
                <label for="image_name" class="form-label">Image Name:</label>
                <input type="text" name="image_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image_file" class="form-label">Image File:</label>
                <input type="file" name="image_file" class="form-control" required>
            </div>
            <button type="submit" name="add_image" class="btn btn-primary">Upload Image</button>
        </form>

        <h1 class="text-center">View Images</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image): ?>
                    <tr>
                        <td><?php echo $image['id']; ?></td>
                        <td><?php echo $image['image_name']; ?></td>
                        <td><img src="<?php echo $image['image_path']; ?>" alt="<?php echo $image['image_name']; ?>" width="100"></td>
                        <td>
                            <a href="?edit=<?php echo $image['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="?delete=<?php echo $image['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if ($edit_image): ?>
            <h1 class="text-center">Edit Image</h1>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $edit_image['id']; ?>">
                <div class="mb-3">
                    <label for="image_name" class="form-label">Image Name:</label>
                    <input type="text" name="image_name" value="<?php echo $edit_image['image_name']; ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image_file" class="form-label">New Image File (optional):</label>
                    <input type="file" name="image_file" class="form-control">
                </div>
                <button type="submit" name="edit_image" class="btn btn-primary">Update Image</button>
            </form>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>