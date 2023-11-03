<!DOCTYPE html>
<html>
<head>
    <!-- Include Bootstrap CSS (Replace with the correct paths or CDN) -->
    <link rel="stylesheet" href="path-to-bootstrap/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .flip-box {
            background-color: transparent;
            width: 300px;
            height: 220px; /* Slightly increased height */
            border: 1px solid #f1f1f1;
            perspective: 1000px;
        }

        .flip-box-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-box:hover .flip-box-inner {
            transform: rotateY(180deg);
        }

        .flip-box-front, .flip-box-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .flip-box-front {
            background-color: #bbb;
            color: black;
        }

        .flip-box-back {
            background-color: #555;
            color: white;
            transform: rotateY(180deg);
        }

        .flip-box img {
            width: 100%;
            height: 100%;
        }

        .flip-box h2 {
            margin-top: 10px; /* Adjusted margin */
        }

        .flip-box h3 {
            margin-top: 20px; /* Margin for the Specialist field */
        }

        .flip-box p {
            margin: 10px; /* Adjusted margin */
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    $host = "localhost"; // Replace with your actual database host
    $dbname = "urugero122"; // Replace with your actual database name
    $username = "root"; // Replace with your database username
    $password = "";

    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute a SELECT query
        $stmt = $pdo->prepare("SELECT title, fname, lname, specialist, email, phone, file FROM register");
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="flip-box">';
            echo '<div class="flip-box-inner">';
            echo '<div class="flip-box-front">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['file']) . '" alt="Profile">';
            echo '</div>';
            echo '<div class="flip-box-back">';
            echo '<h2>' . $row['title'] . '</h2>';
            echo '<h3>' . $row['specialist'] . '</h3>';
            echo '<p>First Name: ' . $row['fname'] . '</p>';
            echo '<p>Last Name: ' . $row['lname'] . '</p>';
            echo '<p>Email: ' . $row['email'] . '</p>';
            echo '<p>Phone: ' . $row['phone'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $pdo = null;
    ?>
</div>

<!-- Include Bootstrap JavaScript (Replace with the correct paths or CDN) -->
<script src="path-to-bootstrap/bootstrap.min.js"></script>
</body>
</html>
