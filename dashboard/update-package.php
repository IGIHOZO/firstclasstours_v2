<?php
include('./update-package-process.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title><?php   echo $company_name;  ?>| Admin Destination Update</title>
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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Update Destination </li>
                </ol>
                <!--grid-->
                <div class="grid-form">

                    <!---->
                    <div class="grid-form1">
                        <h3>Update Destination</h3>
                        <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) {
                            ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Destination Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="destination_name" id="packagename" placeholder="Destination Name" value="<?php echo htmlentities($destinationDetails->name); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Destination Category</label>
                                        <div class="col-sm-8">
                                            <select name="destination_category"><option value="<?php echo htmlentities($destinationDetails->country_id);?>" >
                                               <?php echo htmlentities($destinationDetails->country_name);?>
                                                </option>
                                            
                                                <?php
// Include database connection
include 'include/config.php';

// Fetch countries from the database
$sql = "SELECT country_id, country_name FROM countries";
$result = $conn->query($sql);

// Generate the country dropdown

while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
}
echo '</select>';

// Close the database connection
?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Destination City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="destination_location" id="packagelocation" placeholder=" Destination Location" value="<?php echo htmlentities($destinationDetails->city); ?>" required>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Small Description</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="small_description" id="sdescr" placeholder="Small Description" value="<?php echo htmlentities($destinationDetails->description); ?>" required>
                                        </div>
                                    </div>		


       <div class="form-group">
    <label for="focusedinput" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-8">
        <textarea class="form-control" rows="5" cols="50" name="destinationdetails" id="packagedetails" placeholder="Destination Details" required><?php echo htmlentities($destinationDetails->description_full); ?></textarea> 
    </div>
</div>


                                    
                                          <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Visa Required </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="visa_required" id="packagelocation"  value="<?php echo htmlentities($destinationDetails->visa_required); ?>" required>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Language Spoken </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="languages_spoken" id="packagelocation"  value="<?php echo htmlentities($destinationDetails->languages_spoken); ?>" required>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Currency Used </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="currency_used" id="packagelocation"  value="<?php echo htmlentities($destinationDetails->currency_used); ?>" required>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Support Phone </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="support_phone" id="packagelocation"  value="<?php echo htmlentities($destinationDetails->support_phone); ?>" required>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Support Email </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="support_email" id="packagelocation"  value="<?php echo htmlentities($destinationDetails->support_email); ?>" required>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label"> Country Area </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="country_area" id="packagelocation"  value="<?php echo htmlentities($destinationDetails->country_area); ?>" required>
                                        </div>
                                    </div>
                                    
                                   
                                    
                                     
                                    
                                    
                                   
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Destination Image</label>
                                        <div class="col-sm-8">
                                            <img src="../assets/img/uploads/destination/<?php echo htmlentities($destinationDetails->image); ?>" width="200">&nbsp;&nbsp;&nbsp;<a href="change-image.php?imgid=<?php echo htmlentities($destinationDetails->destination_id); ?>">Change Image</a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-2 control-label">Last Updation Date</label>
                                        <div class="col-sm-8">
                                            <?php echo htmlentities($destinationDetails->updationdate); ?>
                                        </div>
                                    </div>		

                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="submit" class="btn-primary btn">Update</button>
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
        <!-- /Bootstrap Core JavaScript -->	   

    </body>
</html>