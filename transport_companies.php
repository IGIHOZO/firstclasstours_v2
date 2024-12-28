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
        <section class="special-section">
                <div class="container">
                    <div class="section-heading text-center">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                               
                                <h2>TRANSPORT COMPANY </h2>
                                <p>Registred Transport Companies</p>
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

// Query to get active transport companies
$query = "SELECT * FROM transport_companies WHERE active = 1";

// Execute the query
$result = $conn->query($query);

// Check if the query executed successfully
if ($result === false) {
    die("Query failed: " . $conn->error);
}

// Check if query returned any rows
if ($result->num_rows > 0) {
    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        $company_id = $row['id'];
        $company_name = $row['company_name'];
        $company_logo = $row['company_logo']; // Assuming logo file name is stored in the database
        $company_address = $row['company_address'];  // Assuming address field exists in the database
?>
        <!-- Display each transport company -->
        <div class="col-md-6 col-lg-4">
            <div class="special-item">
                <figure class="special-img">
                    <img src="uploads/Transport/<?php echo $company_logo; ?>" alt="Transport Company Logo">
                </figure>
                <div class="special-content">
                    <div class="meta-cat">
                        <a href="#"><?php echo $company_name; ?></a>
                    </div>
                    <h3>
                        <a href="#">Company Address: <?php echo $company_address; ?></a>
                    </h3>
                
                    <!-- View More Info Button -->
                    <button class="btn btn-info view-more" data-id="<?php echo $company_id; ?>" 
                     data-toggle="modal" data-target="#transportModal">View More Info</button>
                </div>
            </div>
        </div>
<?php
    }
} else {
    // Output message if no results are found
    echo "<p>No transport companies found.</p>";
}
?> 


<div class="modal fade" id="transportModal" tabindex="-1" role="dialog" aria-labelledby="transportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="transportModalLabel">Transport Company Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Company Logo -->
        <div class="form-group">
          <strong>Company Logo:</strong><br>
          <img id="companyLogo" src="" alt="Company Logo" style="width: 100px; height: auto;">
        </div>
        
        <!-- Transport Company Details -->
        <p><strong>Owner Name:</strong> <span id="ownerName"></span></p>
        <p><strong>Phone Number:</strong> <span id="phoneNumber"></span></p>
        <p><strong>Fleet Size:</strong> <span id="fleetSize"></span></p>
        <p><strong>Type of Vehicles:</strong> <span id="typeOfVehicles"></span></p>
        <p><strong>License Number:</strong> <span id="licenseNumber"></span></p>
        <p><strong>Company Address:</strong> <span id="companyAddress"></span></p>
        <p><strong>Certificate:</strong> <span id="companyCertificate"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

</html>
