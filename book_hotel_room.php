<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; // Ensure PHPMailer is autoloaded

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['submit'])) {

    $hotel_name = $_POST['hotel_name'];
    $room_name = $_POST['room_name'];
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $message = $_POST['message'];

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
        $mail->setFrom('no-reply@firstclasstours.rw', 'First Class Tours Hotel Room Booking');
        $mail->addAddress('firstclasstours1@gmail.com'); // Replace with the recipient email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Hotel Room Booking';
        $mail->Body = "<h2>New Booking Details</h2>
                       <p><strong>Hotel Name:</strong> $hotel_name</p>
                       <p><strong>Room Name:</strong> $room_name</p>
                       <p><strong>First Name:</strong> $first_name</p>
                       <p><strong>Second Name:</strong> $second_name</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Phone Number:</strong> $phone_number</p>
                       <p><strong>Booking Date From:</strong> $dateFrom</p>
                       <p><strong>Booking Date To:</strong> $dateTo</p>
                       <p><strong>Message:</strong> $message</p>";

        // Send the email
        $mail->send();
        echo "<script>alert('Hotel Room Booking email sent successfully! We will in contact with you very soon.'); window.location.href = 'hotel_booking.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.location.href = 'hotel_booking.php';</script>";
    }
}
?>
