<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include 'includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $slider_id = $_POST['slider_id'];

 
   $slider_image_name = $_FILES['new_slider_image']['name'];
    $slider_image_tmp = $_FILES['new_slider_image']['tmp_name'];

    // Upload image to server
    $upload_directory = "../assets/img/uploads/slider/"; // Directory to upload images
    $target_file = $upload_directory . basename($slider_image_name);
    move_uploaded_file($slider_image_tmp, $target_file);

        // Update image filename in database
        $sql = "UPDATE homepage_slider SET slider_image='$slider_image_name' WHERE slider_id=$slider_id";
        if ($conn->query($sql) === TRUE) {
            
         
            echo '<script>alert("Slider image updated successfully"); window.location.href = "manage_slider.php";</script>';
        } else {
            echo "Error updating slider image: " . $conn->error;
        }

    // Close database connection
    $conn->close();
}
?>
