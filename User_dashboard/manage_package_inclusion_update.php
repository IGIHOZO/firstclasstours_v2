<?php
// Include database connection
include 'includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $package_inclusive_id = $_POST['package_inclusive_id'];
    $package_id = $_POST['package_id'];
    $tour_plan = mysqli_real_escape_string($conn, strip_tags($_POST['tour_plan']));
    $departure_location = mysqli_real_escape_string($conn, $_POST['departure_location']);
    $return_location = mysqli_real_escape_string($conn, $_POST['return_location']);
    $departure_time = mysqli_real_escape_string($conn, $_POST['departure_time']);
    $air_fares = mysqli_real_escape_string($conn, $_POST['air_fares']);
    $hotel = mysqli_real_escape_string($conn, $_POST['hotel']);
    $entrance_fees = mysqli_real_escape_string($conn, $_POST['entrance_fees']);
    $tour_guide = mysqli_real_escape_string($conn, $_POST['tour_guide']);
    $insurance = mysqli_real_escape_string($conn, $_POST['insurance']);
    $food_and_drinks = mysqli_real_escape_string($conn, $_POST['food_and_drinks']);

    // Update the package inclusive details in the database
    $sql = "UPDATE package_inclusive SET 
                package_id = '$package_id',
                tour_plan = '$tour_plan',
                departure_location = '$departure_location',
                return_location = '$return_location',
                departure_time = '$departure_time',
                air_fares = '$air_fares',
                hotel = '$hotel',
                entrance_fees = '$entrance_fees',
                tour_guide = '$tour_guide',
                insurance = '$insurance',
                food_and_drinks = '$food_and_drinks'
            WHERE package_inclusive_id = $package_inclusive_id";

    if ($conn->query($sql) === TRUE) {
        // Package inclusive details updated successfully
     
        
          echo '<script>alert("Package inclusive details updated successfully."); window.location.href = "manage_inclusion.php";</script>';
          
          
    } else {
        // Error handling for failed update
        echo "Error updating package inclusive details: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
