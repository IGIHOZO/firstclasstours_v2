<?php include("dashboard/includes/config.php");   ?>
<!doctype html>
<html lang="en">

<head>
  <?php   include("head.php");  ?>
</head>

<body class="home">

    <div id="page" class="full-page">
        <header id="masthead" class="site-header header-primary">
           <?php   include("header.php"); ?>
        </header>





   

        <main id="content" class="site-main">
            <!-- Home slider html start -->
            <section class="home-slider-section">
                <div class="home-slider">

                                        
        <?php
                $sql2a = "SELECT * FROM homepage_slider order by slider_id DESC";
 $result2a = $conn->query($sql2a);
 while ($row2a = $result2a->fetch_assoc()) {
    $slider_title = $row2a['slider_title'];
    $slider_description = $row2a['slider_description'];

 
    $slider_image =  "assets/img/uploads/slider/".$row2a['slider_image'];


    ?>


                    <div class="home-banner-items">
                        <div class="banner-inner-wrap" style="background-image: url('<?php echo $slider_image; ?>');"></div>
                        <div class="banner-content-wrap">
                            <div class="container">
                                <div class="banner-content text-center">
                                    <h2 class="banner-title"><?php  echo $slider_title;   ?></h2>
                                    <p><?php  echo $slider_description;   ?>.</p>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="overlay"></div>
                    </div>

<?php

 }
 ?>


                 
                </div>
            </section>
            <!-- slider html start -->
            <!-- Home search field html start -->
            <form action="inquiry.php" method="post" style="display:none;">
            <div class="trip-search-section shape-search-section">
                <div class="slider-shape"></div>
                <div class="container">
                    <div class="trip-search-inner white-bg d-flex">
                    <div class="input-group">
    <label>Comment</label>
    <textarea name="s" placeholder="Enter Your Inquiry"></textarea>
</div>

                        <div class="input-group">
                            <label> Phone Number* </label>
                            <input type="text" name="" placeholder="Phone Number">
                        </div>
                        <div class="input-group width-col-3">
                            <label> Email </label>
                           
                            <input  type="text" name="email" placeholder="Enter Your email" >
                        </div>
                        <div class="input-group width-col-3">
                            <label> Number of Person </label>
                          
                            <input  type="text" name="s" placeholder="Number of Person">
                        </div>
                        <div class="input-group width-col-3">
                            <label class="screen-reader-text"> Submit Your Inquity </label>
                            <input type="submit" name="travel-search" value="SUBMIT YOUR INQUIRY ">
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- search search field html end -->
            <section class="destination-section">
            <div class="container">
            <div class="section-heading">

            <center><h2>WELCOME MESSAGE</h2></center>
            <?php

// Fetch the welcome content from the database
$query = "SELECT * FROM welcome_content ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$welcomeMessage = "";
$welcomeImage = "";

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $welcomeMessage = nl2br(htmlspecialchars($row['welcome_message'])); // Convert newlines to <br> for proper rendering
    $welcomeImage = htmlspecialchars($row['welcome_image']);
} else {
    // Default content if no data is found
    $welcomeMessage = "";
    $welcomeImage = "";
}
?>

<div class="row align-items-end">
    <div class="col-lg-7">
        <span><?= $welcomeMessage ?></span>
    </div>
    <div class="col-lg-5">
        <div class="section-disc">
            <img src="<?= $welcomeImage ?>" alt="Welcome Image" style="max-width: 100%; height: auto;">
        </div>
    </div>
</div>

                    </div>

