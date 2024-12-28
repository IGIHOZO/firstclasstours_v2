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


$userResult = mysqli_query($conn, "SELECT id FROM transport_companies WHERE contact_email='$username'");
if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $owner_id = $userRow['id'];

    // Fetch car rentals for this user
    $carRentalsResult = mysqli_query($conn, "SELECT car_id, car_name FROM car_rental WHERE car_owner_id='$owner_id'");
} else {
    die("Error: Unable to retrieve user details.");
}

// Handle form submission for uploading images
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_rental_id = mysqli_real_escape_string($conn, $_POST['car_rental_id']);

    // Loop through uploaded images
    $upload_dir = '../uploads/car_rental_images/';
    foreach ($_FILES['car_images']['name'] as $key => $imageName) {
        $target_file = $upload_dir . basename($imageName);
        if (move_uploaded_file($_FILES['car_images']['tmp_name'][$key], $target_file)) {
            // Insert image details into car_rental_images table
            $sql = "INSERT INTO car_rental_images (car_rental_image_id, car_rental_id, car_rental_other_image, car_rental_image_recorded_date) 
                    VALUES (NULL, '$car_rental_id', '$imageName', CURRENT_TIMESTAMP)";
            mysqli_query($conn, $sql);
        }
    }

    echo "<script>
        alert('Images uploaded successfully.');
        window.location.href = 'car_rental_images.php';
    </script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Car Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        form label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            text-align: left;
        }

        form select, form input, form button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-top: 15px;
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
   <form action="" method="POST" enctype="multipart/form-data">
    <label for="car_rental_id">Select Car:</label>
    <select name="car_rental_id" id="car_rental_id" required>
        <option value="">Select a car</option>
        <?php
        // Fetch car rental options
        if ($carRentalsResult && mysqli_num_rows($carRentalsResult) > 0) {
            while ($car = mysqli_fetch_assoc($carRentalsResult)) {
                echo "<option value='{$car['car_id']}'>{$car['car_name']}</option>";
            }
        }
        ?>
    </select>

    <label for="car_images">Upload Images:</label>
    <input type="file" name="car_images[]" id="car_images" multiple accept="image/*" required>

    <button type="submit">Upload Images</button>
</form>

<!-- Section to Display Images -->
<div id="car-images-section">
    <h3>Car Images</h3>
    <p>Select a car to view its images.</p>
</div>

<script>
    // Fetch images dynamically based on selected car
    document.getElementById('car_rental_id').addEventListener('change', function () {
        const carRentalId = this.value;
        const imagesSection = document.getElementById('car-images-section');

        if (carRentalId) {
            fetch(`fetch_car_images.php?car_rental_id=${carRentalId}`)
                .then(response => response.text())
                .then(data => {
                    imagesSection.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching images:', error);
                    imagesSection.innerHTML = '<p>Error loading images. Please try again.</p>';
                });
        } else {
            imagesSection.innerHTML = '<p>Select a car to view its images.</p>';
        }
    });
</script>


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
