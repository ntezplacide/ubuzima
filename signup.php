<?php
// Define the generateOTP function
function generateOTP() {
    // Generate a random 6-digit OTP
    return strval(mt_rand(100000, 999999));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"])) {
        // Handle OTP sending here, similar to your previous PHP code
        // Generate OTP, send it to the user's email, and store it in the database
        $email = $_POST["email"];
        $otp = generateOTP();
        
        // Send the OTP via email
        $to = $email;
        $subject = "OTP Verification";
        $message = "Your OTP: " . $otp;
        mail($to, $subject, $message);
        
        // Optionally, you can return a response to the client
        echo "OTP sent to your email.";
    } else {
        // Handle the registration process here, similar to your previous PHP code
        $name = $_POST["name"];
        $position = $_POST["position"];
        $number = $_POST["number"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $otp = $_POST["otp"];
        
        // Verify the OTP, and if it matches, proceed with registration
        if (verifyOTP($otp, $email)) {
            // Store registration details in the database
            // Mark the email as verified
            // Redirect the user to a success page or log them in
        } else {
            // Invalid OTP, show an error message and allow the user to try again
            echo "Invalid OTP. Please enter the correct OTP to verify your email.";
            // You can also provide a link or button to go back to the verification page
            echo '<a href="index.php">Try Again</a>';
        }
    }
}
?>
