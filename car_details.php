<!DOCTYPE html>
<html lang="zxx">

<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php"); 
$car_id = $_GET['vhid'];

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
$query1 = "SELECT * FROM car_rental WHERE car_id='$car_id'";
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result1) > 0) {
    // Fetch car data
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $carID = $row1['car_id'];
        $carName = $row1['car_name'];
        $carPrice = $row1['car_price'];
        
        // Check if the main image exists, otherwise use default
        if (empty($row1['car_main_image']) || !file_exists('uploads/car_rental/' . $row1['car_main_image'])) {
            $carImage = 'path/to/default/image.jpg';  // Default image
        } else {
            $carImage = 'uploads/car_rental/' . $row1['car_main_image'];
        }
        
        $carYear = $row1['car_year'];
        $carFuelType = $row1['car_fuel_type'];
        $carBrand = $row1['car_brand'];
        $number_of_seat = $row1['number_of_seat'];
        $car_overview = $row1['car_overview'];
    }
}

// Fetch car rental images
$queryImages = "SELECT car_rental_other_image FROM car_rental_images WHERE car_rental_id='$car_id'";
$resultImages = mysqli_query($conn, $queryImages);

if (mysqli_num_rows($resultImages) > 0) {
    $images = [];
    while ($rowImage = mysqli_fetch_assoc($resultImages)) {
        $images[] = 'uploads/car_rental_images/' . $rowImage['car_rental_other_image'];
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
                              <img src="' . $carImage . '" alt="Place Image">
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


// Fetch data from the car_rental table
$query = "SELECT * FROM car_rental where car_id='$car_id' ";
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
        $carBrand = $row['car_brand'];
        $number_of_seat = $row['number_of_seat'];
        $car_overview = $row['car_overview'];
        $car_owner_id=$row['car_owner_id'];
 

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
                                          <h3 class="title"><?php  echo $carName;  ?></h3>
                                          
                                          <p><i class="fa fa-car"></i><strong><?php  echo $carBrand;  ?></strong></p>
                                      </div>
                                  </div>
                                  <div class="col-xl-8">
                                      <div class="tour-widget-info">
                                          <div class="info-box mb-20">
                                              <div class="icon">
                                              <i class="fa fa-dollar-sign"></i>
                                              </div>
                                              <div class="info">
                                                  <h4><span>Price/day</span>$  <?php  echo $carPrice;  ?></h4>
                                              </div>
                                          </div>
                                          <div class="info-box mb-20">
                                              <div class="icon">
                                                  <i class="fa fa-calendar"></i>
                                              </div>
                                              <div class="info">
                                                  <h4><span>Reg.Year</span><?php  echo $carYear;  ?></h4>
                                              </div>
                                          </div>
                                          <div class="info-box mb-20">
                                              <div class="icon">
                                                  <i class="fa fa-cogs"></i>
                                              </div>
                                              <div class="info">
                                                  <h4><span>&nbsp;Fuel Type</span> &nbsp;&nbsp;<?php  echo $carFuelType;  ?></h4>
                                              </div>
                                          </div>
                                          <div class="info-box mb-20">
                                              <div class="icon">
                                                  <i class="fa fa-user-plus"></i>
                                              </div>
                                              <div class="info">
                                                  <h4><span>Seats</span>&nbsp;&nbsp;&nbsp;<?php  echo $number_of_seat;  ?></h4>
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
                                                  <a class="nav-link active" data-bs-toggle="tab" href="#descrptions">Car Overview</a>
                                              </li>
                                              <li class="nav-item">
                                                  <a class="nav-link" data-bs-toggle="tab" href="#information">Accessories</a>
                                              </li>
                                              
                                          </ul>
                                      </div>
                                      <div class="tab-content wow fadeInUp">
                                          <div class="tab-pane fade show active" id="descrptions">
                                              <div class="product-info" >
                                              <div style="white-space: pre-wrap;"><?php echo $car_overview; ?></div>
                                                 
                                              </div>
                                              
                                          </div>
                                          
                                          <div class="tab-pane fade" id="information">
                                              <div class="content-box">
                                              <table class="table">
                        <thead>
                          <tr>
                            <h2>Car Accessories</h2>
                          </tr>
                        </thead>



                        <?php
// Fetch data from the car_rental_inclusive table for a specific car
$query2 = "SELECT * FROM car_rental_inclusive WHERE car_id='$car_id'";
$result2 = mysqli_query($conn, $query2);

if (mysqli_num_rows($result2) > 0) {
    // If data exists, fetch it
    $row2 = mysqli_fetch_assoc($result2);

    $airConditioner = $row2['Air_Conditioner'];
    $antiLockBraking = $row2['AntiLock_Braking_System'];
    $powerSteering = $row2['Power_Steering'];
    $powerWindows = $row2['Power_Windows'];
    $cdPlayer = $row2['CD_Player'];
    $leatherSeats = $row2['Leather_Seats'];
    $centralLocking = $row2['Central_Locking'];
    $powerDoorLocks = $row2['Power_Door_Locks'];
    $brakeAssist = $row2['Brake_Assist'];
    $driverAirbag = $row2['Driver_Airbag'];
    $passengerAirbag = $row2['Passenger_Airbag'];
    $crashSensor = $row2['Crash_Sensor'];

    $hasData = true; // Flag to indicate data is available
} else {
    $hasData = false; // No data found
}
?>


                        <tbody>

                        
                        <?php if ($hasData): ?>

    <tr>
        <td>Air Conditioner</td>
        <td><?php echo $airConditioner == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>AntiLock Braking System</td>
        <td><?php echo $antiLockBraking == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Power Steering</td>
        <td><?php echo $powerSteering == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Power Windows</td>
        <td><?php echo $powerWindows == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>CD Player</td>
        <td><?php echo $cdPlayer == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Leather Seats</td>
        <td><?php echo $leatherSeats == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Central Locking</td>
        <td><?php echo $centralLocking == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Power Door Locks</td>
        <td><?php echo $powerDoorLocks == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Brake Assist</td>
        <td><?php echo $brakeAssist == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Driver Airbag</td>
        <td><?php echo $driverAirbag == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Passenger Airbag</td>
        <td><?php echo $passengerAirbag == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>
    <tr>
        <td>Crash Sensor</td>
        <td><?php echo $crashSensor == 1 ? '<i class="fa fa-check" style="color: green;"></i>' : '<i class="fa fa-times" style="color: red;"></i>'; ?></td>
    </tr>

<?php else: ?>
<!-- Hide the table or show a different message -->
<p style="color: red;">No accessories information available for this car.</p>
<?php endif; ?>

      
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





                  <?php


// Fetch data from the car_rental table
$query = "SELECT * FROM transport_companies where id='$car_owner_id' ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Loop through each row of data
    while ($row = mysqli_fetch_assoc($result)) {
        // Retrieve individual fields
         $company_name = $row['company_name'];
         $owner_name = $row['owner_name'];
         $company_email = $row['contact_email'];
         $company_phone = $row['phone_number'];
    

 

    }}

        ?>



                              <div class="col-xl-5">
                                  <!--=== Sidebar Widget Area ===-->
                                  <div class="sidebar-widget-area pt-60 pl-lg-30">
                                      <!--=== Review Form ===-->
                                      <div class="sidebar-widget booking-form-widget wow fadeInUp mb-40">
                                          <h3 class="title">Book This Vehicle Now</h3>
                                          <hr>
                                          <form class="review-form" action="book_transport.php" method="post">
                                              <div class="row">
                                                  
                                                
                                                  
                                              <div class="col-lg-6">
                                                      <div class="form_group">
                                                      <label><strong>Your First Name</strong></label>
                                                      <input name="transport_company" value="<?php  echo $company_name ?>" class="form_control" type="hidden" required />
                                                      <input name="transport_company_owner" value="<?php  echo $owner_name ?>" class="form_control" type="hidden" required />
                                                      <input name="transport_company_phone" value="<?php  echo $company_phone ?>" class="form_control" type="hidden" required />
                                                      <input name="transport_company_email" value="<?php  echo $company_email ?>" class="form_control" type="hidden" required />
                                                       <input name="price" value="<?php  echo $carPrice;  ?> " class="form_control" type="hidden" required />
                                                       <input name="carname" value="<?php  echo $carName;  ?> " class="form_control" type="hidden" required />
                                                      
                                                     
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