</div>
</section>




 <!-- Home packages section html start -->
 <section class="package-section">
                <div class="container">
                    <div class="section-heading text-center">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                              
                                <h2>RECENT POPULAR PACKAGES</h2>
                                <p><?php  echo $company_moto;  ?></p>
                            </div>
                        </div>
                    </div>



                    <div class="package-inner">
                        <div class="row">


                        <?php
                $sql3 = "SELECT * FROM packages,countries where countries.country_id=packages.package_country 
 and package_status='1' order by package_id DESC limit 9";
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
            <!-- packages html end -->


            <section class="destination-section">
                <div class="container">
                    <div class="section-heading">
                        <div class="row align-items-end">
                            <div class="col-lg-7">
                   
                                <h2>TOP NOTCH DESTINATIONS</h2>
                            </div>
                            <div class="col-lg-5">
                                <div class="section-disc">
                                   <?php  echo $slider_description;  ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="destination-inner destination-three-column">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="row">

                                <?php
                $sql3a = "SELECT * FROM destination,countries where countries.country_id=destination.category order by destination_id desc limit 2";
 $result3a = $conn->query($sql3a);
 while ($row3a = $result3a->fetch_assoc()) {
    $destination_name = $row3a['name'];
    $country_name = $row3a['country_name'];
    $description=$row3a['description'];
    $country_id=$row3a['country_id'];
 
    $destination_image =  "assets/img/uploads/destination/".$row3a['image'];


    ?>
    <a href="country.php?country_id=<?php  echo $country_id;  ?>">

                                 




                                    <div class="col-md-6 col-xl-12">
                                        <div class="desti-item overlay-desti-item">
                                            <figure class="desti-image">
                                                <img src="<?php echo $destination_image; ?>" alt="">
                                            </figure>
                                            <div class="meta-cat bg-meta-cat">
                                            <a href="country.php?country_id=<?php  echo $country_id;  ?>">
                                               <?php  echo $destination_name;   ?>
 </a>
                                            </div>
                                            <div class="desti-content">
                                                <h3>
                                                    <?php  echo $description;   ?>
                                                </h3>
                                             
                                            </div>
                                        </div>
                                    </div>

                                    </a>        
                                    <?php  } ?>
                              
                                




                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">




                                <?php
                $sql3a = "SELECT * FROM destination,countries where countries.country_id=destination.category
                 order by destination_id desc limit 2 OFFSET 2";
 $result3a = $conn->query($sql3a);
 while ($row3a = $result3a->fetch_assoc()) {
    $destination_name = $row3a['name'];
    $country_name = $row3a['country_name'];
    $description=$row3a['description'];
    $country_id=$row3a['country_id'];
 
    $destination_image =  "assets/img/uploads/destination/".$row3a['image'];


    ?>
    <a href="country.php?country_id=<?php  echo $country_id;  ?>">



                                    <div class="col-md-6 col-xl-12">
                                        <div class="desti-item overlay-desti-item">
                                            <figure class="desti-image">
                                                <img src="<?php echo $destination_image; ?>" alt="">
                                            </figure>
                                            <div class="meta-cat bg-meta-cat">
                                            <a href="country.php?country_id=<?php  echo $country_id;  ?>">
                                            <?php  echo $destination_name;   ?>
                                            <a>
                                            </div>
                                            <div class="desti-content">
                                                <h3>
                                                   <?php  echo $description;   ?>
                                                </h3>
                                             
                                            </div>
                                        </div>
                                    </div>

                                      </a>        
                                    <?php  } ?>
                                    
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
            </section>




           
            <!-- Home callback section html start -->
            <section class="callback-section">
                <div class="container">
                    <div class="row no-gutters align-items-center">

                    <?php
                $sql2aa = "SELECT * FROM homepage_video";
 $result2aa = $conn->query($sql2aa);
 while ($row2aa = $result2aa->fetch_assoc()) {
    $embended_code = $row2aa['embended_code'];
   

 


    ?>

                        <div class="col-lg-5">
                        
                                
                                <?php echo $embended_code;     ?>
                         
                        </div>

<?php


 }
 ?>


                        <div class="col-lg-7">
                            <div class="callback-inner">
                                <div class="section-heading section-heading-white">
                               
                                    <h2><?php  echo $company_name;  ?>. DISCOVER. REMEMBER US!!</h2>
                                    <p><?php  echo $company_moto;  ?>.</p>
                                </div>
                                <div class="callback-counter-wrap">
                                    <div class="counter-item">
                                        <div class="counter-icon">
                                          
                                            <img src="assets/images/icon4.png" alt="">
                                        </div>
                                        <div class="counter-content">
                                            <span class="counter-no">

                                            <?php
// Include the database configuration


// Query to get the count of active tour companies
$query = "SELECT COUNT(*) AS active_tours_count FROM tours_company WHERE active = 1";
$result = $conn->query($query);

// Fetch the result
if ($result) {
    $row = $result->fetch_assoc();
    $active_tours_count = $row['active_tours_count'];
} else {
    // If the query fails, set the count to 0
    $active_tours_count = 0;
}

