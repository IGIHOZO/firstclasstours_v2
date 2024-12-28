<?php
include("includes/config.php");

if (isset($_GET['id']) && isset($_GET['active'])) {
    $id = $_GET['id'];
    $status = $_GET['active'];

    $query = "UPDATE hotels SET active = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $status, $id);
    $stmt->execute();

    header("Location: view_hotels.php");
    exit;
}
?>
