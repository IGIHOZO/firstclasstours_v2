<?php
// Include database connection
include("dashboard/includes/config.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $company_name = $_POST['company_name'];
    $owner_name = $_POST['owner_name'];
    $contact_email = $_POST['contact_email'];
    $phone_number = $_POST['phone_number'];
    $company_address = $_POST['company_address'];
    $tour_type = $_POST['tour_type'];
    $language_by_tour_guide = $_POST['language_by_tour_guide'];
    $licence_number = $_POST['licence_number'];
    $service_description = nl2br($_POST['service_description']);

    // Handle file uploads
    $upload_dir = "uploads/tourCompany/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
    }

    // Generate unique names for uploaded files
    $timestamp = time();

    $company_certificate = $timestamp . "_" . basename($_FILES['company_certificate']['name']);
    $company_logo = $timestamp . "_" . basename($_FILES['company_logo']['name']);

    $certificate_path = $upload_dir . $company_certificate;
    $logo_path = $upload_dir . $company_logo;

    // Move files to the upload directory
    move_uploaded_file($_FILES['company_certificate']['tmp_name'], $certificate_path);
    move_uploaded_file($_FILES['company_logo']['tmp_name'], $logo_path);

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO tours_company (company_name, owner_name, contact_email, phone_number, company_address, tour_type, language_by_tour_guide, licence_number, service_description, company_certificate, company_logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $company_name, $owner_name, $contact_email, $phone_number, $company_address, $tour_type, $language_by_tour_guide, $licence_number, $service_description, $company_certificate, $company_logo);

    if ($stmt->execute()) {
        // Success message with JavaScript
        echo "<script>
                alert('Tour company registered successfully, You will receive an Email from Us once your registration approved!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
