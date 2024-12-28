<?php
// Include database connection
include 'includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
 $slider_title = mysqli_real_escape_string($conn, $_POST['slider_title']);
    $slider_description = mysqli_real_escape_string($conn, $_POST['slider_description']);
 
    $slider_image_name = $_FILES['slider_image']['name'];
    $slider_image_tmp = $_FILES['slider_image']['tmp_name'];

    // Upload image to server
    $upload_directory = "../assets/img/uploads/slider/"; // Directory to upload images
    $target_file = $upload_directory . basename($slider_image_name);
    move_uploaded_file($slider_image_tmp, $target_file);

    // Insert data into database
    $sql = "INSERT INTO homepage_slider (slider_title, slider_description, slider_image) VALUES ('$slider_title', '$slider_description', '$slider_image_name')";
    if ($conn->query($sql) === TRUE) {
       
          echo '<script>alert("Slider created successfully!"); window.location.href="admin-create-slider.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
