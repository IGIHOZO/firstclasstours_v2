<?php
// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./dashboardredirect.php');
$con = $dbh; // Assuming this is a valid PDO connection

// Handle POST request for updating image or deleting an itinerary
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update Image
    if (isset($_POST['update_image']) && isset($_POST['itinerary_id'])) {
        $itinerary_id = (int)$_POST['itinerary_id'];
        $image = $_FILES['itinerary_image'];

        // Validate the image
        if ($image['error'] == 0) {
            $target_dir = 'images/itineraries/';
            $target_file = $target_dir . basename($image['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            // Check if the image is a valid file type (you can expand this list)
            $allowed_types = ['jpg', 'png', 'jpeg', 'gif'];
            if (in_array($imageFileType, $allowed_types)) {
                if (move_uploaded_file($image['tmp_name'], $target_file)) {
                    // Update image in database
                    $sql = "UPDATE itineraries SET itinerariesImage = :itinerary_image WHERE itinerary_id = :itinerary_id";
                    $stmt = $con->prepare($sql);
                    $stmt->bindValue(':itinerary_image', $target_file, PDO::PARAM_STR);
                    $stmt->bindValue(':itinerary_id', $itinerary_id, PDO::PARAM_INT);
                    
                    if ($stmt->execute()) {
                        echo "<script>alert('Image updated successfully!');</script>";
                    } else {
                        echo "<script>alert('Error updating image.');</script>";
                    }
                } else {
                    echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
                }
            } else {
                echo "<script>alert('Invalid image format. Only JPG, JPEG, PNG & GIF files are allowed.');</script>";
            }
        }
    }

    // Delete Itinerary
    elseif (isset($_POST['delete']) && isset($_POST['itinerary_id'])) {
        $itinerary_id = (int)$_POST['itinerary_id'];

        $sql = "DELETE FROM itineraries WHERE itinerary_id = :itinerary_id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':itinerary_id', $itinerary_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Itinerary deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error deleting itinerary.');</script>";
        }
    }
}

// Fetch all itineraries
$sql = "SELECT i.itinerary_id, i.package_id, i.title, i.day_time_plan, i.day_full_description, i.itinerariesImage, i.itinerary_recorded_date, p.package_name 
        FROM itineraries i
        JOIN packages p ON i.package_id = p.package_id
        ORDER BY i.itinerary_recorded_date DESC";
$stmt = $con->prepare($sql);
$stmt->execute();
$itineraries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard | Manage Itineraries</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <?php include('includes/header.php'); ?>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> Manage Itineraries</li>
                </ol>

                <!-- Display Registered Itineraries -->
                <div class="row">
                    <h3>Registered Itineraries</h3>
                    <?php if ($itineraries): ?>
                        <table id="itineraries-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Package</th>
                                    <th>Title</th>
                                    <th>Day/Time Plan</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Date Recorded</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                <?php foreach ($itineraries as $itinerary): ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= htmlspecialchars($itinerary['package_name']) ?></td>
                                        <td><?= htmlspecialchars($itinerary['title']) ?></td>
                                        <td><?= htmlspecialchars($itinerary['day_time_plan']) ?></td>
                                        <td><?= htmlspecialchars($itinerary['day_full_description']) ?></td>
                                        <td><img src="<?= htmlspecialchars($itinerary['itinerariesImage']) ?>" alt="Itinerary Image" width="100" /></td>
                                        <td><?= $itinerary['itinerary_recorded_date'] ?></td>
                                        <td>
                                            <!-- Update Image -->
                                            <form action="" method="POST" enctype="multipart/form-data" style="display:inline;">
                                                <input type="hidden" name="itinerary_id" value="<?= $itinerary['itinerary_id'] ?>">
                                                <input type="file" name="itinerary_image" required />
                                                <button type="submit" name="update_image" class="btn btn-primary">Update Image</button>
                                            </form>
                                            <!-- Delete Itinerary -->
                                            <form action="" method="POST" style="display:inline;">
                                                <input type="hidden" name="itinerary_id" value="<?= $itinerary['itinerary_id'] ?>">
                                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No itineraries registered yet.</p>
                    <?php endif; ?>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <?php include('includes/sidebarmenu.php'); ?>
        <div class="clearfix"></div>
    </div>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            $('#itineraries-table').DataTable();
        });
    </script>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
