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
         <!-- Home activity section html start -->
         <section class="special-section">
                <div class="container">
                    <div class="section-heading text-center">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                               
                                <h2>BEST  HOTEL IN RWANDA </h2>
                                <p>Taste brilliance at our high hotel and apartments, where outstanding beauty meets exquisite comfort.
                                     Experience excellent accommodations, excellent amenities, and customized service.
                                     Discover an exceptional a vacation with First Class Tours, where every moment exceeds luxury.</p>
                            </div>
                        </div>
                    </div>
                    <div class="special-inner">
                        <div class="row">



                        <?php


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get active hotels
$query = "SELECT * FROM hotels WHERE active = 1";

// Execute the query
$result = $conn->query($query);

// Check if the query executed successfully
if ($result === false) {
    die("Query failed: " . $conn->error);  // Output any error if the query fails
}

// Check if query returned any rows
if ($result->num_rows > 0) {
    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        $hotel_id = $row['id']; // Primary key for the hotel
        $hotel_name = $row['hotel_name'];
        $hotel_logo = $row['hotel_logo']; // Assuming logo file name is stored in the database
        $hotel_address = $row['hotel_address'];
?>
        <!-- HTML to display each hotel -->
        <div class="col-md-6 col-lg-4">
            <div class="special-item">
                <figure class="special-img">
                    <img src="uploads/hotels/<?php echo $hotel_logo; ?>" alt="Hotel Logo">
                </figure>
          
                <div class="special-content">
                    <div class="meta-cat">
                        <a href="#"><?php echo $hotel_name; ?></a>
                    </div>
                    <h3>
                        <a href="#">Hotel Address: <?php echo $hotel_address; ?></a>
                    </h3>
                
                    <!-- View More Info Button -->
                    <button class="btn btn-info view-more" data-id="<?php echo $hotel_id; ?>" 
                     data-toggle="modal" data-target="#hotelModal">View More Info</button>
                </div>
            </div>
        </div>
<?php
    }
} else {
    // Output message if no results are found
    echo "<p>No hotels found.</p>";
}
?>



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

</html>
