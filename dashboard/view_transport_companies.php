<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('./includes/config.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title><?php   echo $company_name;   ?> | Admin Package Manage</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/morris.css" type="text/css"/>
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- jQuery -->
        <script src="js/jquery-2.1.4.min.js"></script>
        <!-- //jQuery -->
        <!-- tables -->
        <link rel="stylesheet" type="text/css" href="css/table-style.css" />
        <link rel="stylesheet" type="text/css" href="css/basictable.css" />
        <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#table').basictable();

                $('#table-breakpoint').basictable({
                    breakpoint: 768
                });

                $('#table-swap-axis').basictable({
                    swapAxis: true
                });

                $('#table-force-off').basictable({
                    forceResponsive: false
                });

                $('#table-no-resize').basictable({
                    noResize: true
                });

                $('#table-two-axis').basictable();

                $('#table-max-height').basictable({
                    tableWrapper: true
                });
            });
        </script>
        <!-- //tables -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
        
           <style>
        .collapsible {
            background-color: #f9fafb;
            color: black;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        ..collapsible:hover {
            background-color: #610f07;
            color: white;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 60%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup .close:hover {
            color: #06D85F;
        }

        .popup .content {
    max-height: 30%; /* Set a maximum height for the content */
    overflow-y: auto; /* Enable vertical scrolling */
}

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }

        .box {
            width: 40%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }

        @media print {
            .hide-on-print {
                display: none;
            }
        }


    </style>
    
    </head>
    <body>
        <div class="page-container">
            <div class="left-content">
                <div class="mother-grid-inner">
                    <!-- Include the header -->
                    <?php include('includes/header.php'); ?>
                    <div class="clearfix"> </div>
                </div>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Tour Companies</li>
                </ol>

               
               
            

                <table class="table table-striped">
    <thead>
        <tr>
            <th>N<sup>o</sup></th>
            <th>Company Name</th>
            <th>Owner Name</th>
            <th>Contact Email</th>
            <th>Phone Number</th>
            <th>Logo</th>
            <th>Certificate</th>
            <th>Actions</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php include("fetch_transport_companies.php"); // Fetch and display data ?>
    </tbody>
</table>

<!-- Modal for viewing details -->
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
        <p><strong>Company Name:</strong> <span id="modalCompanyName"></span></p>
        <p><strong>Owner Name:</strong> <span id="modalOwnerName"></span></p>
        <p><strong>Contact Email:</strong> <span id="modalContactEmail"></span></p>
        <p><strong>Phone Number:</strong> <span id="modalPhoneNumber"></span></p>
        <p><strong>Address:</strong> <span id="modalCompanyAddress"></span></p>
        <p><strong>Fleet Size:</strong> <span id="modalFleetSize"></span></p>
        <p><strong>Type of Vehicles:</strong> <span id="modalTypeOfVehicles"></span></p>
        <p><strong>License Number:</strong> <span id="modalLicenceNumber"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div> 
  </div>
</div>

<script>

$(document).on('click', '.view-more', function() {
    var companyId = $(this).data('id'); // Get company ID
    $.ajax({
        url: 'fetch_transport_company_info.php',
        method: 'POST',
        data: { id: companyId },
        success: function(response) {
            var company = JSON.parse(response);
            if (company.error) {
                alert(company.error);
            } else {
                // Populate modal with data
                $('#modalCompanyName').text(company.company_name);
                $('#modalOwnerName').text(company.owner_name);
                $('#modalContactEmail').text(company.contact_email);
                $('#modalPhoneNumber').text(company.phone_number);
                $('#modalCompanyAddress').text(company.company_address);
                $('#modalFleetSize').text(company.fleet_size);
                $('#modalTypeOfVehicles').text(company.type_of_vehicles);
                $('#modalLicenceNumber').text(company.licence_number);
            }
        }
    });
});


</script>
               
         

                
                <?php include('includes/footer.php'); ?>
            </div>

            
            <?php include('includes/sidebarmenu.php'); ?>

            
        </div>
        <script>
            var toggle = true;

            $(".sidebar-icon").click(function () {
                if (toggle)
                {
                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                    $("#menu span").css({"position": "absolute"});
                } else
                {
                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                    setTimeout(function () {
                        $("#menu span").css({"position": "relative"});
                    }, 400);
                }

                toggle = !toggle;
            });
        </script>
        
        <script>
    function confirmDelete(destinationId) {
        if (confirm('Are you sure you want to delete this record?')) {
            window.location.href = 'delete_destination.php?pid=' + destinationId;
        }
    }
</script>


        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- /Bootstrap Core JavaScript -->	   

    </body>
</html>
