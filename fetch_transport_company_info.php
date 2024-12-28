<?php
// Include database connection
include("dashboard/includes/config.php");

// Get the transport company ID from the POST request
$company_id = $_POST['id'];

// Query to fetch detailed transport company info
$query = "SELECT * FROM transport_companies WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $company_id);
$stmt->execute();

// Get the result
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Fetch the company data
    $row = $result->fetch_assoc();

    // Add the company logo URL (assuming it's stored in the "company_logo" column)
    $row['company_logo_url'] = "uploads/Transport/" . $row['company_logo'];
 
    // Return the data as JSON
    echo json_encode($row);
} else {
    echo json_encode(array("error" => "No company found"));
}
?>
