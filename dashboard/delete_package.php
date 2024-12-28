<?php
// Include database connection
include './includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    // Get package ID from the form
    $package_id = $_POST['package_id'];

    // Delete the package from the database
    $sql = "DELETE FROM packages WHERE package_id = $package_id";

    if ($conn->query($sql) === TRUE) {
        // Package deleted successfully
      
        echo '<script>alert("Package deleted successfully."); window.location.href = "manage_packages.php";</script>';
    } else {
        // Error handling for failed deletion
        echo "Error deleting package: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted properly, redirect back to the manage_packages.php page
    header("Location: manage_packages.php");
    exit();
}
?>
