<!DOCTYPE html>
<html lang="zxx">

<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php"); 
$room_id = $_GET['rid'];

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        </head>
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

 

          <!--====== Start Place Details Section ======-->
          <section class="place-details-section">
        		  
          <?php
// Fetch car details
$query1 = "SELECT * FROM hotel_rooms WHERE room_id='$room_id'";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) > 0) {
    // Fetch car data
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $roomID = $row1['room_id'];
        $roomName = $row1['room_name'];
        $roomPrice = $row1['room_price'];
        
        // Check if the main image exists, otherwise use default
        if (empty($row1['room_main_image']) || !file_exists('uploads/hotel_room/' . $row1['room_main_image'])) {
            $hotel_room_Image = 'path/to/default/image.jpg';  // Default image
        } else {
            $hotel_room_Image = 'uploads/hotel_room/' . $row1['room_main_image'];
        }
        
        $room_type = $row1['room_type'];
        $room_hotel_star = $row1['room_hotel_star'];
        $room_amenities = $row1['room_amenities'];
      
    }
}

// Fetch car rental images
$queryImages = "SELECT hotel_room_other_image FROM hotel_room_images WHERE hotel_room_id='$room_id'";
$resultImages = mysqli_query($conn, $queryImages);

if (mysqli_num_rows($resultImages) > 0) {
    $images = [];
    while ($rowImage = mysqli_fetch_assoc($resultImages)) {
        $images[] = 'uploads/hotel_room_images/' . $rowImage['hotel_room_other_image'];
    }
} else {
    $images = []; // Set empty array if no images
}
?>



                  <!--=== Place Slider ===-->
                  <div class="place-slider-area overflow-hidden wow fadeInUp">
    <div class="place-slider">
        <?php
        // Check if there are no additional images
        if (empty($images)) {
            // If no images are found, display the default image 4 times for the slider
            for ($i = 0; $i < 4; $i++) {
                echo '<div class="place-slider-item">
                          <div class="place-img">
                              <img src="' . $hotel_room_Image . '" alt="Place Image">
                          </div>
                      </div>';
            }
        }

        // Alternate between `place-slider-item` and `place-item` for other images
        $classes = ['place-slider-item', 'place-item'];
        $classIndex = 0; // Start with the first class

        foreach ($images as $image) {
            // Display the image with alternating classes
            echo '<div class="' . $classes[$classIndex] . '">
                      <div class="place-img">
                          <img src="' . $image . '" alt="Place Image">
                      </div>
                  </div>';
            
            // Toggle class index
            $classIndex = ($classIndex + 1) % count($classes);
        }
        ?>
    </div>
</div>




                  <?php


