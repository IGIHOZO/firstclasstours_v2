<?php
// Include database connection
include("dashboard/includes/config.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the hotel ID from POST data
$hotel_id = $_POST['id'];

// Query to fetch hotel details
$query = "SELECT * FROM hotels WHERE id = ?";

// Prepare the statement
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $hotel_id);
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if a hotel was found
if ($result->num_rows > 0) {
    // Fetch the hotel data
    $row = $result->fetch_assoc();
    
    // Output the detailed hotel information
    echo "<strong>Owner Name:</strong> " . $row['owner_name'] . "<br>";
    echo "<strong>Phone Number:</strong> " . $row['phone_number'] . "<br>";
    echo "<strong>Star Rating:</strong> " . $row['star_rating'] . " stars<br>";
    echo "<strong>Room Types:</strong> " . $row['room_types'] . "<br>";
    echo "<strong>Check-in Policy:</strong> " . $row['checkin_policy'] . "<br>";
    echo "<strong>Amenities:</strong> " . $row['hotel_amenities'] . "<br>";
    echo "<strong>Dining Options:</strong> " . $row['dining_options'] . "<br>";
    echo "<strong>Accessibility Features:</strong> " . $row['accessibility_features'] . "<br>";
    
    // Display the hotel logo (image)
    echo "<strong>Hotel Main Image:</strong> <br>";
    echo "<img src='uploads/hotels/" . $row['hotel_logo'] . "' alt='Hotel Logo' style='max-width: 200px;'><br>";
    
    // Display the hotel certificate as a download link
    echo "<strong>Hotel Certificate:</strong> <br>";
    echo "<a href='uploads/hotels/" . $row['hotel_certificate'] . "' target='_blank' class='btn btn-primary'>View More Hotel Images</a><br>";
} else {
    echo "No details found for this hotel.";
}
?>
