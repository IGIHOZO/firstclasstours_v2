<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Include the database configuration
include("dashboard/includes/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $company_name = $_POST['company_name'];
    $owner_name = $_POST['owner_name'];
    $contact_email = $_POST['contact_email'];
    $phone_number = $_POST['phone_number'];
    $company_address = $_POST['company_address'];
    $fleet_size = $_POST['fleet_size'];
    $type_of_vehicles = $_POST['type_of_vehicles'];
    $licence_number = $_POST['licence_number'];

    // Handle file uploads
    $upload_dir = "uploads/Transport/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
    }

    // Generate unique names for uploaded files
    $timestamp = time();
    $certificate_name = $timestamp . "_" . basename($_FILES['company_certificate']['name']);
    $logo_name = $timestamp . "_" . basename($_FILES['company_logo']['name']);

    $certificate_path = $upload_dir . $certificate_name;
    $logo_path = $upload_dir . $logo_name;

    // Move the files to the upload directory
    move_uploaded_file($_FILES['company_certificate']['tmp_name'], $certificate_path);
    move_uploaded_file($_FILES['company_logo']['tmp_name'], $logo_path);

    // Prepare the SQL query for database insertion
    $stmt = $conn->prepare("INSERT INTO transport_companies (company_name, owner_name, contact_email, phone_number, company_address, fleet_size, type_of_vehicles, licence_number, company_certificate, company_logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters and execute
    $stmt->bind_param("ssssssssss", $company_name, $owner_name, $contact_email, $phone_number, 
                                               $company_address, $fleet_size, $type_of_vehicles, $licence_number, 
                                               $certificate_name, $logo_name);

    if ($stmt->execute()) {
        // Success message with JavaScript
        echo "<script>
                alert('Transport company registered successfully, You will receive an Email from Us once your registration is approved!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>alert('Error registering transport company!');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
