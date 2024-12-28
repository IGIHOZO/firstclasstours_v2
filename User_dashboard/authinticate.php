<?php
session_start();
include('includes/config.php'); 
include('./Classes/Authentication.php'); 

if (isset($_POST['login'])) {
    $username = $_POST['username'];  // Email address entered
    $password = $_POST['password'];  // Password entered
    $company_type = $_POST['company_type'];  // Company type selected (tour, hotel, transport)

    // Ensure the company type is valid
    if (!empty($company_type)) {
        $auth = new Authentication($dbh); 

        // Authenticate based on company type
        if ($auth->authenticate($userId,$username, $password, $company_type)) {
            $_SESSION['user_id'] = $userId;  // Store the user ID in the session
            $_SESSION['alogin'] = $username;  // Store the email in the session
            $_SESSION['company_type'] = $company_type;  // Store the company type in the session
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        } else {
            echo "<script>alert('Invalid Details');</script>";
            echo "<script>document.location='index.php'</script>";
        } 
    } else {
        echo "<script>alert('Please select a company type');</script>";
    }
}
?>
 