<?php
// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./dashboardredirect.php');
$con = $dbh; // Assuming this is a valid PDO connection

// Handle POST request for adding, updating, or deleting attractions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_attraction'])) {
        handleAddAttraction($con);
    } elseif (isset($_POST['delete_attraction'])) {
        handleDeleteAttraction($con);
    }
}

// Function to handle adding a new attraction
function handleAddAttraction($con)
{
    $destination_id = (int)$_POST['destination_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = 1; // Always active
    $image = $_FILES['attraction_image'];

    if ($image['error'] === 0) {
        $target_dir = 'images/attractions/';
        $imageFileType = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        $unique_id = uniqid();
        $timestamp = time();
        $new_filename = $timestamp . '_' . $unique_id . '.' . $imageFileType;
        $target_file = $target_dir . $new_filename;

        $allowed_types = ['jpg', 'png', 'jpeg', 'gif'];
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                $sql = "INSERT INTO Attractions (AttractionDestinationID, AttractionTitle, AttractionImage, AttractionDescription, AttractionStatus) 
                        VALUES (:destination_id, :title, :image, :description, :status)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(':destination_id', $destination_id, PDO::PARAM_INT);
                $stmt->bindValue(':title', $title, PDO::PARAM_STR);
                $stmt->bindValue(':image', $target_file, PDO::PARAM_STR);
                $stmt->bindValue(':description', $description, PDO::PARAM_STR);
                $stmt->bindValue(':status', $status, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo "<script>alert('Attraction added successfully!'); window.location = window.location.href;</script>";
                } else {
                    echo "<script>alert('Error adding attraction.');</script>";
                }
            } else {
                echo "<script>alert('Error uploading image.');</script>";
            }
        } else {
            echo "<script>alert('Invalid image format.');</script>";
        }
    }
}

// Function to handle deleting an attraction
function handleDeleteAttraction($con)
{
    $attraction_id = (int)$_POST['attraction_id'];

    $sql = "DELETE FROM Attractions WHERE AttractionID = :attraction_id";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':attraction_id', $attraction_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>alert('Attraction deleted successfully!'); window.location = window.location.href;</script>";
    } else {
        echo "<script>alert('Error deleting attraction.');</script>";
    }
}

// Fetch all attractions
$sql = "SELECT a.*, d.name as destination_name FROM Attractions a
        JOIN destination d ON a.AttractionDestinationID = d.destination_id
        ORDER BY a.AttractionTimeCreated DESC";
$stmt = $con->prepare($sql);
$stmt->execute();
$attractions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard | Manage Attractions</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="page-container">
        <div class="left-content">
            <div class="mother-grid-inner">
                <?php include('includes/header.php'); ?>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> Manage Attractions</li>
                </ol>

                <!-- Add New Attraction -->
                <div class="row">
                    <h3>Add New Attraction</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="destination_id">Destination</label>
                            <select name="destination_id" class="form-control" required>
                                <?php
                                $dest_sql = "SELECT destination_id, name FROM destination";
                                $dest_stmt = $con->prepare($dest_sql);
                                $dest_stmt->execute();
                                $destinations = $dest_stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($destinations as $destination) {
                                    echo "<option value='{$destination['destination_id']}'>{$destination['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="attraction_image">Image</label>
                            <input type="file" name="attraction_image" class="form-control" required />
                        </div>

                        <button type="submit" name="add_attraction" class="btn btn-primary">Add Attraction</button>
                    </form>
                </div>

                <!-- Display Attractions -->
                <div class="row">
                    <h3>Registered Attractions</h3>
                    <?php if ($attractions): ?>
                        <table id="attractions-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Destination</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Time Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1; ?>
                                <?php foreach ($attractions as $attraction): ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= htmlspecialchars($attraction['destination_name']) ?></td>
                                        <td><?= htmlspecialchars($attraction['AttractionTitle']) ?></td>
                                        <td><?= htmlspecialchars($attraction['AttractionDescription']) ?></td>
                                        <td><img src="<?= htmlspecialchars($attraction['AttractionImage']) ?>" alt="Attraction Image" width="100" /></td>
                                        <td><?= $attraction['AttractionStatus'] ? 'Active' : 'Inactive' ?></td>
                                        <td><?= $attraction['AttractionTimeCreated'] ?></td>
                                        <td>
                                            <form action="" method="POST" style="display:inline;">
                                                <input type="hidden" name="attraction_id" value="<?= $attraction['AttractionID'] ?>">
                                                <button type="submit" name="delete_attraction" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this attraction?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No attractions registered yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php include('includes/sidebarmenu.php'); ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#attractions-table').DataTable();
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
