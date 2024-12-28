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
    
   $package_id=$_POST['package_id'];
    
      $destination_image_path = '../assets/img/uploads/packages/';
      
      
       // Upload Destination Image
    $destination_image_filename = generateUniqueFilename($_FILES['package_image']['name']);
    move_uploaded_file($_FILES['package_image']['tmp_name'], $destination_image_path . $destination_image_filename);
    
    
       // Insert data into the database
    $sql = "UPDATE packages set package_image='$destination_image_filename' where package_id='$package_id'";

    if ($conn->query($sql) === TRUE) {
       echo '<script>
        alert("Package Image successfully Updated!");
        window.location.href="change-image_package.php?packageid=' . $package_id . '";
      </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
