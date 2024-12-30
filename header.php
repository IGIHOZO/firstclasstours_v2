 <!-- header html start -->
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="header-contact-info">
                                <ul>
                                    <li>
                                        <a href="tel:<?php  echo $contact_phone;  ?>"><i class="fas fa-phone-alt"></i> <?php  echo $contact_phone;  ?></a>
                                    </li>
                                    <li>
                                        <a href="mailto:<?php  echo $contact_email;  ?>">
                                            <i class="fas fa-envelope"></i> 
                                            <span class="__cf_email__" data-cfemail="80e3efedf0e1eef9c0e4efede1e9eeaee3efed">
                                            <?php  echo $contact_email;  ?></span></a>
                                    </li>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i> <?php  echo $contact_location;  ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                            <div class="header-social social-links">
                                <ul>

                                    <li><a href="<?php  echo $facebook_link; ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php  echo $x_link; ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php  echo $instagram_link; ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php  echo $linkedin_link; ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="<?php  echo $youtube_link; ?>"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-header">
                <div class="container d-flex justify-content-between align-items-center" id="main-menus">
                    <div class="site-identity">
                        <h1 class="site-title">
                            <a href="index.php">
                           <img class="white-logo" src="dashboard/images/logo/<?php  echo $website_logo; ?>" alt="logo">
                           <img class="black-logo" src="dashboard/images/logo/<?php  echo $website_logo; ?>" alt="logo" >
                        </a>
                        </h1>
                    </div>
                    <div class="main-navigation d-none d-lg-block">
                        <nav id="navigation" class="navigation">
                            <ul>
                                <li class="menu-item">
                                    <a href="index.php">Home</a>
                                  
                                </li>
                                <li class="menu-item">
                                    <a href="about.php">About Us</a>
                                  
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Destinations</a>
                                    <ul>
                                        <?php
                                        // Fetch countries from the database
                                        $sql = "SELECT country_id, country_name FROM countries WHERE active='1'";
                                        $result = $conn->query($sql);

                                        // Check for errors in the query
                                        if (!$result) {
                                            echo "<li>Error in SQL query: " . $conn->error . "</li>";
                                        }

                                        // Check if there are results
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                $countryId = $row['country_id'];
                                                $countryName = $row['country_name'];
                                                echo '<li><a href="country.php?country_id=' . $countryId . '">' . $countryName . '</a></li>';
                                            }
                                        } else {
                                            echo '<li>No destinations available</li>';
                                        }
                                        ?>
                                    </ul>
                                </li>


                                <li class="menu-item-has-children">
                                    <a href="#">Packages</a>
                                    <ul>
                                    <?php
                                        // Fetch countries from the database
                                        $sql = "SELECT country_id, country_name FROM countries WHERE active='1'";
                                        $result = $conn->query($sql);

                                        // Check for errors in the query
                                        if (!$result) {
                                            echo "<li>Error in SQL query: " . $conn->error . "</li>";
                                        }

                                        // Check if there are results
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                $countryId = $row['country_id'];
                                                $countryName = $row['country_name'];
                                                echo '<li><a href="packages.php?countryID=' . $countryId . '">' . $countryName . '</a></li>';
                                            }
                                        } else {
                                            echo '<li>No destinations available</li>';
                                        }
                                        ?>
                                    </ul>
                                </li>



                            
                                <li class="menu-item">
                                    <a href="car_rental.php">Car Hiring</a>
                                </li>
                                <li class="menu-item">
                                    <a href="hotel_booking.php">Hotels</a>
                                </li>
                                <li class="menu-item">
                                        <a href="User_dashboard/"><b style="font-weight: bolder;font-style:underline;color:white">Login</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-btn">
                        <a href="register_company.php" class="button-primary">Register Your Company</a>
                    </div>

                </div>
            </div>
            <div class="mobile-menu-container"></div>