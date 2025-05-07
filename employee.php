<?php
// Include the connection file
include 'connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Handle form submission for adding or updating employees
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $email = $_POST['email'];
    $experience = $_POST['experience']; // This is now a VARCHAR
    $education = $_POST['education'];
    $achievements = $_POST['achievements'];
    $formerLecturer = $_POST['former_lecturer'] ?? '';

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
        $imagePath = $_POST['existing_image'] ?? null;
    }

    // Insert or update query depending on the presence of an ID
    if ($id) {
        // Update employee
        $sql = "UPDATE employees SET 
                image = ?, name = ?, designation = ?, email = ?, 
                experience = ?, education = ?, achievements = ?, 
                former_lecturer = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssssi', $imagePath, $name, $designation, $email, $experience, $education, $achievements, $formerLecturer, $id);
        $stmt->execute();
    } else {
        // Add new employee
        $sql = "INSERT INTO employees (image, name, designation, email, experience, education, achievements, former_lecturer) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssssss', $imagePath, $name, $designation, $email, $experience, $education, $achievements, $formerLecturer);
        $stmt->execute();
    }
}

// Handle delete action
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM employees WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// Fetch all employees
$result = $conn->query("SELECT * FROM employees");
$employees = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>

body {
    background-color: #15233C !important;

}
h1, h2, h3, h4, h5, h6, p, span, div, li, label, button {
    color: white !important;
}

</style>

</head>
<body>
  
<div class="container mt-5">
    <h1 class="text-center">Employee Management</h1>

    <!-- Add/Update Employee Form -->
    <form method="POST" enctype="multipart/form-data" class="mb-4">
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="existing_image" id="existing_image">
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" name="designation" id="designation" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="experience" class="form-label">Experience</label>
            <input type="text" class="form-control" name="experience" id="experience" placeholder="e.g., 5 years, 3 years of experience" required>
        </div>
        <div class="mb-3">
            <label for="education" class="form-label">Education</label>
            <textarea class="form-control" name="education" id="education" required></textarea>
        </div>
        <div class="mb-3">
            <label for="achievements" class="form-label">Achievements</label>
            <textarea class="form-control" name="achievements" id="achievements" required></textarea>
        </div>
        <div class="mb-3">
            <label for="former_lecturer" class="form-label">Former Job*</label>
            <input type="text" class="form-control" name="former_lecturer" id="former_lecturer" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Employee</button>
    </form>

    <!-- Employee List -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Email</th>
            <th>Experience</th>
            <th>Education</th>
            <th>Achievements</th>
            <th>Former Job*</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><img src="<?= $employee['image'] ?>" alt="Image" width="50"></td>
                <td><?= $employee['name'] ?></td>
                <td><?= $employee['designation'] ?></td>
                <td><?= $employee['email'] ?></td>
                <td><?= $employee['experience'] ?></td>
                <td><?= $employee['education'] ?></td>
                <td><?= $employee['achievements'] ?></td>
                <td><?= $employee['former_lecturer'] ?></td>
                <td>
                    <a href="javascript:void(0)" onclick="editEmployee(<?= htmlspecialchars(json_encode($employee)) ?>)" class="btn btn-warning btn-sm">Edit</a>
                    <a href="?delete=<?= $employee['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function editEmployee(employee) {
        document.getElementById('id').value = employee.id;
        document.getElementById('existing_image').value = employee.image;
        document.getElementById('name').value = employee.name;
        document.getElementById('designation').value = employee.designation;
        document.getElementById('email').value = employee.email;
        document.getElementById('experience').value = employee.experience;
        document.getElementById('education').value = employee.education;
        document.getElementById('achievements').value = employee.achievements;
        document.getElementById('former_lecturer').value = employee.former_lecturer;
    }
</script>

</body>
</html>
