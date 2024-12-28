<?php
$company_type = isset($_SESSION['company_type']) ? $_SESSION['company_type'] : '';

?>
<div class="header-main">
    <div class="logo-w3-agile">
        <h1><a href="dashboard.php"><?php  echo $company_name;  ?> Management System</a></h1>
    </div>


    <div class="profile_details w3l">		
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <div class="profile_img">	
                        <span class="prfil-img"><img src="images/User-icon.png" alt=""> </span> 
                        <div class="user-name">
                            <p>Welcome</p>
                            <span> User: <?php  echo $_SESSION['company_type']; ?></span>
                        </div>
                        <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up"></i>
                        <div class="clearfix"></div>	
                    </div>	
                </a>
                <ul class="dropdown-menu drp-mnu">
                    <!-- <li> <a href="admin-change-password.php"><i class="fa fa-user"></i> Profile</a> </li>  -->
                    <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="clearfix"> </div>	
</div>