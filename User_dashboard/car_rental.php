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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from form
    $car_name = mysqli_real_escape_string($conn, $_POST['car_name']);
    $car_price = mysqli_real_escape_string($conn, $_POST['car_price']);
    $number_of_seat = mysqli_real_escape_string($conn, $_POST['number_of_seat']);
    $car_year = mysqli_real_escape_string($conn, $_POST['car_year']);
    $car_fuel_type = mysqli_real_escape_string($conn, $_POST['fueltype']);
    $car_overview = mysqli_real_escape_string($conn, $_POST['car_overview']);
    $car_brand = mysqli_real_escape_string($conn, $_POST['brand']);

    // Retrieve user ID from transport_companies_table using session username
    $result = mysqli_query($conn, "SELECT id FROM transport_companies WHERE contact_email='$username'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $car_owner_id = $row['id'];
    } else {
        die("Error: Unable to retrieve car owner ID.");
    }

    // Handle image upload
    $upload_dir = '../uploads/car_rental/';
    $car_main_image = $_FILES['car_main_image']['name'];
    $target_file = $upload_dir . basename($car_main_image);

    if (move_uploaded_file($_FILES['car_main_image']['tmp_name'], $target_file)) {
        // Image uploaded successfully

        // Insert data into the car_rental table
        $sql = "INSERT INTO car_rental (car_id, car_name, car_price, number_of_seat, car_year, car_fuel_type, car_overview, car_brand, car_main_image, car_owner_id, car_status, car_recorded_date) 
                VALUES (NULL, '$car_name', '$car_price', '$number_of_seat', '$car_year', '$car_fuel_type', '$car_overview', '$car_brand', '$car_main_image', '$car_owner_id', '1', CURRENT_TIMESTAMP)";

        if (mysqli_query($conn, $sql)) {
            // Get the last inserted car_id
            $car_id = mysqli_insert_id($conn);

            // Insert the car_id into the car_rental_inclusive table
            $inclusive_sql = "INSERT INTO car_rental_inclusive (car_id) VALUES ('$car_id')";

            if (mysqli_query($conn, $inclusive_sql)) {
                echo "<script>
                    alert('Car details saved successfully.');
                    window.location.href = 'car_rental.php';
                </script>";
            } else {
                echo "Error inserting into car_rental_inclusive table: " . mysqli_error($conn);
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading the image.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car Rental</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
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

        form input, form select, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        form textarea {
            resize: none;
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

        .wide {
            appearance: none;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="car_name">Car Name:</label>
        <input type="text" name="car_name" id="car_name" required>

        <label for="car_price">Car Price in $ per day:</label>
        <input type="number" name="car_price" id="car_price" required>

        <label for="number_of_seat">Number of Seats:</label>
        <input type="number" name="number_of_seat" id="number_of_seat" required>

        <label for="car_year">Car Year:</label>
        <input type="number" name="car_year" id="car_year" required>

        <label for="fueltype">Fuel Type:</label>
        <select class="wide" name="fueltype" id="fueltype" required>
            <option>Select Fuel Type</option>
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
        </select>

        <label for="car_overview">Car Overview:</label>
        <textarea name="car_overview" id="car_overview" rows="4" required></textarea>

        <label for="brand">Car Brand:</label>
        <select class="wide" name="brand" id="brand" required>
            <option>Select Brand</option>
            <option value="Maruti">Maruti</option>
            <option value="BMW">BMW</option>
            <option value="Audi">Audi</option>
            <option value="Nissan">Nissan</option>
            <option value="Toyota">Toyota</option>
            <option value="Volkswagon">Volkswagon</option>
            <option value="Mercedes benz">Mercedes benz</option>
        </select>

        <label for="car_main_image">Car Main Image:</label>
        <input type="file" name="car_main_image" id="car_main_image" accept="image/*" required>

        <button type="submit">Save Car Details</button>
    </form>
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
