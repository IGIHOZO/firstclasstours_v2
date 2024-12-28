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
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title><?php  echo $company_name;  ?> | Car Rental</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/morris.css" type="text/css"/>
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <script src="js/jquery-2.1.4.min.js"></script>
        <!-- //jQuery -->
        <!-- tables -->
        <link rel="stylesheet" type="text/css" href="css/table-style.css" />
        <link rel="stylesheet" type="text/css" href="css/basictable.css" />
        <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#table').basictable();

                $('#table-breakpoint').basictable({
                    breakpoint: 768
                });

                $('#table-swap-axis').basictable({
                    swapAxis: true
                });

                $('#table-force-off').basictable({
                    forceResponsive: false
                });

                $('#table-no-resize').basictable({
                    noResize: true
                });

                $('#table-two-axis').basictable();

                $('#table-max-height').basictable({
                    tableWrapper: true
                });
            });
        </script>
        <!-- //tables -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        
       
    
    </head>
    <body>
        <div class="page-container">
            <div class="left-content">
                <div class="mother-grid-inner">
                    <!-- Include the header -->
                    <?php include('includes/header.php'); ?>
                    <div class="clearfix"> </div>
                </div>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Car Rental ( Company Email:  <?php echo $username;  ?> ) </li>
                </ol>

<?php
// Assume $username is the logged-in user's email
$userResult = mysqli_query($conn, "SELECT id FROM transport_companies WHERE contact_email='$username'");
if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $owner_id = $userRow['id'];

    // Fetch car rentals for this user
    $carRentalsResult = mysqli_query($conn, "SELECT car_id, car_name FROM car_rental WHERE car_owner_id='$owner_id'");
} else {
    die("Error: Unable to retrieve user details.");
}

// Check if the form has been submitted and a car is selected
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['car_rental_id'])) {
    $selectedCarId = $_POST['car_rental_id'];

    // Fetch the selected car's accessories
    $carResult = mysqli_query($conn, "SELECT * FROM car_rental_inclusive WHERE car_id = '$selectedCarId'");
    if ($carResult && mysqli_num_rows($carResult) > 0) {
        $carRow = mysqli_fetch_assoc($carResult);
    }
}
?>
<style>
      <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        select:focus {
            border-color: #5c9ded;
            outline: none;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #5c9ded;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: center;
        }

        input[type="submit"]:hover {
            background-color: #4a89d1;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            select {
                font-size: 16px;
            }

            input[type="submit"] {
                width: 100%;
                font-size: 18px;
            }
        }
    </style>
</style>
    <div class="container">
<form action="car_accessories.php" method="GET">
    <h2>Select Car and Update Accessories</h2>

    <!-- Car selection dropdown -->
    <label for="car_rental_id">Select Car:</label>
    <select name="car_rental_id" id="car_rental_id" required>
        <option value="">Select a car</option>
        <?php
        // Fetch car rental options
        if ($carRentalsResult && mysqli_num_rows($carRentalsResult) > 0) {
            while ($car = mysqli_fetch_assoc($carRentalsResult)) {
                // If a car is selected, mark it as 'selected'
                $selected = (isset($selectedCarId) && $car['car_id'] == $selectedCarId) ? 'selected' : '';
                echo "<option value='{$car['car_id']}' {$selected}>{$car['car_name']}</option>";
            }
        }
        ?>
    </select><br>

    <!-- Continue button to submit the form -->
    <input type="submit" value="Continue">
</form>
</div>


</body>
</html>






               <?php include('includes/footer.php'); ?>
         
</div>
            
            <?php include('includes/sidebarmenu.php'); ?>

        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- /Bootstrap Core JavaScript -->	   

    </body>
</html>
