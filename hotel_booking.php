<!DOCTYPE html>
<html lang="zxx">

<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php"); 


?>
    <head>
        <!--====== Required meta tags ======-->
   
    <!--Bootstrap -->
    <link rel="stylesheet" href="assets2/css/bootstrap.min.css" type="text/css">
    <!--OWL Carousel slider-->
    <link rel="stylesheet" href="assets2/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets2/css/owl.transitions.css" type="text/css">
    <!--slick-slider -->
    <link href="assets2/css/slick.css" rel="stylesheet">
    <!--bootstrap-slider -->
    <link href="assets2/css/bootstrap-slider.min.css" rel="stylesheet">
    <!--FontAwesome Font Style -->
    <link href="assets2/css/font-awesome.min.css" rel="stylesheet">
        <!--====== Favicon Icon ======-->

        <!--====== Google Fonts ======-->
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!--====== Flaticon css ======-->
        <link rel="stylesheet" href="assets2/fonts/flaticon/flaticon_gowilds.css">
        <!--====== FontAwesome css ======-->
        <link rel="stylesheet" href="assets2/fonts/fontawesome/css/all.min.css">
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="assets2/vendor/bootstrap/css/bootstrap.min.css">
        <!--====== magnific-popup css ======-->
        <link rel="stylesheet" href="assets2/vendor/magnific-popup/dist/magnific-popup.css">
        <!--====== Slick-popup css ======-->
        <link rel="stylesheet" href="assets2/vendor/slick/slick.css">
        <!--====== Jquery UI css ======-->
        <link rel="stylesheet" href="assets2/vendor/jquery-ui/jquery-ui.min.css">
        <!--====== Nice Select css ======-->
        <link rel="stylesheet" href="assets2/vendor/nice-select/css/nice-select.css">
        <!--====== Animate css ======-->
        <link rel="stylesheet" href="assets2/vendor/animate.css">
        <!--====== Default css ======-->
        <link rel="stylesheet" href="assets2/css/default.css">
        
        <!--====== Style css ======-->
        <link rel="stylesheet" href="assets2/css/style.css">
    </head>
    <body>
        <!--====== Start Preloader ======-->
        
        <!--====== Search From ======-->
	
        
   <style>
            @media (max-width: 1199px) {
    .header-three .header-navigation .primary-menu {
    background-color:#1764bd;
    }
}

.floating-button {
  position: fixed;
  bottom: 28px;
  right: 90px;
  background-color: #16BE45;
  color: white;
  border: none;
  border-radius:10px;
  padding: 10px;
  font-size: 20px;
  cursor: pointer;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
  z-index: 9999;
}

/* Hover effect */
.floating-button:hover {
  background-color: #13a63b;
}

/* Icon inside the button */
.floating-button i {
  font-size: 24px;
}

/* Style for the contact form (updated to match the image look) */
.contact-form {
  position: fixed;
  bottom: 10px; /* Position it 20px from the bottom */
  right: 20px; /* Position it 20px from the left */
  width: 400px;
  height: 350px; /* Set the height to 300px */
  background-color: white;
  padding: 10px; /* Adjust padding to fit content */
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
  display: none;
  z-index: 9998;
  text-align: center;
  overflow: auto; /* Handle overflow content */
}


/* Form title styling */
.contact-form h2 {
  font-size: 1.6em;
  color: #6414e9;
  margin-bottom: 1em;
  font-family: 'Poppins', sans-serif;
}

/* Input and textarea styling */
.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form textarea {
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 1em;
  font-family: 'Poppins', sans-serif;
}

/* Input focus styling */
.contact-form input[type="text"]:focus,
.contact-form input[type="email"]:focus,
.contact-form textarea:focus {
  border-color: #6414e9;
  outline: none;
}

/* Submit button styling */
.contact-form button[type="submit"] {
  background-color: #6414e9;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  cursor: pointer;
  margin-top: 15px;
  width: 100%;
  font-family: 'Poppins', sans-serif;
}

/* Submit button hover effect */
.contact-form button[type="submit"]:hover {
  background-color: #5b0dcc;
}

/* Close button for the form */
.contact-form .close-btn {
  background-color: #262fa6;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  cursor: pointer;
  margin-top: 15px;
  width: 100%;
  font-family: 'Poppins', sans-serif;
}

/* Close button hover effect */
.contact-form .close-btn:hover {
  background-color: #e94b4b;
}



  </style>


<div id="page" class="full-page">
        <header id="masthead" class="site-header header-primary">
           <?php   include("header.php"); ?>
        </header>
    <?php
    $imagePath = "assets/img/uploads/destination/rwanda2.jpeg";

    // // Use the image path in your HTML
    // echo '<div class="site-breadcrumb" style="background: url(' . $imagePath . ')">';

    // // Handle the case where no image is found
    // echo '<div class="site-breadcrumb" style="background: url(default_image.jpg)">';

    ?>

    </div>

 

        <section class="hero-section">
            <!--=== Hero Wrapper ===-->
            <div class="hero-wrapper-two">
                <!--=== Hero Slider ===-->
                <div class="hero-slider-two">
                    <!--=== Single Slider ===-->


                    <?php

 
