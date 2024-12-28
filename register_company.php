<!DOCTYPE html>
<html lang="en">

<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("dashboard/includes/config.php");
include("head.php"); 


?>
<head>
   
    <!-- Bootstrap CSS -->
 
    <style>
    .custom-form-section {
        display: none;
    }
    .custom-form-section.active {
        display: block;
    }
    .custom-container {
        max-width: 800px;
        margin: 30px auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        background-color: #f9f9f9;
    }
</style>

</head>
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
          
            <br>
            <div class="about-us-content" style="margin-top: -20px;">
           
            <div class="custom-container">
    <h2 class="text-center mb-4">Registration Form</h2>

        <!-- Type Selection -->
        <div class="mb-4">
            <label for="type" class="form-label">Select Type of Your Company</label>
            <select id="type"  class="form-control">
                <option value="" selected disabled>Choose...</option>
                <option value="tours">Tours Company</option>
                <option value="hotel">Hotel</option>
                <option value="transport">Transport Company</option>
            </select>
        </div>
        <form id="tours-form" class="custom-form-section" style="display: none;" action="save_tour_company.php" method="POST" enctype="multipart/form-data">
     
            <h4 class="mb-3">Tours Company Registration</h4>
            <div class="mb-3">
                <label for="tours-name" class="form-label">Company Name</label>
                <input type="text" name ="company_name" class="form-control" placeholder="Enter Company Name" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Owner's Full Name</label>
                <input type="text" name="owner_name"  class="form-control" placeholder="Owner's Full Name" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Contact Email</label>
                <input type="email" name="contact_email"  class="form-control" placeholder="Contact Email" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Phone Number</label>
                <input type="text" name="phone_number"  class="form-control" placeholder="Enter Phone Number" required>
            </div>
            <div class="mb-3">
                <label for="tours-name" class="form-label">Company Address (Physical Location)</label>
                <input type="text" name="company_address"  class="form-control" placeholder="Enter Company Address (Physical Location)" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Tour Types (e.g., Adventure, Wildlife, Cultural)</label>
                <input type="text" name="tour_type"  class="form-control" placeholder="Enter Tour Types (e.g., Adventure, Wildlife, Cultural))" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Languages Supported by Tour Guides</label>
                <input type="text" name="language_by_tour_guide"  class="form-control" placeholder="Enter Languages Supported by Tour Guides" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Operating License Number</label>
                <input type="text" name="licence_number"  class="form-control" placeholder="Enter Operating License Number" >
            </div>

           
            <div class="mb-3">
                <label for="tours-services" class="form-label">Description of Services Offered</label>
                <textarea name="service_description" class="form-control" placeholder="Enter Description of Services Offered"></textarea>
            </div>


            <div class="mb-3">
                <label for="tours-name" class="form-label">Company Registration Certificate</label>
                <input type="file" name="company_certificate"  class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Company Logo</label>
                <input type="file" name="company_logo"  class="form-control" required>
            </div>


            <div class="text-center">
            <button type="submit" class="btn btn-primary">Register My Tour Company</button>
        </div>
                
        

