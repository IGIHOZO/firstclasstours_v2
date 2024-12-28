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
   
        
        $package_name = mysqli_real_escape_string($conn, strip_tags($_POST['package_name']));
$package_introduction = mysqli_real_escape_string($conn, strip_tags($_POST['package_introduction']));
$package_description = mysqli_real_escape_string($conn, strip_tags($_POST['package_description']));

        
        
    $package_days_and_nights = $_POST['package_days_and_nights'];
    $package_from = $_POST['package_from'];
    $package_to = $_POST['package_to'];
    $package_price = $_POST['package_price'];
    $travel_type = $_POST['travel_type'];
    $package_type = $_POST['package_type'];
    $package_country_id = $_POST['package_country_id'];
    
    
    $number_of_person = $_POST['number_of_person'];


    // File upload paths
    $package_image_path = '../assets/img/uploads/packages/';


    // Upload Destination Image
    $package_image_filename = generateUniqueFilename($_FILES['package_image']['name']);
    move_uploaded_file($_FILES['package_image']['tmp_name'], $package_image_path . $package_image_filename);

 

    // Insert data into the database
    $sql = "INSERT INTO `packages` (`package_id`, `package_name`, `package_introduction`, `package_description`, `package_days_and_nights`, `package_from_date`, `package_to_date`, `package_price`, `package_travel_type`, `package_type`, `package_country`, `package_number_of_person`, `package_image`, `package_status`, `package_recorded_date`) VALUES (NULL, '$package_name', '$package_introduction', '$package_description', '$package_days_and_nights', '$package_from', '$package_to', '$package_price', '$travel_type', '$package_type', '$package_country_id', '$number_of_person', '$package_image_filename', '1', now())";
    
    

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Package Recorded successfully!"); window.location.href="admin-create-package.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
