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

    // Collect data from the form
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $specialist = $_POST['specialist'];
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];

    // Handle file upload
    if (isset($_FILES['file'])) {
        $file = $_FILES['file']['tmp_name'];
        if (!empty($file)) {
            $fileContents = file_get_contents($file);

            // Prepare and execute an INSERT query with file data
            $stmt = $pdo->prepare("INSERT INTO Register (fname, lname, email, phone, title, specialist, uname, pword, file) 
                                   VALUES (:fname, :lname, :email, :phone, :title, :specialist, :uname, :pword, :file)");

            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':specialist', $specialist);
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':pword', $pword);
            $stmt->bindParam(':file', $fileContents, PDO::PARAM_LOB); // Use PDO::PARAM_LOB for BLOB data

            // Execute the query
            $stmt->execute();
        }
    }

    echo "Data inserted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$pdo = null;
?>
