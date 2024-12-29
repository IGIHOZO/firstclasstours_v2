<?php
// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./dashboardredirect.php');
$con = $dbh; // Assuming this is a valid PDO connection

// Handle POST request for registering and updating discounts
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // Register new discount
        $package_id = (int)$_POST['package_id'];
        $discount_value = (float)$_POST['discount_value'];
        $status = (int)$_POST['discount_status'];

        $sql = "INSERT INTO PackageDiscounts (DiscountPackageID, DiscountValue, DiscountStatus, DateCreated) 
                VALUES (:package_id, :discount_value, :status, NOW())";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':package_id', $package_id, PDO::PARAM_INT);
        $stmt->bindValue(':discount_value', $discount_value, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo "<script>alert('Discount registered successfully!');</script>";
        } else {
            echo "<script>alert('Error registering discount.');</script>";
        }
    } elseif (isset($_POST['activate']) && isset($_POST['discount_id'])) {
        // Activate or Deactivate Discount
        $discount_id = (int)$_POST['discount_id'];
        $new_status = ($_POST['action'] == 'activate') ? 1 : 0;
        
        $sql = "UPDATE PackageDiscounts SET DiscountStatus = :status WHERE DiscountID = :discount_id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':status', $new_status, PDO::PARAM_INT);
        $stmt->bindValue(':discount_id', $discount_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo "<script>alert('Discount status updated successfully!');</script>";
        } else {
            echo "<script>alert('Error updating discount status.');</script>";
        }
    }
}

// Fetch all discounts
$sql = "SELECT * FROM PackageDiscounts ORDER BY DateCreated DESC";
$stmt = $con->prepare($sql);
$stmt->execute();
$discounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all packages for dropdown selection
$sql_packages = "SELECT * FROM packages ORDER BY package_name";
$stmt = $con->prepare($sql_packages);
$stmt->execute();
$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard | Manage Discounts</title>
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
                    <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> Manage Discounts</li>
                </ol>
                <div class="four-grids">
                    <div class="row">
                        <!-- Discount Registration Form -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="package_id">Select Package:</label>
                                <select name="package_id" class="form-control" required>
                                    <option value="">Select Package</option>
                                    <?php foreach ($packages as $package): ?>
                                        <option value="<?= $package['package_id'] ?>"><?= $package['package_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="discount_value">Discount Value (Percentage):</label>
                                <input type="number" name="discount_value" class="form-control" min="0" max="100" required>
                            </div>
                            <div class="form-group">
                                <label for="discount_status">Discount Status:</label>
                                <select name="discount_status" class="form-control" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" name="register" class="btn btn-success">Register Discount</button>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
    <!-- Display Registered Discounts -->
    <h3>Registered Discounts</h3>
    <?php
    // Fetch the discounts along with package names
    $sql = "SELECT pd.DiscountID, pd.DiscountPackageID, pd.DiscountValue, pd.DiscountStatus, pd.DateCreated, p.package_name 
            FROM PackageDiscounts pd
            JOIN packages p ON pd.DiscountPackageID = p.package_id
            ORDER BY pd.DateCreated DESC";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $discounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php if ($discounts): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Package</th>
                    <th>Discount Value</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; // Start counting from 1 ?>
                <?php foreach ($discounts as $discount): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= htmlspecialchars($discount['package_name']) ?></td>
                        <td><?= $discount['DiscountValue'] ?>%</td>
                        <td>
                            <?= $discount['DiscountStatus'] == 1 ? 'Active' : 'Inactive' ?>
                        </td>
                        <td><?= $discount['DateCreated'] ?></td>
                        <td>
                            <?php if ($discount['DiscountStatus'] == 1): ?>
                                <!-- Only show Deactivate button if the discount is active -->
                                <form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="discount_id" value="<?= $discount['DiscountID'] ?>">
                                    <button type="submit" name="action" value="deactivate" class="btn btn-warning">Deactivate</button>
                                </form>
                            <?php else: ?>
                                <!-- Only show Activate button if the discount is inactive -->
                                <form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="discount_id" value="<?= $discount['DiscountID'] ?>">
                                    <button type="submit" name="action" value="activate" class="btn btn-success">Activate</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No discounts registered yet.</p>
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
