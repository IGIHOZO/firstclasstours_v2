<?php
require('./destination_process.php');

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> <?php   echo $company_name;  ?> - Admin Package Creation</title>

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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Create Package </li>
                </ol>
                <div class="grid-form">
                    <div class="grid-form1">
                        <h3>Create Package</h3>
                        <?php if ($error) { ?>
                            <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div>
                        <?php } else if ($msg) { ?>
                            <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div>
                        <?php } ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <form class="form-horizontal" action="save_package.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="package_name"
                                             id="packagename" placeholder="Enter Package name" required>
                                        </div>
                                    </div>
                       

                                  
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Package Introduction </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="5" cols="50" name="package_introduction" id="packagedetails" placeholder="Package Introduction " required></textarea> 
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Package Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="5" cols="50" name="package_description" id="packagedetails" placeholder="Package Description " required></textarea> 
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">How many days and nights ? </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="package_days_and_nights" id="packagelocation" placeholder=" Days and nights" required>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group" style="display:none;">
                                        <label for="focusedinput" class="col-sm-2 control-label">Package from </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control1" name="package_from"  >
                                        </div>
                                    </div>
                                    
                                     <div class="form-group" style="display:none;">
                                        <label for="focusedinput" class="col-sm-2 control-label">Package to </label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control1" name="package_to"  >
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Package price </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="package_price"  required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Travel Type  </label>
                                        <div class="col-sm-8">
                                        <?php
// Include database connection
include 'include/config.php';

// Fetch countries from the database
$sql = "SELECT travel_type_id, travel_type_name FROM travel_type";
$result = $conn->query($sql);

// Generate the country dropdown
echo '<select name="travel_type" class="js-example-basic-single">';
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['travel_type_id'] . '">' . $row['travel_type_name'] . '</option>';
}
echo '</select>';

// Close the database connection
?>
                                        </div>
                                    </div>
                                    
                                    
                                                                     <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">  Package Type  </label>
                                        <div class="col-sm-8">
                                        <?php
// Include database connection
include 'include/config.php';

// Fetch countries from the database
$sql = "SELECT package_type_id, package_type_name FROM package_type";
$result = $conn->query($sql);

// Generate the country dropdown
echo '<select name="package_type" class="js-example-basic-single">';
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['package_type_id'] . '">' . $row['package_type_name'] . '</option>';
}
echo '</select>';

// Close the database connection
?>
                                        </div>
                                    </div>
                                    
                                    
                                          <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Package Country</label>
                                        <div class="col-sm-8">
                                        <?php
// Include database connection
include 'include/config.php';

// Fetch countries from the database
$sql = "SELECT country_id, country_name FROM countries";
$result = $conn->query($sql);

// Generate the country dropdown
echo '<select name="package_country_id" class="js-example-basic-single">';
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
}
echo '</select>';

// Close the database connection
?>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Number of person   </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="number_of_person" id="packagelocation" placeholder=" NUmber of person " required>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="package_image" id="packageimage" required>
                                        </div>
                                    </div>	

                                

                                   


                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="submit" class="btn-primary btn">Create Package</button>

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
