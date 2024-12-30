<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; // Ensure PHPMailer is autoloaded

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    // Retrieve form data
    $package = $_POST['booking_package'];
    $name = $_POST['name_booking'];
    $email = $_POST['email_booking'];
    $phone = $_POST['phone_booking'];
    $comment = $_POST['comment'];
    $package_id = $_POST['package_id'];
    $date = $_POST['s'];
    $packagePrice = $_POST['packagePrice'];

    // Send Email with PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'firstclasstours.rw'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@firstclasstours.rw'; // Replace with your SMTP username
        $mail->Password = 'Security@firstclasstours.rw'; // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('no-reply@firstclasstours.rw', 'First Class Tours Package Booking Notifier');
        $mail->addAddress('firstclasstours1@gmail.com'); // Send to your email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Package Booking Submission';
        $mail->Body = "
            <h2>New Booking Received</h2>
            <p><strong>Package:</strong> $package</p>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Comment:</strong> $comment</p>
        ";

        // Send the email
        $mail->send();
        echo "<script>alert('Your Bookong successfully recorded. Please Proceed with payment.')</script>";
        // Redirect using POST
        echo "<form id='redirectForm' method='POST' action='proceed-to-pay.php'>
                <input type='hidden' name='packageId' value='" . htmlspecialchars($package_id, ENT_QUOTES) . "'>
                <input type='hidden' name='totalPrice' value='" . htmlspecialchars($packagePrice, ENT_QUOTES) . "'>
              </form>
              <script>
                  document.getElementById('redirectForm').submit();
              </script>";
        exit; // Stop execution after sending the response
    } catch (Exception $e) {
        echo "
        <script>
            alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
            window.location.href = 'itinerary.php?packageID=$package_id'; // Redirect back to the form page
        </script>";
        exit;
    }
}
?>
