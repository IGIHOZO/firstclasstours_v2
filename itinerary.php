<!DOCTYPE html>
<html lang="en">
<style>
    .country-info-list {
        list-style: none; /* Remove default bullets */
        padding: 0;       /* Remove padding */
        margin: 0;        /* Remove margin */
    }

    .country-info-list li {
        display: flex;           /* Align items horizontally */
        align-items: center;     /* Center items vertically */
        margin-bottom: 10px;     /* Add space between items */
        padding: 10px;           /* Add padding */
        border: 1px solid #ccc;  /* Add a light border */
        border-radius: 5px;      /* Add rounded corners */
        background-color: #f9f9f9; /* Light background */
    }

    .country-info-list li i {
        font-size: 1.2em; /* Icon size */
        margin-right: 10px; /* Space between icon and text */
        color: #555;       /* Icon color */
    }

    .country-info-list li span {
        font-weight: bold; /* Highlight labels */
        margin-right: 5px; /* Space between label and value */
    }

    .country-info-list .text-success {
        color: green; /* Success icons */
    }

    .country-info-list .text-danger {
        color: red; /* Error icons */
    }

/* Container styling */
.tour-content-box {
    padding: 20px;
    background-color: #f9f9f9; /* Light background */
    border: 1px solid #ddd; /* Light border */
    border-radius: 8px; /* Rounded corners */
    margin-top: 20px; /* Spacing from other elements */
}

