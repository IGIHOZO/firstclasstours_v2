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
         <section class="activity-section">
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

</html>
