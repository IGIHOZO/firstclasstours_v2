<?php
// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./dashboardredirect.php');
$con = $dbh; // Assuming this is a valid PDO connection

// Handle POST request for adding a SubAttraction
if (isset($_POST['add_subattraction'])) {
    $attraction_id = (int)$_POST['attraction_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = 1; // Always active
    $image = $_FILES['subattraction_image'];

    // Validate and rename the image
    if ($image['error'] == 0) {
        $target_dir = 'images/subattractions/';
        $unique_name = time() . '_' . uniqid() . '.' . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $target_file = $target_dir . $unique_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check allowed file types
        $allowed_types = ['jpg', 'png', 'jpeg', 'gif'];
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                // Insert the new subattraction into the database
                $sql = "INSERT INTO SubAttractions (AttractionID, SubTitle, SubDescriptions, SubImage, SubStatus) 
                        VALUES (:attraction_id, :title, :description, :image, :status)";
                $stmt = $con->prepare($sql);
                $stmt->bindValue(':attraction_id', $attraction_id, PDO::PARAM_INT);
                $stmt->bindValue(':title', $title, PDO::PARAM_STR);
                $stmt->bindValue(':image', $target_file, PDO::PARAM_STR);
                $stmt->bindValue(':description', $description, PDO::PARAM_STR);
                $stmt->bindValue(':status', $status, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    echo "<script>alert('SubAttraction added successfully!');</script>";
                } else {
                    echo "<script>alert('Error adding SubAttraction.');</script>";
                }
            } else {
                echo "<script>alert('Error uploading image.');</script>";
            }
        } else {
            echo "<script>alert('Invalid image format.');</script>";
        }
    }
}

// Handle POST request for deleting a SubAttraction
if (isset($_POST['delete_subattraction'])) {
    $sub_id = (int)$_POST['sub_id'];

    // Fetch the image path for deletion
    $fetch_sql = "SELECT SubImage FROM SubAttractions WHERE SubID = :sub_id";
    $fetch_stmt = $con->prepare($fetch_sql);
    $fetch_stmt->bindValue(':sub_id', $sub_id, PDO::PARAM_INT);
    $fetch_stmt->execute();
    $result = $fetch_stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $image_path = $result['SubImage'];
        $sql = "DELETE FROM SubAttractions WHERE SubID = :sub_id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':sub_id', $sub_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Delete the associated image file
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            echo "<script>alert('SubAttraction deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error deleting SubAttraction.');</script>";
        }
    } else {
        echo "<script>alert('SubAttraction not found.');</script>";
    }
}

// Fetch all SubAttractions
$sql = "SELECT sa.*, a.AttractionTitle 
        FROM SubAttractions sa
        JOIN Attractions a ON sa.AttractionID = a.AttractionID
        ORDER BY sa.SubTimeCreated DESC";
$stmt = $con->prepare($sql);
$stmt->execute();
$subattractions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard | Manage SubAttractions</title>
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
                    <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> Manage SubAttractions</li>
                </ol>

                <!-- Add New SubAttraction -->
                <div class="row">
                    <h3>Add New SubAttraction</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="attraction_id">Attraction</label>
                            <select name="attraction_id" class="form-control" required>
                                <?php
                                $attr_sql = "SELECT AttractionID, AttractionTitle FROM Attractions";
                                $attr_stmt = $con->prepare($attr_sql);
                                $attr_stmt->execute();
                                $attractions = $attr_stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($attractions as $attraction) {
                                    echo "<option value='{$attraction['AttractionID']}'>{$attraction['AttractionTitle']}</option>";
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
                            <label for="subattraction_image">Image</label>
                            <input type="file" name="subattraction_image" class="form-control" required />
                        </div>

                        <button type="submit" name="add_subattraction" class="btn btn-primary">Add SubAttraction</button>
                    </form>
                </div>

                <!-- Display SubAttractions -->
                <div class="row">
                    <h3>Registered SubAttractions</h3>
                    <?php if ($subattractions): ?>
                        <table id="subattractions-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Attraction</th>
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
                                <?php foreach ($subattractions as $subattraction): ?>
                                    <tr>
                                        <td><?= $count++ ?></td>
                                        <td><?= htmlspecialchars($subattraction['AttractionTitle']) ?></td>
                                        <td><?= htmlspecialchars($subattraction['SubTitle']) ?></td>
                                        <td><?= htmlspecialchars($subattraction['SubDescriptions']) ?></td>
                                        <td><img src="<?= htmlspecialchars($subattraction['SubImage']) ?>" alt="SubAttraction Image" width="100" /></td>
                                        <td><?= $subattraction['SubStatus'] ? 'Active' : 'Inactive' ?></td>
                                        <td><?= $subattraction['SubTimeCreated'] ?></td>
                                        <td>
                                            <!-- Delete SubAttraction -->
                                            <form action="" method="POST" style="display:inline;">
                                                <input type="hidden" name="sub_id" value="<?= $subattraction['SubID'] ?>">
                                                <button type="submit" name="delete_subattraction" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No SubAttractions registered yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php include('includes/sidebarmenu.php'); ?>
    </div>

    <script>
        $(document).ready(function() {
            $('#subattractions-table').DataTable();
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
