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
// Fetch hotel ID based on the username (from transport_companies table)
$result = mysqli_query($conn, "SELECT id FROM hotels WHERE contact_email='$username'");
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hotel_id = $row['id'];
} else {
    die("Error: Unable to retrieve hotel ID.");
}

// Fetch hotel rooms based on the hotel_id
$query = "SELECT * FROM hotel_rooms WHERE hotel_id='$hotel_id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Rooms</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .action-btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .action-btn:hover {
            background-color: #0056b3;
        }
        .delete-btn {
            background-color: red;
        }
        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hotel Rooms</h1>
        <table>
            <thead>
                <tr>
                     <th>N<sup>o</sup></th>
                    <th>Room Name</th>
                    <th>Room Price ($)</th>
                    <th>Room Type</th>
                    <th>Hotel Star Rating</th>
                    <th>Amenities</th>
                    <th>Main Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the hotel rooms data
                $no=0;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $no=$no+1;
                        echo "<tr>";
                         echo "<td>" . htmlspecialchars($no) . "</td>";
                        echo "<td>" . htmlspecialchars($row['room_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['room_price']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['room_type']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['room_hotel_star']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['room_amenities']) . "</td>";
                        echo "<td><img src='../uploads/hotel_room/" . htmlspecialchars($row['room_main_image']) . "' alt='Room Image' width='100'></td>";
                        echo "<td class='actions'>
                                <a href='edit_hotel_room.php?id=" . $row['room_id'] . "' class='action-btn'>Edit</a>
                                <a href='delete_hotel_room.php?id=" . $row['room_id'] . "' class='action-btn delete-btn' onclick='return confirm(\"Are you sure you want to delete this room?\")'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hotel rooms found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
