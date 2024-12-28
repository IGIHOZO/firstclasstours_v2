<?php


session_start();
error_reporting(0);
include('includes/config.php');
include('./Classes/DestinationUpdateManager.php'); 

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $pid = intval($_GET['pid']);
    $destinationUpdateManager = new DestinationUpdateManager($dbh); 

    if (isset($_POST['submit'])) {
        
        $pname = $_POST['destination_name'];
        $ptype = $_POST['destination_category'];
        $plocation = $_POST['destination_location'];
        $sdescription = strip_tags($_POST['small_description']);
        $pdetails = strip_tags($_POST['destinationdetails']);
        
         $pvisa_required = $_POST['visa_required'];
         $planguage_spoken = $_POST['languages_spoken'];
         $pcurrency_used = $_POST['currency_used'];
         $psupport_phone = $_POST['support_phone'];
         $psupport_email = $_POST['support_email'];
         $pcountry_area = $_POST['country_area'];
     
         
         
        $pimage = $_FILES["packageimage"]["name"];
        

        
        $result = $destinationUpdateManager->updateDestinationDetails($pid, $pname, $ptype, $plocation, $sdescription, $pdetails, $pvisa_required,$planguage_spoken,$pcurrency_used,$psupport_phone,$psupport_email,$pcountry_area);

        if ($result) {
            $msg = "Package Updated Successfully";
        } else {
            $error = "Error updating package";
        }
    }

    $destinationDetails = $destinationUpdateManager->getDestinationDetails($pid);

    
    
}
?>

