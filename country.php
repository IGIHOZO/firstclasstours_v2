<!DOCTYPE html>
<html lang="en">

<style>
    #main-menus{
        background-color: #2B4F39!important;
        color: white!important;
    }
    .country-info-list li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .country-info-list i {
        margin-right: 10px;
        color: #555;
        font-size: 18px;
    }

    .country-info-list span {
        font-weight: bold;
        margin-right: 5px;
    }

    .site-breadcrumb {
        background-size: cover;
        background-position: center;
        padding: 120px 0;
    }

    .about-us-content {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
    }
</style>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php");

// Retrieve country_id from GET request
$posted_country_id = isset($_GET['country_id']) ? $_GET['country_id'] : null;

// Initialize variables with default values
$defaults = [
    'name' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'country_name' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'description' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'image' => "default_image.jpg",
    'city' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'description_full' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'visa_required' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'languages_spoken' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'currency_used' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'support_phone' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'support_email' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'country_area' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'visa_requirements_document' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'country_info' => "NO DATA FOR THIS COUNTRY FOR NOW",
    'destination_id' => "NO DATA FOR THIS COUNTRY FOR NOW",

];
//destination_id

// Fetch country details from the database
$sql2 = "SELECT * FROM destination, countries WHERE countries.country_id = destination.category AND destination.category = '$posted_country_id'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc() ?? $defaults;

// Extract details from database or defaults
extract($row2);

// Fetch attractions related to the country
$sql_attractions = "SELECT * FROM Attractions WHERE AttractionDestinationID = '$destination_id' AND AttractionStatus = 1";
$result_attractions = $conn->query($sql_attractions);
?>

<body class="home">

    <div id="page" class="full-page">
        <header id="masthead" class="site-header header-primary">
            <?php include("header.php"); ?>
        </header>

        <!-- Site Breadcrumb -->
        <div class="site-breadcrumb" style="background: url('assets/img/uploads/destination/<?= $image ?: 'default_image.jpg' ?>')">
        </div>

        <!-- Tour Area -->
        <div class="tour-area py-120">
            <div class="container">
                <h2 class="breadcrumb-title"><?= $name; ?></h2>
                <div class="about-us-content mt-4">
                    <!-- Destination Content -->
                    <div class="destination-single py-120">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="destination-single-img">
                                        <img src="assets/img/destination/single.jpg" alt="">
                                    </div>
                                    <h2 class="destination-single-title">About <?= $country_name; ?></h2>
                                    <p><?= $description; ?></p>
                                    <div style="white-space: pre-wrap;">
                                        <?= $description_full; ?>
                                    </div>

                                    <!-- Country Information -->
                                    <div class="destination-country-info">
                                        <h3>Country Information</h3>
                                        <ul class="country-info-list clearfix">
                                            <li><i class="fas fa-globe"></i> <span>Country</span> <?= $country_name; ?></li>
                                            <li><i class="far fa-id-card"></i> <span>Visa Requirements</span> <?= $visa_required; ?></li>
                                            <li><i class="far fa-comments"></i> <span>Languages Spoken</span> <?= $languages_spoken; ?></li>
                                            <li><i class="fas fa-dollar-sign"></i> <span>Currency Used</span> <?= $currency_used; ?></li>
                                            <li><i class="fas fa-phone"></i> <span>Support Phone</span> <a href="tel:<?= $support_phone; ?>"> <?= $support_phone; ?></a></li>
                                            <li><i class="far fa-envelope-open"></i> <span>Support Email</span> <a href="mailto:<?= $support_email; ?>"> <?= $support_email; ?></a></li>
                                            <li><i class="far fa-map"></i> <span>Country Area</span> <?= $country_area; ?></li>
                                        </ul>
                                    </div>

                                    <center>
                                        <div class="header-btn">
                                            <a href="packages.php?countryID=<?= $posted_country_id; ?>" class="button-primary">
                                                Explore More packages in <?= $country_name; ?> <i class='fas fa-arrow-right'></i>
                                            </a>
                                        </div>
                                    </center>
                                </div>

                                <!-- Sidebar -->
                                <div class="col-lg-4">
                                    <div class="widget">
                                        <h4 class="widget-title">Download</h4>
                                        <div class="widget-download">
                                            <a href="assets/documents/<?= $visa_requirements_document; ?>" target="_blank"><i class="far fa-file-pdf"></i> Visa Requirements </a>
                                            <a href="assets/documents/<?= $country_info; ?>" target="_blank"><i class="far fa-file-pdf"></i> Country Info</a>
                                        </div>
                                    </div>

<!-- ATTRACTIONS HERE -->
<div class="widget" style="background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
    <h4 class="widget-title" style="font-size: 24px; color: #333; margin-bottom: 20px; text-align: center;">Attractions in <?= $country_name; ?></h4>
    
    <?php if ($result_attractions->num_rows > 0) : ?>
        <div class="widget-attractions" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
            <?php while ($attraction = $result_attractions->fetch_assoc()) : ?>
                <a href="sub-attractions.php?id=<?= $attraction['AttractionID']; ?>" style="text-decoration: none;">
                    <div class="attraction-item" style="background-color: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                        <img src="dashboard/<?= $attraction['AttractionImage']; ?>" alt="<?= $attraction['AttractionTitle']; ?>" class="attraction-img" style="width: 100%; height: 180px; object-fit: cover; border-bottom: 1px solid #ddd;">
                        <div class="attraction-info" style="padding: 15px;">
                            <h5 style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 10px;"><?= $attraction['AttractionTitle']; ?></h5>
                            <p style="font-size: 14px; color: #555; line-height: 1.6;"><?= substr($attraction['AttractionDescription'], 0, 100); ?>...</p>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p style="font-size: 16px; color: #777; text-align: center;">No attractions found for this destination.</p>
    <?php endif; ?>
</div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

</body>

</html>
