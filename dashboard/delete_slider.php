<?php
// Include database connection
include './includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Get package ID from the form
    $slider_id = $_POST['slider_id'];

    // Delete the package from the database
    $sql = "DELETE FROM homepage_slider WHERE slider_id = $slider_id";

    if ($conn->query($sql) === TRUE) {
        // Package deleted successfully
      
        echo '<script>alert("Slider deleted successfully."); window.location.href = "manage_slider.php";</script>';
    } else {
        // Error handling for failed deletion
        echo "Error deleting Slider: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted properly, redirect back to the manage_packages.php page
    header("Location: manage_slider.php");
    exit();
}
?>
