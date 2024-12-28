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
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from form
    $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
    $room_price = mysqli_real_escape_string($conn, $_POST['room_price']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type_post']);
    $hotel_star_rating = mysqli_real_escape_string($conn, $_POST['hotel_star_rating_post']);
    $room_amenities = mysqli_real_escape_string($conn, $_POST['room_amenities']);
    
    // Retrieve hotel ID from hotel table using session username
    $result = mysqli_query($conn, "SELECT id FROM hotels WHERE contact_email='$username'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hotel_id = $row['id'];
    } else {
        die("Error: Unable to retrieve hotel ID.");
    }

    // Handle image upload
    $upload_dir = '../uploads/hotel_room/';
    $room_main_image = $_FILES['room_main_image']['name'];
    $target_file = $upload_dir . basename($room_main_image);

    if (move_uploaded_file($_FILES['room_main_image']['tmp_name'], $target_file)) {
        // Image uploaded successfully

        // Insert data into the hotel_rooms table
        $sql = "INSERT INTO hotel_rooms (room_id, room_name, room_price, room_type, room_hotel_star, room_amenities, room_main_image, hotel_id, room_status, room_recorded_date) 
                VALUES (NULL, '$room_name', '$room_price', '$room_type', '$hotel_star_rating', '$room_amenities', '$room_main_image', '$hotel_id', '1', CURRENT_TIMESTAMP)";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                alert('Hotel room details saved successfully.');
                window.location.href = 'hotel.php';
            </script>";
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
    <title>Add Hotel Room</title>
    <style>
        /* Add your CSS styles here */
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
        <label for="room_name">Room Name:</label>
        <input type="text" name="room_name" id="room_name" required>

        <label for="room_price">Room Price in $ per night:</label>
        <input type="number" name="room_price" id="room_price" required>

        <label for="room_type_post">Room Type:</label>
        <select class="wide" name="room_type_post" id="room_type_post" required>
            <option value="">Select Room Type</option>
            <option value="Single Room">Single Room</option>
            <option value="Double Room">Double Room</option>
            <option value="Twin Room">Twin Room</option>
            <option value="Triple Room">Triple Room</option>
            <option value="Quad Room">Quad Room</option>
            <option value="Family Room">Family Room</option>
            <option value="Suite">Suite</option>
            <option value="Deluxe Room">Deluxe Room</option>
            <option value="Junior Suite">Junior Suite</option>
            <option value="Presidential Suite">Presidential Suite</option>
            <option value="Penthouse Suite">Penthouse Suite</option>
            <option value="King Room">King Room</option>
            <option value="Queen Room">Queen Room</option>
            <option value="Twin-Bed Room">Twin-Bed Room</option>
            <option value="Bunk Bed Room">Bunk Bed Room</option>
            <option value="Executive Room">Executive Room</option>
            <option value="Business Room">Business Room</option>
            <option value="Conference Room">Conference Room</option>
            <option value="Honeymoon Suite">Honeymoon Suite</option>
            <option value="Bridal Suite">Bridal Suite</option>
            <option value="Themed Room">Themed Room</option>
            <option value="Studio">Studio</option>
            <option value="Apartment">Apartment</option>
            <option value="Villa">Villa</option>
            <option value="Cottage">Cottage</option>
            <option value="Bungalow">Bungalow</option>
            <option value="Accessible Room">Accessible Room</option>
            <option value="Superior Room">Superior Room</option>
            <option value="Standard Room">Standard Room</option>
        </select>

        <label for="hotel_star_rating_post">Hotel Star Rating:</label>
        <select class="wide" name="hotel_star_rating_post" id="hotel_star_rating_post" required>
            <option value="">Select Hotel Star Rating</option>
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
        </select>

        <label for="room_amenities">Room Amenities:</label>
        <textarea name="room_amenities" id="room_amenities" rows="4" required></textarea>

        <label for="room_main_image">Room Main Image:</label>
        <input type="file" name="room_main_image" id="room_main_image" accept="image/*" required>

        <button type="submit">Save Room Details</button>
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
