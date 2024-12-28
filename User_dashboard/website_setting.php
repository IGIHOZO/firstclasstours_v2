<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('./includes/config.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>World Star Tours | Admin Website Settings Manage</title>
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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Website Settings  </li>
                </ol>

            
                                <?php
$q = mysqli_query($conn, "SELECT * FROM about_company");

if (mysqli_num_rows($q) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($q)) {
        $about_us  = $row['about_us'];
        $background = $row['background'];
        $mission = $row['mission'];
        $vision = $row['vision'];
        $contact_location = $row['contact_location'];
        $contact_phone = $row['contact_phone'];
        $contact_email = $row['contact_email'];
        
        $working_time = $row['working_time'];
        $terms_of_services = $row['terms_of_services'];
        $privacy_policy = $row['privacy_policy'];
        $visa_and_passport = $row['visa_and_passport'];
        $safety = $row['safety'];
        
         $x_link = $row['x_link'];
        $youtube_link = $row['youtube_link'];
        $linkedin_link = $row['linkedin_link'];
        $facebook_link = $row['facebook_link'];
        $instagram_link = $row['instagram_link'];
        
        
          $become_rwanda_citizen = $row['become_rwanda_citizen'];
        $become_rwanda_resident = $row['become_rwanda_resident'];
        $visa_in_rwanda = $row['visa_in_rwanda'];
     
      
    }}
        ?>
       
        <!--Fields of update here -->


       <!-- Fields for updating database records -->
        <div class="container">
            <form method="POST" action="update_about_company.php">
                <div class="form-group">
                    <label for="about_us">About us (Who we are):</label>
                    <textarea class="form-control" rows="5" cols="50" name="about_us" ><?php echo $about_us !== null ? htmlentities($about_us) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="background">Background:</label>
                    <textarea class="form-control" rows="5" cols="50" name="background" ><?php echo $background !== null ? htmlentities($background) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="mission">Mission:</label>
                    <textarea class="form-control" rows="5" cols="50" name="mission" ><?php echo $mission !== null ? htmlentities($mission) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="vision">Vision:</label>
                    <textarea class="form-control" rows="5" cols="50" name="vision" ><?php echo $vision !== null ? htmlentities($vision) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="contact_location">Contact Location:</label>
                    <textarea class="form-control" rows="5" cols="50" name="contact_location" ><?php echo $contact_location !== null ? htmlentities($contact_location) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="contact_phone">Contact Phone:</label>
                    <textarea class="form-control" rows="5" cols="50" name="contact_phone" ><?php echo $contact_phone !== null ? htmlentities($contact_phone) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email:</label>
                    <textarea class="form-control" rows="5" cols="50" name="contact_email" ><?php echo $contact_email !== null ? htmlentities($contact_email) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="working_time">Working Time:</label>
                    <textarea class="form-control" rows="5" cols="50" name="working_time" ><?php echo $working_time !== null ? htmlentities($working_time) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="terms_of_services">Terms of Services:</label>
                    <textarea class="form-control" rows="5" cols="50" name="terms_of_services" ><?php echo $terms_of_services !== null ? htmlentities($terms_of_services) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="privacy_policy">Privacy Policy:</label>
                    <textarea class="form-control" rows="5" cols="50" name="privacy_policy" ><?php echo $privacy_policy !== null ? htmlentities($privacy_policy) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="visa_and_passport"> Travel Tips (Visa and Passport):</label>
                    <textarea class="form-control" rows="5" cols="50" name="visa_and_passport" ><?php echo $visa_and_passport !== null ? htmlentities($visa_and_passport) : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="safety">Travel Tips (Health and Safety ):</label>
                    <textarea class="form-control" rows="5" cols="50" name="safety" ><?php echo $safety !== null ? htmlentities($safety) : ''; ?></textarea>
                </div>
                
                
                
                
                  <div class="form-group">
                    <label for="safety">Became a Rwanda Citizen (Immigration Services ):</label>
                    <textarea class="form-control" rows="5" cols="50" name="become_rwanda_citizen" ><?php echo $become_rwanda_citizen !== null ? htmlentities($become_rwanda_citizen) : ''; ?></textarea>
                </div>
                
                
                
                  <div class="form-group">
                    <label for="safety">Became Rwanda Resident (Immigration Services ):</label>
                    <textarea class="form-control" rows="5" cols="50" name="become_rwanda_resident" ><?php echo $become_rwanda_resident !== null ? htmlentities($become_rwanda_resident) : ''; ?></textarea>
                </div>
                
                
                  <div class="form-group">
                    <label for="safety">Work Visa in Rwanda (Immigration Services ):</label>
                    <textarea class="form-control" rows="5" cols="50" name="visa_in_rwanda" ><?php echo $visa_in_rwanda !== null ? htmlentities($visa_in_rwanda) : ''; ?></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="safety">X Link:</label>
                    <textarea class="form-control" rows="5" cols="50" name="x_link" ><?php echo $x_link !== null ? htmlentities($x_link) : ''; ?></textarea>
                </div>
                 <div class="form-group">
                    <label for="safety">Youtube Link:</label>
                    <textarea class="form-control" rows="5" cols="50" name="youtube_link" ><?php echo $youtube_link !== null ? htmlentities($youtube_link) : ''; ?></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="safety">Linkedin Link:</label>
                    <textarea class="form-control" rows="5" cols="50" name="linkedin_link" ><?php echo $linkedin_link !== null ? htmlentities($linkedin_link) : ''; ?></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="safety">Facebook Link:</label>
                    <textarea class="form-control" rows="5" cols="50" name="facebook_link" ><?php echo $facebook_link !== null ? htmlentities($facebook_link) : ''; ?></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="safety">Instagram Link:</label>
                    <textarea class="form-control" rows="5" cols="50" name="instagram_link" ><?php echo $instagram_link !== null ? htmlentities($instagram_link) : ''; ?></textarea>
                </div>
                
                
                <!-- Add other textarea fields here with corresponding labels -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>






               <?php include('includes/footer.php'); ?>
         
</div>
            
            <?php include('includes/sidebarmenu.php'); ?>

        <!--js -->
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- /Bootstrap Core JavaScript -->	   

    </body>
</html>
