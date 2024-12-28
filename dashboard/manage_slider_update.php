<?php
// Include database connection
include 'includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $slider_id = $_POST['slider_id'];
 
    
        $slider_title = mysqli_real_escape_string($conn, strip_tags($_POST['slider_title']));
$slider_description = mysqli_real_escape_string($conn, strip_tags($_POST['slider_description']));

    // Update data in database
    $sql = "UPDATE homepage_slider SET slider_title='$slider_title', slider_description='$slider_description' WHERE slider_id=$slider_id";
    if ($conn->query($sql) === TRUE) {
       
        
         echo '<script>alert("Slider details updated successfully"); window.location.href = "manage_slider.php";</script>';
    } else {
        echo "Error updating slider details: " . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
