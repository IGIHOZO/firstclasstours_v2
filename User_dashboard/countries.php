<?php

include('includes/config.php');

session_start();
error_reporting(0);

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
    exit();
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>World Star Tours | Admin Manage Contact_Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> 
        addEventListener("load", function() { 
            setTimeout(hideURLbar, 0); 
        }, false); 
        function hideURLbar() { 
            window.scrollTo(0,1); 
        } 
    </script>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <script src="js/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/table-style.css" />
    <link rel="stylesheet" type="text/css" href="css/basictable.css" />
    <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').basictable();
            // ... (rest of your script)
        });
    </script>
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
        .succWrap {
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
        <div class="left-content">
            <div class="mother-grid-inner">
                <?php include('includes/header.php');?>
                <div class="clearfix"> </div>	
            </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Countries</li>
            </ol>
            <div class="agile-grids">	
               
                <div class="agile-tables">
                    <div class="w3l-table-info">
                        
                        
    <!-- countries.php -->

<?php
// Include the database configuration
include 'includes/config.php';

// Fetch the list of countries from the database
$query = "SELECT * FROM countries";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Countries</title>
    <!-- Add your styles here -->
 <style>
    table {
        border-collapse: collapse;
        width: 50%;
        margin: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .active {
        color: green;
    }

    .inactive {
        color: red;
    }

    .toggle-switch {
        display: inline-block;
        width: 40px;
        height: 20px;
        background-color: #ddd;
        border-radius: 20px;
        position: relative;
        cursor: pointer;
    }

    .toggle-switch:before {
        content: '';
        position: absolute;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: white;
        top: 1px;
        left: 1px;
        transition: 0.3s;
    }

    .toggle-switch.on:before {
        transform: translateX(20px);
    }
</style>

<h1>List of Countries</h1>

<table>
    <thead>
        <tr>
            <th>Country ID</th>
            <th>Country Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through the result set
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['country_id']; ?></td>
                <td><?php echo $row['country_name']; ?></td>
                <td class="<?php echo $row['active'] == 1 ? 'active' : 'inactive'; ?>">
                    <?php echo $row['active'] == 1 ? 'Active' : 'Inactive'; ?>
                </td>
                <td>
                    <div class="toggle-switch <?php echo $row['active'] == 1 ? 'on' : ''; ?>" onclick="toggleStatus(<?php echo $row['country_id']; ?>, <?php echo $row['active']; ?>)"></div>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
function toggleStatus(countryId, currentStatus) {
    // Log the request data to the console
    console.log("Sending request with country_id: " + countryId + ", status: " + (currentStatus == 1 ? 0 : 1));

    // Send an AJAX request to update the status without refreshing the page
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "country_update.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        // Log the response to the console
        console.log(xhr.responseText);

        // Reload the page after updating the status
        location.reload();
    };

    xhr.send("country_id=" + countryId + "&status=" + (currentStatus == 1 ? 0 : 1));
}

</script>






                      
                      
                      
                      
                    </div>
                </div>
            </div>
            <div class="inner-block">
                <!-- Additional inner block content if needed -->
            </div>
            <?php include('includes/footer.php');?>
        </div>
    </div>
    <?php include('includes/sidebarmenu.php');?>
    <div class="clearfix"></div>		
  
 
</body>
</html>
