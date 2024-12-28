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
    
   $destination_id=$_POST['destination_id'];
    
      $destination_image_path = '../assets/img/uploads/destination/';
      
      
       // Upload Destination Image
    $destination_image_filename = generateUniqueFilename($_FILES['destination_image']['name']);
    move_uploaded_file($_FILES['destination_image']['tmp_name'], $destination_image_path . $destination_image_filename);
    
    
       // Insert data into the database
    $sql = "UPDATE destination set image='$destination_image_filename' where destination_id='$destination_id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Destination Image successfully Updated!"); window.location.href="admin-manage-destination.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
