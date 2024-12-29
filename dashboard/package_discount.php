<?php
// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('./dashboardredirect.php');
$con = $dbh; // Assuming this is a valid PDO connection

// Handle POST request for registering, activating, deactivating, or deleting discounts
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Register new discount
    if (isset($_POST['register'])) {
        $package_id = (int)$_POST['package_id'];
        $discount_value = (float)$_POST['discount_value'];
        $status = (int)$_POST['DiscountStatus'];

        // Validate inputs
        if ($discount_value < 0 || $discount_value > 100) {
            echo "<script>alert('Discount value must be between 0 and 100!');</script>";
        } else {
            // Check if the discount already exists for this package
            $check_sql = "SELECT COUNT(*) FROM PackageDiscounts WHERE DiscountPackageID = :package_id";
            $stmt = $con->prepare($check_sql);
            $stmt->bindValue(':package_id', $package_id, PDO::PARAM_INT);
            $stmt->execute();
            $existing_discount = $stmt->fetchColumn();

            if ($existing_discount > 0) {
                echo "<script>alert('Discount for this package already exists!');</script>";
            } else {
                // Insert the new discount
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
            }
        }
    }

    // Activate or Deactivate Discount
    elseif (isset($_POST['activate']) && isset($_POST['discount_id'])) {
        $discount_id = (int)$_POST['discount_id'];
        $new_status = ($_POST['action'] == 'activate') ? 1 : 0;

        // Update discount status
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

    // Delete Discount
    elseif (isset($_POST['delete']) && isset($_POST['discount_id'])) {
        $discount_id = (int)$_POST['discount_id'];

        $sql = "DELETE FROM PackageDiscounts WHERE DiscountID = :discount_id";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(':discount_id', $discount_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Discount deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error deleting discount.');</script>";
        }
    }
}

// Fetch all discounts
$sql = "SELECT pd.DiscountID, pd.DiscountPackageID, pd.DiscountValue, pd.DiscountStatus, pd.DateCreated, p.package_name 
        FROM PackageDiscounts pd
        JOIN packages p ON pd.DiscountPackageID = p.package_id
        ORDER BY pd.DateCreated DESC";
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

                <!-- Discount Registration Form -->
                <div class="four-grids">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="package_id">Select Package:</label>
                            <select name="package_id" class="form-control" required>
                                <option value="">Select Package</option>
                                <?php foreach ($packages as $package): ?>
                                    <option value="<?= $package['package_id'] ?>"><?= htmlspecialchars($package['package_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="discount_value">Discount Value (Percentage):</label>
                            <input type="number" name="discount_value" class="form-control" min="0" max="100" required>
                        </div>
                        <div class="form-group">
                            <label for="DiscountStatus">Discount Status:</label>
                            <select name="DiscountStatus" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" name="register" class="btn btn-success">Register Discount</button>
                    </form>
                </div>

                <hr>

                <!-- Display Registered Discounts -->
                <div class="row">
                    <h3>Registered Discounts</h3>
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
                                <?php $count = 1; ?>
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
    <!-- Toggle Discount Status -->
    <div class="btn-group btn-group-sm" role="group" aria-label="Discount Actions" style="width: 100%; display: flex; justify-content: space-between;">
        <?php if ($discount['DiscountStatus'] == 1): ?>
            <form action="" method="POST" style="flex: 1; margin-right: 5px;">
                <input type="hidden" name="discount_id" value="<?= $discount['DiscountID'] ?>">
                <button type="submit" name="activate" value="deactivate" class="btn btn-dark btn-block">Deactivate</button>
            </form>
        <?php else: ?>
            <form action="" method="POST" style="flex: 1; margin-right: 5px;">
                <input type="hidden" name="discount_id" value="<?= $discount['DiscountID'] ?>">
                <button type="submit" name="activate" value="activate" class="btn btn-success btn-block">Activate</button>
            </form>
        <?php endif; ?>
        <!-- Delete Discount -->
        <form action="" method="POST" style="flex: 1;">
            <input type="hidden" name="discount_id" value="<?= $discount['DiscountID'] ?>">
            <button type="submit" name="delete" class="btn btn-danger btn-sm btn-block">Delete</button>
        </form>
    </div>
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
        </div>
        <?php include('includes/sidebarmenu.php'); ?>
        <div class="clearfix"></div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
