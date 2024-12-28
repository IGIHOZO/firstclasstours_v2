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

// Check if the room ID is provided in the URL
if (isset($_GET['id'])) {
    $room_id = $_GET['id'];

    // Fetch hotel ID based on the username (to ensure correct ownership)
    $result = mysqli_query($conn, "SELECT id FROM hotels WHERE contact_email='$username'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hotel_id = $row['id'];
    } else {
        die("Error: Unable to retrieve hotel ID.");
    }

    // Fetch the room details to get the image path before deleting
    $query = "SELECT room_main_image FROM hotel_rooms WHERE room_id = '$room_id' AND hotel_id = '$hotel_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image_path = "../uploads/hotel_room/" . $row['room_main_image'];

        // Delete the room from the database
        $delete_query = "DELETE FROM hotel_rooms WHERE room_id = '$room_id' AND hotel_id = '$hotel_id'";
        if (mysqli_query($conn, $delete_query)) {
            // If the deletion is successful, delete the image from the server
            if (file_exists($image_path)) {
                unlink($image_path); // Delete the image file
            }
            echo "<script>
                alert('Room deleted successfully.');
                window.location.href = 'display_hotel_rooms.php';
            </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Room not found.";
    }
} else {
    echo "Error: Room ID is missing.";
}
?>
