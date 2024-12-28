<?php
require('./dashboardredirect.php');
// Check if the user is logged in
if (!isset($_SESSION['alogin'])) {
    // Redirect to the login page if not logged in
    echo "<script>window.location='index.php';</script>";
    exit;
}

// Get the logged-in user's email and company type from the session
  $username = $_SESSION['alogin'];
  $company_type = $_SESSION['company_type'];
$user_id = $_SESSION['user_id'];


// Check if car_id is passed in URL
if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];

    // Delete car from car_rental_inclusive table first (if applicable)
    $delete_inclusive_sql = "DELETE FROM car_rental_inclusive WHERE car_id = $car_id";
    mysqli_query($conn, $delete_inclusive_sql);

    // Delete car from car_rental table
    $delete_car_sql = "DELETE FROM car_rental WHERE car_id = $car_id";

    if (mysqli_query($conn, $delete_car_sql)) {
        echo "<script>
                alert('Car deleted successfully.');
                window.location.href = 'car_rental_display.php';
              </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No car selected for deletion.";
}
?>
