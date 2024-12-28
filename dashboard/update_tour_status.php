<?php
include("includes/config.php");

// Get ID and status
$id = $_GET['id'];
$status = $_GET['active'];

// Update query
$query = "UPDATE tours_company SET active = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $status, $id);
$stmt->execute();

// Redirect back to dashboard
header("Location: view_tour_companies.php");
?>
