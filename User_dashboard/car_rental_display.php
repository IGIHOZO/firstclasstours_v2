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

// Fetch all cars from the car_rental table

// Assume $username is the logged-in user's email
$userResult = mysqli_query($conn, "SELECT id FROM transport_companies WHERE contact_email='$username'");
if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $owner_id = $userRow['id'];

  
} else {
    die("Error: Unable to retrieve user details.");
}

$sql = "SELECT * FROM car_rental WHERE car_owner_id='$owner_id' order by car_id DESC";
$result = mysqli_query($conn, $sql);
$no=0;
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>N<sup>o</sup></th>
                <th>Car Name</th>
                <th>Car Price</th>
                <th>Number of Seats</th>
                <th>Car Year</th>
                <th>Fuel Type</th>
                <th>Car Overview</th>
                <th>Car Brand</th>
                <th>Car Image</th>
                <th>Actions</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $no=$no+1;
        echo "<tr>
                <td>" . $no . "</td>
                <td>" . $row['car_name'] . "</td>
                <td> $ " . $row['car_price'] . "</td>
                <td>" . $row['number_of_seat'] . "</td>
                <td>" . $row['car_year'] . "</td>
                <td>" . $row['car_fuel_type'] . "</td>
                <td>" . $row['car_overview'] . "</td>
                <td>" . $row['car_brand'] . "</td>
                <td><img src='../uploads/car_rental/" . $row['car_main_image'] . "' width='100'></td>
                <td>
                    <a href='edit_car.php?car_id=" . $row['car_id'] . "'>Edit</a> | 
                    <a href='delete_car.php?car_id=" . $row['car_id'] . "' onclick='return confirmDelete()'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No cars found.";
}

// JavaScript to confirm deletion
echo "<script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this car?');
        }
      </script>";
?>





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
