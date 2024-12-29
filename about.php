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
        <!-- Header Section -->
        <header id="masthead" class="site-header header-primary">
            <?php include("header.php"); ?>
        </header>

        <!-- Breadcrumb Section -->
        <?php
        $imagePath = "assets/img/uploads/destination/rwanda2.jpeg"; // Default image
        ?>
        <div class="site-breadcrumb" style="background: url('<?= $imagePath ?>') no-repeat center center; background-size: cover;">
            <div class="container">
                <h1 class="breadcrumb-title">About Our Company</h1>
            </div>
        </div>

        <!-- Main Content -->
        <main>
            <!-- About Us Section -->
            <section class="section py-120">
                <div class="container">
                    <div class="section-header text-center">
                        <h2 class="section-title">About Us</h2>
                        <p class="section-subtitle">Learn more about who we are and what we do.</p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <p class="content-text"><?php echo nl2br($about_us); ?></p>
                        </div>
                        <div class="col-lg-6">
                            <img style="border-radius: 15%" src="dashboard/images/about/<?= $AboutImage ?>" alt="About Us Image" class="img-fluid rounded shadow">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Background Section -->
            <section class="section py-120 bg-light">
                <div class="container">
                    <div class="section-header text-center">
                        <h2 class="section-title">Our Background</h2>
                        <p class="section-subtitle">Discover the roots of our journey.</p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                            <p class="content-text"><?php echo nl2br($background); ?></p>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <img style="border-radius: 15%" src="dashboard/images/background/<?= $BackgroundImage ?>" alt="Background Image" class="img-fluid rounded shadow">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Mission Section -->
            <section class="section py-120">
                <div class="container">
                    <div class="section-header text-center">
                        <h2 class="section-title">Our Mission</h2>
                        <p class="section-subtitle">What drives us to succeed.</p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <p class="content-text"><?php echo nl2br($mission); ?></p>
                        </div>
                        <div class="col-lg-6">
                            <img style="border-radius: 15%" src="dashboard/images/mission/<?= $MissionImage ?>" alt="Mission Image" class="img-fluid rounded shadow">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Vision Section -->
            <section class="section py-120 bg-light">
                <div class="container">
                    <div class="section-header text-center">
                        <h2 class="section-title">Our Vision</h2>
                        <p class="section-subtitle">Our aspirations for the future.</p>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                            <p class="content-text"><?php echo nl2br($vision); ?></p>
                        </div>
                        <div class="col-lg-6 order-lg-1">
                            <img style="border-radius: 15%" src="dashboard/images/vision/<?= $VisionImage ?>" alt="Vision Image" class="img-fluid rounded shadow">
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer Section -->
        <?php include("footer.php"); ?>

        <!-- Custom Styles -->
        <style>
            /* General Styling */
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
            }

            .site-breadcrumb {
                background-size: cover;
                background-position: center;
                color: #fff;
                text-align: center;
                padding: 100px 0;
                margin-bottom: 40px;
                position: relative;
            }

            .breadcrumb-title {
                font-size: 36px;
                font-weight: bold;
                margin: 0;
                text-transform: uppercase;
            }

            /* Section Styling */
            .section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 30px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .section-subtitle {
                font-size: 16px;
                color: #6c757d;
                margin-bottom: 30px;
            }

            .content-text {
                font-size: 16px;
                line-height: 1.8;
                color: #333;
            }

            /* Image Styling */
            .img-fluid {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
                transition: transform 0.3s ease;
            }

            .img-fluid:hover {
                transform: scale(1.05);
            }

            .shadow {
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            }

            .rounded {
                border-radius: 10px;
            }

            /* Background */
            .bg-light {
                background-color: #f9f9f9;
            }
            img{
                /* border-radius: 15%!important; */
            }
        </style>
    </div>
</body>
</html>
