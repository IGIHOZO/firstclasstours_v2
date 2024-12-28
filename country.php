<!DOCTYPE html>
<html lang="en">

<style>
.country-info-list li {
    display: flex;         /* Align icon and text horizontally */
    align-items: center;   /* Vertically center the icon and text */
    margin-bottom: 10px;   /* Space between items */
    font-size: 16px;       /* Adjust font size */
}

.country-info-list i {
    margin-right: 10px;    /* Add space between the icon and text */
    color: #555;           /* Set icon color */
    font-size: 18px;       /* Adjust icon size */
}

.country-info-list span {
    font-weight: bold;     /* Make the label bold */
    margin-right: 5px;     /* Add space between the label and the dynamic content */
}

    </style>
<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php"); 




if (isset($_GET['country_id'])) {
    // Retrieve the country_id value
    $posted_country_id = $_GET['country_id'];

}

// Initialize variables with default values
$destination_name = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_country = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_short_description = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_image = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_city = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_full_description = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_visa_required = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_languages_spoken = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_currency_used = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_support_phone = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_support_email = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_country_area = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_visa_requirements_document = "NO DATA FOR THIS COUNTRY FOR NOW";
$destination_country_info = "NO DATA FOR THIS COUNTRY FOR NOW";
 
 // Fetch countries from the database
 $sql2 = "SELECT * FROM destination,countries where countries.country_id=destination.category 
 and destination.category='$posted_country_id'";
 $result2 = $conn->query($sql2);
 while ($row2 = $result2->fetch_assoc()) {
    $destination_name = $row2['name'];
    $destination_country = $row2['country_name'];

    $destination_short_description = $row2['description'];
    $destination_image= $row2['image'];

    $destination_city= $row2['city'];
    $destination_full_description = htmlentities($row2['description_full']);


    $destination_visa_required = $row2['visa_required'];
    $destination_languages_spoken = $row2['languages_spoken'];

    $destination_currency_used = $row2['currency_used'];
    $destination_support_phone = $row2['support_phone'];
    $destination_support_email = $row2['support_email'];

    $destination_country_area = $row2['country_area'];
    $destination_visa_requirements_document = $row2['visa_requirements_document'];
    $destination_country_info = $row2['country_info'];
   
}
?>
<body class="home">

    <div id="page" class="full-page">
        <header id="masthead" class="site-header header-primary">
           <?php   include("header.php"); ?>
        </header>
    <?php
    $imagePath = "assets/img/uploads/destination/rwanda2.jpeg";

    // Use the image path in your HTML
    echo '<div class="site-breadcrumb" style="background: url(' . $imagePath . ')">';

    // Handle the case where no image is found
    echo '<div class="site-breadcrumb" style="background: url(default_image.jpg)">';

    ?>

    </div>

    </div>

    <div class="tour-area py-120">
        <div class="container">
            <br>
            <h2 class="breadcrumb-title"><?php echo $destination_name;  ?></h2>
               
            <br>
            <div class="about-us-content" style="margin-top: -20px;">
                

            
            <div class="destination-single py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="destination-single-img">
                            <img src="assets/img/destination/single.jpg" alt>
                        </div>
                        <h2 class="destination-single-title">About <?php echo $destination_country;  ?> </h2>
                        <p class="mt-20">
                        <?php echo $destination_short_description;  ?>
                        </p>
                        <p class="mt-20">
                      <div style="white-space: pre-wrap;"><?php echo $destination_full_description; ?></div>


                        </p>



                        <div class="destination-country-info">
                            <h3>Country Information</h3>
                            <p class="mt-10">
                               
                            </p>
                            <ul class="country-info-list clearfix">
                                <li><i class="fas fa-globe"></i> <span>Country</span><?php echo $destination_country;  ?></li>
                                <li><i class="far fa-id-card"></i> <span>Visa Requirements</span><?php echo $destination_visa_required;  ?></li>
                                <li><i class="far fa-comments"></i> <span>Languages Spoken</span><?php echo $destination_languages_spoken;  ?></li>
                               
                                <li><i class="fas fa-dollar-sign"></i> <span>Currency Used</span><?php echo $destination_currency_used;  ?></li>
                                <li><i class="fas fa-phone"></i> <span>Support Phone</span><a href="tel:"> <?php echo $destination_support_phone;  ?></a></li>
                                <li><i class="far fa-envelope-open"></i> <span>Support Email</span><a href=""><span class="__cf_email__"><?php echo $destination_support_email;  ?></span></a></li>
                                <li><i class="far fa-map"></i> <span>Country surface Area</span><?php  echo $destination_country_area  ?></li>
                            </ul>
                        </div>


                       <center>
                        <div class="header-btn">
                        <a href="packages.php?countryID=<?php echo $posted_country_id; ?>" class="button-primary">
    Explore More packages in <?php echo $destination_country; ?> <i class='fas fa-arrow-right'></i>
</a>

                        </div>

</center>
                    </div>

                    
                    <div class="col-lg-4">
                       

                            <div class="widget">
                                <h4 class="widget-title">Download</h4>
                                <div class="widget-download">
                                    <a href="assets/documents/<?php  echo $destination_visa_requirements_document; ?>" target="_blank"><i class="far fa-file-pdf"></i> Visa Requirements </a>
                                    <a href="assets/documents/<?php  echo $destination_country_info; ?>" target="_blank"><i class="far fa-file-pdf"></i> Country Info</a>
                                </div>
                            </div>


              





</div>








</div>
</div>
</div>



            </div>
        </div>
    </div>

</main>

<?php include("footer.php"); ?>

<style>
    .site-breadcrumb {
        background-size: cover; /* Adjusts the size of the background image to cover the entire element */
        background-position: center; /* Centers the background image */
        padding-top: 50px; /* Adjusts the top padding to reduce space */
        padding-bottom: 50px; /* Adjusts the bottom padding to reduce space */
    }

    .about-us-content {
        background-color: rgba(255, 255, 255, 0.8); /* Adds a semi-transparent white background behind the content */
        padding: 20px; /* Adds padding around the content */
    }
</style>

</html>
