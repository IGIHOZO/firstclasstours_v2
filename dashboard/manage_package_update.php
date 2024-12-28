<?php
include './includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_id = $_POST['package_id'];
    $package_name = mysqli_real_escape_string($conn, strip_tags($_POST['package_name']));
    $package_introduction = mysqli_real_escape_string($conn, strip_tags($_POST['package_introduction']));
    $package_description = mysqli_real_escape_string($conn, strip_tags($_POST['package_description']));
    $package_days_and_nights = $_POST['package_days_and_nights'];
    $package_price = $_POST['package_price'];
    $package_number_of_person = $_POST['package_number_of_person'];
    $package_country = $_POST['package_country'];
    $package_type = $_POST['package_type'];
    $travel_type = $_POST['travel_type'];

    // Prepare SQL statement
    $sql = "UPDATE packages SET 
                package_name = '$package_name',
                package_introduction = '$package_introduction',
                package_description = '$package_description',
                package_days_and_nights = '$package_days_and_nights',
                package_price = '$package_price',
                package_number_of_person = '$package_number_of_person',
                package_country = '$package_country',
                package_type = '$package_type',
                package_travel_type = '$travel_type'";

    // Add image field update if a new image was uploaded or 'keep_image' is not checked

    $sql .= " WHERE package_id = $package_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Package details updated successfully."); window.location.href = "manage_packages.php";</script>';
    } else {
        echo "Error updating package details: " . $conn->error;
    }

    $conn->close();
}
?>
