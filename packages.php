<!DOCTYPE html>
<html lang="en">

<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php"); 



if (isset($_GET['countryID'])) {
    // Retrieve the country_id value
    $posted_country_id = $_GET['countryID'];

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
    $destination_full_description = $row2['description_full'];

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

       
            <!-- Home packages section html start -->
            <section class="package-section">
                <div class="container">
                    <div class="section-heading text-center">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                              <br>
                                <h2>Tour Packages in <?php echo $destination_country; ?></h2>
                                <p>Explore Top Tour Packages in <?php  echo $destination_country;  ?></p>
                            </div>
                        </div>
                    </div>



                    <div class="package-inner">
                        <div class="row">


                        <?php
             $sql3 = "SELECT * FROM packages,countries where countries.country_id=packages.package_country 
 and package_status='1' and packages.package_country='$posted_country_id' order by package_id DESC limit 50";
 
 $result3 = $conn->query($sql3);
 while ($row3 = $result3->fetch_assoc()) {
    $package_name = $row3['package_name'];
    $package_id= $row3['package_id'];
    $package_introduction = $row3['package_introduction'];
    $package_description = $row3['package_description'];
    $package_from_date = $row3['package_from_date'];
    $package_to_date = $row3['package_to_date'];
    $package_price = $row3['package_price'];
    $package_travel_type = $row3['package_travel_type'];
    $package_country = $row3['country_name'];
    $package_type = $row3['package_type'];

    $package_number_of_person = $row3['package_number_of_person'];
    $package_status = $row3['package_status'];

    $package_days_and_nights = $row3['package_days_and_nights'];
    $package_image =  "assets/img/uploads/packages/".$row3['package_image'];
    $package_price = str_replace(',', '', $package_price);
    // Convert to a float to ensure it's a proper numeric value
$package_price = (float)$package_price;

    ?>








                            <div class="col-lg-4 col-md-6">
                                <div class="package-wrap">
                                    <figure class="feature-image">
                                        <a href="itinerary.php?packageID=<?php echo $package_id; ?>">
                                    <img src="<?php  echo $package_image;  ?>" alt="">
                                 </a>
                                    </figure>
                                    <div class="package-price">
                                        <h6>
                                            <span> $ <?php  echo number_format($package_price,2);   ?> </span> / per person
                                        </h6>
                                    </div>
                                    <div class="package-content-wrap">
                                        <div class="package-meta text-center">
                                            <ul>
                                                <li>
                                                    <i class="far fa-clock"></i> Days: <?php  echo $package_days_and_nights;  ?>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user-friends"></i> People: <?php  echo $package_number_of_person;  ?>
                                                </li>
                                                <li>
                                                    <i class="fas fa-map-marker-alt"></i> <?php  echo $package_country;  ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="package-content">
                                            <h3>
                                                <a href="itinerary.php?packageID=<?php echo $package_id; ?>"><?php  echo $package_name;  ?></a>
                                            </h3>
                                           
                                            <p><?php  echo $package_introduction;  ?></p>
                                            <div class="btn-wrap">
                                                <a href="itinerary.php?packageID=<?php echo $package_id; ?>" class="button-text width-6">View Iteneraries<i class="fas fa-arrow-right"></i></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <?php  

}
?>




                    
                        </div>
                     
                    </div>
                </div>
            </section>

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
