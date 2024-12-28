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
 $carId = $_GET['car_rental_id'];
    // Now fetch cars associated with this user
    $carResult = mysqli_query($conn, "SELECT * FROM car_rental_inclusive WHERE car_id = '$carId'");
    if ($carResult && mysqli_num_rows($carResult) > 0) {
        $carRow = mysqli_fetch_assoc($carResult);
        // Display car details if needed
    }
}
?>
  <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #555;
            gap: 10px;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            accent-color: #5c9ded; /* A blue accent color for the checkboxes */
            transform: scale(1.2);
        }

        input[type="submit"] {
            padding: 12px 20px;
            background-color: #5c9ded;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: center;
            width: 200px;
        }

        input[type="submit"]:hover {
            background-color: #4a89d1;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            .container {
                width: 80%;
            }

            input[type="submit"] {
                width: 100%;
                font-size: 18px;
            }
        }
    </style>
      <div class="container">
        <form action="update_accessories.php" method="POST">
            <h2>Select Car Accessories</h2>

            <!-- Hidden field to pass car id -->
            <input type="hidden" name="car_id" value="<?php echo $carRow['car_id']; ?>">

            <!-- List of car accessories -->
            <label for="air_conditioner">
                <input type="checkbox" name="air_conditioner" value="1" <?php echo ($carRow['Air_Conditioner'] == 1) ? 'checked' : ''; ?>>
                Air Conditioner
            </label>

            <label for="anti_lock_braking_system">
                <input type="checkbox" name="anti_lock_braking_system" value="1" <?php echo ($carRow['AntiLock_Braking_System'] == 1) ? 'checked' : ''; ?>>
                Anti-lock Braking System
            </label>

            <label for="power_steering">
                <input type="checkbox" name="power_steering" value="1" <?php echo ($carRow['Power_Steering'] == 1) ? 'checked' : ''; ?>>
                Power Steering
            </label>

            <label for="power_windows">
                <input type="checkbox" name="power_windows" value="1" <?php echo ($carRow['Power_Windows'] == 1) ? 'checked' : ''; ?>>
                Power Windows
            </label>

            <label for="cd_player">
                <input type="checkbox" name="cd_player" value="1" <?php echo ($carRow['CD_Player'] == 1) ? 'checked' : ''; ?>>
                CD Player
            </label>

            <label for="leather_seats">
                <input type="checkbox" name="leather_seats" value="1" <?php echo ($carRow['Leather_Seats'] == 1) ? 'checked' : ''; ?>>
                Leather Seats
            </label>

            <label for="central_locking">
                <input type="checkbox" name="central_locking" value="1" <?php echo ($carRow['Central_Locking'] == 1) ? 'checked' : ''; ?>>
                Central Locking
            </label>

            <label for="power_door_locks">
                <input type="checkbox" name="power_door_locks" value="1" <?php echo ($carRow['Power_Door_Locks'] == 1) ? 'checked' : ''; ?>>
                Power Door Locks
            </label>

            <label for="brake_assist">
                <input type="checkbox" name="brake_assist" value="1" <?php echo ($carRow['Brake_Assist'] == 1) ? 'checked' : ''; ?>>
                Brake Assist
            </label>

            <label for="driver_airbag">
                <input type="checkbox" name="driver_airbag" value="1" <?php echo ($carRow['Driver_Airbag'] == 1) ? 'checked' : ''; ?>>
                Driver Airbag
            </label>

            <label for="passenger_airbag">
                <input type="checkbox" name="passenger_airbag" value="1" <?php echo ($carRow['Passenger_Airbag'] == 1) ? 'checked' : ''; ?>>
                Passenger Airbag
            </label>

            <label for="crash_sensor">
                <input type="checkbox" name="crash_sensor" value="1" <?php echo ($carRow['Crash_Sensor'] == 1) ? 'checked' : ''; ?>>
                Crash Sensor
            </label>

            <!-- Submit Button -->
            <input type="submit" value="Update Accessories">
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
