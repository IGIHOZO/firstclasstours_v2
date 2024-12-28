<?php
// Include database connection
include("includes/config.php");

// Check if the POST request has the ID
if (isset($_POST['id'])) {
    $company_id = $_POST['id'];

    // Prepare the query to fetch the details of the specific tour company
    $query = "SELECT * FROM transport_companies WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $company_id);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the data as an associative array
        $row = $result->fetch_assoc();

        // Return the data as JSON for the AJAX response
        echo json_encode($row);
    } else {
        // Return an error if no company was found
        echo json_encode(array("error" => "No company found"));
    }
} else {
    // Return an error if no ID was provided
    echo json_encode(array("error" => "Invalid request"));
}
?>
