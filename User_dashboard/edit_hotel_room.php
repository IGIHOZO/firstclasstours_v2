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
// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $room_id = $_GET['id'];

    // Fetch hotel room details based on the room_id
    $query = "SELECT * FROM hotel_rooms WHERE room_id = '$room_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $room = mysqli_fetch_assoc($result);
    } else {
        die("Error: Room not found.");
    }
} else {
    die("Error: Room ID is missing.");
}

// Fetch hotel ID based on the username (to ensure correct ownership)
$result = mysqli_query($conn, "SELECT id FROM hotels WHERE contact_email='$username'");
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hotel_id = $row['id'];
} else {
    die("Error: Unable to retrieve hotel ID.");
}

// Handle form submission to update room details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
    $room_price = mysqli_real_escape_string($conn, $_POST['room_price']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $hotel_star_rating = mysqli_real_escape_string($conn, $_POST['hotel_star_rating']);
    $room_amenities = mysqli_real_escape_string($conn, $_POST['room_amenities']);

    // Handle image upload
    $upload_dir = '../uploads/hotel_room/';
    $room_main_image = $_FILES['room_main_image']['name'];
    $target_file = $upload_dir . basename($room_main_image);

    if (move_uploaded_file($_FILES['room_main_image']['tmp_name'], $target_file)) {
        // Update room details
        $sql = "UPDATE hotel_rooms 
                SET room_name = '$room_name', room_price = '$room_price', room_type = '$room_type', 
                    room_hotel_star = '$hotel_star_rating', room_amenities = '$room_amenities', 
                    room_main_image = '$room_main_image' 
                WHERE room_id = '$room_id' AND hotel_id = '$hotel_id'";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                alert('Room details updated successfully.');
                window.location.href = 'display_hotel_rooms.php';
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
    <title>Edit Hotel Room</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input, form select, form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            width: 100%;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Room: <?php echo htmlspecialchars($room['room_name']); ?></h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="room_name">Room Name:</label>
            <input type="text" name="room_name" id="room_name" value="<?php echo htmlspecialchars($room['room_name']); ?>" required>

            <label for="room_price">Room Price ($):</label>
            <input type="number" name="room_price" id="room_price" value="<?php echo htmlspecialchars($room['room_price']); ?>" required>

            <label for="room_type">Room Type:</label>
            <select name="room_type" id="room_type" required>
                <option value="Single Room" <?php if ($room['room_type'] == 'Single Room') echo 'selected'; ?>>Single Room</option>
<option value="Double Room" <?php if ($room['room_type'] == 'Double Room') echo 'selected'; ?>>Double Room</option>
<option value="Triple Room" <?php if ($room['room_type'] == 'Triple Room') echo 'selected'; ?>>Triple Room</option>
<option value="Quad Room" <?php if ($room['room_type'] == 'Quad Room') echo 'selected'; ?>>Quad Room</option>
<option value="Suite" <?php if ($room['room_type'] == 'Suite') echo 'selected'; ?>>Suite</option>
<option value="Penthouse" <?php if ($room['room_type'] == 'Penthouse') echo 'selected'; ?>>Penthouse</option>
<option value="Studio" <?php if ($room['room_type'] == 'Studio') echo 'selected'; ?>>Studio</option>
<option value="Deluxe Room" <?php if ($room['room_type'] == 'Deluxe Room') echo 'selected'; ?>>Deluxe Room</option>
<option value="Executive Room" <?php if ($room['room_type'] == 'Executive Room') echo 'selected'; ?>>Executive Room</option>
<option value="Family Room" <?php if ($room['room_type'] == 'Family Room') echo 'selected'; ?>>Family Room</option>
<option value="Accessible Room" <?php if ($room['room_type'] == 'Accessible Room') echo 'selected'; ?>>Accessible Room</option>

                
                <!-- Add all other options here -->
            </select>

            <label for="hotel_star_rating">Hotel Star Rating:</label>
            <select name="hotel_star_rating" id="hotel_star_rating" required>
                <option value="1" <?php if ($room['room_hotel_star'] == '1') echo 'selected'; ?>>1 Star</option>
                <option value="2" <?php if ($room['room_hotel_star'] == '2') echo 'selected'; ?>>2 Stars</option>
                 <option value="3" <?php if ($room['room_hotel_star'] == '3') echo 'selected'; ?>>3 Star</option>
                <option value="4" <?php if ($room['room_hotel_star'] == '4') echo 'selected'; ?>>4 Stars</option>
                 <option value="5" <?php if ($room['room_hotel_star'] == '5') echo 'selected'; ?>>5 Stars</option>
                <!-- Add all other options here -->
            </select>

            <label for="room_amenities">Amenities:</label>
            <textarea name="room_amenities" id="room_amenities" rows="4" required><?php echo htmlspecialchars($room['room_amenities']); ?></textarea>

            <label for="room_main_image">Room Main Image:</label>
            <input type="file" name="room_main_image" id="room_main_image" accept="image/*">

            <button type="submit">Update Room Details</button>
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
