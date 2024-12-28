<?php
// Include database connection
include("dashboard/includes/config.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the company ID from POST request
if (isset($_POST['id'])) {  // Use 'id' as the key
    $company_id = $_POST['id'];

    // Query to fetch company details by ID
    $query = "SELECT * FROM tours_company WHERE id = ? AND active = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $company_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row is returned
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the details
        echo "<h4>" . htmlspecialchars($row['company_name']) . "</h4>";
        echo "<p><strong>Owner's Name:</strong> " . htmlspecialchars($row['owner_name']) . "</p>";
        echo "<p><strong>Contact Email:</strong> " . htmlspecialchars($row['contact_email']) . "</p>";
        echo "<p><strong>Phone Number:</strong> " . htmlspecialchars($row['phone_number']) . "</p>";
        echo "<p><strong>Company Address:</strong> " . htmlspecialchars($row['company_address']) . "</p>";
        echo "<p><strong>Tour Type:</strong> " . htmlspecialchars($row['tour_type']) . "</p>";
        echo "<p><strong>License Number:</strong> " . htmlspecialchars($row['licence_number']) . "</p>";
        echo "<p><strong>Service Description:</strong> " . nl2br(htmlspecialchars($row['service_description'])) . "</p>";

        // Optionally, display the certificate and logo
        echo "<p><strong>Company Certificate:</strong> <a href='uploads/tourCompany/" . $row['company_certificate'] . "' target='_blank'>View Certificate</a></p>";
        echo "<img src='uploads/tourCompany/" . $row['company_logo'] . "' alt='Company Logo' style='width: 150px;'>";
    } else {
        echo "<p>Company details not found.</p>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
