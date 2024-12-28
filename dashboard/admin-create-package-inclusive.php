<?php
require('./destination_process.php');

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> <?php   echo $company_name;  ?> - Admin Package Inclusive and Excluded Creation</title>

        <!-- Add these lines to include Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>



        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/morris.css" type="text/css"/>
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <script src="js/jquery-2.1.4.min.js"></script>
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <style>
            .errorWrap {
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #dd3d36;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
            .succWrap{
                padding: 10px;
                margin: 0 0 20px 0;
                background: #fff;
                border-left: 4px solid #5cb85c;
                -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            }
        </style>
    </head>
    <body>
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="mother-grid-inner">
                    <!--header start here-->
                    <?php include('includes/header.php'); ?>

                    <div class="clearfix"> </div>	
                </div>
                <!--heder end here-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Create Package Inclusion and Exclusion  </li>
                </ol>
                <div class="grid-form">
                    <div class="grid-form1">
                        <h3>Create Package Inclusion and Exclusion </h3>
                        <?php if ($error) { ?>
                            <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div>
                        <?php } else if ($msg) { ?>
                            <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div>
                        <?php } ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <form class="form-horizontal" action="save_package_inclusion.php" method="POST" enctype="multipart/form-data">
                                  
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Package </label>
                                        <div class="col-sm-8">
                                        <?php
// Include database connection
include 'include/config.php';

// Fetch countries from the database
$sql = "SELECT * FROM packages,countries where packages.package_country=countries.country_id order by package_id desc";
$result = $conn->query($sql);

// Generate the country dropdown
echo '<select name="package_id" class="js-example-basic-single">';
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['package_id'] . '">' . $row['package_name']."- ".$row['country_name'] . '</option>';
}
echo '</select>';

// Close the database connection
?>
                                        </div>
                                    </div>

                                  
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Tour Plan </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="5" cols="50" name="tour_plan" id="packagedetails" required></textarea> 
                                        </div>
                                    </div>
                                    
                                    
                                   
                                    
                                     <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Departure location</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="departure_location"  required>
                                        </div>
                                    </div>
                                      
                                     <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Departure Time</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="departure_time"  required>
                                        </div>
                                    </div>
                                    
                                      <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Return Location</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="return_location"  required>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group" style="display:none;" >
                                        <label for="focusedinput" class="col-sm-2 control-label">Bed Room </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="bed_room" placeholder="Yes or No"   >
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Air Fares </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="air_fares" placeholder="Yes or No"   required>
                                        </div>
                                    </div>
                                    
                               
                                    
                                    
                               
                                    
                                    
                                      <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Hotel Inclusive  ?  </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="hotel" id="packagelocation" placeholder="Yes or No"  required>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Entrance Fees ?    </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="entrance_fees" id="packagelocation"  placeholder="Yes or No"  required>
                                        </div>
                                    </div>
                                    
                                         <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Tour Guide ?    </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="tour_guide" id="packagelocation" placeholder="Yes or No"  required>
                                        </div>
                                    </div>
                                    
                                         <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Insurance ?    </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="insurance" id="packagelocation" placeholder="Yes or No"  required>
                                        </div>
                                    </div>
                                         <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Food and Drinks    </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="food_and_drinks" id="packagelocation" placeholder="Yes or No"  required>
                                        </div>
                                    </div>
                                    
                                         <div class="form-group" style="display:none;" >
                                        <label for="focusedinput" class="col-sm-2 control-label"> Additional Services    </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="additional_services" id="packagelocation" placeholder="Yes or No"  >
                                        </div>
                                    </div>
                                    
                                     
                                    
                                    
                                    
                                    
                                
                                

                                   


                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="submit" class="btn-primary btn">Create Package Inclusion and Exclusion </button>

                                            <button type="reset" class="btn-inverse btn">Reset</button>
                                        </div>
                                    </div>





                            </div>
                            </form>
                        </div>
                    </div>
                    <!--//grid-->

                    <!-- script-for sticky-nav -->
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
                    <!-- /script-for sticky-nav -->
                    <!--inner block start here-->
                    <div class="inner-block">

                    </div>
                    <!--inner block end here-->
                    <!--copy rights start here-->
                    <?php include('includes/footer.php'); ?>
                    <!--COPY rights end here-->
                </div>
            </div>
            <!--//content-inner-->
            <!--/sidebar-menu-->
            <?php include('includes/sidebarmenu.php'); ?>
            <div class="clearfix"></div>		
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
        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

        <!-- /Bootstrap Core JavaScript -->	   
        <script>
    // Initialize Select2 for country dropdown
    $('select[name="country_id"]').select2();
</script>

    </body>
</html>
