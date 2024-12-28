<?php
// Include the database configuration
include("dashboard/includes/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $hotel_name = $_POST['hotel_name'];
    $owner_name = $_POST['owner_name'];
    $contact_email = $_POST['contact_email'];
    $phone_number = $_POST['phone_number'];
    $hotel_address = $_POST['hotel_address'];
    $star_rating = $_POST['star_rating'];
    
    // Get textarea data and preserve line breaks
    $room_types = nl2br($_POST['room_types']); // Convert newlines to <br> tags
    $checkin_policy = nl2br($_POST['checkin_policy']); // Convert newlines to <br> tags
    $hotel_amenities = nl2br($_POST['hotel-amenities']); // Convert newlines to <br> tags
    $dining_options = nl2br($_POST['dining_options']); // Convert newlines to <br> tags
    $accessibility_features = isset($_POST['accessibility_features']) ? nl2br($_POST['accessibility_features']) : ''; // Convert newlines to <br> tags

    // Handle file uploads
    $upload_dir = "uploads/Hotels/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
    }

    // Generate unique names for uploaded files
    $timestamp = time();

    $certificate_name = $timestamp . "_" . basename($_FILES['hotel_certificate']['name']);
    $logo_name = $timestamp . "_" . basename($_FILES['hotel_logo']['name']);

    $certificate_path = $upload_dir . $certificate_name;
    $logo_path = $upload_dir . $logo_name;

    // Move the files to the upload directory
    move_uploaded_file($_FILES['hotel_certificate']['tmp_name'], $certificate_path);
    move_uploaded_file($_FILES['hotel_logo']['tmp_name'], $logo_path);

    // Prepare the SQL query for database insertion
    $stmt = $conn->prepare("INSERT INTO hotels (hotel_name, owner_name, contact_email, phone_number, hotel_address, star_rating, room_types, checkin_policy, hotel_amenities, dining_options, accessibility_features, hotel_certificate, hotel_logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters and execute
    $stmt->bind_param("sssssssssssss", $hotel_name, $owner_name, $contact_email, $phone_number, 
                                               $hotel_address, $star_rating, $room_types, $checkin_policy, 
                                               $hotel_amenities, $dining_options, $accessibility_features, 
                                               $certificate_name, $logo_name);

    if ($stmt->execute()) {
        // Success message with JavaScript
        echo "<script>
                alert('Hotel Registered Successfully! You will receive an Email from Us once your registration is approved!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>alert('Error registering hotel!');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