</form>

        <!-- Hotel Form -->
        <form id="hotel-form" class="custom-form-section" style="display: none;" action="save_hotel.php" method="POST" enctype="multipart/form-data">
            <h4 class="mb-3">Hotel Registration</h4>
            <div class="mb-3">
                <label for="hotel-name" class="form-label">Hotel Name</label>
                <input type="text" name="hotel_name" class="form-control" placeholder="Enter Hotel Name">
            </div>

            <div class="mb-3">
                <label for="hotel-name" class="form-label">Owner/Manager Name</label>
                <input type="text" name="owner_name" class="form-control" placeholder="EnterOwner/Manager Name">
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Contact Email</label>
                <input type="email" name="contact_email"  class="form-control" placeholder="Contact Email" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Phone Number</label>
                <input type="text" name="phone_number"  class="form-control" placeholder="Enter Phone Number" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Hotel Address (Physical Location)</label>
                <input type="text" name="hotel_address"  class="form-control" placeholder="Enter Hotel Address (Physical Location)" required>
            </div>


            <div class="mb-3">
             
                <select name="star_rating" class="form-control" required>
                <option value=""> Select Star Rating (e.g., 1 to 5 stars)</option>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>




            <div class="mb-3">
                <label for="tours-services" class="form-label">Room Types (e.g., Single, Double, Suite)</label>
                <textarea name="room_types" class="form-control" placeholder="Enter Room Types (e.g., Single, Double, Suite)" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tours-services" class="form-label">Check-In/Check-Out Policies</label>
                <textarea name="checkin_policy" class="form-control" placeholder="Enter Check-In/Check-Out Policies" required></textarea>
            </div>





            <div class="mb-3">
                <label for="hotel-amenities" class="form-label">List of Amenities (e.g., WiFi, Pool, Spa)</label>
                <textarea name="hotel-amenities" class="form-control" placeholder="List List of Amenities (e.g., WiFi, Pool, Spa)" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tours-services" class="form-label">Dining Options (e.g., Restaurants, Room Service)</label>
                <textarea name="dining_options" class="form-control" placeholder="Enter Dining Options (e.g., Restaurants, Room Service)" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tours-services" class="form-label">Accessibility Features (e.g., Wheelchair Access)</label>
                <textarea name="accessibility_features" class="form-control" placeholder="Enter Accessibility Features (e.g., Wheelchair Access)" ></textarea>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Hotel Registration Certificate</label>
                <input type="file" name="hotel_certificate"  class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Hotel Main Image</label>
                <input type="file" name="hotel_logo"  class="form-control" required>
            </div>


            <div class="text-center">
            <button type="submit" class="btn btn-primary">Register My Hotel</button>
        </div>



</form>

        <!-- Transport Company Form -->
        <form id="transport-form" class="custom-form-section" style="display: none;" action="save_transport.php" method="POST" enctype="multipart/form-data">
            <h4 class="mb-3">Transport Company Registration</h4>
            <div class="mb-3">
                <label for="tours-name" class="form-label">Company Name</label>
                <input type="text" name ="company_name" class="form-control" placeholder="Enter Company Name" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Owner's Full Name</label>
                <input type="text" name="owner_name"  class="form-control" placeholder="Owner's Full Name" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Contact Email</label>
                <input type="email" name="contact_email"  class="form-control" placeholder="Contact Email" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Phone Number</label>
                <input type="text" name="phone_number"  class="form-control" placeholder="Enter Phone Number" required>
            </div>
            <div class="mb-3">
                <label for="tours-name" class="form-label">Company Address (Physical Location)</label>
                <input type="text" name="company_address"  class="form-control" placeholder="Enter Company Address (Physical Location)" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Fleet Size (Number of Vehicles)</label>
                <input type="text" name="fleet_size"  class="form-control" placeholder="Enter Fleet Size (Number of Vehicles)" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Types of Vehicles (e.g., Buses, Minivans, Luxury Cars)</label>
                <input type="text" name="type_of_vehicles"  class="form-control" placeholder="Enter Types of Vehicles (e.g., Buses, Minivans, Luxury Cars)" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Operating License Number </label>
                <input type="text" name="licence_number"  class="form-control" placeholder="Enter Operating License Number" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Company Registration Certificate</label>
                <input type="file" name="company_certificate"  class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tours-name" class="form-label">Company Logo</label>
                <input type="file" name="company_logo"  class="form-control" required>
            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary">Register My Transport Company</button>
        </div>


</form>

        <!-- Submit Button -->
     

</div>
            </div>
        </div>
    </div>

</main>

<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('type').addEventListener('change', function() {
        const sections = document.querySelectorAll('.custom-form-section');
        sections.forEach(section => section.classList.remove('active'));

        const selectedValue = this.value;
        if (selectedValue) {
            document.getElementById(`${selectedValue}-form`).classList.add('active');
        }
    });
</script>

<script>
    // JavaScript to toggle forms based on selection
    document.getElementById('type').addEventListener('change', function () {
        const forms = ['tours-form', 'hotel-form', 'transport-form'];
        forms.forEach(formId => document.getElementById(formId).style.display = 'none');
        const selectedForm = this.value + '-form';
        if (forms.includes(selectedForm)) {
            document.getElementById(selectedForm).style.display = 'block';
        }
    });
</script>

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