// Fetch data from the car_rental_slider table
$query = "SELECT hotel_booking_slider_id, hotel_booking_slider_description, hotel_booking_slider_image FROM hotel_booking_slider";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve individual fields
        $sliderDescription = $row['hotel_booking_slider_description'];
        $sliderImage = 'uploads/hotel_booking_slider/' . $row['hotel_booking_slider_image'];
        
        // Generate the HTML dynamically
        echo '
        <div class="single-slider">
            <div class="image-layer bg_cover" style="background-image: url(' . $sliderImage . ');"></div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-11">
                        <!--=== Hero Content ===-->
                        <div class="hero-content text-white text-center">
                            <h1 data-animation="fadeInDown" data-delay=".2s">' . htmlspecialchars($sliderDescription) . '</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo '<p>No slider content available.</p>';
}
?>



                 
                    
                </div>
            </div>
        </section><!--====== End Hero Section ======-->
        <!--====== Start Booking Section ======-->
        <section class="booking-form-section">
            <div class="text-center container-fluid">
                <div class="text-center booking-form-wrapper">
                <form action="hotel_room_search.php" method="get" class="text-center booking-form-two">
    <div class="form_group">
        <p class="text-center booking-btn"><i class="fa fa-filter" aria-hidden="true"></i>  Find Hotel Rooms</p>
    </div>
    <div class="form_group">
        <select class="wide"  name="room_type_post"  >
    <option>Select Room Type</option>
    <option value="Single Room">Single Room</option>
    <option value="Double Room">Double Room</option>
    <option value="Twin Room">Twin Room</option>
    <option value="Triple Room">Triple Room</option>
    <option value="Quad Room">Quad Room</option>
    <option value="Family Room">Family Room</option>
    <option value="Suite">Suite</option>
    <option value="Deluxe Room">Deluxe Room</option>
    <option value="Junior Suite">Junior Suite</option>
    <option value="Presidential Suite">Presidential Suite</option>
    <option value="Penthouse Suite">Penthouse Suite</option>
    <option value="King Room">King Room</option>
    <option value="Queen Room">Queen Room</option>
    <option value="Twin-Bed Room">Twin-Bed Room</option>
    <option value="Bunk Bed Room">Bunk Bed Room</option>
    <option value="Executive Room">Executive Room</option>
    <option value="Business Room">Business Room</option>
    <option value="Conference Room">Conference Room</option>
    <option value="Honeymoon Suite">Honeymoon Suite</option>
    <option value="Bridal Suite">Bridal Suite</option>
    <option value="Themed Room">Themed Room</option>
    <option value="Studio">Studio</option>
    <option value="Apartment">Apartment</option>
    <option value="Villa">Villa</option>
    <option value="Cottage">Cottage</option>
    <option value="Bungalow">Bungalow</option>
    <option value="Accessible Room">Accessible Room</option>
    
    <option value="Superior Room">Superior Room</option>
    <option value="Standard Room">Standard Room</option>
</select>

        </select>
    </div>
    <div class="form_group">
        <select class="wide" name="hotel_star_rating_post">
            <option>Select Hotel Star Rating</option>
    <option value="1">1 Star</option>
    <option value="2">2 Stars</option>
    <option value="3">3 Stars</option>
    <option value="4">4 Stars</option>
    <option value="5">5 Stars</option>
        </select>
    </div>
    <div class="form_group">
        <button class="booking-btn"> Filter Rooms <i class="far fa-angle-double-right"></i></button>
    </div>
</form>

                </div>
            </div>
        </section><!--====== End Booking Section ======-->
       

        <section class="places-section pb-100">
            <div class="container">
                <br>
                <div class="row justify-content-center">
                        <div class="about-content-box text-center mb-2 wow fadeInDown">
                            <div class="section-title mb-30">
                                
                                <h2 >Ckeckout Available Rooms</h2>
                                
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
    echo '<p>No Rooms available for Booking.</p>';
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

        
        <?php include("footer.php"); ?>
        <!--====== Start Footer ======-->
<footer class="main-footer black-bg pt-20">
    
        </footer><!--====== End Footer ======-->


 
  <!-- Include EmailJS SDK -->


        <!--====== Jquery js ======-->
        <script src="assets2/vendor/jquery-3.6.0.min.js"></script>
        <!--====== Bootstrap js ======-->
        <script src="assets2/vendor/popper/popper.min.js"></script>
        <!--====== Bootstrap js ======-->
        <script src="assets2/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--====== Slick js ======-->
        <script src="assets2/vendor/slick/slick.min.js"></script>
        <!--====== Magnific js ======-->
        <script src="assets2/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
        <!--====== Counterup js ======-->
        <script src="assets2/vendor/jquery.counterup.min.js"></script>
        <!--====== Waypoints js ======-->
        <script src="assets2/vendor/jquery.waypoints.js"></script>
        <!--====== Nice-select js ======-->
        <script src="assets2/vendor/nice-select/js/jquery.nice-select.min.js"></script>
        <!--====== jquery UI js ======-->
        <script src="assets2/vendor/jquery-ui/jquery-ui.min.js"></script>
        <!--====== WOW js ======-->
        <script src="assets2/vendor/wow.min.js"></script>
        <!--====== Main js ======-->
        <script src="assets2/js/theme.js"></script>
    </body>
</html>