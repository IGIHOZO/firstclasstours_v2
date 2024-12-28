<?php
// Check if the destination_id parameter is set in the URL
if (isset($_GET['pid'])) {
    // Retrieve the destination_id from the URL parameter
    $destinationId = $_GET['pid'];

    // Include your database connection file
    include 'includes/config.php';

    // Prepare the DELETE query
    $sql = "DELETE FROM destination WHERE destination_id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("i", $destinationId);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect the user back to the previous page or a different page
            header("Location: admin-manage-destination.php");
            exit;
        } else {
            // Handle the query execution error
            echo "Error executing the DELETE query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle the query preparation error
        echo "Error preparing the DELETE query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the destination_id parameter is not set in the URL, handle the error accordingly
    echo "Error: Destination ID parameter is missing.";
}
?>