/* Single tour box styling */
.tour-single-box {
    background-color: #ffffff; /* White background */
    border: 1px solid #ddd; /* Border for individual boxes */
    border-radius: 8px; /* Rounded corners */
    padding: 15px 20px; /* Padding inside each box */
    margin-bottom: 20px; /* Space between tour boxes */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

/* Number circle */
.tour-single-box span {
    display: inline-block;
    background-color: #007bff; /* Primary color */
    color: #ffffff; /* Text color */
    font-size: 1.2em;
    font-weight: bold;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 50%; /* Circle shape */
    margin-bottom: 10px; /* Space below the number */
}

/* Title styling */
.tour-single-box h4 {
    font-size: 1.2em;
    font-weight: bold;
    color: #555; /* Darker text color */
    margin-bottom: 8px; /* Space below */
}

/* Itinerary title */
.tour-single-box h3 {
    font-size: 1.4em;
    font-weight: bold;
    color: #333; /* Primary text color */
    margin-bottom: 10px; /* Space below */
}

/* Description styling */
.tour-single-box p {
    font-size: 1em;
    line-height: 1.6;
    color: #666; /* Muted text color */
    margin: 0; /* Remove default margins */
}
.site-breadcrumb {
    background: none !important;  /* Ensure the background image is removed */
    margin-bottom: -11%;
}
@media (max-width: 767px) {
    .site-breadcrumb {
    background: none !important;  /* Ensure the background image is removed */
    margin-bottom: -26%;
}
}

/* Tablet-specific adjustments */
@media (max-width: 1024px) and (min-width: 768px) {
    .site-breadcrumb {
    background: none !important;  /* Ensure the background image is removed */
    margin-bottom: -26%;
}
}

</style>
<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php"); 


if (isset($_GET['packageID'])) {
    // Retrieve the country_id value
    $posted_package_id = $_GET['packageID'];

}


// Initialize package variables with default values
$package_name = "NO data available for now";
$package_introduction = "NO data available for now";
$package_description = "NO data available for now";
$package_from_date = "NO data available for now";
$package_to_date = "NO data available for now";
$package_price = "NO data available for now";
$package_travel_type = "NO data available for now";
$package_country = "NO data available for now";
$package_type = "NO data available for now";
$package_number_of_person = "NO data available for now";
$package_status = "NO data available for now";
$package_days_and_nights = "NO data available for now";
$package_image = "NO data available for now";

                $sql3 = "SELECT * FROM packages,countries where countries.country_id=packages.package_country 
 and package_status='1' and packages.package_id='$posted_package_id'";
 $result3 = $conn->query($sql3);
 while ($row3 = $result3->fetch_assoc()) {
    $package_name = htmlentities($row3['package_name']);
    $package_introduction = htmlentities($row3['package_introduction']);
    $package_description = htmlentities($row3['package_description']);
    $package_from_date = $row3['package_from_date'];
    $package_to_date = $row3['package_to_date'];
    $package_price = $row3['package_price'];
    $package_price = str_replace(',', '', $package_price);
    // Convert to a float to ensure it's a proper numeric value
$package_price = (float)$package_price;
    $package_travel_type = $row3['package_travel_type'];
    $package_country = $row3['country_name'];
    $package_type = $row3['package_type'];

    $package_number_of_person = $row3['package_number_of_person'];
    $package_status = $row3['package_status'];

    $package_days_and_nights = $row3['package_days_and_nights'];
    $package_image =  "assets/img/uploads/packages/".$row3['package_image'];

 }

 $con = $dbh; 
$discount_query = "SELECT DiscountValue FROM PackageDiscounts WHERE DiscountPackageID = ? AND DiscountStatus = 1";
$stmt = $conn->prepare($discount_query);
$stmt->bind_param("i", $posted_package_id);
$stmt->execute();
$discount_result = $stmt->get_result();

$discounted_price = $package_price; // Default to original price
if ($discount_result->num_rows > 0) {
    $discount_row = $discount_result->fetch_assoc();
    $discount_value = $discount_row['DiscountValue'];
    $discounted_price = $package_price - ($package_price * $discount_value / 100);
}
    ?> 


<body class="home">

    <div id="page" class="full-page">
        <header id="masthead" class="site-header header-primary">
           <?php   include("header.php"); ?>
        </header>


        <?php
    // Fetch the image path from the database
$sql = "SELECT package_image FROM packages WHERE package_id = $posted_package_id";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch the image path from the result
    $row = $result->fetch_assoc();
    $imagePath1 = "assets/img/uploads/packages/".$row['package_image'];

}?>
    <?php
    $imagePath = "assets/img/uploads/destination/rwanda2.jpeg";

    // Use the image path in your HTML
    echo '<div class="site-breadcrumb" style="background: url(' . $imagePath . ')">';

    // Handle the case where no image is found
    echo '<div class="site-breadcrumb" style="background: url(default_image.jpg)">';

    ?>

    </div>

    </div>




    <main id="content" class="site-main">
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
            <div class="inner-baner-container" style="background-image: url('<?php echo $imagePath1; ?>');">
                    <div class="container">
                        <div class="inner-banner-content">
                            <h1 class="inner-title">Package Details</h1>
                        </div>
                    </div>
                </div>
                <div class="inner-shape"></div>
            </section>
            <!-- Inner Banner html end-->
            <div class="single-tour-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="single-tour-inner">
                                <h2 style="text-transform: uppercase;"><?php  echo $package_name;  ?></h2>
                                <figure class="feature-image">
                                    <img src="assets/images/img27.jpg" alt="">
                                    <div class="package-meta text-center">
                                        <ul>
                                            <li>
                                                <i class="far fa-clock"></i> Days / Nights :<?php  echo $package_days_and_nights;  ?>
                                            </li>
                                            <li>
                                                <i class="fas fa-user-friends"></i> People: <?php  echo $package_number_of_person;  ?>
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marked-alt"></i> <?php  echo $package_country;  ?>
                                            </li>
                                        </ul>
                                    </div>
                                </figure>
                                <div class="tab-container">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Tour Overview</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Tour Plan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">Included And Excluded</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
                                        </li> -->
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                            <div class="overview-content" style="white-space: pre-wrap;">
                                                <p class="mt-20" style="margin-top: -14%; padding-top: 0;">
                                                    <?php echo $package_description; ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="program" role="tabpanel" aria-labelledby="program-tab">
                                            <div class="itinerary-content">
                                               
                                    