// Fetch data from the hotel_rooms table
$query = "SELECT * FROM hotel_rooms,hotels where hotel_rooms.hotel_id=hotels.id and hotel_rooms.room_id='$room_id' ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve individual fields
        $roomID = $row['room_id'];
        $room_name = $row['room_name'];
        $room_price = $row['room_price'];
        $carImage = 'uploads/hotel_room/' . $row['room_main_image'];
        $room_type = $row['room_type'];
        $room_hotel_star = $row['room_hotel_star'];
        $room_amenities = $row['room_amenities'];
        $hotel_id = $row['hotel_id'];
        $hotel_name = $row['hotel_name'];

        $checkin_policy = $row['checkin_policy'];
        $hotel_amenities = $row['hotel_amenities'];
        $dining_options = $row['dining_options'];
        $accessibility_features = $row['accessibility_features'];
        $star_rating = $row['star_rating'];

        $hotel_address = $row['hotel_address'];
        $owner_name= $row['owner_name'];
        $contact_email = $row['contact_email'];
        $phone_number = $row['phone_number'];
        
 

    }}

        ?>
                  <div class="container">
                      <!--=== Tour Details Wrapper ===-->
                      <div class="tour-details-wrapper pt-80">
                          <!--=== Tour Title Wrapper ===-->
                          <div class="tour-title-wrapper pb-30 wow fadeInUp">
                              <div class="row">
                                  <div class="col-xl-4">
                                      <div class="tour-title mb-20">
                                          <h3 class="title"><?php  echo $room_name;  ?></h3>
                                          
                                          <p><strong><?php  echo $room_hotel_star;  ?> <i class="fa fa-star" style="color: gold;"></i> Stars </strong></p>
                                      </div>
                                  </div>
                                  <div class="col-xl-8">
                                      <div class="tour-widget-info">
                                          <div class="info-box mb-20">
                                              <div class="icon">
                                              <i class="fa fa-dollar-sign"></i>
                                              </div>
                                              <div class="info">
                                                  <h4><span>Price/day</span>$  <?php  echo $room_price;  ?></h4>
                                              </div>
                                          </div>
                                          <div class="info-box mb-20">
                                              <div class="icon">
                                              <i class="fa fa-bed"></i>
                                              </div>
                                              <div class="info">
                                                  <h4><span>&nbsp;Room Type</span>&nbsp;<?php  echo $room_type;  ?></h4>
                                              </div>
                                          </div>
                                          <div class="info-box mb-20">
                                              <div class="icon">
                                              <i class="fa fa-building"></i>
                                              </div>
                                              <div class="info">
                                                  <h4><span>&nbsp;Hotel:</span> &nbsp;<?php  echo $hotel_name;  ?></h4>
                                              </div>
                                          </div>
                                         
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-xl-7">
                                  <div class="description-wrapper mt-30 wow fadeInUp">
                                      <div class="description-tabs mb-10">
                                          <ul class="nav">
                                              <li class="nav-item">
                                                  <a class="nav-link active" data-bs-toggle="tab" href="#descrptions">Hotel Information & Services</a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" data-bs-toggle="tab" href="#information">This Room Amenities </a>
                                              </li>
                                              
                                          </ul>
                                      </div>
                                      <div class="tab-content wow fadeInUp">
                                          <div class="tab-pane fade show active" id="descrptions">
                                              <div class="product-info" >
                                              <h5>Checkin and Checkout Policy</h5>
                                              <div style="white-space: pre-wrap;"><?php echo $checkin_policy; ?></div>
                                               
                                              <h5>Hotel Amenties</h5>
                                              <div style="white-space: pre-wrap;"><?php echo $hotel_amenities; ?></div>
                                              
                                              <h5>Accessibility Features</h5>
                                              <div style="white-space: pre-wrap;"><?php echo $accessibility_features; ?></div>
                                                 

                                              <h5>Dining Options</h5>
                                              <div style="white-space: pre-wrap;"><?php echo $dining_options; ?></div>
                                                 
                                              <h5>Hotel Star Rating</h5>
                                              <div style="white-space: pre-wrap;"><?php echo $star_rating; ?> <i class="fa fa-star" style="color: gold;"></i> Stars </div>
                                                 

                                              </div>
                                              
                                          </div>
                                          
                                          <div class="tab-pane fade" id="information">
                                              <div class="content-box">
                                              <table class="table">
                        <thead>
                          <tr>
                            <h2><?php  echo $room_name;  ?> Room Amentis</h2>
                          </tr>
                        </thead>


                        <?php  echo $room_amenities;  ?> 
                        
                        <tbody>

                        
                            
                        </tbody>
                      </table>
                                              </div>
                                          </div>
                                          <div class="tab-pane" id="reviews">
                                              <div class="content-box">
                                                  <p></p>
                                              </div>
                                          </div>
                                      </div>
                                      <br>
                                  </div>
                              </div>







                              <div class="col-xl-5">
                                  <!--=== Sidebar Widget Area ===-->
                                  <div class="sidebar-widget-area pt-60 pl-lg-30">
                                      <!--=== Review Form ===-->
                                      <div class="sidebar-widget booking-form-widget wow fadeInUp mb-40">
                                          <h3 class="title">Book This Room Now</h3>
                                          <hr>
                                          <form class="review-form" action ="book_hotel_room.php" method="post">
                                              <div class="row">
                                                   <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Hotel</strong></label>
                                                         <input name="hotel_name" value="<?php  echo $hotel_name;  ?>" class="form_control" type="text" readonly />
                                                         
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Room</strong></label>
                                                         <input name="room_name" value="<?php  echo $room_name;  ?>" class="form_control" type="text" readonly />
                                                         
                                                      </div>
                                                  </div>
                                                 
                                              <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Your First Name</strong></label>
                                                         <input name="first_name" placeholder="First Name" class="form_control" type="text" required />
                                                      </div>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Second Name</strong></label>
                                                         <input name="second_name" placeholder="Second Name" class="form_control" type="text" required/>
                                                      </div>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Your Email</strong></label>
                                                         <input name="email" placeholder="Email" class="form_control" type="email" required />
                                                      </div>
                                                  </div>

                                                  <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Your Phone</strong></label>
                                                         <input name="phone_number" placeholder="Telephone Number" class="form_control" type="text" required />
                                                      </div>
                                                  </div>


                                                  <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Date (from)</strong></label>
                                                         <input name="dateFrom" placeholder="Select Date" class="form_control" type="date" required />
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Date (to)</strong></label>
                                                          <input name="dateTo" placeholder="Select Date" class="form_control" type="date"  required />
                                                      </div>
                                                  </div>
                                                  <div class="booking-item col-lg-12">
                                                  <label><strong>Message</strong> </label>
                                                      <div class="form_group">
                                                      <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                                                      <br>
                                                      </div>
                                                  </div>
                                                  <hr>
                                                  
                                                  <div class="col-lg-12">
                                                      <div class="text-center form_group">
      
                                                                                              
                                              <div class="login_btn">   <button type="submit" name="submit" class="main-btn primary-btn">Send your Booking Now<i class="far fa-paper-plane"></i></button></div>
      
                                                          
                                                     
                                                      </div>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                      
                                  </div>
                              </div>
                          </div>
                          
                      </div>
                  </div>
                                                          
              </section><!--====== End Place Details Section ======-->

        
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