?>
                                       <span class="counter"><?php echo $active_tours_count; ?></span>+
                                            </span>
                                            <span class="counter-text">
                                       Affliated Tour Companies
                                    </span>
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="counter-icon">
                                            <img src="assets/images/icon2.png" alt="">
                                        </div>
                                        <div class="counter-content">
                                            <span class="counter-no">


                                            <?php


// Query to get the count of active transport companies
$query = "SELECT COUNT(*) AS active_transport_count FROM transport_companies WHERE active = 1";
$result = $conn->query($query);

// Fetch the result
if ($result) {
    $row = $result->fetch_assoc();
    $active_transport_count = $row['active_transport_count'];
} else {
    // If the query fails, set the count to 0
    $active_transport_count = 0;
}


?>


                                       <span class="counter"> <?php echo $active_transport_count; ?></span>+
                                            </span>
                                            <span class="counter-text">
                                       Registered Transport Companies
                                    </span>
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="counter-icon">
                                            <img src="assets/images/icon4.png" alt="">
                                        </div>
                                        <div class="counter-content">
                                            <span class="counter-no" >

                                            <?php


// Query to get the count of active hotels
$query = "SELECT COUNT(*) AS active_hotels_count FROM hotels WHERE active = 1";
$result = $conn->query($query);

// Fetch the result
if ($result) {
    $row = $result->fetch_assoc();
    $active_hotels_count = $row['active_hotels_count'];
} else {
    // If the query fails, set the count to 0
    $active_hotels_count = 0;
}


?>


                                       <span class="counter"> <?php echo $active_hotels_count; ?></span>+
                                            </span>
                                            <span class="counter-text">
                                       Registered Trustable Hotels
                                    </span>
                                        </div>
                                    </div>
                                    <div class="counter-item">
                                        <div class="counter-icon">
                                            <img src="assets/images/icon1.png" alt="">
                                        </div>
                                        <div class="counter-content">
                                            <span class="counter-no">
                                       <span class="counter">1</span>K+
                                            </span>
                                            <span class="counter-text">
                                       Satisfied Clients
                                    </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="support-area">
                                    <div class="support-icon">
                                        <img src="assets/images/icon5.png" alt="">
                                    </div>
                                    <div class="support-content">
                                        <h4>Our 24/7 Emergency Phone Services</h4>
                                        <h3>
                                            <a href="#">Call: <?php  echo $contact_phone;   ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- callback html end -->
            <!-- Home activity section html start -->
            <section class="activity-section" style="display:none;">
                <div class="container">
                    <div class="section-heading text-center">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                            
                                <h2>AFFLIATED TOURS COMPANIES</h2>
                                <p><?php  echo $company_moto;  ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="activity-inner row">



        
                    <?php


// Query to get active tour companies
$query = "SELECT * FROM tours_company WHERE active = 1";
$result = $conn->query($query);

// Check if query was successful
if ($result->num_rows > 0) {
    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        $company_id = $row['id'];
        $company_name = $row['company_name'];
        $company_logo = $row['company_logo']; // Assuming logo file name is stored in the database
?>
        <!-- HTML to display each company -->
        <div class="col-lg-2 col-md-4 col-sm-6">
            <div class="activity-item">
                <div class="activity-icon">
                    <a href="#">
                        <img src="uploads/tourCompany/<?php echo $company_logo; ?>" alt="Company Logo">
                    </a>
                </div>
                <div class="activity-content">
                    <h4>
                        <a href="#"><?php echo $company_name; ?></a>
                    </h4>
                    <!-- View More Info Button -->
                    <button class="btn btn-info view-more" data-id="<?php echo $company_id; ?>" data-toggle="modal" data-target="#companyModal">View More Info</button>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "<p>No affiliated tour companies found.</p>";
}


?>




<!-- Modal Structure -->
<div class="modal fade" id="companyModal" tabindex="-1" role="dialog" aria-labelledby="companyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyModalLabel">Tour Company Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal content will be dynamically inserted here -->
                <div id="companyDetails">
                    <p>Loading details...</p>
                </div>
            </div>
        </div>
    </div>
</div>



                       
                        
                     
                    </div>
                </div>
            </section>
            <!-- activity html end -->
            <!-- Home special section html start -->
            
           <style>
                
                
                .places-section {
    background-color: #f9f9f9; /* Light gray background */
    padding: 50px 20px;
    border-radius: 8px;
}

