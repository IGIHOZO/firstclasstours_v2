<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('./includes/config.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title><?php   echo $company_name;  ?> | Admin Home page Video Manage</title>
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
        
           <style>
        .collapsible {
            background-color: #f9fafb;
            color: black;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        ..collapsible:hover {
            background-color: #610f07;
            color: white;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 60%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup .close:hover {
            color: #06D85F;
        }

        .popup .content {
    max-height: 30%; /* Set a maximum height for the content */
    overflow-y: auto; /* Enable vertical scrolling */
}

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }

        .box {
            width: 40%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }

        @media print {
            .hide-on-print {
                display: none;
            }
        }


    </style>
    
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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Welcome Message  </li>
                </ol>

            
      
       
        <!--Fields of update here -->


       <!-- Fields for updating database records -->
       <?php
 
// Define variables
$welcomeMessage = "";
$welcomeImage = "";

// Fetch existing data from the database
$query = "SELECT * FROM welcome_content ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $welcomeMessage = htmlspecialchars($row['welcome_message']);
    $welcomeImage = htmlspecialchars($row['welcome_image']);
}

// Save data on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $welcomeMessage = mysqli_real_escape_string($conn, $_POST['welcome_message']);
    $uploadedImage = $_FILES['welcome_image']['name'];

    // Handle file upload
    if ($uploadedImage) {
        $targetDir = "../uploads/welcome_message/";
        $targetFile = $targetDir . basename($uploadedImage);
        move_uploaded_file($_FILES['welcome_image']['tmp_name'], $targetFile);
    } else {
        $targetFile = $welcomeImage; // Keep existing image if no new image is uploaded
    }

    // Update or insert data
    if (mysqli_num_rows($result) > 0) {
        $updateQuery = "UPDATE welcome_content SET 
                        welcome_message='$welcomeMessage', 
                        welcome_image='$targetFile', 
                        created_at=NOW() 
                        WHERE id=" . $row['id'];
        mysqli_query($conn, $updateQuery);
    } else {
        $insertQuery = "INSERT INTO welcome_content (welcome_message, welcome_image) 
                        VALUES ('$welcomeMessage', '$targetFile')";
        mysqli_query($conn, $insertQuery);
    }

    // Redirect to prevent form resubmission
   echo '<script>alert("Welcome message created successfully!"); window.location.href="welcome_message.php";</script>';
    exit;
}
?>

<div class="container">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="welcome_message">Enter Welcome Message</label>
            <textarea class="form-control" rows="5" cols="50" name="welcome_message"><?= $welcomeMessage ?></textarea>
        </div>

        <div class="form-group">
            <label for="welcome_image">Upload Welcome Image</label>
            <input type="file" name="welcome_image">
        </div>

        <!-- Display existing image if available -->
        <?php if ($welcomeImage): ?>
            <div class="form-group">
                <p>Current Welcome Image:</p>
                <img src="../<?= $welcomeImage ?>" alt="Welcome Image" style="max-width: 300px;">
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>






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
