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
    .header-btn{
        width: 17%;
        font-size: 12px;
    }
    a{
        font-size: 14px;
    }
    .button-primary{
        width: 108%;
        text-align: left;
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
$query = "SELECT car_rental_slider_id, car_rental_slider_description, car_rental_slider_image FROM car_rental_slider";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve individual fields
        $sliderDescription = $row['car_rental_slider_description'];
        $sliderImage = 'uploads/car_rental_slider/' . $row['car_rental_slider_image'];
        
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
                <form action="car_rental_search.php" method="get" class="text-center booking-form-two">
    <div class="form_group">
        <p class="text-center booking-btn"><i class="fa fa-filter" aria-hidden="true"></i>  Find Your Car </p>
    </div>
    <div class="form_group">
        <select class="wide" name="brand">
            <option>Select Brand</option>
            <option value="Maruti">Maruti</option>
            <option value="BMW">BMW</option>
            <option value="Audi">Audi</option>
            <option value="Nissan">Nissan</option>
            <option value="Toyota">Toyota</option>
            <option value="Volkswagon">Volkswagon</option>
            <option value="Mercedes benz">Mercedes benz</option>
        </select>
    </div>
    <div class="form_group">
        <select class="wide" name="fueltype">
            <option>Select Fuel Type</option>
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option> 
        </select>
    </div>
    <div class="form_group">
        <button class="booking-btn">Search Car <i class="far fa-angle-double-right"></i></button>
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
                                
                                <h2 >Explore Cars</h2>
                                
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