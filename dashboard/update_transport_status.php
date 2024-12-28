<?php
include("includes/config.php");

// Get ID and status
$id = $_GET['id'];
$status = $_GET['active'];

// Update query
$query = "UPDATE transport_companies SET active = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $status, $id);
$stmt->execute();

// Redirect back to dashboard
header("Location: view_transport_companies.php");
?>
