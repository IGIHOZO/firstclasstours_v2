<?php
// Include database connection
include 'includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $embended_code = $_POST['embended_code'];
  
    // Update the about_company details in the database
    $sql = "UPDATE homepage_video SET 
                embended_code = '$embended_code'
               ";

    if ($conn->query($sql) === TRUE) {
        // About company details updated successfully
        echo '<script>alert("Home page Video updated successfully."); window.location.href = "homepage_video.php";</script>';
    } else {
        // Error handling for failed update
        echo "Error updating Homepage video details: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
