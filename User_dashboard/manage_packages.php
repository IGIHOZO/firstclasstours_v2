<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('./includes/config.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>World Star Tours | Admin Package Manage</title>
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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Packages</li>
                </ol>

                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Manage Packages</h2>
                        <table id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th >Package title</th>
                                    <th>Country</th>
                                    <th>Package Price</th>							
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
$q = mysqli_query($conn, "SELECT * FROM packages,countries,travel_type,package_type where packages.package_country = countries.country_id and package_type.package_type_id=packages.package_type and travel_type.travel_type_id=packages.package_travel_type order by package_id DESC");

if (mysqli_num_rows($q) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($q)) {
        $package_id = $row['package_id'];
        $package_name = $row['package_name'];
        $package_introduction = $row['package_introduction'];
        $package_description = $row['package_description'];
        $package_days_and_nights = $row['package_days_and_nights'];
        $package_from_date = $row['package_from_date'];
        $package_to_date = $row['package_to_date'];
        $package_price = $row['package_price'];
        $package_travel_type = $row['package_travel_type'];
        $package_type = $row['package_type'];
        $package_country = $row['package_country'];
        $country_name = $row['country_name'];
        $package_number_of_person = $row['package_number_of_person'];
        $package_image = $row['package_image'];
        $travel_type_name=$row['travel_type_name'];
        $package_type_name=$row['package_type_name'];
       
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['package_name']; ?></td>
            <td><?php echo $row['country_name']; ?></td>
            <td><?php echo $row['package_price']; ?></td>
            <td><?php echo $row['package_recorded_date']; ?></td>
            <td class="hide-on-print">
                <a href="#edit_<?php echo $package_id; ?>">
                    <button class="btn btn-success">View Details</button>
                </a>
                
                  <a href="#delete_<?php echo $package_id; ?>">
            <button class="btn btn-danger">Delete</button>
        </a>
        
        <a href="change-image_package.php?packageid=<?php echo $package_id; ?>">
                    <button class="btn btn-success">Update Image</button>
                </a>
        
            </td>
        </tr>
        
        <div id="delete_<?php echo $package_id; ?>" class="overlay">
    <div class="popup">
        <h2>Delete Package</h2>
        <p>Are you sure you want to delete this package?</p>
        <div>
            <form method="POST" action="delete_package.php">
                <input type="hidden" name="package_id" value="<?php echo $package_id; ?>">
                <button type="submit" class="btn btn-danger" name="delete">Yes</button>
                <a class="btn btn-secondary close" href="#">No</a>
            </form>
        </div>
    </div>
</div>


        
        <!-- Start Modal -->
        <div id="edit_<?php echo $package_id; ?>" class="overlay" style="overflow-y: auto;">
            <div class="popup">
                <h2>Update <?php echo $row['package_name']; ?> </h2>
                <a class="close" href="#">&times;</a>
                <div>
                    <form method="POST" action="manage_package_update.php">
                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" name="package_id" value="<?php echo $package_id; ?>" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="package_name" value="<?php echo strip_tags($package_name); ?>" required>
                        </div>
                        
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">Introduction</label>
                            <textarea class="form-control" rows="5" cols="50" name="package_introduction"  required><?php echo htmlentities($package_introduction); ?></textarea> 
                        </div>
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">Description</label>
                              
                            <textarea class="form-control" rows="5" cols="50" name="package_description"  required><?php echo htmlentities($package_description); ?></textarea> 
                        </div>
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">Days and nights</label>
                            <input type="text" class="form-control" name="package_days_and_nights" value="<?php echo $package_days_and_nights; ?>" required>
                        </div>
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">Price</label>
                            <input type="text" class="form-control" name="package_price" value="<?php echo $package_price; ?>" required>
                        </div>
                        
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">Number of person</label>
                            <input type="text" class="form-control" name="package_number_of_person" value="<?php echo $package_number_of_person; ?>" required>
                        </div>
                        
                        
                       <div class="form-group mb-3">
    <label for="focusedinput" class="col-sm-2 control-label">Country</label>
    <select name="package_country" class="col-sm-2 control-label">
        <?php
        // Include database connection
        include 'include/config.php';

        // Fetch countries from the database
        $sql = "SELECT country_id, country_name FROM countries";
        $result = $conn->query($sql);

        // Generate the country dropdown
        while ($row = $result->fetch_assoc()) {
            $selected = ($row['country_id'] == $package_country) ? 'selected' : '';
            echo '<option value="' . $row['country_id'] . '" ' . $selected . '>' . $row['country_name'] . '</option>';
        }
        ?>
    </select>
</div>
                        
                         <div class="form-group mb-3">
    <label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
    <select name="package_type" class="col-sm-2 control-label">
        <?php
        // Include database connection
        include 'include/config.php';

        // Fetch package types from the database
        $sql = "SELECT * FROM package_type";
        $result = $conn->query($sql);

        // Generate the package type dropdown
        while ($row = $result->fetch_assoc()) {
            $selected = ($row['package_type_id'] == $package_type) ? 'selected' : '';
            echo '<option value="' . $row['package_type_id'] . '" ' . $selected . '>' . $row['package_type_name'] . '</option>';
        }
        ?>
    </select>
</div>
                        
                        
                           
                          <div class="form-group mb-3">
    <label for="focusedinput" class="col-sm-2 control-label">Travel Type</label>
    <select name="travel_type" class="col-sm-2 control-label">
        <?php
        // Include database connection
        include 'include/config.php';

        // Fetch travel types from the database
        $sql = "SELECT * FROM travel_type";
        $result = $conn->query($sql);

        // Generate the travel type dropdown
        while ($row = $result->fetch_assoc()) {
            $selected = ($row['travel_type_id'] == $travel_type) ? 'selected' : '';
            echo '<option value="' . $row['travel_type_id'] . '" ' . $selected . '>' . $row['travel_type_name'] . '</option>';
        }
        ?>
    </select>
</div>
                        
 <div class="form-group mb-3">
    <label for="focusedinput" class="col-sm-2 control-label">Image</label>
    <?php
    // Check if there is an existing image
    if (!empty($package_image)) {
        echo '<img src="/assets/img/uploads/packages/' . $package_image . '" width="200" alt="Existing Image">';
    }
    ?>
 
</div>


<script>
    // Function to toggle the required attribute of the image input
    function toggleImageRequired() {
        var keepImageCheckbox = document.getElementById('keep_image');
        var imageInput = document.getElementById('package_image');

        // If the "Keep existing image" checkbox is checked, image input is not required
        if (keepImageCheckbox.checked) {
            imageInput.removeAttribute('required');
        } else {
            // If the checkbox is not checked, image input is required
            imageInput.setAttribute('required', 'required');
        }
    }

    // Attach an event listener to the "Keep existing image" checkbox
    document.getElementById('keep_image').addEventListener('change', toggleImageRequired);

    // Call the function initially to set the required attribute based on the checkbox state
    toggleImageRequired();
</script>
                        
                        
                        
                       <br><br>
                       <center>
                       
                        
                        
                        <button class="btn btn-danger" name="submit">Update Package Details.</button>
                        
                        </center>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
        
        <?php
        $i++;
    }
}
?>

                                
                                               </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        var navoffeset = $(".header-main").offset().top;
                        $(window).scroll(function () {
                            var scrollpos = $(window).scrollTop();
                            if (scrollpos >= navoffeset) {
                                $(".header-main").addClass("fixed");
                            } else {
                                $(".header-main").removeClass("fixed");
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
