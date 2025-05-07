<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - AJK University</title>

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        body {
            background-color: #15233C !important;
        }

        h1, h2, h3, h4, h5, h6, p, span, div, li, label, button {
            color: white !important;
        }

        .facilities-section {
            padding: 50px 0;
            text-align: center;
        }

        .facilities-section h2 {
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        .facilities-section p {
            font-size: 1.2rem;
            margin-top: 20px;
            text-align: justify;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .facilities-section table {
            width: 100%;
            max-width: 800px;
            margin: 30px auto;
            border-collapse: collapse;
        }

        .facilities-section table, .facilities-section th, .facilities-section td {
            border: 1px solid white;
            padding: 10px;
            text-align: center;
        }

        .facilities-section th {
            background-color: #1c2e4a;
            font-size: 1.2rem;
        }

        .facilities-section td {
            background-color: #2c3e50;
        }

        .discount-note {
            font-size: 1rem;
            margin-top: 20px;
            color: red !important;
            font-weight: bold;
            text-align: justify;
            text-align-last: center;
        }

        .total-row {
            font-weight: bold;
            background-color: #1c2e4a;
        }
    </style>
</head>

<body>

    <!-- Facilities Section -->
    <div class="facilities-section" data-aos="fade-up">
        <div class="container">
            <h2>Hostel and Mess Facilities</h2>
            <p data-aos="fade-in">
                MEC provides excellent hostel and mess facilities for its students. The hostels are equipped with modern amenities, including 24/7 electricity, Wi-Fi, clean water, and comfortable living spaces. The mess offers nutritious and hygienic meals prepared under strict quality control.
            </p>
            <br><br>

            <!-- Discount Note -->
            <p class="discount-note" data-aos="zoom-in">
                *Discounts are applicable for deserving students upon submission of required documents and approval from the MEC administration.
            </p>
            <br><br>

            <!-- Combined Hostel and Mess Rates Table -->
            <h3>Hostel and Mess Rates</h3>
            <table data-aos="fade-left">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Rate (Per Month)</th>
                        <th>Discount for Deserving Students</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Hostel Rates -->
                    <tr>
                        <td>Standard Hostel and Standard Mess Plan(3 Meals/Day)</td>
                        <td>Rs. 10,000</td>
                        <td>--</td>
                        <td>Rs. 10,000</td>
                    </tr>

                   
                    <!-- Total Amount Row -->
                    <tr class="total-row">
                        <td colspan="3">Total Amount</td>
                        <td>Rs. 10,000</td>
                    </tr>
                </tbody>
            </table>
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