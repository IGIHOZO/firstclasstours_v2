<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Include database connection
include 'includes/config.php';

// Function to generate a unique filename with today's date and time
function generateUniqueFilename($originalFilename) {
    $timestamp = date("Ymd_His");
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    return "file_" . $timestamp . "." . $extension;
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $destination_name = $_POST['destination_name'];
    $country_id = $_POST['country_id'];
    $destination_city = $_POST['destination_city'];
 
    $destination_small_description = mysqli_real_escape_string($conn, strip_tags($_POST['destination_small_description']));


    $destination_full_description = mysqli_real_escape_string($conn, strip_tags($_POST['destination_full_description']));

    $visa_required = $_POST['visa_required'];
    $language_spoken = $_POST['language_spoken'];
    $currency_used = $_POST['currency_used'];
    $support_phone = $_POST['support_phone'];
    $support_email = $_POST['support_email'];
    $country_area = $_POST['country_area'];

    // File upload paths
    $destination_image_path = '../assets/img/uploads/destination/';
    $visa_requirements_document_path = '../assets/documents/visa/';
    $country_info_document_path = '../assets/documents/country_info/';

    // Upload Destination Image
    $destination_image_filename = generateUniqueFilename($_FILES['destination_image']['name']);
    move_uploaded_file($_FILES['destination_image']['tmp_name'], $destination_image_path . $destination_image_filename);

    // Upload Visa Requirements Document
    $visa_requirements_document_filename = generateUniqueFilename($_FILES['visa_requirements_document']['name']);
    move_uploaded_file($_FILES['visa_requirements_document']['tmp_name'], $visa_requirements_document_path . $visa_requirements_document_filename);

    // Upload Country Info Document
    $country_info_document_filename = generateUniqueFilename($_FILES['country_info_document']['name']);
    move_uploaded_file($_FILES['country_info_document']['tmp_name'], $country_info_document_path . $country_info_document_filename);

    // Insert data into the database
    $sql = "INSERT INTO `destination` (`name`, `category`, `city`, `description`, `image`, `description_full`, `visa_required`, `languages_spoken`, `currency_used`, `support_phone`, `support_email`, `country_area`, `visa_requirements_document`, `country_info`, `creationdate`, `updationdate`)
            VALUES ('$destination_name', '$country_id', '$destination_city', '$destination_small_description', '$destination_image_filename', '$destination_full_description', '$visa_required', '$language_spoken', '$currency_used', '$support_phone', '$support_email', '$country_area', '$visa_requirements_document_filename', '$country_info_document_filename', NOW(), NOW())";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record inserted successfully!"); window.location.href="admin-create-destination.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
