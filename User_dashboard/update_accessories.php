<?php


require('./dashboardredirect.php');
// Check if the user is logged in
if (!isset($_SESSION['alogin'])) {
    // Redirect to the login page if not logged in
    echo "<script>window.location='index.php';</script>";
    exit;
}

// Get the logged-in user's email and company type from the session
  $username = $_SESSION['alogin'];
  $company_type = $_SESSION['company_type'];
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id'];
    $accessories = [
        'air_conditioner' => isset($_POST['air_conditioner']) ? 1 : 0,
        'anti_lock_braking_system' => isset($_POST['anti_lock_braking_system']) ? 1 : 0,
        'power_steering' => isset($_POST['power_steering']) ? 1 : 0,
        'power_windows' => isset($_POST['power_windows']) ? 1 : 0,
        'cd_player' => isset($_POST['cd_player']) ? 1 : 0,
        'leather_seats' => isset($_POST['leather_seats']) ? 1 : 0,
        'central_locking' => isset($_POST['central_locking']) ? 1 : 0,
        'power_door_locks' => isset($_POST['power_door_locks']) ? 1 : 0,
        'brake_assist' => isset($_POST['brake_assist']) ? 1 : 0,
        'driver_airbag' => isset($_POST['driver_airbag']) ? 1 : 0,
        'passenger_airbag' => isset($_POST['passenger_airbag']) ? 1 : 0,
        'crash_sensor' => isset($_POST['crash_sensor']) ? 1 : 0,
    ];

    // Update the car accessories in the database
    $updateQuery = "UPDATE car_rental_inclusive SET 
                    Air_Conditioner = '{$accessories['air_conditioner']}',
                    AntiLock_Braking_System = '{$accessories['anti_lock_braking_system']}',
                    Power_Steering = '{$accessories['power_steering']}',
                    Power_Windows = '{$accessories['power_windows']}',
                    CD_Player = '{$accessories['cd_player']}',
                    Leather_Seats = '{$accessories['leather_seats']}',
                    Central_Locking = '{$accessories['central_locking']}',
                    Power_Door_Locks = '{$accessories['power_door_locks']}',
                    Brake_Assist = '{$accessories['brake_assist']}',
                    Driver_Airbag = '{$accessories['driver_airbag']}',
                    Passenger_Airbag = '{$accessories['passenger_airbag']}',
                    Crash_Sensor = '{$accessories['crash_sensor']}'
                    WHERE car_id = '$car_id'";

    if (mysqli_query($conn, $updateQuery)) {
     
            echo "<script>
        alert('Car accessories updated successfully.');
        window.location.href = 'car_select_accessories.php';
    </script>";
    } else {
        echo "Error updating car accessories: " . mysqli_error($conn);
    }
}
?>
