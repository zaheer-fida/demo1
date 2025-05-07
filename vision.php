<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    body {
        background-color: #15233C !important;
    }
    h1, h2, h3, h4, h5, h6, p, span, div, li, label, button {
        color: white !important;
    }
    .slogan {
        text-align: center;
        padding: 50px 0;
        font-size: 2.5rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #ff0000 !important; /* Red color */
        text-shadow: 0 0 10px rgba(255, 0, 0, 0.5); /* Red glow effect */
    }
</style>

</head>

<body>

<!-- Slogan Section -->
<div class="slogan" 
     data-aos="fade-down" 
     data-aos-duration="3000" 
     data-aos-easing="ease-in-out">
    Join Us to Heal the Ailing Humanity
</div>

<!-- Vision & Mission Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-6 mb-4 text-center">Our Vision</h1>
                <p class="mb-4">To produce professionals in medical technology with excellence in professional competence and ethical values who are capable of meeting local and global needs and health challenges.</p>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="display-6 mb-4 text-center">Our Mission</h1>
                <p class="mb-4">To achieve excellence in health education with professional standards and ethical values.</p>
            </div>
        </div>
    </div>
</div>
<!-- Vision & Mission Section End -->

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 4000, // Global animation duration
        easing: 'ease-in-out', // Global easing
        once: true // Animation only happens once
    });
</script>

</body>

</html>

<?php include 'footer.php'; ?>