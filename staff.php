<?php
include 'connection.php';
include 'header.php'; // Include the header file

// Fetch employee details, prioritizing former lecturers
$sql = "SELECT * FROM employees ORDER BY id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
body {
    background-color: #15233C !important;

}
p {
    color: white !important;
}

        .card-img-top {
            width: 100%;
            height: 350px; /* Set height for uniformity */
            object-fit: cover;
            border-radius: 50%; /* Oval representation */
            display: block;
            margin: 0 auto; /* Center image */
        }
        .modal-img {
            width: 200px; /* Fixed size for modal image */
            height: 200px;
            object-fit: cover;
            border-radius: 50%; /* Oval representation */
            display: block;
            margin: 0 auto; /* Center image */
        }
        .organization-img {
            width: 200px; /* Fixed size */
            height: 200px;
            object-fit: cover;
            border-radius: 50%; /* Oval representation */
            display: block;
            margin: 0 auto; /* Center image */
        }

        /* Card hover effect */
        .card {
            transition: transform 0.3s ease-in-out; /* Smooth transition */
        }

        .card:hover {
            transform: translateY(-10px); /* Move the card up by 10px */
        }
custom-button {
    background-color: #4F84C4;
    color: white; /* Optional: Change text color for better contrast */
    border: none; /* Optional: Remove default border */
    padding: 10px 20px; /* Optional: Add padding for better appearance */
}
h1 {
    color: white !important;
}

    </style>
</head>
<body>

<div class="container mt-5">
    <!-- Section Heading for Employees -->
    <div class="mb-4 text-center">
        <h1>Meet Our Team</h1>
        <p>Get to know the brilliant minds behind our success.</p>
    </div>

    <!-- Employee Details -->
    <div class="row" >
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4" data-aos="fade-left" data-aos-delay="100">
                    <div class="card">
                        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Employee Image">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $row['name']; ?></h5>
                            <h5 class="card-text text-center"><?php echo $row['designation']; ?></h5>
                            <?php if ($row['former_lecturer'] === 'Yes'): ?>
                               
                            <?php endif; ?>
                            <button 
    data-bs-toggle="modal" 
    data-bs-target="#employeeModal<?php echo $row['id']; ?>" 
    style="background-color: #4F84C4; border-color: #4F84C4; color: white; padding: 10px 20px; border: none; cursor: pointer; display: block; margin: 0 auto;"
>
    Read More
</button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="employeeModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Employee Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo $row['image']; ?>" class="modal-img mb-3" alt="Employee Image">
                                <h6><strong>Name:</strong> <?php echo $row['name']; ?></h6>
                                <h6><strong>Designation:</strong> <?php echo $row['designation']; ?></h6>
                                <h6><strong>Email:</strong> <?php echo $row['email']; ?></h6>
                                <h6><strong>Experience:</strong> <?php echo $row['experience']; ?></h6>
                                <h6><strong>Education:</strong> <?php echo $row['education']; ?></h6>
                                <h6><strong>Achievements:</strong> <?php echo $row['achievements']; ?></h6>
                                <h6><strong><?php echo $row['former_lecturer']; ?></strong></h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No employees found.</p>
        <?php endif; ?>
    </div>
</div>


<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<!-- Initialize AOS -->
<script>
  AOS.init({
    duration: 1000, // Animation duration
    easing: 'ease-in-out', // Easing type
    once: true, // Whether animation should happen only once
  });
</script>

</body>
</html>
<?php
include 'footer.php'; // Include the footer file
?>

<?php $conn->close(); ?>