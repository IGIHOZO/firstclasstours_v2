<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('./includes/config.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title><?php   echo $company_name;  ?>| Admin Itenerary Manage</title>
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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Iteneraries </li>
                </ol>

                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Manage Package Iteneraries</h2>
                        <table id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th >Package title</th>
                                    <th>Itenerary Title</th>
                                   							
                                    <th>Day and Time plan</th>
                                    <th>Day Full Description</th>
                                     <th>Recorded Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
$q = mysqli_query($conn, "SELECT * FROM itineraries,packages 
where itineraries.package_id=packages.package_id order by itinerary_id DESC");

if (mysqli_num_rows($q) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($q)) {
        $itinerary_id  = $row['itinerary_id'];
        $package_id = $row['package_id'];
        $package_name = $row['package_name'];
        $title = $row['title'];
        $day_time_plan = $row['day_time_plan'];
        $day_full_description = $row['day_full_description'];
        $itinerary_recorded_date = $row['itinerary_recorded_date'];
     
      
       
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['package_name']; ?></td>
            <td><?php echo $row['title']; ?></td>
            
             <td><?php echo $row['day_time_plan']; ?></td>
            <td><?php echo $row['day_full_description']; ?></td>
      
            <td><?php echo $row['itinerary_recorded_date']; ?></td>
            <td class="hide-on-print">
                <a href="#edit_<?php echo $itinerary_id; ?>">
                    <button class="btn btn-success">View Details</button>
                </a>
                
                  <a href="#delete_<?php echo $itinerary_id; ?>">
            <button class="btn btn-danger">Delete</button>
        </a>
        
            </td>
        </tr>
        
        <div id="delete_<?php echo $itinerary_id; ?>" class="overlay">
    <div class="popup">
        <h2> Delete this Package itinerary </h2>
        <p>Are you sure you want to delete this package itinerary?</p>
        <div>
            <form method="POST" action="delete_package_itenerary.php">
                <input type="hidden" name="itinerary_id" value="<?php echo $itinerary_id; ?>">
                <button type="submit" class="btn btn-danger" name="delete">Yes</button>
                <a class="btn btn-secondary close" href="#">No</a>
            </form>
        </div>
    </div>
</div>


        
        <!-- Start Modal -->
        <div id="edit_<?php echo $itinerary_id; ?>" class="overlay" style="overflow-y: auto;">
            <div class="popup">
                <h2>Update <?php echo $row['package_name']; ?> Itenerary </h2>
                <a class="close" href="#">&times;</a>
                <div>
                    <form method="POST" action="manage_package_itenerary_update.php">
                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" name="itinerary_id" value="<?php echo $itinerary_id; ?>" required>
                            
                             <input type="hidden" class="form-control" name="package_id" value="<?php echo $package_id; ?>" required>
                        </div>
                   
                        
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">title</label>
                            <textarea class="form-control" rows="5" cols="50" name="title"  required><?php echo htmlentities($title); ?></textarea> 
                        </div>
                        
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">day_full_description</label>
                            <textarea class="form-control" rows="5" cols="50" name="day_full_description"  required><?php echo htmlentities($day_full_description); ?></textarea> 
                        </div>
                      
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">day_time_plan</label>
                            <input type="text" class="form-control" name="day_time_plan" value="<?php echo $day_time_plan; ?>" required>
                        </div>
                        
                       
                        
                      
  
                        
                        
                        
                       <br><br>
                       <center>
                       
                        
                        
                        <button class="btn btn-danger" name="submit">Update Package Itenerary Details.</button>
                        
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
