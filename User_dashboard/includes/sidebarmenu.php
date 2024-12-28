<?php session_start();
$company_type = isset($_SESSION['company_type']) ? $_SESSION['company_type'] : ''; // Get company type from session
?>

<div class="sidebar-menu">
    <header class="logo1">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
    </header>
    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
    <div class="menu">
        <ul id="menu">
            <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>

            <?php if ($company_type == 'tour_company'): ?>
                <!-- Full Menu for Tour Company -->
                <li id="menu-academico"><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Packages Manage</span>  <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="">Create New </a></li>
                        <li id="menu-academico-avaliacoes"><a href="">Manage</a></li>
                    </ul>
                </li>
                <li id="menu-academico"><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Packages Incl and Excl </span>  <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="">Create New </a></li>
                        <li id="menu-academico-avaliacoes"><a href="">Manage</a></li>
                    </ul>
                </li>
                <li id="menu-academico"><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Packages Iteneraries </span>  <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="">Create New </a></li>
                        <li id="menu-academico-avaliacoes"><a href="">Manage</a></li>
                    </ul>
                </li>
            <?php elseif ($company_type == 'transport_company'): ?>
                <!-- Menu for Transport Company -->
              
               
                    <li id="menu-academico"><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Car Rental </span> 
                     <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="car_rental.php">Create New Car Rental</a></li>
                        <li id="menu-academico-avaliacoes"><a href="car_rental_display.php">View all Recorded Car</a></li>
                    </ul>
                </li>

                <li id="menu-academico"><a href="car_rental_images.php">
                <i class="fa fa-upload" aria-hidden="true"></i><span> Car More Images </span></a></li>

             <li id="menu-academico"><a href="car_select_accessories.php">
                <i class="fa fa-upload" aria-hidden="true"></i><span> Car Accessories</span></a></li>




            <?php elseif ($company_type == 'hotel_company'): ?>
                <!-- Menu for Hotel -->
                <li id="menu-academico"><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Hotel Rooms </span> 
                     <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                    <ul id="menu-academico-sub">
                        <li id="menu-academico-avaliacoes"><a href="hotel.php">Create New Hotel Room</a></li>
                        <li id="menu-academico-avaliacoes"><a href="display_hotel_rooms.php">View all Recorded Room</a></li>
                    </ul>
            </li>


            <li id="menu-academico"><a href="hotel_room_other_images.php">
                <i class="fa fa-upload" aria-hidden="true"></i><span> Hotel Room More Images </span></a></li>


            <?php endif; ?>

        </ul>
    </div>
</div>