<?php
// Initialize variables with default values
$inclusive_depature_location = "NO data available for now";
$inclusive_return_location = "NO data available for now";
$inclusive_depature_time = "NO data available for now";
$inclusive_bed_room = "NO data available for now";
$inclusive_hotel = "NO data available for now";
$inclusive_air_fares = "NO data available for now";
$inclusive_entrance_fees = "NO data available for now";
$inclusive_tour_guide = "NO data available for now";
$inclusive_insurance = "NO data available for now";
$inclusive_tour_plan = "NO data available for now";
$inclusive_food_and_drinks = "NO data available for now";
$inclusive_additional_service = "NO data available for now";

                        $sql33 = "SELECT * FROM package_inclusive,packages where package_inclusive.package_id=packages.package_id
 and package_status='1' and package_inclusive.package_id='$posted_package_id'";
 $result33 = $conn->query($sql33);
 while ($row33 = $result33->fetch_assoc()) {
    $inclusive_depature_location = $row33['departure_location'];
    $inclusive_return_location = $row33['return_location'];
    $inclusive_depature_time = $row33['departure_time'];
    $inclusive_bed_room = $row33['bed_room'];
    $inclusive_hotel = $row33['hotel'];
    $inclusive_air_fares = $row33['air_fares'];
    $inclusive_entrance_fees = $row33['entrance_fees'];
    $inclusive_tour_guide = $row33['tour_guide'];
    $inclusive_insurance = $row33['insurance'];
    $inclusive_tour_plan = $row33['tour_plan'];
    $inclusive_food_and_drinks = $row33['food_and_drinks'];
    $inclusive_additional_service = $row33['additional_service'];
  

 }
    ?> 




<div class="destination-country-info">
                            <h3>Included And Excluded</h3>
                          
                            <ul class="country-info-list clearfix">
    <li>
        <i class="fas fa-plane-departure"></i>
        <span>Departure Location:</span> <?php echo $inclusive_depature_location; ?>
    </li>
    <li>
        <i class="fas fa-plane-departure"></i>
        <span>Return Location:</span> <?php echo $inclusive_return_location; ?>
    </li>
    <li>
        <i class="fas fa-clock"></i>
        <span>Departure Time:</span> <?php echo $inclusive_depature_time; ?>
    </li>
    <li style="display: none;">
        <i class="fas fa-bed"></i>
        <span>Bedroom:</span> <?php echo $inclusive_bed_room; ?>
    </li>
    <li>
        <i class="<?php echo $inclusive_air_fares === 'Yes' ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger'; ?>"></i>
        <span>Air Fares:</span> <?php echo $inclusive_air_fares; ?>
    </li>
    <li>
        <i class="<?php echo $inclusive_hotel === 'Yes' ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger'; ?>"></i>
        <span>Hotel / BnB / Private Houses:</span> <?php echo $inclusive_hotel; ?>
    </li>
    <li>
        <i class="<?php echo $inclusive_entrance_fees === 'Yes' ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger'; ?>"></i>
        <span>Entrance Fees:</span> <?php echo $inclusive_entrance_fees; ?>
    </li>
    <li>
        <i class="<?php echo $inclusive_tour_guide === 'Yes' ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger'; ?>"></i>
        <span>Tour Guide:</span> <?php echo $inclusive_tour_guide; ?>
    </li>
    <li>
        <i class="<?php echo $inclusive_insurance === 'Yes' ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger'; ?>"></i>
        <span>Insurance:</span> <?php echo $inclusive_insurance; ?>
    </li>
    <li>
        <i class="<?php echo $inclusive_food_and_drinks === 'Yes' ? 'fas fa-check-circle text-success' : 'fas fa-times-circle text-danger'; ?>"></i>
        <span>Food & Drinks:</span> <?php echo $inclusive_food_and_drinks; ?>
    </li>
</ul>

                        </div>




                                            </div>
                                          
                                        </div>
                                        <div class="tab-pane" id="review" role="tabpanel" aria-labelledby="review-tab">
                                          


                                        <p class="mt-10">
                            <?php  echo $inclusive_tour_plan;   ?>
                            </p>


                            <div class="tour-content-box">


<?php