.places-section h2 {
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.places-column {
    margin-bottom: 30px;
}

.single-place-item {
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.single-place-item:hover {
    transform: translateY(-5px); /* Hover effect */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.place-img img {
    width: 100%;
    height: 200px;
    object-fit: cover; /* Ensure image covers the area without distortion */
    border-bottom: 2px solid #ddd; /* Adds a subtle divider */
}

.place-content {
    padding: 20px;
    text-align: center;
}

.place-content .title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #007bff; /* Highlighted text color */
}

.place-content .title a {
    text-decoration: none;
    color: inherit;
}

.place-content .price {
    font-size: 1.25rem;
    margin: 10px 0;
    color: #28a745; /* Price in green */
}

.place-content .meta {
    display: flex;
    justify-content: space-around;
    font-size: 0.875rem;
    margin-top: 10px;
    color: #555;
}

.place-content .meta span {
    display: flex;
    align-items: center;
}

.place-content .meta i {
    margin-right: 5px;
    color: #007bff; /* Icon color */
}

.meta a {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    font-weight: 600;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.meta a:hover {
    background-color: #0056b3;
}

.gowilds-pagination {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
}

.gowilds-pagination li {
    margin: 0 5px;
}

.gowilds-pagination li a {
    display: block;
    padding: 10px 15px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.gowilds-pagination li a:hover {
    background-color: #0056b3;
}

                
            </style>

            
            
            
            
        <section class="places-section pb-100">
            <div class="container">
               <h2 > Book Hotels </h2><br>
                <div class="row justify-content-center">
                        <div class="about-content-box text-center mb-2 wow fadeInDown">
                            <div class="section-title mb-30">
                                
                               
                                
                            </div>
                        </div>
                        
                        <?php


// Fetch data from the car_rental table
$query = "SELECT * FROM hotel_rooms,hotels where hotel_rooms.hotel_id=hotels.id order by room_id desc";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve individual fields
        $RoomID = $row['room_id'];
        $room_name = $row['room_name'];
        $room_price = $row['room_price'];
        $RoomImage = 'uploads/hotel_room/' . $row['room_main_image'];
        $room_type = $row['room_type'];
        $room_hotel_star = $row['room_hotel_star'];
        $room_amenities = $row['room_amenities'];

        $hotel_id = $row['hotel_id'];
        $hotel_name = $row['hotel_name'];
       
        
        // Generate the HTML dynamically 
        echo '
        <div class="col-xl-4 col-md-6 col-sm-12 places-column">
            <div class="single-place-item mb-60 wow fadeInUp">
                <div class="place-img">
                    <img src="' . $RoomImage . '" alt="Place Image">
                </div>
                <div class="place-content">
                    <div class="info">
                        <h4 class="title"><a href="hotel_room_details.php?rid=' .  $RoomID . '">' . $room_name . '</a></h4>
                          <h4 class="title"> Hotel: <a href="hotel_room_details.php?rid=' .  $RoomID . '">' . $hotel_name . '</a></h4>
                        <p class="price"><i class="fas fa-usd-circle"></i><span class="currency">$ </span> <strong>' . $room_price . ' Per Day</strong></p>
                        <div class="meta">
                           
                              <span><i class="fa fa-star" style="color: gold;"></i>' . $room_hotel_star . ' Stars </span>
                            <span><i class="fa fa-bed"></i>' . $room_type . '</span>
                
                        </div>
                        <div class="text-center meta">
                            <span><a href="hotel_room_details.php?rid=' .  $RoomID . '">View Room Details<i class="far fa-long-arrow-right"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<p>No Rooms available to book.</p>';
}
?>


    </div>
                                      

                                    

                <div class="row">
                    <div class="col-lg-12">
                        <!--=== Gowilds Pagination ===-->
                        <ul class="gowilds-pagination wow fadeInUp text-center">
                                    
                       <!-- Button here for more -->
                            
                        </ul>
                    </div>
                </div>
                
            </div>
        </section><!--====== End Places Section ======-->
                       


<!-- Hotel Info Modal -->
<div class="modal fade" id="hotelModal" tabindex="-1" role="dialog" aria-labelledby="hotelModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hotelModalLabel">Hotel Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="hotel-details">Loading details...</p>
      </div>
    </div>
  </div>
</div>




                       





                            
                        </div>
                    </div>
                </div>
            </section>
            
            
            
            
            
             

 <section class="places-section pb-100">
            <div class="container">
               <h2 >Explore Cars</h2><br>
                <div class="row justify-content-center">
                        <div class="about-content-box text-center mb-2 wow fadeInDown">
                            <div class="section-title mb-30">
                                
                               
                                
                            </div>
                        </div>
                        


                        <?php


// Fetch data from the car_rental table
$query = "SELECT * FROM car_rental";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve individual fields
        $carID = $row['car_id'];
        $carName = $row['car_name'];
        $carPrice = $row['car_price'];
        $carImage = 'uploads/car_rental/' . $row['car_main_image'];
        $carYear = $row['car_year'];
        $carFuelType = $row['car_fuel_type'];
        $number_of_seat = $row['number_of_seat'];
        
        // Generate the HTML dynamically
        echo '
        <div class="col-xl-4 col-md-6 col-sm-12 places-column">
            <div class="single-place-item mb-60 wow fadeInUp">
                <div class="place-img">
                    <img src="' . $carImage . '" alt="Place Image">
                </div>
                <div class="place-content">
                    <div class="info">
                        <h4 class="title"><a href="car_details.php?vhid=' .  $carID . '">' . $carName . '</a></h4>
                        <p class="price"><i class="fas fa-usd-circle"></i><span class="currency">$ </span> <strong>' . $carPrice . ' Per Day</strong></p>
                        <div class="meta">
                           
                              <span><i class="fa fa-user"></i>' . $number_of_seat . ' Seats </span>
                            <span><i class="fa fa-calendar"></i>' . $carYear . '</span>
                            <span><i class="fa fa-car"></i>' . $carFuelType . '</span>
                        </div>
                        <div class="text-center meta">
                            <span><a href="car_details.php?vhid=' .  $carID . '">View Details<i class="far fa-long-arrow-right"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<p>No cars available for rent.</p>';
}
?>


                
                
                    
                
                  
             
                    
                
                    
                            
                </div>
                                      

                                    

                <div class="row">
                    <div class="col-lg-12">
                        <!--=== Gowilds Pagination ===-->
                        <ul class="gowilds-pagination wow fadeInUp text-center">
                                    
                       <!-- Button here for more -->
                            
                        </ul>
                    </div>
                </div>
                
            </div>
        </section><!--====== End Places Section ======-->
                       
  <!-- PUT car rental HERE -->





           
           
            <!-- Home contact details section html start -->
         
            <!--  contact details html end -->
        </main>
       <?php   include("footer.php"); ?>
       <script>
    // When the "View More Info" button is clicked
    $('.view-more').click(function() {
        var companyId = $(this).data('id');  // Get the company id

        // Send AJAX request to fetch the details
        $.ajax({
            url: 'fetch_company_details.php',  // PHP script to fetch details
            method: 'POST',
            data: { id: companyId },  // Pass the id (not company_id)
            success: function(response) {
                // Insert the response (company details) into the modal
                $('#companyDetails').html(response);
            },
            error: function() {
                $('#companyDetails').html('Error loading details.');
            }
        });
    });
</script>

<script>
// Script to fetch hotel details when "View More Info" button is clicked
$(document).ready(function(){
    $(".view-more").click(function(){
        var hotel_id = $(this).data("id");
        
        $.ajax({
            url: "fetch_hotel_details.php",  // Your PHP file that fetches hotel details
            method: "POST",
            data: { id: hotel_id },
            success: function(response) {
                $("#hotel-details").html(response);  // Fill the modal with the fetched details
            }
        });
    });
});

    </script>


<script>
$(document).on('click', '.view-more', function() {
    var companyId = $(this).data('id'); // Get the company ID
    $.ajax({
        url: 'fetch_transport_company_info.php',  // The file to fetch detailed information
        method: 'POST',
        data: { id: companyId },
        success: function(response) {
            var company = JSON.parse(response); // Assuming the response is in JSON format
            
            // Update the modal content with company details
            $('#ownerName').text(company.owner_name);
            $('#phoneNumber').text(company.phone_number);
            $('#fleetSize').text(company.fleet_size);
            $('#typeOfVehicles').text(company.type_of_vehicles);
            $('#licenseNumber').text(company.licence_number);
            $('#companyAddress').text(company.company_address);
            $('#companyCertificate').text(company.company_certificate);
            
            // Set the company logo (assuming an <img> tag with id="companyLogo" in your modal)
            $('#companyLogo').attr('src', company.company_logo_url); // Update the image source with the company logo URL
        }
    });
});


</script>

</body>

</html>