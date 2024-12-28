<?php
// Include database connection
include 'includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $itinerary_id = $_POST['itinerary_id'];
    $package_id = $_POST['package_id'];
    $title = mysqli_real_escape_string($conn, strip_tags($_POST['title']));
      $day_full_description = mysqli_real_escape_string($conn, strip_tags($_POST['day_full_description']));

    $day_time_plan = mysqli_real_escape_string($conn, $_POST['day_time_plan']);
  

    // Update the package inclusive details in the database
    $sql = "UPDATE itineraries SET 
                package_id = '$package_id',
                title = '$title',
                day_full_description = '$day_full_description',
                day_time_plan = '$day_time_plan'
            WHERE itinerary_id = $itinerary_id";

    if ($conn->query($sql) === TRUE) {
        // Package inclusive details updated successfully
     
        
          echo '<script>alert("Package itenerary details updated successfully."); window.location.href = "manage_itenerary.php";</script>';
          
          
    } else {
        // Error handling for failed update
        echo "Error updating package itenerary details: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
