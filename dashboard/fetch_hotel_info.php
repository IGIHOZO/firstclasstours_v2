<?php
include("includes/config.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM hotels WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['error' => 'No hotel found with this ID.']);
    }
}
?>
