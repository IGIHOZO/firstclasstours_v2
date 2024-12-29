<?php
// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./dashboardredirect.php');
$con = $dbh; // Assuming this is a valid PDO connection

// Directory for image uploads
$welcome_image_dir = 'images/welcome/';

// Create directory if it doesn't exist
if (!is_dir($welcome_image_dir)) mkdir($welcome_image_dir, 0777, true);

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['upload'])) {
        // Process image upload
        if (isset($_FILES['welcome_image']) && $_FILES['welcome_image']['error'] === 0) {
            $image_name = time() . '_' . uniqid() . '.' . pathinfo($_FILES['welcome_image']['name'], PATHINFO_EXTENSION);
            $image_path = $welcome_image_dir . $image_name;
            if (move_uploaded_file($_FILES['welcome_image']['tmp_name'], $image_path)) {
                $sql = "INSERT INTO WelcomeImages (ImagePath, ImageStatus) VALUES (:imagePath, 1)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(':imagePath', $image_path, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    echo "<script>alert('Image uploaded successfully!');</script>";
                } else {
                    echo "<script>alert('Error uploading image.');</script>";
                }
            }
        }
    } elseif (isset($_POST['delete']) && isset($_POST['image_id'])) {
        // Delete image
        $image_id = (int)$_POST['image_id'];
        $sql = "SELECT ImagePath FROM WelcomeImages WHERE ImageID = :imageID";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':imageID', $image_id, PDO::PARAM_INT);
        $stmt->execute();
        $image = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($image) {
            unlink($image['ImagePath']); // Delete image file
            $sql = "DELETE FROM WelcomeImages WHERE ImageID = :imageID";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':imageID', $image_id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "<script>alert('Image deleted successfully!');</script>";
            } else {
                echo "<script>alert('Error deleting image.');</script>";
            }
        }
    }
}

// Fetch all images
$sql = "SELECT * FROM WelcomeImages ORDER BY ImageTime DESC";
$stmt = $con->prepare($sql);
$stmt->execute();
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard | Manage Welcome Images</title>
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
                    <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> Manage Welcome Images</li>
                </ol>
                <div class="four-grids">
                    <div class="row">
                        <!-- Image Upload Form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="welcome_image">Upload Welcome Image:</label>
                                <input type="file" name="welcome_image" class="form-control" required>
                            </div>
                            <button type="submit" name="upload" class="btn btn-success">Upload Image</button>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- Display Uploaded Images -->
                        <h3>Uploaded Welcome Images</h3>
                        <?php if ($images): ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Uploaded At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($images as $image): ?>
                                        <tr>
                                            <td><?= $image['ImageID'] ?></td>
                                            <td><img src="<?= $image['ImagePath'] ?>" alt="Welcome Image" width="100"></td>
                                            <td><?= $image['ImageStatus'] == 1 ? 'Active' : 'Inactive' ?></td>
                                            <td><?= $image['ImageTime'] ?></td>
                                            <td>
                                                <form action="" method="POST" style="display:inline;">
                                                    <input type="hidden" name="image_id" value="<?= $image['ImageID'] ?>">
                                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>No images uploaded yet.</p>
                        <?php endif; ?>
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
