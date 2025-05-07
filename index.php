<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

<style>

body {
    background-color: #15233C !important;

}
h1, h2, h3, h4, h5, h6, p, span, div, li, label, button {
    color: white !important;
}
.affiliation-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding: 50px 20px;
            text-align: center;
        }

        .affiliation-item {
            flex: 1;
            max-width: 300px;
            margin: 20px;
        }

        .affiliation-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .affiliation-item h2 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .affiliation-item p {
            font-size: 1.1rem;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .affiliation-container {
                flex-direction: column;
            }

            .affiliation-item {
                max-width: 100%;
            }
        }
 .hero-header {
        padding: 0;
        margin-bottom: 20px;
    }
    
    #heroSlider {
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-top: 30px; /* Added top margin for the entire slider */
    }
    
    .carousel-control-prev, .carousel-control-next {
        background-color: rgba(0,0,0,0.2);
        width: 40px;
        height: 40px;
        border-radius: 80%;
        top: 80%; /* Changed from 50% to 80% */
        transform: translateY(-50%);
        opacity: 0.1;
        margin: 0 15px; /* Added horizontal margin */
    }
    
    .carousel-control-prev {
        left: 10px; /* Adjusted left position */
    }
    
    .carousel-control-next {
        right: 10px; /* Adjusted right position */
    }
    
    .carousel-control-prev:hover, .carousel-control-next:hover {
        opacity:  0.1;
        background-color: rgba(0,0,0,0.4);
    }
    
    /* Optional: Add some spacing between the controls and images */
    .carousel-inner {
        padding: 0 40px;
    }
</style>


</head>

<body>

<!-- Hero Section Start -->
<?php
include 'connection.php';

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Image Paths from 'home' table for the slider
$sql = "SELECT image_path FROM home";
$result = $conn->query($sql);
?>

