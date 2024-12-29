<!DOCTYPE html>
<html lang="en">

<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php"); 


?>
<body class="home">

    <div id="page" class="full-page">
        <header id="masthead" class="site-header header-primary">
           <?php   include("header.php"); ?>
        </header>
    <?php
    $imagePath = "assets/img/uploads/destination/rwanda2.jpeg";

    echo '<div class="site-breadcrumb" style="background: url(' . $imagePath . ')">';

    echo '<div class="site-breadcrumb" style="background: url(default_image.jpg)">';

    ?>

    </div>

    </div>

    <div class="tour-area py-120">
        <div class="container">
            <br>
            <h2>About Us</h2>
            <br>
            <div class="about-us-content" style="margin-top: -20px;">
                <div style="white-space: pre-wrap;"><?php echo $about_us; ?></div>
            </div>
        </div>
    </div>
    <div class="tour-area py-120">
        <div class="container">
            <br>
            <h2>Our Background</h2>
            <br>
            <div class="about-us-content" style="margin-top: -20px;">
                <div style="white-space: pre-wrap;"><?php echo $background; ?></div>
            </div>
        </div>
    </div>
    <div class="tour-area py-120">
        <div class="container">
            <br>
            <h2>Our Mission</h2>
            <br>
            <div class="about-us-content" style="margin-top: -20px;">
                <div style="white-space: pre-wrap;"><?php echo $mission; ?></div>
            </div>
        </div>
    </div>
    <div class="tour-area py-120">
        <div class="container">
            <br>
            <h2>Our Vision</h2>
            <br>
            <div class="about-us-content" style="margin-top: -20px;">
                <div style="white-space: pre-wrap;"><?php echo $vision; ?></div>
            </div>
        </div>
    </div>

</main>

<?php include("footer.php"); ?>

<style>
    .site-breadcrumb {
        background-size: cover; 
        background-position: center;
        padding-top: 50px;
        padding-bottom: 50px; 
    }

    .about-us-content {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
    }
</style>

</html>
