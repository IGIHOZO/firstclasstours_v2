<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

if (isset($_GET['car_rental_id'])) {
    $car_rental_id = mysqli_real_escape_string($conn, $_GET['car_rental_id']);

    $query = "SELECT * FROM car_rental_images WHERE car_rental_id = '$car_rental_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<ul style="list-style: none; padding: 0;">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li style="margin-bottom: 10px;">';
            echo '<img src="../uploads/car_rental/' . $row['car_rental_other_image'] . '" alt="Car Image" width="200" style="display: block; margin-bottom: 5px;">';
            echo '<form action="delete_car_image.php" method="POST" style="display:inline;">';
            echo '<input type="hidden" name="car_rental_image_id" value="' . $row['car_rental_image_id'] . '">';
            echo '<input type="hidden" name="car_rental_other_image" value="' . $row['car_rental_other_image'] . '">';
            echo '<button type="submit" onclick="return confirm(\'Are you sure you want to delete this image?\')">Delete</button>';
            echo '</form>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No images found for this car.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
}
?>
