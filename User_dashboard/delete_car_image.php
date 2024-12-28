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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_rental_image_id = mysqli_real_escape_string($conn, $_POST['car_rental_image_id']);
    $image_path = '../uploads/car_rental/' . mysqli_real_escape_string($conn, $_POST['car_rental_other_image']);

    // Delete record from database
    $query = "DELETE FROM car_rental_images WHERE car_rental_image_id = '$car_rental_image_id'";
    if (mysqli_query($conn, $query)) {
        // Delete the file from the server
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        echo "<script>
        alert('Images Deleted successfully.');
        window.location.href = 'car_rental_images.php';
    </script>";
        exit();
    } else {
        echo "Error deleting image: " . mysqli_error($conn);
    }
}
?>
