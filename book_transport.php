<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php'; // Ensure PHPMailer is autoloaded
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    // Retrieve form data
    $transportCompany = $_POST['transport_company'];
    $transportCompanyOwner = $_POST['transport_company_owner'];
    $transportCompanyPhone = $_POST['transport_company_phone'];
    $transportCompanyEmail = $_POST['transport_company_email'];
    $firstName = $_POST['first_name'];
    $secondName = $_POST['second_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $message = $_POST['message'];
    $price = $_POST['price'];
    $car = $_POST['carname'];

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

        // Recipient settings
        $mail->setFrom('admin@firstclasstours.rw', 'First Class Tours Transport Booking'); // Replace with your sender email
        $mail->addAddress('firstclasstours1@gmail.com'); // Replace with your recipient email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Vehicle Booking Request';
          // Create email content
          
           $mail->Body = " <h2>New Vehicle Booking</h2>
                     <p><strong>Transport Company:</strong> $transportCompany</p>
        <p><strong>Company Owner:</strong> $transportCompanyOwner</p>
        <p><strong>Company Phone:</strong> $transportCompanyPhone</p>
        <p><strong>Company Email:</strong> $transportCompanyEmail</p>
        <hr>
         <p><strong>Car:</strong> $car</p>
        <p><strong>Price per day in USD :</strong> $price</p>
        <hr>
        <p><strong>Customer First Name:</strong> $firstName</p>
        <p><strong>Customer Second Name:</strong> $secondName</p>
        <p><strong>Customer Email:</strong> $email</p>
        <p><strong>Customer Phone:</strong> $phone</p>
        <p><strong>Booking Date From:</strong> $dateFrom</p>
        <p><strong>Booking Date To:</strong> $dateTo</p>
        <p><strong>Message:</strong> $message</p>";

        // Send the email
        $mail->send();
        
 


        $mail->send();
      echo "<script>alert('Transport Booking email sent successfully! We will in contact with you very soon.'); window.location.href = 'car_rental.php';</script>";
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
}
?>