$no=0;
$itinerary_title = "NO data available for now";
$itinerary_day_time_plan = "NO data available for now";
$itinerary_day_full_description = "NO data available for now";
$itinerary_image = "No Image Available";
$sql33a = "SELECT * FROM itineraries,packages where itineraries.package_id=packages.package_id
and package_status='1' and itineraries.package_id='$posted_package_id'";
$result33a = $conn->query($sql33a);
while ($row33a = $result33a->fetch_assoc()) {
$itinerary_title= $row33a['title'];
$itinerary_day_time_plan= $row33a['day_time_plan'];
$itinerary_day_full_description= $row33a['day_full_description'];
$itinerary_image = $row33a['itinerariesImage'];

$no=$no+1;

?>

<div class="tour-single-box" style="border: 1px solid #ddd; padding: 15px; margin: 10px 0; border-radius: 8px; overflow: hidden;">
    <div style="display: flex; align-items: center; gap: 15px;">
        <div style="flex-shrink: 0; width: 150px; height: 150px; overflow: hidden; border-radius: 8px;">
            <img src="dashboard/<?= htmlspecialchars($itinerary_image) ?>" alt="No Image Available" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="flex: 1;">
            <span style="display: block; font-size: 1.2em; font-weight: bold; color: #555;"><?= htmlspecialchars($no) ?></span>
            <h4 style="margin: 5px 0; font-size: 1.5em; color: #333;"><?= htmlspecialchars($itinerary_day_time_plan) ?></h4>
            <h3 style="margin: 5px 0; font-size: 1.3em; color: #666;"><?= htmlspecialchars($itinerary_title) ?></h3>
            <p style="font-size: 1em; color: #777;"><?= htmlspecialchars($itinerary_day_full_description) ?></p>
        </div>
    </div>
</div>


<?php

}
?> 

 







                                            </div>
                                            <!-- review comment html -->
                                            
                                        </div>
                                      
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar">
                            <div class="package-price">
                                <?php if ($discounted_price < $package_price): ?>
                                    <h4>
                                        <span style="text-decoration: line-through; color: #3a53a3;"><small>&nbsp;<?php echo number_format($package_price, 2); ?></small></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span> $<?php echo number_format($discounted_price, 2); ?> </span> / per person
                                    
                                <?php else: ?>
                                    <h6>
                                        <span>$ <big><?php echo number_format($package_price, 2); ?></big></span> / per person
                                    </h6>
                                <?php endif; ?></h4>
                            </div>

                                <div class="widget-bg booking-form-wrap">
                                    <h4 class="bg-title">Booking</h4>
                                    <form class="booking-form" action="book_package.php" method="POST">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="booking_package" value="<?php  echo $package_name;  ?>" type="text"  readonly>
                                                     <input name="package_id" value="<?php  echo $posted_package_id;  ?>" type="hidden"  readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="name_booking" type="text" placeholder="Full Name" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="email_booking" type="email" placeholder="Email" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="phone_booking" type="text" placeholder="Phone Number" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
    <div class="form-group">
        <textarea name="comment" rows="4" placeholder="Any Comment?" style="width: 100%; padding:
         10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em; resize: vertical;" required></textarea>
    </div>
</div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input class="input-date-picker" type="text" name="s" autocomplete="off"
                                                     readonly="readonly" placeholder="Date" required>
                                                </div>
                                            </div>

                                            
                                           
                                          
                                            <div class="col-sm-12">
                                                <div class="form-group submit-btn">
                                                    <input type="submit" name="submit" value="Boook Now">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                              
                                <div class="travel-package-content text-center" style="background-image: url(<?php  echo $imagePath1; ?>);">
                                   
                                    <h3>OTHER  PACKAGES</h3>
                                    <p>Explore more Recent Added Packages</p>
                                    <ul>


                                    <?php
                                     $sql3r = "SELECT * FROM packages, countries 
                                     WHERE countries.country_id = packages.package_country 
                                     AND package_status = '1' 
                                     AND package_id != '$posted_package_id' 
                                     ORDER BY package_id DESC 
                                     LIMIT 4";
                           
                                       $result3r = $conn->query($sql3r);
                                       while ($row3r = $result3r->fetch_assoc()) {
                                          $package_namer = htmlentities($row3r['package_name']);
                                          $package_id2=$row3r['package_id'];
                                    

                                          ?>
                                        <li>
                                            <a href="itinerary.php?packageID=<?php  echo $package_id2; ?>"><i class="far fa-arrow-alt-circle-right"></i><?php  echo $package_namer  ?> </a>
                                        </li>
                                        
                                       <?php
                                       }

                                       ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- subscribe section html start -->


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
