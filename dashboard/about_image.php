<?php
// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./dashboardredirect.php');
$con = $dbh; // Assuming this is a valid PDO connection

// Directories for image uploads
$about_image_dir = 'images/about/';
$background_image_dir = 'images/background/';
$mission_image_dir = 'images/mission/';
$vision_image_dir = 'images/vision/';

// Create directories if they don't exist
if (!is_dir($about_image_dir)) mkdir($about_image_dir, 0777, true);
if (!is_dir($background_image_dir)) mkdir($background_image_dir, 0777, true);
if (!is_dir($mission_image_dir)) mkdir($mission_image_dir, 0777, true);
if (!is_dir($vision_image_dir)) mkdir($vision_image_dir, 0777, true);

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize variables for images
    $about_image = null;
    $background_image = null;
    $mission_image = null;
    $vision_image = null;

    // Process About Image
    if (isset($_FILES['about_image']) && $_FILES['about_image']['error'] === 0) {
        $about_image = time() . '_' . uniqid() . '.' . pathinfo($_FILES['about_image']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['about_image']['tmp_name'], $about_image_dir . $about_image);
    }

    // Process Background Image
    if (isset($_FILES['background_image']) && $_FILES['background_image']['error'] === 0) {
        $background_image = time() . '_' . uniqid() . '.' . pathinfo($_FILES['background_image']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['background_image']['tmp_name'], $background_image_dir . $background_image);
    }

    // Process Mission Image
    if (isset($_FILES['mission_image']) && $_FILES['mission_image']['error'] === 0) {
        $mission_image = time() . '_' . uniqid() . '.' . pathinfo($_FILES['mission_image']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['mission_image']['tmp_name'], $mission_image_dir . $mission_image);
    }

    // Process Vision Image
    if (isset($_FILES['vision_image']) && $_FILES['vision_image']['error'] === 0) {
        $vision_image = time() . '_' . uniqid() . '.' . pathinfo($_FILES['vision_image']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['vision_image']['tmp_name'], $vision_image_dir . $vision_image);
    }

    // Prepare SQL query for updating images
    $sql = "UPDATE about_company 
            SET AboutImage = COALESCE(:aboutImage, AboutImage),
                BackgroundImage = COALESCE(:backgroundImage, BackgroundImage),
                MissionImage = COALESCE(:missionImage, MissionImage),
                VisionImage = COALESCE(:visionImage, VisionImage)";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':aboutImage', $about_image, PDO::PARAM_STR);
    $stmt->bindValue(':backgroundImage', $background_image, PDO::PARAM_STR);
    $stmt->bindValue(':missionImage', $mission_image, PDO::PARAM_STR);
    $stmt->bindValue(':visionImage', $vision_image, PDO::PARAM_STR);

    // Execute SQL query and handle response
    if ($stmt->execute()) {
        echo "<script>
            alert('Images updated successfully!');
            window.location = '" . $_SERVER['PHP_SELF'] . "';
        </script>";
    } else {
        echo "<script>
            alert('Error updating images: " . print_r($stmt->errorInfo(), true) . "');
        </script>";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard | Update Images</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery-2.1.4.min.js"></script>
</head>
<body>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <?php include('includes/header.php'); ?>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> Update Images</li>
                </ol>
                <div class="four-grids">
                    <div class="row">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="about_image">About Image:</label>
                                <input type="file" name="about_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="background_image">Background Image:</label>
                                <input type="file" name="background_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="mission_image">Mission Image:</label>
                                <input type="file" name="mission_image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vision_image">Vision Image:</label>
                                <input type="file" name="vision_image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Update Images</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php include('includes/footer.php'); ?>
            </div>
        </div>
        <?php include('includes/sidebarmenu.php'); ?>
        <div class="clearfix"></div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
