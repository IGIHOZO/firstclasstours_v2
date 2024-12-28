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
  
  $tour_plan = mysqli_real_escape_string($conn, strip_tags($_POST['tour_plan']));
    $departure_location = $_POST['departure_location'];
    $return_location = $_POST['return_location'];
    $departure_time = $_POST['departure_time'];
    $bed_room = $_POST['bed_room'];
    $air_fares = $_POST['air_fares'];
    $hotel = $_POST['hotel'];
    $entrance_fees = $_POST['entrance_fees'];
    $tour_guide = $_POST['tour_guide'];
    $insurance = $_POST['insurance'];
    
    $food_and_drinks = $_POST['food_and_drinks'];
    $additional_services = $_POST['additional_services'];
   
    
    

    // Insert data into the database
    $sql = "INSERT INTO `package_inclusive` (`package_inclusive_id`, `package_id`, `tour_plan`, `departure_location`, `return_location`, `departure_time`, `bed_room`, `air_fares`, `hotel`, `entrance_fees`, `tour_guide`, `insurance`, `food_and_drinks`, `additional_service`, `recorded_date`) VALUES (NULL, '$package_id', '$tour_plan', '$departure_location', '$return_location', '$departure_time', '$bed_room', '$air_fares', '$hotel', '$entrance_fees', '$tour_guide', '$insurance', '$food_and_drinks', '$additional_services', now())";
    
    

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Package Inclusion and Exclusion Recorded successfully!"); window.location.href="admin-create-package-inclusive.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
