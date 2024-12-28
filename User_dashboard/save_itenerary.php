<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Include database connection
include 'includes/config.php';

// Function to generate a unique filename with today's date and time
function generateUniqueFilename($originalFilename) {
    $timestamp = date("Ymd_His");
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    return "file_" . $timestamp . "." . $extension;
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $package_id = $_POST['package_id'];
 
    
      $itenerary_title = mysqli_real_escape_string($conn, $_POST['itenerary_title']);
      
 
    
       $time_plan = mysqli_real_escape_string($conn, $_POST['time_plan']);
       
  
    
          $full_description = mysqli_real_escape_string($conn, $_POST['full_description']);

    

    // Insert data into the database
    $sql = "INSERT INTO `itineraries` (`itinerary_id`, `package_id`, `title`, `day_time_plan`, `day_full_description`, `itinerary_recorded_date`) VALUES (NULL, '$package_id', '$itenerary_title', '$time_plan', '$full_description', now());";
    
    

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Package Itenerary Recorded successfully!"); window.location.href="admin-create-itenerary.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
