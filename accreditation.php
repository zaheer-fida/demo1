<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accreditation - AJK University</title>

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            background-color: #15233C !important;
        }

        h1, h2, h3, h4, h5, h6, p, span, div, li, label, button {
            color: white !important;
        }

        .accreditation-section {
            padding: 50px 0;
            text-align: center;
        }

        .accreditation-section img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 20px 0;
        }

        .accreditation-section h2 {
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        .accreditation-section p {
            font-size: 1.2rem;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Accreditation Section for AJK University BS Program -->
    <div class="accreditation-section" data-aos="fade-up">
        <div class="container">
            <h2>Affiliation - AJK University (BS Programs)</h2>
            <img src="uploads/ajk.png" alt="AJK University Logo">
            <p>AJK University is accredited for its BS programs by the Higher Education Commission (HEC) and other relevant bodies.</p>
        </div>
    </div>

    <!-- Accreditation Section for PMF Diploma -->
    <div class="accreditation-section" data-aos="fade-up">
        <div class="container">
            <h2>Affiliation - PMF (Diploma Programs)</h2>
            <img src="uploads/pmf.png" alt="PMF Logo">
            <p>PMF is recognized for its diploma programs and is affiliated with relevant educational boards.</p>
        </div>
    </div>

    <!-- Accreditation Section for AJK Board FSC -->
    <div class="accreditation-section" data-aos="fade-up">
        <div class="container">
            <h2>Affiliation - AJK Board (FSC Programs)</h2>
            <img src="uploads/AJK_BOARD.png" alt="AJK Board Logo">
            <p>The AJK Board is accredited for its FSC programs and is recognized nationwide.</p>
        </div>
    </div>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 3000, // Animation duration
            once: true, // Whether animation should happen only once
        });
    </script>

</body>

</html>

<?php include 'footer.php'; ?>