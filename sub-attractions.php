<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php");

// Retrieve the AttractionID from the GET request
$posted_attraction_id = isset($_GET['id']) ? $_GET['id'] : null;

// Initialize variables with default values
$defaults = [
    'SubTitle' => "NO DATA FOR THIS ATTRACTION",
    'SubDescriptions' => "NO DATA FOR THIS ATTRACTION",
    'SubImage' => "default_image.jpg",
];

// Fetch attraction details based on the AttractionID
$sql_attraction = "SELECT * FROM Attractions WHERE AttractionID = '$posted_attraction_id' AND AttractionStatus = 1";
$result_attraction = $conn->query($sql_attraction);
$row_attraction = $result_attraction->fetch_assoc();

// If the attraction doesn't exist, fall back to the default values
if ($row_attraction) {
    extract($row_attraction);
} else {
    $SubTitle = $defaults['SubTitle'];
    $SubDescriptions = $defaults['SubDescriptions'];
    $SubImage = $defaults['SubImage'];
}

// Fetch sub-attractions related to this attraction
$sql_sub_attractions = "SELECT * FROM SubAttractions WHERE AttractionID = '$posted_attraction_id' AND SubStatus = 1";
$result_sub_attractions = $conn->query($sql_sub_attractions);
?>
<style>
    #main-menus{
        background-color: #2B4F39!important;
        color: white!important;
    }
</style>
<body class="home">

    <div id="page" class="full-page">
        <header id="masthead" class="site-header header-primary">
            <?php include("header.php"); ?>
        </header>

        <!-- Attraction Title as Page Banner -->
        <div class="site-banner" style="background: url('dashboard/<?= htmlspecialchars($row_attraction['AttractionImage']  ?: 'default_image.jpg') ?>') no-repeat center center; background-size: cover; height: 400px; display: flex; align-items: center; justify-content: center; color: #fff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            <h1 style="font-size: 3rem; font-weight: bold; text-align: center;"><?= htmlspecialchars($row_attraction['AttractionTitle']); ?></h1>
        </div>

        <!-- Site Breadcrumb -->
        <div class="site-breadcrumb" style="background: rgba(0, 0, 0, 0.6); padding: 30px; text-align: center; color: #fff;">
            <p><strong>Explore the Beauty of <?= htmlspecialchars($row_attraction['AttractionTitle']); ?></strong></p>
            <p><?= htmlspecialchars($row_attraction['AttractionDescription']); ?></p>
        </div>

        <!-- Attraction Details Area -->
        <div class="tour-area py-120" style="background-color: #f8f8f8;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Sub-Attractions -->
                        <div class="destination-sub-attractions">
                            <h4 class="font-weight-bold">Sub-Attractions</h4>
                            <?php if ($result_sub_attractions->num_rows > 0) : ?>
                                <div class="sub-attractions" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
                                    <?php while ($sub_attraction = $result_sub_attractions->fetch_assoc()) : ?>
                                        <div class="sub-attraction-item" style="background-color: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                                            <img src="dashboard/<?= htmlspecialchars($sub_attraction['SubImage']); ?>" alt="<?= htmlspecialchars($sub_attraction['SubTitle']); ?>" class="sub-attraction-img" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #ddd;">
                                            <div class="sub-attraction-info" style="padding: 15px;">
                                                <h5 style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 10px;"><?= htmlspecialchars($sub_attraction['SubTitle']); ?></h5>
                                                <p style="font-size: 14px; color: #555; line-height: 1.6;"><?= htmlspecialchars($sub_attraction['SubDescriptions']); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php else : ?>
                                <p style="font-size: 16px; color: #777; text-align: center;">No sub-attractions found for this attraction.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

</body>

</html>
