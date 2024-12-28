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
        <title><?php  echo $company_name;  ?> | Hotel Management</title>
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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i> Hotel Management ( Hotel Email:  <?php echo $username;  ?> ) </li>
                </ol>

<?php

$username = $_SESSION['alogin'];

// Retrieve the hotel ID from the database based on the logged-in user's email
$hotelResult = mysqli_query($conn, "SELECT id FROM hotels WHERE contact_email='$username'");
if ($hotelResult && mysqli_num_rows($hotelResult) > 0) {
    $hotelRow = mysqli_fetch_assoc($hotelResult);
    $hotel_id = $hotelRow['id'];

    // Fetch rooms associated with the hotel
    $roomsResult = mysqli_query($conn, "SELECT room_id, room_name FROM hotel_rooms WHERE hotel_id='$hotel_id'");
} else {
    die("Error: Unable to retrieve hotel details.");
}

// Handle form submission for uploading images
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);

    // Upload directory for room images
    $upload_dir = '../uploads/hotel_room_images/';

    foreach ($_FILES['room_images']['name'] as $key => $imageName) {
        $target_file = $upload_dir . basename($imageName);
        if (move_uploaded_file($_FILES['room_images']['tmp_name'][$key], $target_file)) {
            // Insert image details into the hotel_room_images table
            $sql = "INSERT INTO hotel_room_images (hotel_room_image_id, hotel_room_id, hotel_room_other_image, hotel_room_image_recorded_date) 
                    VALUES (NULL, '$room_id', '$imageName', CURRENT_TIMESTAMP)";
            mysqli_query($conn, $sql);
        }
    }

    echo "<script>
        alert('Images uploaded successfully.');
        window.location.href = 'hotel_room_other_images.php';
    </script>";
    exit();
}

// Handle image deletion
if (isset($_GET['delete_id'])) {
    $image_id = $_GET['delete_id'];
    $imageResult = mysqli_query($conn, "SELECT hotel_room_other_image FROM hotel_room_images WHERE hotel_room_image_id='$image_id'");
    if ($imageResult && mysqli_num_rows($imageResult) > 0) {
        $imageRow = mysqli_fetch_assoc($imageResult);
      

    
            echo  mysqli_query($conn, "DELETE FROM hotel_room_images WHERE hotel_room_image_id='$image_id'");
     
    }
    echo "<script>
        alert('Image deleted successfully.');
        window.location.href = 'hotel_room_other_images.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Room Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
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
        .images-section {
            margin-top: 20px;
            width: 80%;
        }
        .images-section img {
            max-width: 150px;
            margin: 10px;
        }
        .images-section button {
            margin-top: 5px;
        }
    </style>
</head>
<body>
   <form action="" method="POST" enctype="multipart/form-data">
        <label for="room_id">Select Room:</label>
        <select name="room_id" id="room_id" required>
            <option value="">Select a room</option>
            <?php
            if ($roomsResult && mysqli_num_rows($roomsResult) > 0) {
                while ($room = mysqli_fetch_assoc($roomsResult)) {
                    echo "<option value='{$room['room_id']}'>{$room['room_name']}</option>";
                }
            }
            ?>
        </select>

        <label for="room_images">Upload Images:</label>
        <input type="file" name="room_images[]" id="room_images" multiple accept="image/*" required>

        <button type="submit">Upload Images</button>
    </form>

    <!-- Display Existing Images -->
    <div class="images-section">
        <h3>Room Images</h3>
        <?php
        if (isset($hotel_id)) {
            $imagesResult = mysqli_query($conn, "SELECT * FROM hotel_room_images WHERE hotel_room_id IN (SELECT room_id FROM hotel_rooms WHERE hotel_id='$hotel_id')");
            if ($imagesResult && mysqli_num_rows($imagesResult) > 0) {
                while ($image = mysqli_fetch_assoc($imagesResult)) {
                    echo "<div>";
                    echo "<img src='../uploads/hotel_room_images/{$image['hotel_room_other_image']}' alt='Room Image'>";
                    echo "<form method='GET' action='' style='display:inline;'>";
                    echo "<input type='hidden' name='delete_id' value='{$image['hotel_room_image_id']}'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>No images found for this hotel.</p>";
            }
        }
        ?>
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