<div class="container-fluid hero-header">
    <div class="container">
        <div class="row align-items-center">
            <!-- Left Side Fixed Image -->
            <div class="col-md-3 d-none d-md-block">
                <img src="uploads/ga1.jpg" class="w-100" alt="Left Image" style="height: 300px; object-fit: cover; border-radius: 8px 0 0 8px;">
            </div>
            
            <!-- Main Slider -->
            <div class="col-md-6">
                <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        if ($result->num_rows > 0) {
                            $active = true;
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                                echo '<img src="' . $row['image_path'] . '" class="d-block w-100" alt="Slide" style="height: 600px; object-fit: cover;">';
                                echo '</div>';
                                $active = false;
                            }
                        } else {
                            echo '<div class="carousel-item active">';
                            echo '<img src="path/to/default-image.jpg" class="d-block w-100" alt="Default Slide" style="height: 600px; object-fit: cover;">';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Right Side Fixed Image -->
            <div class="col-md-3 d-none d-md-block">
                <img src="uploads/ga2.jpg" class="w-100" alt="Right Image" style="height: 300px; object-fit: cover; border-radius: 0 3px 3px 0;">
            </div>
        </div>
    </div>
</div>
<!-- Hero Section End -->

<!-- About Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.5s">
                <!-- Heading -->
                <h1 class="display-6 mb-4 text-center">Message From CEO</h1>

                <!-- Flex Container for Image and Text -->
                <div class="d-flex">
                    <!-- Image Column -->
                    <div class="flex-shrink-0 me-4" style="width: 270px; height: auto;">
                        <img src="uploads/ceo_mec.jpeg" alt="About MEC College" class="img-fluid" style="width: 100%; height: 60%;">
                    </div>

                    <!-- Text Column -->
                    <div class="flex-grow-1">
                        <p class="mb-4 text-justify" style="height: 100%;">
                            Allied Health Professionals are recognized as vital members of the health team. While our college comprises different medical technologies at different levels, we share the common goal of medical excellence in Allied Health Sciences.

                            Our aim is not only to equip our students with professional skills but also with critical thinking, problem-solving skills, social ethics, and religious values. Nelson Mandela rightly said, "Education is the most powerful weapon you can use to change the world." If there is one thing that can change the world, it is education.

                            In this pursuit of excellence, I appreciate the co-operation and support from our parent fraternity. I also laud the relentless efforts of our teachers for giving their best in bringing out the best in our students.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Section End -->

  <!-- Programs Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 mb-4">Our Programs</h1>
        </div>
        <div class="row g-4">
            <!-- Dispenser Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/dispenser.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">F.Sc Dispenser Technology</h4>
                    <p class="text-white">Affiliated with AJK Board Mirpur</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Physiotherapy Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/physiotherapy.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">F.Sc Physiotherapy Technology</h4>
                    <p class="text-white">Affiliated with AJK Board Mirpur</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Lab Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/lab.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">F.Sc Lab Technology</h4>
                    <p class="text-white">Affiliated with AJK Board Mirpur</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Radiology and Imaging Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/radiology.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">F.Sc Radiology and Imaging Technology</h4>
                    <p class="text-white">Affiliated with AJK Board Mirpur</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Operation Theater Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/operation_theater.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">F.Sc Operation Theater Technology</h4>
                    <p class="text-white">Affiliated with AJK Board Mirpur</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Dentistry Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/dentistry.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">F.Sc Dentistry Technology</h4>
                    <p class="text-white">Affiliated with AJK Board Mirpur</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
 <div class="row g-4">
            <!-- Dispenser Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/dispenser.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">Diploma in Dispenser Technology</h4>
                    <p class="text-white">Affiliated with PMF</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Physiotherapy Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/physiotherapy.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">Diploma in Physiotherapy Technology</h4>
                    <p class="text-white">Affiliated with PMF</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Lab Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/lab.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">Diploma in Lab Technology</h4>
                    <p class="text-white">Affiliated with PMF</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Radiology and Imaging Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/radiology.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">Diploma in Radiology and Imaging Technology</h4>
                    <p class="text-white">Affiliated with PMF</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Operation Theater Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/operation_theater.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">Diploma in Operation Theater Technology</h4>
                    <p class="text-white">Affiliated with PMF.</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- Dentistry Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/dentistry.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">Diploma in Dentistry Technology</h4>
                    <p class="text-white">Affiliated with PMF</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>




            <!-- BS Emergency Medical Technology -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/emergency-med.jpeg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">BS Emergency Medical Technology</h4>
                    <p class="text-white">Affiliated with AJK Universtity</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- BS Clinical Lab Sciences -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/clinical-lab.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">BS Clinical Lab Sciences</h4>
                    <p class="text-white">Affiliated with AJK Universtity</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- BS Surgical & OT Sciences -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/surgical-ot.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">BS Surgical & OT Sciences</h4>
                    <p class="text-white">Affiliated with AJK Universtity</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- BS Anesthesia & Critical Sciences -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/anesthesia.jpg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">BS Anesthesia & Critical Sciences</h4>
                    <p class="text-white">Affiliated with AJK Universtity</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
            <!-- BS Physiotherapy (DPT) -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item position-relative rounded h-100 p-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/physiotherapy-dpt.jpeg') no-repeat center center/cover;">
                    <h4 class="mb-3 text-white">BS Physiotherapy (DPT)</h4>
                    <p class="text-white">Affiliated with AJK Universtity</p>
                    <a href="programs.php" class="btn btn-primary px-3">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Programs Section End -->

<br><br><br>
 <!-- Main Affiliation Heading -->
<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    <h1 class="display-6 mb-4">Affiliation</h1>
</div>

<!-- Affiliation Container -->
<div class="d-flex justify-content-center wow fadeInUp" data-wow-delay="0.1s">
    <div class="affiliation-container" data-aos="fade-up">
        <!-- AJK University BS Program -->
        <div class="affiliation-item">
            <img src="uploads/ajk.png" alt="AJK University Logo">
            <h2>AJK University</h2>
            <p>BS Programs accredited by HEC and other relevant bodies.</p>
        </div>

        <!-- PMF Diploma Program -->
        <div class="affiliation-item">
            <img src="uploads/pmf.png" alt="PMF Logo">
            <h2>PMF</h2>
            <p>Diploma programs recognized by relevant educational boards.</p>
        </div>

        <!-- AJK Board FSC Program -->
        <div class="affiliation-item">
            <img src="uploads/AJK_BOARD.png" alt="AJK Board Logo">
            <h2>AJK Board</h2>
            <p>FSC programs accredited and recognized nationwide.</p>
        </div>
    </div>
</div>


    <!-- Contact Section Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 mb-4">Contact Us</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="mb-4">If you have any questions or need further information, feel free to contact us. We are here to help you with your educational journey.</p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Address</h5>
                            <p class="mb-0">Kotli Road, Sector F/3, Opposite Jan Chemist, Al-Khair Plaza, Mirpur AJK</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Phone</h5>
                            <p class="mb-0">+92 355 8159990</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5>Email</h5>
                            <p class="mb-0">mec@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
<!-- Location Section Start -->
<div class="container-xxl py-5">
    <div>
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-6 mb-4">Our Location</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.3s">
                <!-- Google Maps Iframe -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3340.919122982683!2d73.77070237567774!3d33.13748927351513!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzPCsDA4JzE1LjAiTiA3M8KwNDYnMjMuOCJF!5e0!3m2!1sen!2s!4v1738323773832!5m2!1sen!2s" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
<!-- Location Section End -->

</body>

</html>

<?php include 'footer.php'; ?>



