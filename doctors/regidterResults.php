<?php
// Database connection settings
$host = "localhost"; // Replace with your actual database host
$dbname = "urugero122"; // Replace with your actual database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute a SELECT query
    $stmt = $pdo->prepare("SELECT * FROM Register");
    $stmt->execute();

    // Fetch the results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Loop through the results and display the data
    foreach ($results as $row) {
        echo "First Name: " . $row['fname'] . "<br>";
        echo "Last Name: " . $row['lname'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Phone: " . $row['phone'] . "<br>";
        echo "Title: " . $row['title'] . "<br>";
        echo "Specialist: " . $row['specialist'] . "<br>";
        echo "Username: " . $row['uname'] . "<br>";
        // You can handle the profile image separately
        // For example, you can display it using <img> tag if it's an image URL
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$pdo = null;
?>
