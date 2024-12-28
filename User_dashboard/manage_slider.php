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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Sliders</li>
                </ol>

                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Manage Sliders</h2>
                        <table id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th >Slider title</th>
                                    <th>Slider Description </th>
                                    <th>Slider image</th>							
                                   
                                    <th>Update</th>
                                     <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
$q = mysqli_query($conn, "SELECT * FROM homepage_slider order by slider_id DESC");

if (mysqli_num_rows($q) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($q)) {
        $slider_title = $row['slider_title'];
        $slider_description = $row['slider_description'];
        $slider_image = $row['slider_image'];
         $slider_id = $row['slider_id'];
      
       
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $slider_title; ?></td>
            <td><?php echo $slider_description; ?></td>
       <td><img src="../assets/img/uploads/slider/<?php echo $slider_image; ?>" widht="100" height="100" /></td>

       
            <td class="hide-on-print">
                <a href="#edit_<?php echo $slider_id; ?>">
                    <button class="btn btn-success">View Details</button>
                </a>
                <br> <br> 
                
                  <a href="#editimage_<?php echo $slider_id; ?>">
                    <button class="btn btn-primary">Change Image</button>
                </a>
                
                
                </td>
                <td class="hide-on-print">
                      <a href="#delete_<?php echo $slider_id; ?>">
            <button class="btn btn-danger">Delete</button>
        </a>
         
        
            </td>
        </tr>
        
        <div id="delete_<?php echo $slider_id; ?>" class="overlay">
    <div class="popup">
        <h2>Delete Slider</h2>
        <p>Are you sure you want to delete this Slider?</p>
        <div>
            <form method="POST" action="delete_slider.php">
                <input type="hidden" name="slider_id" value="<?php echo $slider_id; ?>">
                <button type="submit" class="btn btn-danger" name="delete">Yes</button>
                <a class="btn btn-secondary close" href="#">No</a>
            </form>
        </div>
    </div>
</div>


        
        <!-- Start Modal -->
        <div id="edit_<?php echo $slider_id; ?>" class="overlay" style="overflow-y: auto;">
            <div class="popup">
                <h2>Update <?php echo $row['slider_title']; ?> </h2>
                <a class="close" href="#">&times;</a>
                <div>
                    <form method="POST" action="manage_slider_update.php">
                        <div class="form-group mb-3">
                            <input type="hidden" class="form-control" name="slider_id" value="<?php echo $slider_id; ?>" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="slider_title" value="<?php echo strip_tags($slider_title); ?>" required>
                        </div>
                        
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">Slider Description</label>
                            <textarea class="form-control" rows="5" cols="50" name="slider_description"  required><?php echo htmlentities($slider_description); ?></textarea> 
                        </div>
                        
                        
    
                        
                        
                        
                       <br><br>
                       <center>
                       
                        
                        
                        <button class="btn btn-danger" name="submit">Update Slider Details.</button>
                        
                        </center>
                    </form>
                </div>
            </div>
        </div>
        <!-- End of Modal -->
        
        
        
        <!-- Start Modal -->
        <div id="editimage_<?php echo $slider_id; ?>" class="overlay" style="overflow-y: auto;">
            <div class="popup">
                <h2>Update Slider image</h2>
                <a class="close" href="#">&times;</a>
                <div>
                <form method="POST" action="manage_slider_image_update.php" enctype="multipart/form-data">

                        
                       <input type="hidden" class="form-control" name="slider_id" value="<?php echo $slider_id; ?>" required>
                        
                        
                         <div class="form-group mb-3">
                              <label for="focusedinput" class="col-sm-2 control-label">Slider Image</label>
                        <img src="../assets/img/uploads/slider/<?php echo $slider_image; ?>" width="200" height="100" />
        <br>
        <!-- Input field for new image -->
        <input type="file" class="form-control" name="new_slider_image">
                        </div>
                        
                        
    
                        
                        
                        
                       <br><br>
                       <center>
                       
                        
                        
                        <button class="btn btn-danger" name="submit">Update Slider Image</button>
                        
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
