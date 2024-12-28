<?php
// Include database connection
include 'includes/config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $about_us = mysqli_real_escape_string($conn, strip_tags($_POST['about_us']));
    $background = mysqli_real_escape_string($conn, strip_tags($_POST['background']));
    $mission = mysqli_real_escape_string($conn, strip_tags($_POST['mission']));
    $vision = mysqli_real_escape_string($conn, strip_tags($_POST['vision']));
    $contact_location = mysqli_real_escape_string($conn, strip_tags($_POST['contact_location']));
    $contact_phone = mysqli_real_escape_string($conn, strip_tags($_POST['contact_phone']));
    $contact_email = mysqli_real_escape_string($conn, strip_tags($_POST['contact_email']));
    $working_time = mysqli_real_escape_string($conn, strip_tags($_POST['working_time']));
    $terms_of_services = mysqli_real_escape_string($conn, strip_tags($_POST['terms_of_services']));
    $privacy_policy = mysqli_real_escape_string($conn, strip_tags($_POST['privacy_policy']));
    $visa_and_passport = mysqli_real_escape_string($conn, strip_tags($_POST['visa_and_passport']));
    
    
     $become_rwanda_citizen = mysqli_real_escape_string($conn, strip_tags($_POST['become_rwanda_citizen']));
     
      $become_rwanda_resident = mysqli_real_escape_string($conn, strip_tags($_POST['become_rwanda_resident']));
      
       $visa_in_rwanda = mysqli_real_escape_string($conn, strip_tags($_POST['visa_in_rwanda']));
    
    $safety = mysqli_real_escape_string($conn, strip_tags($_POST['safety']));
    $x_link = mysqli_real_escape_string($conn, strip_tags($_POST['x_link']));

$youtube_link = mysqli_real_escape_string($conn, strip_tags($_POST['youtube_link']));

$linkedin_link = mysqli_real_escape_string($conn, strip_tags($_POST['linkedin_link']));

$facebook_link = mysqli_real_escape_string($conn, strip_tags($_POST['facebook_link']));

$instagram_link = mysqli_real_escape_string($conn, strip_tags($_POST['instagram_link']));

    // Update the about_company details in the database
    $sql = "UPDATE about_company SET 
                about_us = '$about_us',
                background = '$background',
                mission = '$mission',
                vision = '$vision',
                contact_location = '$contact_location',
                contact_phone = '$contact_phone',
                contact_email = '$contact_email',
                working_time = '$working_time',
                terms_of_services = '$terms_of_services',
                privacy_policy = '$privacy_policy',
                visa_and_passport = '$visa_and_passport',
                x_link = '$x_link',
                youtube_link = '$youtube_link',
                linkedin_link = '$linkedin_link',
                facebook_link = '$facebook_link',
                instagram_link = '$instagram_link',
                become_rwanda_citizen = '$become_rwanda_citizen',
                become_rwanda_resident = '$become_rwanda_resident',
                visa_in_rwanda = '$visa_in_rwanda',
                safety = '$safety'";

    if ($conn->query($sql) === TRUE) {
        // About company details updated successfully
        echo '<script>alert("About company details updated successfully."); window.location.href = "website_setting.php";</script>';
    } else {
        // Error handling for failed update
        echo "Error updating about company details: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
