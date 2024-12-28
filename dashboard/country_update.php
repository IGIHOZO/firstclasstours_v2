<?php
// Include the database configuration
include 'includes/config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Update the status based on the toggle switch
        $countryId = $_POST['country_id'];
        $newStatus = $_POST['status'];

        // Update the status in the database
        $updateQuery = "UPDATE countries SET active = $newStatus WHERE country_id = $countryId";
        if (!mysqli_query($conn, $updateQuery)) {
            throw new Exception("Error updating status: " . mysqli_error($conn) . " | SQL: $updateQuery");
        }

        // Respond with a success message (you can customize this response)
        echo "Status updated successfully!";
    } catch (Exception $e) {
        // Respond with an error message
        echo "Error: " . $e->getMessage();
    }
} else {
    // Respond with an error message for non-POST requests
    echo "Invalid request!";
}
?>
