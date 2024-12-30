-- Adminer 4.8.1 MySQL 11.6.2-MariaDB-ubu2404 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `about_company`;
CREATE TABLE `about_company` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `about_us` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `VisionImage` varchar(255) DEFAULT NULL,
  `MissionImage` varchar(255) DEFAULT NULL,
  `AboutImage` varchar(255) DEFAULT NULL,
  `BackgroundImage` varchar(255) DEFAULT NULL,
  `contact_location` text DEFAULT NULL,
  `contact_phone` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `working_time` text DEFAULT NULL,
  `terms_of_services` text DEFAULT NULL,
  `privacy_policy` text DEFAULT NULL,
  `visa_and_passport` text DEFAULT NULL,
  `safety` text DEFAULT NULL,
  `x_link` varchar(200) DEFAULT NULL,
  `youtube_link` varchar(200) DEFAULT NULL,
  `facebook_link` varchar(200) DEFAULT NULL,
  `linkedin_link` varchar(200) DEFAULT NULL,
  `instagram_link` varchar(200) DEFAULT NULL,
  `become_rwanda_citizen` text DEFAULT NULL,
  `become_rwanda_resident` text DEFAULT NULL,
  `visa_in_rwanda` text DEFAULT NULL,
  `website_logo` varchar(100) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `company_moto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`about_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `about_company` (`about_id`, `about_us`, `background`, `mission`, `vision`, `VisionImage`, `MissionImage`, `AboutImage`, `BackgroundImage`, `contact_location`, `contact_phone`, `contact_email`, `working_time`, `terms_of_services`, `privacy_policy`, `visa_and_passport`, `safety`, `x_link`, `youtube_link`, `facebook_link`, `linkedin_link`, `instagram_link`, `become_rwanda_citizen`, `become_rwanda_resident`, `visa_in_rwanda`, `website_logo`, `company_name`, `company_moto`) VALUES
(1,	'First Class Tours is a premier tourism company based in Rwanda, offering exceptional travel experiences across the stunning landscapes of Africaâ€™s heartland. Founded in 2018, we have proudly become a trusted name in the tourism industry, renowned for delivering curated tours, luxury travel experiences, and personalized service that exceeds expectations.\r\n\r\nOur commitment to excellence is evident in our wide range of offerings, including wildlife safaris, cultural tours, adventure excursions, and luxury travel packages. With a dedicated team of professionals passionate about showcasing Rwandaâ€™s unique beauty and culture, we ensure every journey with us is unforgettable.\r\n\r\nAt First Class Tours, we understand the power of travel to educate, inspire, and transform. Thatâ€™s why we prioritize sustainable practices, collaborate with local communities, and support initiatives that preserve the environment and promote cultural heritage. Whether you seek an intimate wildlife encounter, a luxury getaway, or an immersive cultural experience, First Class Tours is your trusted partner in creating memories that last a lifetime.',	'Founded in 2018, First Class Tours emerged as a visionary initiative to elevate Rwandaâ€™s tourism industry to global prominence. From our humble beginnings, we have grown into a leading name synonymous with excellence, innovation, and professionalism.\r\n\r\nOur journey began with a clear mission: to provide world-class travel experiences that celebrate Rwandaâ€™s rich biodiversity, breathtaking landscapes, and warm hospitality. Over the years, we have expanded our services to include bespoke luxury tours, group adventures, and eco-friendly travel options, catering to a diverse clientele from across the globe.\r\n\r\nHighlights of our journey include:\r\n\r\n2018: Established with a focus on wildlife safaris and cultural tours, introducing travelers to the iconic Volcanoes National Park and Akagera National Park.\r\n\r\n2020: Introduced luxury travel packages, combining Rwandaâ€™s finest accommodations with exclusive experiences.\r\n\r\n2022: Launched sustainability-focused initiatives, partnering with local communities to promote conservation and cultural preservation.\r\n\r\n2024: Expanded operations to include training and internship programs, empowering the next generation of tourism professionals.\r\n\r\nToday, First Class Tours continues to set new standards in the tourism industry, blending innovation with tradition to offer unparalleled travel experiences. As we look to the future, we remain committed to our core values of integrity, excellence, and sustainability, striving to be a beacon of inspiration for Rwanda and beyond.',	'To provide unparalleled, transformative, and memorable travel experiences that celebrate Rwandaâ€™s natural beauty, rich culture, and vibrant heritage. We aim to promote sustainable tourism that supports local communities, fosters environmental conservation, and inspires global travelers to explore the wonders of Africa.',	'To be the premier tourism company in Rwanda, recognized globally for exceptional service, innovation, and leadership in promoting Africa as a must-visit destination. We aspire to empower the next generation of tourism professionals and contribute to Rwandaâ€™s standing as a leader in sustainable and luxury travel.',	'1735405013_67702dd511722.webp',	'1735405013_67702dd5113da.webp',	'1735405013_67702dd51085d.webp',	'1735405013_67702dd510efb.webp',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'logowhite.png',	'First Class Tours',	'Explore Rwanda\'s beauty with our premier tour packages');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_email` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`admin_email`, `name`, `password`) VALUES
('admin@firstclasstours.rw',	'Akingeney Alphonse',	'21232f297a57a5a743894a0e4a801fc3');

DROP TABLE IF EXISTS `Attractions`;
CREATE TABLE `Attractions` (
  `AttractionID` int(11) NOT NULL AUTO_INCREMENT,
  `AttractionDestinationID` int(11) DEFAULT NULL,
  `AttractionTitle` varchar(255) DEFAULT NULL,
  `AttractionImage` varchar(255) DEFAULT NULL,
  `AttractionDescription` text DEFAULT NULL,
  `AttractionStatus` tinyint(1) DEFAULT NULL,
  `AttractionTimeCreated` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`AttractionID`),
  KEY `fk_AttractionDestination` (`AttractionDestinationID`),
  CONSTRAINT `fk_AttractionDestination` FOREIGN KEY (`AttractionDestinationID`) REFERENCES `destination` (`destination_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Attractions` (`AttractionID`, `AttractionDestinationID`, `AttractionTitle`, `AttractionImage`, `AttractionDescription`, `AttractionStatus`, `AttractionTimeCreated`) VALUES
(1,	2,	'efwds',	'images/attractions/wall.jpeg',	' dfsvds wewdsvasdzv wefsavcawds ewdsv',	1,	'2024-12-30 09:29:21'),
(2,	1,	'Volcano National Park',	'images/attractions/volcano.jpeg',	'vfe vdsxzfds dsfewvew ee wdsfvfe vdsxzfds dsfewvew ee wdsf',	1,	'2024-12-30 09:33:36'),
(3,	1,	'NYUNGWE Forest',	'images/attractions/67726f6634759_while-dead-eat-sleep-code-gift-programmer-gift-graphic-design-printed-casual-daily-basic-coffee-mug-20220731161316-mqpbcio5.jpg',	'jkjv ds kljvkkjsd dsv sdfa sdfakj sdjkjv ds kljvkkjsd dsv sdfa sdfakj sdjkjv ds kljvkkjsd dsv sdfa sdfakj sd',	1,	'2024-12-30 10:01:10');

DROP TABLE IF EXISTS `car_rental`;
CREATE TABLE `car_rental` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_name` varchar(300) NOT NULL,
  `car_price` varchar(100) NOT NULL,
  `number_of_seat` int(11) NOT NULL,
  `car_year` int(11) NOT NULL,
  `car_fuel_type` varchar(200) NOT NULL,
  `car_overview` text NOT NULL,
  `car_brand` varchar(300) NOT NULL,
  `car_main_image` varchar(100) NOT NULL,
  `car_owner_id` int(11) NOT NULL,
  `car_status` int(11) NOT NULL DEFAULT 1,
  `car_recorded_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `car_rental` (`car_id`, `car_name`, `car_price`, `number_of_seat`, `car_year`, `car_fuel_type`, `car_overview`, `car_brand`, `car_main_image`, `car_owner_id`, `car_status`, `car_recorded_date`) VALUES
(1,	'Toyota land cruiser V8',	'100',	5,	2018,	'Diesel',	'EGTRTERGRGFD',	'Toyota',	'v8.jpeg',	1,	1,	'2024-12-23 15:05:30');

DROP TABLE IF EXISTS `car_rental_images`;
CREATE TABLE `car_rental_images` (
  `car_rental_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_rental_id` int(11) NOT NULL,
  `car_rental_other_image` varchar(100) NOT NULL,
  `car_rental_image_recorded_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`car_rental_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `car_rental_images` (`car_rental_image_id`, `car_rental_id`, `car_rental_other_image`, `car_rental_image_recorded_date`) VALUES
(3,	1,	'toyota1.jpg',	'2024-12-20 12:45:01'),
(4,	1,	'benz.jpg',	'2024-12-20 13:00:47'),
(10,	1,	'AT-122.avif',	'2024-12-23 15:11:31'),
(11,	1,	'images (1).jpeg',	'2024-12-23 15:12:24');

DROP TABLE IF EXISTS `car_rental_inclusive`;
CREATE TABLE `car_rental_inclusive` (
  `car_inclusive_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `Air_Conditioner` int(11) NOT NULL DEFAULT 1,
  `AntiLock_Braking_System` int(11) NOT NULL DEFAULT 1,
  `Power_Steering` int(11) NOT NULL DEFAULT 1,
  `Power_Windows` int(11) NOT NULL DEFAULT 1,
  `CD_Player` int(11) NOT NULL DEFAULT 1,
  `Leather_Seats` int(11) NOT NULL DEFAULT 1,
  `Central_Locking` int(11) NOT NULL DEFAULT 1,
  `Power_Door_Locks` int(11) NOT NULL DEFAULT 1,
  `Brake_Assist` int(11) NOT NULL DEFAULT 1,
  `Driver_Airbag` int(11) NOT NULL DEFAULT 1,
  `Passenger_Airbag` int(11) NOT NULL DEFAULT 1,
  `Crash_Sensor` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`car_inclusive_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `car_rental_inclusive` (`car_inclusive_id`, `car_id`, `Air_Conditioner`, `AntiLock_Braking_System`, `Power_Steering`, `Power_Windows`, `CD_Player`, `Leather_Seats`, `Central_Locking`, `Power_Door_Locks`, `Brake_Assist`, `Driver_Airbag`, `Passenger_Airbag`, `Crash_Sensor`) VALUES
(5,	4,	1,	1,	1,	1,	1,	1,	1,	1,	1,	1,	1,	1),
(6,	1,	1,	1,	1,	1,	1,	1,	1,	1,	1,	1,	1,	1);

DROP TABLE IF EXISTS `car_rental_slider`;
CREATE TABLE `car_rental_slider` (
  `car_rental_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_rental_slider_image` varchar(100) NOT NULL,
  `car_rental_slider_description` varchar(200) NOT NULL,
  `car_rental_slider_recorded_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`car_rental_slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `car_rental_slider` (`car_rental_slider_id`, `car_rental_slider_image`, `car_rental_slider_description`, `car_rental_slider_recorded_date`) VALUES
(1,	'slider1.jpg',	'Transport Services ',	'2024-12-09 22:57:53'),
(2,	'slider1.jpg',	'Car Rental Services ',	'2024-12-09 22:57:53');

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE `contact_us` (
  `enq_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_num` char(10) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp(),
  `reply` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`enq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contact_us` (`enq_id`, `name`, `email`, `mobile_num`, `subject`, `description`, `posting_date`, `reply`) VALUES
(11,	'jhbjk',	NULL,	NULL,	NULL,	NULL,	'2023-11-21 13:37:37',	NULL);

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `countries` (`country_id`, `country_name`, `active`) VALUES
(1,	'Algeria',	0),
(2,	'Angola',	0),
(3,	'Benin',	0),
(4,	'Botswana',	0),
(5,	'Burkina Faso',	0),
(6,	'Burundi',	0),
(7,	'Cabo Verde',	0),
(8,	'Cameroon',	0),
(9,	'Central African Republic',	0),
(10,	'Chad',	0),
(11,	'Comoros',	0),
(12,	'Democratic Republic of the Congo',	0),
(13,	'Djibouti',	0),
(14,	'Egypt',	0),
(15,	'Equatorial Guinea',	0),
(16,	'Eritrea',	0),
(17,	'Eswatini',	0),
(18,	'Ethiopia',	0),
(19,	'Gabon',	0),
(20,	'Gambia',	0),
(21,	'Ghana',	0),
(22,	'Guinea',	0),
(23,	'Guinea-Bissau',	0),
(24,	'Ivory Coast',	0),
(25,	'Kenya',	1),
(26,	'Lesotho',	0),
(27,	'Liberia',	0),
(28,	'Libya',	0),
(29,	'Madagascar',	0),
(30,	'Malawi',	0),
(31,	'Mali',	0),
(32,	'Mauritania',	0),
(33,	'Mauritius',	0),
(34,	'Morocco',	0),
(35,	'Mozambique',	0),
(36,	'Namibia',	1),
(37,	'Niger',	0),
(38,	'Nigeria',	0),
(39,	'Rwanda',	1),
(40,	'Sao Tome and Principe',	0),
(41,	'Senegal',	0),
(42,	'Seychelles',	0),
(43,	'Sierra Leone',	0),
(44,	'Somalia',	0),
(45,	'South Africa',	1),
(46,	'South Sudan',	0),
(47,	'Sudan',	0),
(48,	'Tanzania',	1),
(49,	'Togo',	0),
(50,	'Tunisia',	1),
(51,	'Uganda',	1),
(52,	'Zambia',	1),
(53,	'Zimbabwe',	1);

DROP TABLE IF EXISTS `destination`;
CREATE TABLE `destination` (
  `destination_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `description_full` mediumtext NOT NULL,
  `creationdate` timestamp NULL DEFAULT current_timestamp(),
  `updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `visa_required` varchar(100) DEFAULT NULL,
  `languages_spoken` varchar(100) DEFAULT NULL,
  `currency_used` varchar(100) DEFAULT NULL,
  `support_phone` varchar(100) DEFAULT NULL,
  `support_email` varchar(100) DEFAULT NULL,
  `country_area` varchar(100) DEFAULT NULL,
  `visa_requirements_document` varchar(100) DEFAULT NULL,
  `country_info` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`destination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `destination` (`destination_id`, `name`, `category`, `description`, `image`, `city`, `description_full`, `creationdate`, `updationdate`, `visa_required`, `languages_spoken`, `currency_used`, `support_phone`, `support_email`, `country_area`, `visa_requirements_document`, `country_info`) VALUES
(1,	'RWANDA Destination',	39,	'A land of thousand hills, vibrant culture, and unforgettable wildlife, Rwanda offers a unique blend of natural beauty and rich history, making it the perfect destination for adventure, relaxation, and exploration.',	'file_20241223_124804.jpg',	'Kigali city',	'Rwanda, often called the \"Land of a Thousand Hills,\" is a stunning country nestled in the heart of East Africa. Known for its breathtaking landscapes, Rwanda boasts rolling green hills, lush rainforests, and sparkling lakes. The capital city, Kigali, is the vibrant heart of the country, offering visitors a mix of modernity and tradition with its bustling markets, cultural sites, and rich history.\r\n\r\nRwanda is not just about scenery; itâ€™s also home to some of Africaâ€™s most iconic wildlife, including the endangered mountain gorillas in Volcanoes National Park. Visitors can also explore the savannahs of Akagera National Park, filled with diverse wildlife, or relax on the serene shores of Lake Kivu.\r\n\r\nWhether you are looking to immerse yourself in cultural experiences, embark on thrilling safaris, or simply enjoy the peaceful atmosphere, Rwanda provides an exceptional travel experience that blends nature, adventure, and history seamlessly.',	'2024-12-23 12:48:04',	'2024-12-23 12:48:04',	'Visa on a live',	'Kinyarwanda, English, French, Kiswahili.',	'Francs',	'+250',	'alphonse@firstclasstours.rw',	'26,338km',	'file_20241223_124804.pdf',	'file_20241223_124804.pdf'),
(2,	'Kenya Destination',	25,	'Experience Kenyaâ€™s breathtaking landscapes, vibrant wildlife, and rich culture. Explore Nairobi, the Maasai Mara, Mount Kenya, and serene beaches for an unforgettable African adventure.',	'file_20241227_112301.webp',	'Nairobi',	'Kenya offers a perfect blend of wildlife, adventure, and culture. Visit the bustling capital of Nairobi, home to vibrant markets and historical landmarks. Witness the spectacular wildebeest migration in the Maasai Mara, explore the majestic Mount Kenya, and unwind on the pristine beaches of the Kenyan coast. Discover traditional Maasai culture and enjoy thrilling safaris in world-renowned national parks.',	'2024-12-27 11:23:01',	'2024-12-27 11:23:01',	'yes',	'English and Swahili',	'KES',	'+254',	'info@magicalkenya.com',	'580,367',	'file_20241227_112301.pdf',	'file_20241227_112301.pdf'),
(3,	'South Africa Destination',	45,	'South Africa, a land of diverse landscapes and cultures, offers stunning wildlife safaris, vibrant cities, and breathtaking coastlines. A must-visit for adventurers and culture enthusiasts alike.',	'file_20241227_123819.jpg',	'Pretoria, Cape Town, Bloemfontein',	'South Africa is a country of remarkable contrasts and rich cultural heritage. Known for its iconic safaris, it is home to the Big Five in its renowned national parks like Kruger. Cities like Cape Town, with its picturesque Table Mountain, and Johannesburg, a hub of history and urban vibrance, showcase South Africa\'s modern and historic allure. Coastal gems such as Durban provide idyllic beaches and a melting pot of flavors and traditions. Whether you\'re exploring lush wine lands, trekking scenic trails, or diving into the country\'s storied past, South Africa promises unforgettable experiences.\r\n',	'2024-12-27 12:38:19',	'2024-12-27 12:38:19',	'yes',	'English, Zulu, Xhosa, Afrikaans, and others',	'South African Rand (ZAR)',	'+27 ',	'info@southafrica.net',	'1,221,037 kmÂ²',	'file_20241227_123819.pdf',	'file_20241227_123819.pdf');

DROP TABLE IF EXISTS `des_feedback`;
CREATE TABLE `des_feedback` (
  `feedback_id` varchar(10) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `tourist_id` int(10) DEFAULT NULL,
  `destination_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `driver`;
CREATE TABLE `driver` (
  `driver_id` varchar(100) NOT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profile_pic` blob DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `tourist_id` int(10) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `driver_feedback`;
CREATE TABLE `driver_feedback` (
  `fb_id` varchar(10) NOT NULL,
  `fb_description` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `tourist_id` int(10) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `guide`;
CREATE TABLE `guide` (
  `guide_id` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profile_pic` blob DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`guide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `guide_feedback`;
CREATE TABLE `guide_feedback` (
  `fb_id` varchar(10) NOT NULL,
  `fb_description` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `tourist_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`fb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `homepage_logo`;
CREATE TABLE `homepage_logo` (
  `logo_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` text NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `homepage_logo` (`logo_id`, `logo`) VALUES
(1,	'logonew.png');

DROP TABLE IF EXISTS `homepage_slider`;
CREATE TABLE `homepage_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_title` text NOT NULL,
  `slider_description` text NOT NULL,
  `slider_image` text NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `homepage_slider` (`slider_id`, `slider_title`, `slider_description`, `slider_image`) VALUES
(9,	'VISIT ZAMBIA',	'ENJOY ADVENTURE HARITAGES COUNTURY',	'Zambia_Tourism_Heritage_Homepage_Slide.png'),
(11,	'VISIT AFRICA ',	'LOVELY',	'A_breathtaking_wide-angle_view_of_African_wildlife.png');

DROP TABLE IF EXISTS `homepage_video`;
CREATE TABLE `homepage_video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `embended_code` text NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `homepage_video` (`video_id`, `embended_code`) VALUES
(1,	'<iframe width=\"1136\" height=\"639\" src=\"https://www.youtube.com/embed/QeA4KOMbJq4\" title=\"From east to west, experience Rwanda in just 3 minutes\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>');

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `hotel_address` varchar(255) NOT NULL,
  `star_rating` int(11) NOT NULL,
  `room_types` text NOT NULL,
  `checkin_policy` text NOT NULL,
  `hotel_amenities` text NOT NULL,
  `dining_options` text NOT NULL,
  `accessibility_features` text DEFAULT NULL,
  `hotel_certificate` varchar(255) NOT NULL,
  `hotel_logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 0,
  `password` varchar(200) NOT NULL DEFAULT '123',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hotels` (`id`, `hotel_name`, `owner_name`, `contact_email`, `phone_number`, `hotel_address`, `star_rating`, `room_types`, `checkin_policy`, `hotel_amenities`, `dining_options`, `accessibility_features`, `hotel_certificate`, `hotel_logo`, `created_at`, `active`, `password`) VALUES
(1,	'Patty hotel',	'TUMUKUNDE IHOGOZA Patience Elina',	'tumukundepatience5@gmail.com',	'+250 783 993 456 ',	'kimironko',	5,	'Single suite',	'10am/11pm',	'WIFI, POOL,....',	'Room services',	'Wheelchair Access',	'1734967270_visa in Rwanda.pdf',	'1734967270_General information of Rwanda.pdf',	'2024-12-23 15:21:10',	0,	'123');

DROP TABLE IF EXISTS `hotel_booking_slider`;
CREATE TABLE `hotel_booking_slider` (
  `hotel_booking_slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_booking_slider_image` varchar(100) NOT NULL,
  `hotel_booking_slider_description` varchar(200) NOT NULL,
  `hotel_booking_slider_recorded_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`hotel_booking_slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hotel_booking_slider` (`hotel_booking_slider_id`, `hotel_booking_slider_image`, `hotel_booking_slider_description`, `hotel_booking_slider_recorded_date`) VALUES
(1,	'slider1.jpg',	'Explore Available Rooms Services ',	'2024-12-09 22:57:53'),
(2,	'slider2.jpg',	'Hotel Booking ',	'2024-12-09 22:57:53');

DROP TABLE IF EXISTS `hotel_rooms`;
CREATE TABLE `hotel_rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(300) NOT NULL,
  `room_price` varchar(100) NOT NULL,
  `room_type` varchar(110) NOT NULL,
  `room_hotel_star` int(11) NOT NULL,
  `room_amenities` varchar(200) NOT NULL,
  `room_main_image` varchar(100) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_status` int(11) NOT NULL DEFAULT 1,
  `room_recorded_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hotel_rooms` (`room_id`, `room_name`, `room_price`, `room_type`, `room_hotel_star`, `room_amenities`, `room_main_image`, `hotel_id`, `room_status`, `room_recorded_date`) VALUES
(4,	'Suite room',	'400',	'Suite',	5,	'TV, WIFI, Mirrors, Boiler,.....',	'Room.webp',	1,	1,	'2024-12-23 15:27:42');

DROP TABLE IF EXISTS `hotel_room_images`;
CREATE TABLE `hotel_room_images` (
  `hotel_room_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_room_id` int(11) NOT NULL,
  `hotel_room_other_image` varchar(100) NOT NULL,
  `hotel_room_image_recorded_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`hotel_room_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `itineraries`;
CREATE TABLE `itineraries` (
  `itinerary_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `day_time_plan` varchar(100) NOT NULL,
  `day_full_description` text NOT NULL,
  `itinerariesImage` varchar(255) DEFAULT NULL,
  `itinerary_recorded_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`itinerary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `itineraries` (`itinerary_id`, `package_id`, `title`, `day_time_plan`, `day_full_description`, `itinerariesImage`, `itinerary_recorded_date`) VALUES
(1,	1,	'Day 1: Arrival in Kigali',	'9am to 7pm',	'werfghj',	NULL,	'2024-12-17 03:03:58'),
(2,	3,	'Day 1: Arrival in Kigali',	'full day',	'\r\nUpon arrival at Kigali International Airport, you will be warmly welcomed by our First Class Tours representative. Enjoy a short transfer to your luxury hotel, where you can relax after your journey. In the evening, attend a welcome dinner with a traditional Rwandan dance performance.',	NULL,	'2024-12-23 12:16:53'),
(3,	3,	'Day 2: Exploring Kigali',	'full day',	'Dive into the vibrant culture and history of Kigali. Visit the Kigali Genocide Memorial, Inema Arts Center, and local craft markets. Sample delicious Rwandan cuisine at a popular restaurant.',	NULL,	'2024-12-23 12:18:52'),
(4,	3,	'Day 3: Transfer to Akagera National Park',	'full day',	'Journey to Akagera National Park, where savannah meets wetland. After lunch, embark on an afternoon game drive to spot giraffes, elephants, lions, and other wildlife. Spend the night in a luxury safari lodge.',	NULL,	'2024-12-23 12:19:39'),
(5,	3,	'Day 4: Morning Boat Safari and Game Drive',	'full day',	'Start the day with a peaceful boat safari on Lake Ihema, observing hippos, crocodiles, and birds. Follow this with another exciting game drive before heading back to Kigali for the night.',	NULL,	'2024-12-23 12:20:46'),
(6,	3,	'Day 5: Transfer to Volcanoes National Park',	'full day',	'Travel to the lush Volcanoes National Park, home to the majestic mountain gorillas. On arrival, explore the Musanze Caves or relax at your lodge nestled in the hills.',	NULL,	'2024-12-23 12:21:41'),
(7,	3,	'Day 6: Gorilla Trekking Experience',	'full day',	'Embark on a life-changing gorilla trekking adventure. Guided by experts, you\'ll have the chance to observe a family of gorillas in their natural habitat. The experience is sure to leave you in awe.',	NULL,	'2024-12-23 12:22:40'),
(8,	3,	'Day 7: Lake Kivu Retreat',	'full day',	'Drive to the shores of Lake Kivu, one of Africa\'s Great Lakes. Enjoy a relaxing day of swimming, kayaking, or simply unwinding by the water. Savor freshly caught fish during a lakeside dinner.',	NULL,	'2024-12-23 12:23:27'),
(9,	3,	'Day 8: Return to Kigali and Departure',	'full day',	'After breakfast, return to Kigali for some last-minute shopping or sightseeing before your departure. Youâ€™ll be transferred to Kigali International Airport, concluding your incredible journey with First Class Tours.',	NULL,	'2024-12-23 12:24:19'),
(10,	4,	'Day 1: Arrival in Johannesburg',	'full day',	'Your adventure begins as you arrive at O.R. Tambo International Airport in Johannesburg, where you will be greeted by your First Class Tours guide. Transfer to your 4-star hotel in the city for check-in and a relaxing evening. Enjoy a welcome dinner at a top restaurant, where you can taste some of South Africaâ€™s finest dishes.',	NULL,	'2024-12-23 13:18:35'),
(11,	4,	'Day 2: Johannesburg City Tour',	'full day',	'After breakfast, you will embark on a full-day city tour. Explore the vibrant streets of Johannesburg, visit the Apartheid Museum for an insightful look into the countryâ€™s history, and see landmarks such as Constitution Hill and the Maboneng Precinct. This afternoon, you will have some time for shopping or exploring on your own.',	NULL,	'2024-12-23 13:20:54'),
(12,	4,	'Day 3: Johannesburg to Kruger National Park',	'full day',	'After breakfast, you will travel to the famous Kruger National Park. Check in at a luxury lodge and prepare for your first thrilling safari. The park is home to the Big Fiveâ€”lions, elephants, buffalo, leopards, and rhinocerosâ€”giving you the chance to see these magnificent animals up close.',	NULL,	'2024-12-23 13:21:35'),
(13,	4,	'Day 4: Full Day Safari in Kruger National Park',	'full day',	'Today is dedicated to a full-day safari. Early morning and late afternoon game drives give you the best chance to spot wildlife in their natural habitats. Enjoy a picnic lunch in the park before continuing your safari experience. In the evening, relax back at your lodge, where a delicious dinner awaits.',	NULL,	'2024-12-23 13:22:14'),
(14,	4,	'Day 5: Kruger to Cape Town',	'full day',	'After a morning safari, you will fly to Cape Town. Upon arrival, you will be transferred to your hotel, with time to settle in and enjoy a leisurely dinner at one of the cityâ€™s renowned restaurants.\r\n\r\n',	NULL,	'2024-12-23 13:23:08'),
(15,	4,	'Day 6: Cape Peninsula Tour',	'full day',	'After breakfast, embark on a scenic full-day tour of the Cape Peninsula. Visit the iconic Table Mountain for panoramic views of the city, and continue along the coastline to Boulders Beach, home to a colony of African penguins. End the day with a visit to the Cape of Good Hope, where the Atlantic and Indian Oceans meet.',	NULL,	'2024-12-23 13:23:54'),
(16,	4,	'Day 7: Cape Winelands Tour',	'full day',	'Explore the world-famous Cape Winelands, where you will tour some of the finest vineyards in the region. Enjoy a wine-tasting session at a premier winery and learn about the art of wine-making. Stop for lunch at a local bistro before returning to Cape Town for the evening.\r\n',	NULL,	'2024-12-23 13:24:35'),
(17,	4,	'Day 8: Departure from Cape Town',	'full day',	'\r\nAfter breakfast, take a relaxing morning at the V&A Waterfront or visit any last attractions. Later, transfer to Cape Town International Airport for your departure flight, bringing home unforgettable memories from your South African adventure.',	NULL,	'2024-12-23 13:26:02'),
(18,	5,	'Day 1: Arrival in Kigali',	'full day',	'Arrive at Kigali International Airport, where our guide will welcome you. Transfer to your hotel for check-in and a brief orientation. Explore Kigaliâ€™s highlights, including the Kigali Genocide Memorial and vibrant craft markets.',	NULL,	'2024-12-24 13:35:52'),
(19,	5,	'Day 2: Traditional Rwandan Culture at Ibyâ€™Iwacu Cultural Village',	'full day',	'Travel to Musanze for a cultural immersion at Ibyâ€™Iwacu Cultural Village. Experience traditional Rwandan dances, local cuisine, and storytelling. Learn about the countryâ€™s history through the lens of its cultural practices.',	NULL,	'2024-12-24 13:36:34'),
(20,	5,	'Day 3: Exploring the Twin Lakes â€“ Ruhondo and Burera',	'full day',	'Visit the serene Twin Lakes near Musanze, known for their stunning views and peaceful ambiance. Enjoy a boat ride, local fishing demonstrations, and interact with nearby communities.',	NULL,	'2024-12-24 13:37:28'),
(21,	5,	'Day 4: Akagera National Park Safari',	'full day',	'Head to Akagera National Park for a thrilling game drive. Spot the Big Five and other wildlife in the park\'s diverse landscapes of savannah, lakes, and wetlands. Wind down with a sunset boat cruise on Lake Ihema.\r\n\r\n',	NULL,	'2024-12-24 13:38:05'),
(22,	5,	'Day 5: Lake Muhazi Relaxation and Activities',	'full day',	'Spend the day at Lake Muhazi, where you can relax by the lake, go kayaking, or take a short walking tour around the area to enjoy its natural beauty. and Visit nearby coffee plantations for a guided tour.\r\n\r\n',	NULL,	'2024-12-24 13:39:18'),
(23,	5,	'Day 6: Kigali and Departure',	'full day',	'Return to Kigali for a final city tour, including the Kandt House Museum and local shopping for souvenirs. Transfer to the airport for your departure.\r\n\r\n',	NULL,	'2024-12-24 13:39:50'),
(24,	6,	'Day 1: Arrival in Kigali',	'full day',	'Arrive at Kigali International Airport and meet your guide. Enjoy a city tour covering the Kigali Genocide Memorial, Inema Arts Center, and local craft markets.\r\n\r\n',	NULL,	'2024-12-24 13:58:22'),
(25,	6,	'Day 2: Historical Exploration in Huye',	'full day',	'Travel to Huye (formerly Butare), Rwanda\'s cultural hub. Visit the Ethnographic Museum, known for its rich collection of traditional artifacts, and enjoy a vibrant Rwandan drumming session.',	NULL,	'2024-12-24 13:59:01'),
(26,	6,	'Day 3: Nyungwe Forest National Park',	'full day',	'Embark on a canopy walk in Nyungwe Forest National Park and experience its lush biodiversity. Afternoon activities include optional chimpanzee tracking or birdwatching in this tropical paradise.\r\n\r\n',	NULL,	'2024-12-24 13:59:33'),
(27,	6,	'Day 4: Tea Plantations and Waterfalls in Gisakura',	'full day',	'Visit Gisakura\'s picturesque tea plantations and learn about Rwanda\'s tea production. Later, hike to the nearby Kamiranzovu Waterfalls for stunning views and a serene atmosphere.',	NULL,	'2024-12-24 14:00:04'),
(28,	6,	'Day 5: Return to Kigali and Departure',	'full day',	'Return to Kigali for a relaxing morning of shopping and a farewell lunch before your airport transfer.\r\n\r\n',	NULL,	'2024-12-24 14:00:35'),
(29,	7,	'Day 1: Arrival in Kigali',	'full day',	'Arrive at Kigali International Airport, where your guide will meet you. Enjoy a city tour, including the Kigali Genocide Memorial and local markets.\r\n\r\n',	NULL,	'2024-12-24 14:15:14'),
(30,	7,	'Day 2: Volcanoes National Park â€“ Gorilla Trekking',	'full day',	'Head to Volcanoes National Park for a thrilling gorilla trekking experience. Encounter endangered mountain gorillas in their natural habitat, followed by a visit to the Dian Fossey Tomb.',	NULL,	'2024-12-24 14:27:53'),
(31,	7,	'Day 3: Lake Kivu Exploration',	'full day',	'Travel to Lake Kivu for a relaxing day by the water. Enjoy a boat ride, visit the scenic island of Idjwi, or relax on the peaceful lakeshore.',	NULL,	'2024-12-24 14:29:40'),
(32,	7,	'Day 4: Return to Kigali and Departure',	'full day',	'Return to Kigali for a final city tour, including the Kandt House Museum, followed by shopping for souvenirs. Transfer to the airport for departure.',	NULL,	'2024-12-24 14:30:29'),
(33,	8,	'Day 1: Arrival in Cape Town',	'full day',	'Arrive in Cape Town and enjoy a guided city tour. Visit Table Mountain, Kirstenbosch Botanical Gardens, and the lively V&A Waterfront.',	NULL,	'2024-12-24 15:58:55'),
(34,	8,	'Day 2: Cape Point and Penguins',	'full day',	'Travel along the scenic Cape Peninsula, stopping at the Cape of Good Hope, Chapmanâ€™s Peak, and Boulders Beach to meet the African penguins.',	NULL,	'2024-12-24 15:59:56'),
(35,	8,	'Day 3: Explore Durban',	'full day',	'Fly to Durban, South Africaâ€™s beach city. Relax along the Golden Mile, visit uShaka Marine World, and experience the cultural charm of markets and Zulu heritage.',	NULL,	'2024-12-24 16:00:39'),
(36,	8,	'Day 4: Drakensberg Mountains Adventure',	'full day',	'Head to the Drakensberg Mountains, a UNESCO World Heritage Site. Enjoy a guided hike through dramatic landscapes and visit the San rock art sites.',	NULL,	'2024-12-24 16:01:47'),
(37,	8,	'Day 5: Pilanesberg National Park Safari',	'full day',	'Fly to Pilanesberg National Park. Embark on an afternoon game drive, spotting the Big Five and enjoying the parkâ€™s breathtaking volcanic landscapes.',	NULL,	'2024-12-24 16:03:18'),
(38,	8,	'Day 6: Full-Day Safari in Pilanesberg',	'full day',	'Spend a full day on safari with morning and evening game drives. Experience close encounters with diverse wildlife and savor bush-inspired meals.',	NULL,	'2024-12-24 16:03:51'),
(39,	8,	'Day 7: Johannesburg and Departure',	'full day',	'Transfer to Johannesburg for a city tour, visiting the Apartheid Museum and Constitution Hill. Enjoy some leisure shopping before your airport departure.',	NULL,	'2024-12-24 16:04:43'),
(40,	9,	'Day 1: Arrival in Johannesburg',	'full day',	'Arrive in Johannesburg and embark on a city tour, visiting Constitution Hill, Soweto, and the Apartheid Museum to learn about South Africaâ€™s history and culture.',	NULL,	'2024-12-24 17:55:08'),
(41,	9,	'Day 2: Kruger National Park Safari',	'full day',	'Fly to Kruger National Park for an exciting afternoon game drive. Witness the iconic Big Five and immerse yourself in the beauty of South Africaâ€™s wildlife haven.',	NULL,	'2024-12-24 17:56:02'),
(42,	9,	'Day 3: Full-Day Safari in Kruger',	'full day',	'Enjoy morning and evening game drives, experiencing close encounters with elephants, lions, rhinos, and more. Relax at a lodge with stunning views of the African bush.',	NULL,	'2024-12-24 17:56:48'),
(43,	9,	'Day 4: Garden Route Adventure',	'Full day',	'Fly to the Garden Route and explore scenic coastal towns like Knysna and Plettenberg Bay. Discover lagoons, forests, and picturesque beaches.',	NULL,	'2024-12-24 17:59:40'),
(44,	9,	'Day 5: Cape Winelands and Stellenbosch',	'Full day',	'Travel to Cape Town via the Cape Winelands. Visit Stellenbosch for wine tasting and breathtaking vineyard views. End the day with leisure time in Cape Town.',	NULL,	'2024-12-24 18:00:21'),
(45,	9,	'Day 6: Cape Town and Departure',	'Full day',	'Explore Cape Townâ€™s highlights, including Table Mountain, the vibrant Bo-Kaap neighborhood, and Robben Island. Transfer to the airport for your departure.\r\n\r\n',	NULL,	'2024-12-24 18:01:11'),
(46,	10,	'Day 1: Arrival in Johannesburg',	'Full day',	'Upon arrival at OR Tambo International Airport, meet your guide and begin your adventure with a city tour. Visit Constitution Hill, a historical landmark that tells the story of South Africaâ€™s struggle for democracy. Explore the Maboneng Precinct, a hub of creativity and culture, before heading to Soweto to experience the heart of South Africaâ€™s township life. Learn about the nationâ€™s history at the Apartheid Museum. Overnight in Johannesburg.',	NULL,	'2024-12-24 23:15:41'),
(47,	10,	'Day 2: Pilgrimâ€™s Rest and Panorama Route',	'Full day',	'Travel to the historic town of Pilgrimâ€™s Rest, once a thriving gold-mining community. Wander through its quaint streets and learn about its fascinating past. Continue to the Panorama Route, where breathtaking vistas await. Visit Godâ€™s Window, Bourkeâ€™s Luck Potholes, and the Three Rondavels, marveling at South Africaâ€™s natural beauty. Overnight in Graskop or nearby.',	NULL,	'2024-12-24 23:16:21'),
(48,	10,	'Day 3: Hluhluwe-iMfolozi Park Safari',	'Full day',	'Fly to KwaZulu-Natal and head to Hluhluwe-iMfolozi Park, one of Africaâ€™s oldest game reserves. Embark on an afternoon game drive to spot the Big Five and other iconic wildlife. The park is renowned for its rhino conservation efforts. Overnight at a safari lodge near the park.',	NULL,	'2024-12-24 23:17:13'),
(49,	10,	'Day 4: Durbanâ€™s Coastal Charm',	'Full day',	'Travel to Durban, where the warm Indian Ocean coastline welcomes you. Stroll along the Golden Mile, visit uShaka Marine World, and immerse yourself in the cityâ€™s vibrant markets. Enjoy a mix of Zulu culture and coastal leisure. Overnight in Durban.',	NULL,	'2024-12-24 23:17:59'),
(50,	10,	'Day 5: Drakensberg Mountains and Departure',	'Full day',	'Journey to the majestic Drakensberg Mountains for a morning of scenic beauty. Take a leisurely hike or simply relax while admiring the peaks. Afterward, transfer back to Durban for your departure.\r\n\r\n',	NULL,	'2024-12-24 23:18:57'),
(51,	11,	'Day 1: Arrival in Cape Town',	'Full day',	'Arrive at Cape Town International Airport, where our guide will warmly welcome you. Embark on a city tour, visiting the iconic Table Mountain for panoramic views, the bustling V&A Waterfront, and the colorful streets of Bo-Kaap. Transfer to your hotel and enjoy a relaxing evening.',	NULL,	'2024-12-24 23:34:45'),
(52,	11,	'Day 2: Cape Peninsula Excursion',	'Full day',	'Embark on a full-day exploration of the Cape Peninsula. Discover the dramatic landscapes of Cape Point and the Cape of Good Hope, encounter penguins at Boulders Beach, and drive along the picturesque Chapmanâ€™s Peak Drive. Return to Cape Town for an evening at leisure.',	NULL,	'2024-12-24 23:35:23'),
(53,	11,	'Day 3: Winelands and Stellenbosch',	'Full day',	'Spend the day in the Cape Winelands, famous for its rolling vineyards and award-winning wines. Visit Stellenbosch and Franschhoek for guided wine tastings and indulge in the culinary delights of the region. Return to Cape Town in the late afternoon.',	NULL,	'2024-12-24 23:35:59'),
(54,	11,	'Day 4: Robben Island and Departure',	'Full day',	'Visit Robben Island, a UNESCO World Heritage Site, to learn about South Africa\'s struggle for freedom. Spend your remaining time shopping or relaxing before transferring to the airport for your departure.',	NULL,	'2024-12-24 23:36:50'),
(55,	12,	'Day 1: Arrival in Johannesburg',	'Full day',	'Arrive at O.R. Tambo International Airport, where your guide will welcome you. Begin your adventure with a tour of Johannesburg, visiting Constitution Hill, Soweto, and the Apartheid Museum to learn about South Africaâ€™s history. Spend the night in Johannesburg.',	NULL,	'2024-12-24 23:49:32'),
(56,	12,	'Day 2: Pilanesberg National Park Safari',	'Full day',	'Travel to Pilanesberg National Park for a thrilling safari experience. Witness the Big Five and explore the parkâ€™s diverse wildlife and stunning landscapes. Enjoy a relaxing evening at a lodge within the park, surrounded by nature.',	NULL,	'2024-12-24 23:50:13'),
(57,	12,	'Day 3: Sun City and Cradle of Humankind',	'Full day',	'Visit the luxurious Sun City resort for some leisure time or enjoy activities like the Valley of Waves. In the afternoon, explore the Cradle of Humankind, a UNESCO World Heritage site, and visit the Sterkfontein Caves, home to early human fossils.\r\n\r\n',	NULL,	'2024-12-24 23:50:51'),
(58,	12,	'Day 4: Pretoria and Departure',	'Full day',	'Visit Pretoria, South Africa\'s administrative capital, to explore highlights such as the Union Buildings, Voortrekker Monument, and the Pretoria National Botanical Garden. Enjoy your final moments in the city before transferring to the airport for your departure.',	NULL,	'2024-12-24 23:51:28'),
(59,	13,	'Day 1: Arrival in Livingstone',	'Anytime',	'\r\nIn the morning, you will arrive at Harry Mwanga Nkumbula International Airport, where a professional driver will greet you and transfer you to your 4-star lodge near Livingstone. After checking in, spend the afternoon relaxing at the lodge, exploring its amenities such as the pool or gardens. In the evening, enjoy a delicious dinner at the lodgeâ€™s restaurant, offering a variety of local and international cuisine.',	NULL,	'2024-12-25 03:04:08'),
(60,	13,	'Day 2: Victoria Falls and Sunset Cruise',	'9AM',	'\r\nAfter breakfast, your guide will take you on a morning tour of the iconic Victoria Falls. You will walk along the paths to witness the majestic waterfall and learn about its history and significance. Following the tour, you will take an exhilarating helicopter flight over the falls for a birdâ€™s-eye view of this natural wonder. Afterward, return to the lodge for lunch and spend the afternoon at leisure. In the evening, you will board a Zambezi River sunset cruise, where you can enjoy snacks, drinks, and stunning views as the sun sets over the water. The day concludes with a restful night back at the lodge.',	NULL,	'2024-12-25 03:04:59'),
(61,	13,	'Day 3: Wildlife Safari and Encounter',	'Morning',	'\r\nFollowing an early breakfast, you will head to Mosi-oa-Tunya National Park for a half-day game drive. This is your opportunity to spot elephants, zebras, and the rare white rhino in their natural habitat. After the game drive, you will break for lunch at a local restaurant or back at the lodge. In the early afternoon, a walking safari guided by an experienced ranger will allow you to enjoy an up-close encounter with wildlife. You will return to the lodge in the evening for dinner and relaxation.',	NULL,	'2024-12-25 03:08:02'),
(62,	13,	'Day 4: Cultural Experience and Exploration',	'Morning',	'\r\nAfter breakfast, you will visit Mukuni Village, a traditional Zambian village. During your time there, you will participate in cultural activities such as learning local dances, observing craft making, and hearing about the communityâ€™s history. For lunch, you can dine at a local restaurant or back at the lodge. In the afternoon, you will visit the Livingstone Museum, where you can gain an educational insight into the townâ€™s heritage and its role in African history. Spend your last evening enjoying a special dinner at the lodge or a nearby restaurant offering local delicacies.',	NULL,	'2024-12-25 03:08:53'),
(63,	13,	'Day 5: Departure',	'Morning',	'\r\nYou will start the day with a leisurely breakfast at the lodge, enjoying the serene surroundings or taking a short walk around the property. After checking out of the lodge in the late morning, a private transfer will take you to Harry Mwanga Nkumbula International Airport for your departure flight',	NULL,	'2024-12-25 03:10:24'),
(64,	15,	'Day 1: Arrival in Nairobi',	'Full day',	'Arrive in Nairobi, Kenyaâ€™s bustling capital. Meet your guide and enjoy a city tour, visiting the Karen Blixen Museum and the Giraffe Centre. Overnight at a city hotel.',	NULL,	'2024-12-25 12:03:03'),
(65,	15,	'Day 2: Nairobi National Park and Elephant Orphanage',	'Full day',	'Start your day with a morning game drive at Nairobi National Park, followed by a visit to the David Sheldrick Elephant Orphanage to learn about wildlife conservation efforts.',	'images/itineraries/wall.jpeg',	'2024-12-25 12:04:25'),
(66,	15,	'Day 3: Journey to Mount Kenya',	'Full day',	'Travel to Mount Kenya, the countryâ€™s highest peak. Explore the lush forests and enjoy scenic hikes or simply relax in the serene atmosphere at your lodge.',	NULL,	'2024-12-25 12:05:07'),
(67,	15,	'Day 4: Samburu National Reserve Safari',	'Full day',	'Head to Samburu National Reserve for an afternoon game drive. Discover unique wildlife, including the Grevyâ€™s zebra and reticulated giraffe, in this arid yet beautiful landscape.\r\n\r\n',	NULL,	'2024-12-25 12:05:47'),
(68,	15,	'Day 5: Lake Nakuru National Park',	'Full day',	'Drive to Lake Nakuru, renowned for its pink flamingos and rhino sanctuary. Enjoy a game drive, spotting wildlife against the backdrop of the lakeâ€™s stunning scenery.',	NULL,	'2024-12-25 12:06:25'),
(69,	15,	'Day 6: Masai Mara National Reserve',	'Full day',	'Arrive at the world-famous Masai Mara. Witness the Big Five and other iconic wildlife during your first game drive in this vast savannah.',	NULL,	'2024-12-25 12:06:57'),
(70,	15,	'Day 7: Full-Day Game Drives in Masai Mara',	'Full day',	'Spend a full day exploring the Masai Mara with morning and afternoon game drives. Optionally, enjoy a hot air balloon safari for breathtaking views of the reserve.',	NULL,	'2024-12-25 12:07:28'),
(71,	15,	'Day 8: Lake Naivasha and Crescent Island',	'Full day',	'Travel to Lake Naivasha for a boat ride and a guided walking safari on Crescent Island. Marvel at hippos, giraffes, and diverse birdlife in this tranquil setting.',	NULL,	'2024-12-25 12:08:01'),
(72,	15,	'Day 9: Amboseli National Park',	'Full day',	'Drive to Amboseli National Park, famous for its views of Mount Kilimanjaro. Enjoy an afternoon game drive and spot elephants, lions, and cheetahs in this picturesque park.',	NULL,	'2024-12-25 12:08:29'),
(73,	15,	'Day 10: Departure from Nairobi',	'Full day',	'Return to Nairobi for last-minute shopping or leisure. Transfer to the airport for your departure, bidding farewell to Kenyaâ€™s breathtaking landscapes and unforgettable experiences.',	NULL,	'2024-12-25 12:09:02'),
(74,	16,	'Day 1: Arrival in Nairobi',	'Full day',	'Arrive in Kenyaâ€™s capital, Nairobi. Visit the Giraffe Centre and Karen Blixen Museum before checking into your hotel. Relax and prepare for the upcoming adventure.',	NULL,	'2024-12-25 12:53:20'),
(75,	16,	'Day 2: Safari in Masai Mara',	'Full day',	'Travel to Masai Mara, home to the Big Five and the Great Migration. Enjoy an afternoon game drive and experience the magic of Kenyaâ€™s premier safari destination.',	NULL,	'2024-12-25 12:54:51'),
(76,	16,	'Day 3: Full-Day Safari in Masai Mara',	'Full day',	'Spend the day exploring the Masai Mara. Witness herds of wildebeests, majestic lions, and vibrant birdlife. Enjoy a picnic in the wild.',	NULL,	'2024-12-25 12:55:29'),
(77,	16,	'Day 4: Lake Naivasha and Crescent Island',	'Full day',	'Drive to Lake Naivasha for a boat ride. Spot hippos and birds, then walk among wildlife on Crescent Island, a serene haven surrounded by breathtaking landscapes.',	'images/itineraries/logo.png',	'2024-12-25 12:56:11'),
(78,	16,	'Day 5: Amboseli National Park â€“ Sunset Safari',	'Full day',	'Head to Amboseli National Park, famous for its views of Mount Kilimanjaro. Enjoy a sunset safari, spotting elephants, cheetahs, and diverse birdlife.',	NULL,	'2024-12-25 12:56:43'),
(79,	16,	'Day 6: Full-Day Safari in Amboseli',	'Full day',	'Experience a full day of game drives in Amboseli. Marvel at herds of elephants and Kilimanjaroâ€™s stunning backdrop. Relax in your lodge after a day of adventure.',	NULL,	'2024-12-25 12:57:18'),
(80,	16,	'Day 7: Nairobi City Exploration',	'Full day',	'Return to Nairobi for a city tour. Visit the Nairobi National Museum and local markets. Enjoy a farewell dinner featuring Kenyan delicacies.',	NULL,	'2024-12-25 12:57:57'),
(81,	16,	'Day 8: Departure',	'Full day',	'Spend the morning at leisure before your transfer to the airport. Depart with unforgettable memories of Kenyaâ€™s culture and wildlife.',	NULL,	'2024-12-25 12:58:25'),
(82,	17,	'Day 1: Arrival in Nairobi',	'Full day',	'Arrive at Jomo Kenyatta International Airport. Meet your guide and enjoy a city tour, visiting the Nairobi National Museum, the Giraffe Centre, and exploring the cityâ€™s vibrant culture.\r\n\r\n',	'images/itineraries/wall.jpeg',	'2024-12-25 13:13:16'),
(83,	17,	'Day 2: Samburu National Reserve',	'Full day',	'Travel to Samburu National Reserve, a haven for rare wildlife like Grevyâ€™s zebra and reticulated giraffes. Enjoy an afternoon game drive amidst stunning semi-arid landscapes.',	NULL,	'2024-12-25 13:13:49'),
(84,	17,	'Day 3: Full-Day Safari in Samburu',	'Full day',	'Experience Samburu with morning and evening game drives. Witness the beauty of the Ewaso Nyiro River and the unique wildlife that call this reserve home.\r\n\r\n',	NULL,	'2024-12-25 13:14:27'),
(85,	17,	'Day 4: Lake Nakuru National Park',	'Full day',	'Journey to Lake Nakuru National Park, famous for its flamingos and rhino population. Explore its lush surroundings and spot lions, leopards, and other animals on a thrilling game drive.',	NULL,	'2024-12-25 13:15:00'),
(86,	17,	'Day 5: Mount Kenya Exploration',	'Full day',	'Head to Mount Kenya for a day of scenic exploration. Take a guided trek on the lower slopes or enjoy a nature walk in this UNESCO World Heritage Site.',	NULL,	'2024-12-25 13:15:36'),
(87,	17,	'Day 6: Return to Nairobi and Departure',	'Full day',	'Return to Nairobi for leisure activities, shopping, or a farewell lunch. Transfer to the airport for your departure, concluding your enriching Kenyan adventure.',	NULL,	'2024-12-25 13:16:02'),
(88,	19,	'Day 1: Arrival in Nairobi',	'Full day',	'Arrive at Jomo Kenyatta International Airport, meet your guide, and explore Nairobi. Visit the Karen Blixen Museum, Giraffe Centre, and the David Sheldrick Elephant Orphanage. Overnight stay in Nairobi.',	NULL,	'2024-12-25 18:28:05'),
(89,	19,	'Day 2: Maasai Mara National Reserve',	'Full day',	'Journey to the Maasai Mara, famous for its abundant wildlife and stunning savannahs. Enjoy an afternoon game drive and spot the Big Five. Overnight at a safari lodge or tented camp.',	'images/itineraries/UTB.jpeg',	'2024-12-25 18:28:52'),
(90,	19,	'Day 3: Full-Day Safari in Maasai Mara',	'Full day',	'Spend the day exploring Maasai Mara with morning and evening game drives. Visit a Maasai village to learn about their traditional culture. Relax under the starlit African sky.',	NULL,	'2024-12-25 18:29:27'),
(91,	19,	'Day 4: Lake Naivasha and Crescent Island',	'Full day',	'Travel to Lake Naivasha and enjoy a boat ride to Crescent Island. Spot hippos and exotic bird species. Stroll among giraffes, zebras, and antelopes. Overnight at a lakeside resort.',	'images/itineraries/wall.jpeg',	'2024-12-25 18:31:57'),
(92,	19,	'Day 5: Amboseli National Park and Departure',	'Full day',	'Head to Amboseli National Park, known for its majestic views of Mount Kilimanjaro. Embark on a game drive before returning to Nairobi for your departure.',	NULL,	'2024-12-25 18:32:35'),
(93,	20,	'Day 1: Arrival in Nairobi',	'Full day',	'Arrive at Jomo Kenyatta International Airport, meet your guide, and begin with a city tour. Visit the David Sheldrick Elephant Orphanage, Giraffe Centre, and Karen Blixen Museum. Overnight in Nairobi.',	NULL,	'2024-12-25 18:44:09'),
(94,	20,	'Day 2: Maasai Mara National Reserve',	'Full day',	'Drive to the Maasai Mara, Kenyaâ€™s premier safari destination. Enjoy an afternoon game drive, witnessing lions, elephants, and other wildlife. Overnight at a safari lodge or tented camp.',	'images/itineraries/IGIHOZO Didier.png',	'2024-12-25 18:44:59'),
(95,	20,	'Day 3: Lake Naivasha and Crescent Island',	'Full day',	'Travel to Lake Naivasha, a freshwater lake teeming with birds and surrounded by wildlife. Take a boat ride to Crescent Island for a guided walking safari. Overnight at a lakeside lodge.',	NULL,	'2024-12-25 18:45:34'),
(96,	20,	'Day 4: Nairobi and Departure',	'Full day',	'Return to Nairobi for some leisure time or shopping at local craft markets. Enjoy a farewell lunch before heading to the airport for your departure.',	NULL,	'2024-12-25 18:46:10'),
(101,	14,	'Day 1: Arrival in Lusaka',	'Full day',	'Arrive at Kenneth Kaunda International Airport. Enjoy a guided city tour, visiting the Lusaka National Museum, Kabwata Cultural Village, and bustling local markets.\r\n',	NULL,	'2024-12-25 22:57:11'),
(102,	14,	'Day 2: Lower Zambezi National Park',	'Full day',	'Travel to Lower Zambezi National Park. Relish an afternoon game drive along the Zambezi River, spotting elephants, hippos, and crocodiles. Overnight at a riverside lodge.',	NULL,	'2024-12-25 22:58:07'),
(104,	14,	'Day 3: Canoe Safari on the Zambezi',	'Full day',	'Embark on a guided canoe safari. Paddle through calm waters, observing wildlife up close and experiencing the park\'s serenity. Spend the evening enjoying a riverside campfire.',	NULL,	'2024-12-25 23:00:27'),
(105,	14,	'Day 4: Transfer to South Luangwa National Park',	'Full day',	'Fly to South Luangwa National Park. Begin with a sunset game drive to track predators and herbivores. Overnight in a safari lodge within the park.',	NULL,	'2024-12-25 23:01:54'),
(106,	14,	'Day 5: Full-Day Safari in South Luangwa',	'Full day',	'Experience thrilling morning and evening game drives in this wildlife haven. Relax at the lodge during the day, enjoying views of the Luangwa River.',	NULL,	'2024-12-25 23:02:44'),
(107,	14,	'Day 6: Walking Safari Experience',	'Full day',	'Go on a guided walking safari, exploring the parkâ€™s ecosystem up close. Learn about flora, fauna, and tracking wildlife with expert guides.\r\n\r\n',	NULL,	'2024-12-25 23:03:23'),
(108,	14,	'Day 7: Transfer to Livingstone',	'Full day',	'Fly to Livingstone, the gateway to Victoria Falls. Explore the local town and unwind at a riverside lodge.',	NULL,	'2024-12-25 23:04:02'),
(109,	14,	'Day 8: Victoria Falls Tour and Adventure',	'Full day',	'Take a guided tour of Victoria Falls, marveling at the worldâ€™s largest curtain of water. Optional activities include bungee jumping, helicopter rides, or a Zambezi River cruise.',	NULL,	'2024-12-25 23:04:46'),
(110,	14,	'Day 9: Cultural Immersion in Livingstone',	'Full day',	'Visit the Livingstone Museum and a local village for a cultural experience. Learn about Zambian traditions and enjoy traditional music and dance performances.',	NULL,	'2024-12-25 23:05:27'),
(111,	14,	'Day 10: Departure',	'Full day',	'Enjoy a relaxed morning by the Zambezi River. Shop for souvenirs and transfer to Harry Mwanga Nkumbula International Airport for your departure.',	NULL,	'2024-12-25 23:06:18'),
(112,	21,	'Day 1: Arrival in Lusaka',	'Full day',	'Arrive at Kenneth Kaunda International Airport. Enjoy a city tour, visiting the Lusaka National Museum, local markets, and Kabwata Cultural Village for an authentic Zambian experience.',	NULL,	'2024-12-25 23:42:32'),
(113,	21,	'Day 2: Lusaka Wildlife Experience',	'Full day',	'Spend the day at Munda Wanga Environmental Park, home to a variety of wildlife and botanical gardens. Learn about Zambiaâ€™s conservation efforts while enjoying up-close animal encounters.\r\n\r\n',	NULL,	'2024-12-25 23:43:09'),
(114,	21,	'Day 3: Transfer to Lower Zambezi National Park',	'Full day',	'Travel to Lower Zambezi National Park. Enjoy an afternoon boat safari on the Zambezi River, spotting hippos, crocodiles, and elephants. Overnight at a riverside lodge.',	NULL,	'2024-12-25 23:57:41'),
(115,	21,	'Day 4: Game Drives and Canoe Safari',	'Full day',	'Experience morning and evening game drives. In the afternoon, go on a canoe safari for a closer look at wildlife along the riverbanks.',	NULL,	'2024-12-25 23:58:23'),
(116,	21,	'Day 5: Travel to South Luangwa National Park',	'Full day',	'Fly to South Luangwa, Zambiaâ€™s premier wildlife destination. Start with a sunset game drive and settle into a luxury safari lodge.',	NULL,	'2024-12-25 23:59:02'),
(117,	21,	'Day 6: Full-Day Safari in South Luangwa',	'Full day',	'Go on morning and evening game drives to spot the Big Five and other wildlife. Relax at the lodge during the afternoon with views of the Luangwa River.',	NULL,	'2024-12-25 23:59:31'),
(118,	21,	'Day 7: Walking Safari Experience',	'Full day',	'Join a walking safari to explore the parkâ€™s unique biodiversity on foot. Learn about tracking wildlife and enjoy the thrill of seeing animals in their natural habitat.',	NULL,	'2024-12-26 00:04:30'),
(119,	21,	'Day 8: Transfer to Livingstone',	'Full day',	'Fly to Livingstone, the home of Victoria Falls. Spend the afternoon exploring the town and its vibrant local markets.',	NULL,	'2024-12-26 00:05:07'),
(120,	21,	'Day 9: Victoria Falls Tour',	'Full day',	'Take a guided tour of Victoria Falls, marveling at its sheer power and beauty. Optional activities include bungee jumping, ziplining, or a helicopter ride over the falls.',	NULL,	'2024-12-26 00:05:55'),
(121,	21,	'Day 10: Zambezi River Cruise',	'Full day',	'Relax with a morning at leisure and enjoy a sunset cruise along the Zambezi River, soaking in the serene atmosphere and spotting wildlife along the riverbanks.',	NULL,	'2024-12-26 00:06:31'),
(122,	21,	'Day 11: Cultural and Historical Tour',	'Full day',	'Visit the Livingstone Museum and a nearby village for an authentic cultural experience. Enjoy traditional Zambian music and dance performances.',	NULL,	'2024-12-26 00:07:05'),
(123,	21,	'Day 12: Departure from Livingstone',	'Full day',	'After a relaxing morning, shop for souvenirs before transferring to Harry Mwanga Nkumbula International Airport for your departure.\r\n\r\n',	NULL,	'2024-12-26 00:08:01'),
(124,	22,	'Day 1: Arrival in Lusaka',	'Full day',	'Arrive in Lusaka and enjoy a guided city tour. Visit the Lusaka National Museum, Freedom Statue, and local craft markets. Overnight at a boutique hotel.',	NULL,	'2024-12-26 00:27:41'),
(125,	22,	'Day 2: Kafue National Park Adventure',	'Full day',	'Drive to Kafue National Park, Zambiaâ€™s largest and oldest park. Embark on an evening game drive to spot leopards and other nocturnal wildlife. Stay in a safari lodge.',	NULL,	'2024-12-26 00:28:16'),
(126,	22,	'Day 3: Safari and Boat Cruise',	'Full day',	'Spend the morning on a thrilling game drive in Kafue. In the afternoon, take a tranquil boat cruise along the Kafue River, spotting hippos and crocodiles.',	NULL,	'2024-12-26 00:29:32'),
(127,	22,	'Day 4: Transfer to Siavonga and Lake Kariba',	'Full day',	'Head to Siavonga, home to the scenic Lake Kariba. Enjoy a relaxing day with optional activities like fishing, kayaking, or visiting the Kariba Dam.',	NULL,	'2024-12-26 00:30:20'),
(128,	22,	'Day 5: Livingstone and Victoria Falls',	'Full day',	'Travel to Livingstone, the gateway to Victoria Falls. Take a guided tour of the falls and enjoy leisure time exploring Livingstoneâ€™s vibrant markets and museums.',	NULL,	'2024-12-26 00:30:56'),
(129,	22,	'Day 6: Zambezi River Canoe Safari',	'Full day',	'Experience a thrilling canoe safari on the Zambezi River, navigating through gentle rapids and spotting wildlife along the banks. End with a riverside picnic.',	NULL,	'2024-12-26 00:31:54'),
(130,	22,	'Day 7: Mukuni Village and Cultural Experience',	'Full day',	'Visit Mukuni Village for an authentic cultural experience. Learn about local traditions, crafts, and daily life. Spend the evening enjoying a traditional Zambian dinner.',	NULL,	'2024-12-26 00:32:29'),
(131,	22,	'Day 8: Departure from Livingstone',	'Full day',	'After breakfast, enjoy a final visit to the Livingstone Museum before transferring to the airport for your onward journey.',	NULL,	'2024-12-26 00:33:01'),
(132,	23,	'Day 1: Arrival in Lusaka',	'Full day',	'Arrive in Lusaka, Zambiaâ€™s capital city. Take a guided tour to visit the Lusaka National Museum, bustling local markets, and the vibrant Kabwata Cultural Village. Overnight at a city hotel.',	NULL,	'2024-12-26 00:56:59'),
(133,	23,	'Day 2: Kafue National Park Safari',	'Full day',	'Travel to Kafue National Park for a full-day safari. Spot elephants, lions, and antelopes in Zambiaâ€™s largest national park. Relax in a riverside safari lodge.',	NULL,	'2024-12-26 00:57:35'),
(134,	23,	'Day 3: Explore Livingstone and Victoria Falls',	'Full day',	'Fly to Livingstone and tour the majestic Victoria Falls, one of the Seven Natural Wonders of the World. Enjoy a sunset cruise on the Zambezi River.',	NULL,	'2024-12-26 00:58:09'),
(135,	23,	'Day 4: Zambezi River Adventure',	'Full day',	'Experience the thrill of white-water rafting or a canoe safari on the Zambezi River. Alternatively, relax with a visit to local markets or a Livingstone museum.',	NULL,	'2024-12-26 00:58:51'),
(136,	23,	'Day 5: Cultural Excursion to Mukuni Village',	'Full day',	'Discover Zambiaâ€™s heritage with a visit to Mukuni Village. Learn about traditional crafts and daily life from the local community. Enjoy a farewell dinner under the stars.\r\n\r\n',	NULL,	'2024-12-26 00:59:32'),
(137,	23,	'Day 6: Departure from Livingstone',	'Full day',	'After breakfast, enjoy leisure time before your transfer to Livingstone Airport for your onward journey.',	NULL,	'2024-12-26 01:00:05'),
(138,	24,	'Day 1: Arrival in Livingstone',	'Full day',	'Arrive in Livingstone and enjoy a guided tour of Victoria Falls, one of the worldâ€™s most breathtaking natural wonders. Relax with a sunset cruise on the Zambezi River.',	NULL,	'2024-12-26 01:48:16'),
(139,	24,	' Day 2: Chobe National Park Excursion',	'Full day',	'Take a day trip to nearby Chobe National Park in Botswana. Experience a boat safari and game drive, spotting elephants, hippos, and more along the Chobe River.',	NULL,	'2024-12-26 01:48:50'),
(140,	24,	'Day 3: Livingstone Cultural Exploration',	'Full day',	'Visit Mukuni Village for an authentic cultural experience, learning about Zambian traditions. Later, explore the Livingstone Museum to uncover Zambiaâ€™s historical treasures.',	NULL,	'2024-12-26 01:49:21'),
(141,	24,	'Day 4: Mosi-oa-Tunya National Park Safari',	'Full day',	'Embark on a morning game drive in Mosi-oa-Tunya National Park. Encounter giraffes, zebras, and rhinos. Spend the afternoon enjoying optional activities like a helicopter ride over Victoria Falls.',	NULL,	'2024-12-26 01:49:53'),
(142,	24,	'Day 5: Departure from Livingstone',	'Full day',	'Enjoy a leisurely morning, shopping for local crafts or relaxing by the river, before transferring to Livingstone Airport for your onward journey.',	NULL,	'2024-12-26 01:50:25'),
(143,	25,	'Day 1: Arrival in Livingstone and Victoria Falls Tour',	'Full day',	'Arrive in Livingstone and head straight to the magnificent Victoria Falls. Enjoy a guided tour and learn about its history and natural significance. Relax with a Zambezi River sunset cruise.',	NULL,	'2024-12-26 13:53:40'),
(144,	25,	'Day 2: Mosi-oa-Tunya National Park Safari',	'Full day',	'Start the day with a game drive in Mosi-oa-Tunya National Park. Spot wildlife like giraffes, zebras, and rhinos. Afternoon options include a thrilling micro-light flight over the Falls or shopping for local crafts.',	NULL,	'2024-12-26 13:54:15'),
(145,	25,	'Day 3: Cultural Village Experience and Mukuni Park',	'Full day',	'Immerse yourself in Zambian culture with a visit to Mukuni Village. Learn about local traditions, meet artisans, and enjoy traditional dances. End the day at the Livingstone Museum.',	NULL,	'2024-12-26 13:54:53'),
(146,	25,	'Day 4: Departure from Livingstone',	'Full day',	'Enjoy a relaxed morning exploring the Livingstone craft market for souvenirs or relaxing at your lodge before your transfer to the airport.\r\n\r\n',	NULL,	'2024-12-26 13:59:43'),
(147,	26,	'Day 1: Arrival in Arusha',	'Full day',	'Arrive at Kilimanjaro International Airport and transfer to Arusha. Enjoy a city tour, visiting local markets and cultural landmarks. Overnight stay in Arusha.',	NULL,	'2024-12-26 14:18:48'),
(148,	26,	'Day 2: Tarangire National Park Safari',	'Full day',	'Embark on a game drive in Tarangire National Park, known for its baobab trees and large elephant herds. Spend the night at a lodge near the park.\r\n\r\n',	NULL,	'2024-12-26 14:19:26'),
(149,	26,	'Day 3: Lake Manyara National Park',	'Full day',	'Explore Lake Manyara National Park, famous for tree-climbing lions, pink flamingos, and lush landscapes. Afternoon visit to a Maasai village to learn about local culture.',	NULL,	'2024-12-26 14:20:15'),
(150,	26,	'Day 4-5: Serengeti National Park',	'Full day',	'Travel to Serengeti National Park for two days of unparalleled wildlife viewing. Witness the Big Five and, if timed right, the Great Migration. Stay at a safari lodge.',	NULL,	'2024-12-26 14:20:50'),
(151,	26,	'Day 6: Ngorongoro Crater Tour',	'Full day',	'Descend into the Ngorongoro Crater, a UNESCO World Heritage Site, for a full-day safari. Spot lions, rhinos, and a variety of bird species. Overnight at a nearby lodge.',	NULL,	'2024-12-26 14:21:31'),
(152,	26,	'Day 7: Lake Eyasi Cultural Experience',	'Full day',	'Visit the Hadzabe tribe at Lake Eyasi and learn about their ancient way of life. Participate in traditional activities like hunting and gathering.',	NULL,	'2024-12-26 14:22:05'),
(153,	26,	'Day 8: Fly to Zanzibar',	'Full day',	'Fly to Zanzibar and check into a beachfront resort. Spend the day relaxing or exploring Stone Town, a UNESCO World Heritage Site.',	NULL,	'2024-12-26 14:22:54'),
(154,	26,	'Day 9-10: Zanzibar Beach Leisure and Activities',	'Full day',	'Enjoy two days of sun and sea. Optional activities include snorkeling, diving, spice tours, or exploring Jozani Forest.',	NULL,	'2024-12-26 14:23:47'),
(155,	26,	'Day 11: Mnemba Atoll Marine Reserve',	'Full day',	'Take a boat trip to Mnemba Atoll for snorkeling or diving among colorful coral reefs and marine life. Return to your resort for a relaxing evening.',	NULL,	'2024-12-26 14:24:22'),
(156,	26,	'Day 12: Departure from Zanzibar',	'Full day',	'Enjoy your last morning in Zanzibar before transferring to the airport for your departure.',	NULL,	'2024-12-26 14:25:01'),
(157,	27,	'Day 1: Arrival in Arusha',	'Full day',	'Arrive at Kilimanjaro International Airport. Enjoy a brief city tour and overnight stay in Arusha, the gateway to Tanzaniaâ€™s safari circuit.',	NULL,	'2024-12-26 15:28:42'),
(158,	27,	'Day 2: Tarangire National Park Safari',	'Full day',	'Start your adventure with a game drive in Tarangire National Park, home to large elephant herds and baobab trees. Overnight at a lodge near the park.',	NULL,	'2024-12-26 15:29:20'),
(159,	27,	'Day 3: Lake Manyara National Park',	'Full day',	'Explore Lake Manyara National Park, famous for its flamingos and tree-climbing lions. Visit a nearby Maasai village for a cultural experience.',	NULL,	'2024-12-26 15:29:49'),
(160,	27,	'Day 4-5: Serengeti National Park',	'Full day',	'Spend two days exploring Serengeti National Park. Witness diverse wildlife, including the Big Five, and marvel at the endless plains. Stay at a luxury tented camp.',	NULL,	'2024-12-26 15:30:25'),
(161,	27,	'Day 6: Ngorongoro Crater Tour',	'Full day',	'Descend into the Ngorongoro Crater, a UNESCO World Heritage Site, for a full-day safari. Encounter lions, rhinos, zebras, and vibrant bird species. Overnight at a lodge near the crater.',	NULL,	'2024-12-26 15:31:07'),
(162,	27,	'Day 7: Fly to Zanzibar',	'Full day',	'Fly to Zanzibar and settle into a beachfront resort. Spend the afternoon exploring Stone Town, a UNESCO World Heritage Site with rich history and culture.',	NULL,	'2024-12-26 15:31:36'),
(163,	27,	'Day 8-9: Zanzibar Beach Leisure and Activities',	'Full day',	'Enjoy two days of relaxation or adventure. Choose from snorkeling, diving, spice tours, or exploring Jozani Forest. Revel in Zanzibarâ€™s pristine beaches and turquoise waters.',	NULL,	'2024-12-26 15:32:24'),
(164,	27,	'Day 10: Departure from Zanzibar',	'Full day',	'Take in your final moments on Zanzibarâ€™s coast before transferring to the airport for your departure.\r\n\r\n',	NULL,	'2024-12-26 15:33:20'),
(165,	28,	'Day 1: Arrival in Dar es Salaam',	'Full day',	'Arrive at Julius Nyerere International Airport. Enjoy a city tour featuring local markets and the National Museum of Tanzania.',	NULL,	'2024-12-26 15:57:36'),
(166,	28,	'Day 2: Saadani National Park',	'Full day',	'Travel to Saadani National Park, where wildlife meets the beach. Spot elephants and lions in this coastal park. Relax by the Indian Ocean.',	NULL,	'2024-12-26 15:58:16'),
(167,	28,	'Day 3: Bagamoyo Historical Tour',	'Full day',	'Visit the historic town of Bagamoyo, a UNESCO World Heritage Site. Explore ancient ruins, colonial buildings, and its rich history as a former trade hub.',	NULL,	'2024-12-26 15:59:01'),
(168,	28,	'Day 4: Mikumi National Park',	'Full day',	'Embark on a thrilling game drive in Mikumi National Park. Discover giraffes, zebras, and hippos while surrounded by the stunning Tanzanian savanna.',	NULL,	'2024-12-26 15:59:41'),
(169,	28,	'Day 5: Udzungwa Mountains National Park',	'Full day',	'Hike through Udzungwa Mountains National Park, known for its waterfalls, lush forests, and endemic species. Enjoy breathtaking views from Sanje Waterfalls.',	NULL,	'2024-12-26 16:00:23'),
(170,	28,	'Day 6: Mafia Island Marine Park',	'Full day',	'Fly to Mafia Island for a tranquil coastal retreat. Explore the marine park, famous for snorkeling, diving, and swimming with whale sharks (seasonal).',	NULL,	'2024-12-26 16:01:04'),
(171,	28,	'Day 7: Mafia Island Beaches',	'Full day',	'Spend the day relaxing on Mafia Islandâ€™s pristine beaches or engaging in optional activities like exploring local fishing villages or visiting Chole Island ruins.\r\n\r\n',	NULL,	'2024-12-26 16:01:42'),
(172,	28,	'Day 8: Departure from Mafia Island',	'Full day',	'Enjoy a leisurely morning before flying back to Dar es Salaam for your departure.',	NULL,	'2024-12-26 16:02:22'),
(173,	29,	'Day 1: Arrival in Dodoma',	'Full day',	'Arrive at Dodoma, Tanzaniaâ€™s capital city. Take a city tour to visit landmarks like Gaddafi Mosque and the Parliament Building. Enjoy local cuisine in the evening.\r\n\r\n',	NULL,	'2024-12-26 18:00:37'),
(174,	29,	'Day 2: Ruaha National Park',	'Full day',	'Fly to Ruaha National Park, Tanzania\'s largest park. Embark on a game drive to spot rare antelopes, big cats, and elephants in its rugged wilderness.',	NULL,	'2024-12-26 18:01:15'),
(175,	29,	'Day 3: Iringa Town and Isimila Stone Age Site',	'Full day',	'Travel to Iringa and visit the Isimila Stone Age Site, known for ancient tools and stunning sandstone pillars. Explore Iringa\'s vibrant markets and cultural centers.',	NULL,	'2024-12-26 18:01:56'),
(176,	29,	'Day 4: Lake Tanganyika and Mahale Mountains National Park',	'Full day',	'Fly to Lake Tanganyika, the worldâ€™s second-deepest lake. Take a boat ride and enjoy the tranquil shores. Visit Mahale Mountains National Park for a unique chimpanzee trekking experience.',	NULL,	'2024-12-26 18:02:28'),
(177,	29,	'Day 5: Usambara Mountains and Lushoto',	'Full day',	'Head to the Usambara Mountains for scenic hikes and visits to eco-friendly villages. Enjoy panoramic views of Tanzaniaâ€™s lush landscapes and interact with local communities.',	NULL,	'2024-12-26 18:03:03'),
(178,	29,	'Day 6: Bagamoyo and Departure',	'Full day',	'Travel to the historic town of Bagamoyo. Visit its ancient ruins, the Old Fort, and the Kaole Ruins. Transfer to Dar es Salaam for departure.',	NULL,	'2024-12-26 18:03:40'),
(179,	30,	'Day 1: Arrival in Arusha and Cultural Heritage Tour',	'Full day',	'Arrive in Arusha and take a cultural tour. Visit the Arusha Cultural Heritage Centre and local markets to explore Tanzaniaâ€™s art, crafts, and history.',	NULL,	'2024-12-26 20:07:52'),
(180,	30,	'Day 2: Tarangire National Park',	'Full day',	'Travel to Tarangire National Park, famed for its massive elephant herds and iconic baobab trees. Enjoy a game drive and picnic in this peaceful wildlife haven.',	NULL,	'2024-12-26 20:09:19'),
(181,	30,	'Day 3: Lake Manyara National Park',	'Full day',	'Spend the day exploring Lake Manyara National Park. Spot flamingos, tree-climbing lions, and other wildlife against the backdrop of the Great Rift Valley escarpment.',	NULL,	'2024-12-26 20:09:56'),
(182,	30,	'Day 4: Zanzibarâ€™s Stone Town and Spice Tour',	'Full day',	'Fly to Zanzibar and explore Stone Townâ€™s winding streets and historical landmarks. Enjoy a guided Spice Tour to learn about the islandâ€™s aromatic spice plantations.',	NULL,	'2024-12-26 20:10:30'),
(183,	30,	'Day 5: Zanzibarâ€™s Beaches and Departure',	'Full day',	'Relax on Zanzibarâ€™s pristine beaches. Swim in the turquoise waters, enjoy water sports, or simply soak up the sun before transferring to the airport for departure.\r\n\r\n',	NULL,	'2024-12-26 20:11:14'),
(184,	31,	'Day 1: Arrival in Dar es Salaam',	'Full day',	'Arrive in Dar es Salaam, Tanzaniaâ€™s largest city. Explore the lively fish market, National Museum, and slip into local life at Kariakoo Market.',	NULL,	'2024-12-26 20:51:43'),
(185,	31,	'Day 2: Mikumi National Park Safari',	'Full day',	'Travel to Mikumi National Park for an exciting afternoon game drive. Spot lions, zebras, giraffes, and elephants in one of Tanzaniaâ€™s most accessible wildlife parks.\r\n\r\n',	NULL,	'2024-12-26 20:52:39'),
(186,	31,	'Day 3: Udzungwa Mountains National Park',	'Full day',	'Hike through Udzungwaâ€™s lush forests, home to unique plant species, waterfalls, and endemic monkeys. Enjoy stunning views and connect with nature.',	NULL,	'2024-12-26 20:53:15'),
(187,	31,	'Day 4: Selous Game Reserve',	'Full day',	'Visit the Selous Game Reserve, a UNESCO World Heritage Site. Embark on a boat safari along the Rufiji River to see crocodiles, hippos, and diverse birdlife.\r\n\r\n',	NULL,	'2024-12-26 20:53:43'),
(188,	31,	'Day 5: Zanzibarâ€™s Stone Town Exploration',	'Full day',	'Fly to Zanzibar and explore the historic Stone Town. Wander its maze-like streets, visit the House of Wonders, and enjoy the islandâ€™s rich cultural fusion.\r\n\r\n',	NULL,	'2024-12-26 20:54:48'),
(189,	31,	'Day 6: Spice Farms and Beach Relaxation',	'Full day',	'Take a guided Spice Tour to learn about Zanzibarâ€™s famed spices. Spend the afternoon unwinding on Zanzibarâ€™s pristine beaches, enjoying water sports or local cuisine.\r\n\r\n',	NULL,	'2024-12-26 20:56:17'),
(190,	31,	'Day 7: Zanzibar Beaches and Departure',	'Full day',	'Enjoy a relaxed morning at the beach. Transfer to the airport for your onward journey, taking with you unforgettable memories of Tanzania.\r\n\r\n',	NULL,	'2024-12-26 20:56:36'),
(191,	32,	'Day 1: Arrival in Entebbe',	'Full day',	'Arrive at Entebbe International Airport and enjoy a warm welcome from your guide. Relax at your hotel with serene views of Lake Victoria.\r\n',	NULL,	'2024-12-27 10:10:03'),
(192,	32,	'Day 2: Entebbe City Tour and Botanical Gardens',	'Full day',	'Explore the Entebbe Botanical Gardens and visit the Uganda Wildlife Education Centre. End the day with a sunset cruise on Lake Victoria.',	NULL,	'2024-12-27 10:10:34'),
(193,	32,	'Day 3: Jinja â€“ Source of the Nile',	'Full day',	'Travel to Jinja, Ugandaâ€™s adventure capital. Visit the Source of the Nile and engage in activities like white-water rafting or a tranquil boat cruise.',	NULL,	'2024-12-27 10:11:11'),
(194,	32,	'Day 4: Sipi Falls Exploration',	'Full day',	'Hike to the picturesque Sipi Falls, pass through coffee plantations, and learn about traditional coffee processing from local farmers.',	NULL,	'2024-12-27 10:11:39'),
(195,	32,	'Day 5: Cultural Experience in Mbale',	'Full day',	'Immerse yourself in the vibrant Bagisu culture. Enjoy traditional dances, storytelling, and seasonal ceremonies like the Imbalu (circumcision) ritual.\r\n\r\n',	NULL,	'2024-12-27 10:12:14'),
(196,	32,	'Day 6: Transfer to Murchison Falls National Park',	'Full day',	'Visit the Ziwa Rhino Sanctuary en route to Murchison Falls National Park. Enjoy an evening game drive on arrival.\r\n\r\n',	NULL,	'2024-12-27 10:13:11'),
(197,	32,	'Day 7: Safari and Boat Cruise in Murchison Falls',	'Full day',	'Experience a morning game drive to see the Big Five. Take an afternoon boat cruise and hike to the top of Murchison Falls for stunning views.\r\n\r\n',	NULL,	'2024-12-27 10:13:35'),
(198,	32,	'Day 8: Kibale Forest National Park',	'Full day',	'Journey to Kibale Forest, known for its high primate density. Enjoy a nature walk and unwind in this lush haven.\r\n\r\n',	NULL,	'2024-12-27 10:14:04'),
(199,	32,	'Day 9: Chimpanzee Tracking and Bigodi Swamp Walk',	'Full day',	'Track wild chimpanzees in Kibale Forest and explore the Bigodi Wetland Sanctuary, famous for its unique birds and vibrant flora.\r\n\r\n',	NULL,	'2024-12-27 10:14:36'),
(200,	32,	'Day 10: Queen Elizabeth National Park',	'Full day',	'Travel to Queen Elizabeth National Park. Spot diverse wildlife on an afternoon game drive and enjoy views of the Rwenzori Mountains.\r\n\r\n',	NULL,	'2024-12-27 10:15:04'),
(201,	32,	'Day 11: Kazinga Channel Boat Safari',	'Full day',	'Sail along the Kazinga Channel, teeming with hippos and crocodiles. Conclude the day with a sunset safari drive.\r\n\r\n',	NULL,	'2024-12-27 10:15:35'),
(202,	32,	'Day 12: Return to Entebbe and Departure',	'Full day',	'Stop at the equator for photos and souvenirs as you return to Entebbe. Transfer to the airport for your departure.\r\n\r\n',	NULL,	'2024-12-27 10:16:11'),
(203,	33,	'Day 1: Arrival in Entebbe ',	'Full day',	'Arrive at Entebbe International Airport and transfer to your hotel. Enjoy a relaxing evening by Lake Victoria.',	NULL,	'2024-12-27 10:38:51'),
(204,	33,	'Day 2: Lake Mburo National Park',	'Full day',	'Drive to Lake Mburo National Park, a haven for zebras and impalas. Take an evening game drive and a peaceful boat ride on Lake Mburo.\r\n\r\n',	NULL,	'2024-12-27 10:39:17'),
(205,	33,	'Day 3: Igongo Cultural Centre',	'Full day',	'Explore the Igongo Cultural Centre to learn about Ugandaâ€™s tribes and history. Enjoy a traditional lunch before continuing to Bwindi Impenetrable Forest.\r\n\r\n',	NULL,	'2024-12-27 10:44:57'),
(206,	33,	'Day 4: Gorilla Trekking in Bwindi',	'Full day',	'Embark on a thrilling gorilla trek through Bwindiâ€™s dense rainforest. Encounter a mountain gorilla family in their natural habitat, an unforgettable wildlife experience.\r\n\r\n',	NULL,	'2024-12-27 10:45:26'),
(207,	33,	'Day 5: Lake Bunyonyi Exploration',	'Full day',	'Visit Lake Bunyonyi, known for its scenic islands and tranquil waters. Take a canoe ride and enjoy the stunning views of this high-altitude lake.\r\n\r\n',	NULL,	'2024-12-27 10:46:06'),
(208,	33,	'Day 6: Mgahinga Gorilla National Park',	'Full day',	'Explore Mgahinga Gorilla National Park, home to golden monkeys and unique volcanic landscapes. Hike the trails and enjoy breathtaking views of the Virunga Volcanoes.\r\n\r\n',	NULL,	'2024-12-27 10:46:35'),
(209,	33,	'Day 7: Fort Portal and Crater Lakes',	'Full day',	'Travel to Fort Portal, a picturesque town surrounded by crater lakes. Visit Amabere Caves and enjoy the lush scenery of this region.\r\n\r\n',	NULL,	'2024-12-27 10:47:09'),
(210,	33,	'Day 8: Semuliki National Park',	'Full day',	'Discover the hot springs and biodiversity of Semuliki National Park. Explore the parkâ€™s unique flora and fauna on guided nature walks.\r\n\r\n',	NULL,	'2024-12-27 10:47:37'),
(211,	33,	'Day 9: Ziwa Rhino Sanctuary',	'Full day',	'On your way back to Entebbe, stop at Ziwa Rhino Sanctuary for a guided rhino tracking experience. Learn about conservation efforts in Uganda.\r\n\r\n',	NULL,	'2024-12-27 10:48:11'),
(212,	33,	'Day 10: Kampala City Tour and Departure',	'Full day',	'Explore Kampalaâ€™s vibrant markets, historical sites like the Kasubi Tombs, and the Uganda Museum. Transfer to Entebbe for your departure flight.\r\n\r\n',	NULL,	'2024-12-27 10:48:48'),
(213,	34,	'Day 1: Arrival in Entebbe',	'Full day',	'Arrive at Entebbe International Airport. Relax at your hotel and enjoy the shores of Lake Victoria with optional sunset boat rides.\r\n\r\n',	NULL,	'2024-12-27 11:16:22'),
(214,	34,	'Day 2: Jinja â€“ Source of the Nile',	'Full day',	'Travel to Jinja, the source of the Nile. Take a boat ride to the exact spot where the river begins. Enjoy thrilling activities like white-water rafting or quad biking.\r\n\r\n',	NULL,	'2024-12-27 11:16:58'),
(215,	34,	'Day 3: Sipi Falls Adventure',	'Full day',	'Head to Sipi Falls near Mount Elgon. Enjoy guided hikes to the stunning waterfalls, coffee tours, and breathtaking views of the Karamoja plains.\r\n\r\n',	NULL,	'2024-12-27 11:17:48'),
(216,	34,	'Day 4: Pian Upe Wildlife Reserve',	'Full day',	'Visit the less-explored Pian Upe Wildlife Reserve. Spot cheetahs, zebras, and unique bird species during game drives in this untouched wilderness.\r\n\r\n',	NULL,	'2024-12-27 11:18:26'),
(217,	34,	'Day 5: Kidepo Valley National Park',	'Full day',	'Travel to Kidepo Valley National Park, Ugandaâ€™s most remote park. Enjoy an evening game drive to see lions, elephants, and other wildlife against a rugged backdrop.\r\n\r\n',	NULL,	'2024-12-27 11:18:58'),
(218,	34,	'Day 6: Full Day Safari in Kidepo',	'Full day',	'Spend a full day exploring Kidepo. Visit the Kanangorok Hot Springs and take guided walks with opportunities to interact with the Karamojong community.\r\n\r\n',	NULL,	'2024-12-27 11:19:40'),
(219,	34,	'Day 7: Ziwa Rhino Sanctuary',	'Full day',	'Travel to Ziwa Rhino Sanctuary for guided rhino tracking. Learn about rhino conservation efforts and enjoy nature walks.\r\n\r\n',	NULL,	'2024-12-27 11:20:11'),
(220,	34,	'Day 8: Murchison Falls National Park',	'Full day',	'Head to Murchison Falls National Park. Take an afternoon game drive to spot giraffes, buffaloes, and other animals. Enjoy a sunset boat ride to the base of the falls.\r\n\r\n',	NULL,	'2024-12-27 11:20:51'),
(221,	34,	'Day 9: Murchison Falls and Departure',	'Full day',	'Visit the top of Murchison Falls for breathtaking views of the Nile crashing through narrow rock gorges. Transfer to Entebbe for your departure flight.\r\n\r\n',	NULL,	'2024-12-27 11:21:19'),
(222,	35,	'Day 1: Arrival in Entebbe',	'Full day',	'Arrive in Entebbe and unwind at the serene shores of Lake Victoria. Optional activities include a sunset cruise or a visit to the Uganda Wildlife Education Centre.\r\n\r\n',	NULL,	'2024-12-27 11:42:05'),
(223,	35,	'Day 2: Mabira Forest and Jinja',	'Full day',	'Explore Mabira Forest on a guided nature walk or zip-lining adventure. Continue to Jinja, the source of the Nile, for a boat ride and thrilling water activities like kayaking or rafting.',	NULL,	'2024-12-27 11:42:36'),
(224,	35,	'Day 3: Mount Elgon National Park',	'Full day',	'Travel to Mount Elgon for a day of hiking through scenic trails, exploring caves, and viewing waterfalls. Learn about the areaâ€™s unique flora and fauna.\r\n\r\n',	NULL,	'2024-12-27 11:43:01'),
(225,	35,	'Day 4: Sipi Falls and Coffee Tour',	'Full day',	'Discover the beauty of Sipi Falls. Take guided hikes to explore all three waterfalls and enjoy a coffee farm tour, learning about Ugandaâ€™s premium coffee production.',	NULL,	'2024-12-27 11:43:38'),
(226,	35,	'Day 5: Murchison Falls National Park',	'Full day',	'Journey to Murchison Falls National Park. Enjoy an afternoon game drive to spot giraffes, elephants, and lions. Relax with a sunset view of the Nile.\r\n\r\n',	NULL,	'2024-12-27 11:49:18'),
(227,	35,	'Day 6: Nile Boat Safari and Waterfalls',	'Full day',	'Take a boat safari on the Nile River, spotting hippos and crocodiles. Visit the top of Murchison Falls for stunning views of the roaring waterfalls.\r\n\r\n',	NULL,	'2024-12-27 11:49:42'),
(228,	35,	'Day 7: Ziwa Rhino Sanctuary',	'Full day',	'Stop at Ziwa Rhino Sanctuary for guided rhino tracking. Learn about conservation efforts and enjoy birdwatching in this peaceful reserve.\r\n\r\n',	NULL,	'2024-12-27 11:51:13'),
(229,	35,	'Day 8: Kampala City Tour and Departure',	'Full day',	'Wrap up your journey with a Kampala city tour. Visit the Uganda Museum, craft markets, and cultural landmarks before transferring to Entebbe for your departure.',	NULL,	'2024-12-27 11:52:19'),
(230,	36,	'Day 1: Arrival in Entebbe and Kampala Exploration',	'Full day',	'Arrive in Entebbe and transfer to Kampala. Explore the bustling city with visits to the Uganda Museum, Ndere Cultural Centre, and local craft markets.',	NULL,	'2024-12-27 12:05:37'),
(231,	36,	'Day 2: Lake Mburo National Park Safari',	'Full day',	'Head to Lake Mburo National Park for an afternoon game drive. Spot zebras, elands, and antelopes. Enjoy a tranquil boat ride on Lake Mburo, observing hippos and birdlife.\r\n\r\n',	NULL,	'2024-12-27 12:06:08'),
(232,	36,	'Day 3: Kibale Forest and Chimpanzee Tracking',	'Full day',	'Travel to Kibale Forest National Park, home to diverse primates. Embark on a guided chimpanzee tracking expedition and explore the lush forest filled with unique flora and fauna.',	NULL,	'2024-12-27 12:06:39'),
(233,	36,	'Day 4: Fort Portal and Crater Lakes Exploration',	'Full day',	'Visit Fort Portal, Ugandaâ€™s â€œTourism City.â€ Explore the scenic crater lakes and Amabere Ga Nyina Mwiru caves, steeped in local legend and surrounded by stunning natural beauty.',	NULL,	'2024-12-27 12:07:04'),
(234,	36,	'Day 5: Queen Elizabeth National Park Safari',	'Full day',	'Drive to Queen Elizabeth National Park for a game drive and a Kazinga Channel boat safari. Spot lions, elephants, buffaloes, and a variety of water birds.\r\n\r\n',	NULL,	'2024-12-27 12:07:49'),
(235,	36,	'Day 6: Departure via Entebbe',	'Full day',	'Return to Entebbe with a stopover for a cultural tour in Mpigi to learn traditional practices. Transfer to the airport for your departure.\r\n\r\n',	NULL,	'2024-12-27 12:12:34'),
(237,	37,	'Day 1: Arrival in Entebbe and Mabamba Swamp Excursion',	'Full day',	'Arrive in Entebbe and visit Mabamba Swamp, a bird loverâ€™s paradise. Spot the rare shoebill stork during a guided canoe trip. Spend the evening relaxing by the shores of Lake Victoria.\r\n\r\n',	NULL,	'2024-12-27 12:24:24'),
(238,	37,	'Day 2: Ziwa Rhino Sanctuary and Transfer to Murchison Falls',	'Full day',	'Travel to Ziwa Rhino Sanctuary for a thrilling rhino tracking experience. Continue to Murchison Falls National Park, where the majestic Nile flows through a narrow gorge.\r\n\r\n',	NULL,	'2024-12-27 12:24:58'),
(239,	37,	'Day 3: Murchison Falls Game Drive and Boat Safari',	'Full day',	'Enjoy an early morning game drive, spotting elephants, lions, giraffes, and antelopes. In the afternoon, take a boat cruise along the Nile to the base of the iconic Murchison Falls.\r\n\r\n',	NULL,	'2024-12-27 12:25:27'),
(240,	37,	'Day 4: Departure via Kampala and Buganda Cultural Tour',	'Full day',	'Return to Kampala with a stop at the Buganda Kingdomâ€™s Kasubi Tombs, a UNESCO World Heritage Site. Transfer to Entebbe Airport for your departure.\r\n\r\n',	NULL,	'2024-12-27 12:26:49'),
(241,	38,	'Day 1: Arrival in Windhoek',	'Full day',	'Explore Windhoek\'s highlights, including the Christuskirche and Independence Memorial Museum. Enjoy an overnight stay in Namibiaâ€™s capital.',	NULL,	'2024-12-27 16:37:34'),
(242,	38,	'Day 2-3: Etosha National Park Safari',	'Full day',	'Witness incredible wildlife on game drives in Etosha National Park, famous for its vast salt pans and diverse animal species. Stay in a charming lodge.\r\n\r\n',	NULL,	'2024-12-27 16:38:13'),
(243,	38,	'Day 4: Damaraland Exploration',	'Full day',	'Discover Damaralandâ€™s rugged beauty, ancient rock art at Twyfelfontein, and the unique Petrified Forest. Overnight in a scenic lodge.',	NULL,	'2024-12-27 16:39:06'),
(244,	38,	'Day 5-6: Swakopmund Coastal Charm',	'Full day',	'Enjoy adventure activities like sandboarding and dolphin cruises. Explore Swakopmundâ€™s German colonial charm and vibrant markets.',	NULL,	'2024-12-27 16:39:46'),
(245,	38,	'Day 7-8: Skeleton Coast and Cape Cross',	'Full day',	'Visit the eerie Skeleton Coast, known for its shipwrecks, and Cape Cross, home to a massive seal colony.\r\n\r\n',	NULL,	'2024-12-27 16:40:15'),
(246,	38,	'Day 9-10: Sossusvlei and Deadvlei',	'Full day',	'Experience the towering red dunes of Sossusvlei and the surreal landscapes of Deadvlei. Climb Dune 45 and witness unforgettable sunsets.',	NULL,	'2024-12-27 17:29:58'),
(247,	38,	'Day 11: Fish River Canyon',	'Full day',	'Marvel at the grandeur of Fish River Canyon, the worldâ€™s second-largest canyon. Enjoy breathtaking views and serene hikes.',	NULL,	'2024-12-27 17:30:45'),
(248,	38,	'Day 12: Departure from Windhoek',	'Full day',	'Return to Windhoek for last-minute shopping or relaxation before your departure.\r\n\r\n',	NULL,	'2024-12-27 17:31:22'),
(249,	39,	'Day 1: Arrival in Windhoek',	'Full day',	'Arrive in Namibiaâ€™s capital, Windhoek. Enjoy a city tour covering the Christuskirche and vibrant markets.',	NULL,	'2024-12-27 18:45:48'),
(250,	39,	'Day 2-3: Etosha National Park Safari',	'Full day',	'Embark on thrilling game drives in Etosha National Park. Spot lions, elephants, giraffes, and more in their natural habitat.',	NULL,	'2024-12-27 18:46:27'),
(251,	39,	'Day 4: Damaraland Discoveries',	'Full day',	'Explore Damaralandâ€™s stunning landscapes, visit Twyfelfonteinâ€™s ancient rock engravings, and see the unique Petrified Forest.',	NULL,	'2024-12-27 18:46:55'),
(252,	39,	'Day 5-6: Swakopmund Adventures',	'Full day',	'Relax by the Atlantic Coast in Swakopmund. Indulge in activities like quad biking, sandboarding, or a dolphin cruise. Stroll through the German-inspired town.',	NULL,	'2024-12-27 18:47:57'),
(253,	39,	'Day 7: Skeleton Coast Wonders',	'Full day',	'Discover the eerie Skeleton Coast, with its dramatic shipwrecks and striking scenery. Stop by Cape Cross to see its enormous seal colony.\r\n\r\n',	NULL,	'2024-12-27 18:48:24'),
(254,	39,	'Day 8: Namib Desert and Sossusvlei',	'Full day',	'Experience the iconic Namib Desert. Climb Dune 45, visit Sossusvlei and Deadvlei, and marvel at the regionâ€™s surreal beauty.',	'images/itineraries/IGIHOZO Didier.png',	'2024-12-27 18:48:55'),
(255,	39,	'Day 9: Sesriem Canyon and Desert Escape',	'Full day',	'Explore Sesriem Canyonâ€™s fascinating geological formations. Spend your evening stargazing in the peaceful Namib Desert.\r\n\r\n',	'images/itineraries/UTB.jpeg',	'2024-12-27 18:49:25'),
(256,	39,	'Day 10: Return to Windhoek and Departure',	'Full day',	'Head back to Windhoek for final shopping and farewells before your departure.\r\n\r\n',	'images/itineraries/ID-Back.jpg',	'2024-12-27 18:55:56'),
(257,	40,	'Day 1: Arrival in Windhoek',	'Full day',	'Arrive in Windhoek, Namibiaâ€™s capital. Explore its historical landmarks, bustling markets, and vibrant culture. Enjoy a warm welcome and a relaxed evening.\r\n\r\n',	'images/itineraries/wall.jpeg',	'2024-12-27 20:27:24'),
(258,	40,	'Day 2: Waterberg Plateau National Park',	'Full day',	'Travel to Waterberg Plateau, a stunning reserve with unique rock formations and diverse flora. Hike scenic trails and enjoy panoramic views of the savannah.',	'images/itineraries/IGIHOZO Didier.png',	'2024-12-27 20:27:57'),
(259,	40,	'Day 3: Twyfelfontein and Rock Art',	'Full day',	'Visit Twyfelfontein, home to ancient rock engravings and UNESCO World Heritage status. Explore the Petrified Forest and witness fascinating desert-adapted plants.\r\n\r\n',	'images/itineraries/wallpaper.jpg',	'2024-12-27 20:30:12'),
(260,	40,	'Day 4: Kaokoland Cultural Experience',	'Full day',	'Journey to Kaokoland, one of Namibiaâ€™s most remote regions. Encounter the Himba people, learn about their culture, and explore rugged, untouched landscapes.',	'images/itineraries/utb.png',	'2024-12-27 20:30:56'),
(261,	40,	'Day 5-6: Caprivi Strip Safari',	'Full day',	'Head to the Caprivi Strip, a lush area teeming with wildlife. Enjoy river safaris, game drives, and birdwatching in Bwabwata National Park.',	'images/itineraries/card.jpg',	'2024-12-27 20:31:37'),
(262,	40,	'Day 7: Zambezi River Retreat',	'Full day',	'Relax along the Zambezi River, taking in serene views and enjoying optional activities like fishing or a sunset cruise.\r\n\r\n',	'images/itineraries/WhatsApp Image 2024-12-28 at 08.54.46(1).jpeg',	'2024-12-27 20:32:04'),
(263,	40,	'Day 8: Return to Windhoek and Departure',	'Full day',	'Fly back to Windhoek. Spend the last moments exploring or relaxing before your departure.\r\n\r\n',	'images/itineraries/logo.png',	'2024-12-27 20:33:22');

DROP TABLE IF EXISTS `offer`;
CREATE TABLE `offer` (
  `offer_id` varchar(10) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `tourist_id` int(10) NOT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `tour_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`offer_id`),
  KEY `FK` (`tourist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `PackageDiscounts`;
CREATE TABLE `PackageDiscounts` (
  `DiscountID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for Discounts',
  `DiscountValue` decimal(10,2) NOT NULL,
  `DiscountPackageID` int(11) NOT NULL COMMENT 'Foreign Key for Package Reference',
  `DiscountStatus` int(11) NOT NULL DEFAULT 1 COMMENT 'Status of Discount (1=Active, 0=Inactive)',
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Date and Time when the Discount was Created',
  PRIMARY KEY (`DiscountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `PackageDiscounts` (`DiscountID`, `DiscountValue`, `DiscountPackageID`, `DiscountStatus`, `DateCreated`) VALUES
(4,	4.00,	31,	1,	'2024-12-29 21:50:18'),
(5,	5.00,	28,	1,	'2024-12-29 22:16:20'),
(6,	7.00,	22,	1,	'2024-12-29 22:47:52'),
(7,	3.00,	35,	1,	'2024-12-29 23:07:51'),
(8,	12.00,	14,	1,	'2024-12-29 23:08:01'),
(9,	14.00,	21,	1,	'2024-12-30 09:50:34'),
(10,	7.00,	26,	1,	'2024-12-30 09:50:47'),
(11,	20.00,	33,	1,	'2024-12-30 09:52:18'),
(12,	12.00,	40,	1,	'2024-12-30 09:52:48');

DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(100) DEFAULT NULL,
  `package_introduction` text DEFAULT NULL,
  `package_description` text DEFAULT NULL,
  `package_days_and_nights` varchar(200) DEFAULT NULL,
  `package_from_date` varchar(100) DEFAULT NULL,
  `package_to_date` varchar(100) DEFAULT NULL,
  `package_price` varchar(100) DEFAULT NULL,
  `package_travel_type` varchar(100) DEFAULT NULL,
  `package_type` varchar(100) DEFAULT NULL,
  `package_country` int(11) DEFAULT NULL,
  `package_number_of_person` varchar(100) DEFAULT NULL,
  `package_image` varchar(100) DEFAULT NULL,
  `package_status` int(11) DEFAULT 1,
  `package_recorded_date` varchar(100) DEFAULT NULL,
  `package_company_owner` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `packages` (`package_id`, `package_name`, `package_introduction`, `package_description`, `package_days_and_nights`, `package_from_date`, `package_to_date`, `package_price`, `package_travel_type`, `package_type`, `package_country`, `package_number_of_person`, `package_image`, `package_status`, `package_recorded_date`, `package_company_owner`) VALUES
(4,	' The Majestic South Africa Experience',	'Experience the best of South Africa with First Class Toursâ€”8 days of culture, wildlife, and stunning landscapes, including Johannesburg, Kruger National Park, the Cape Peninsula, and Cape Town\'s iconic sights.',	'The Majestic South Africa Experience\r\nEmbark on an 8-day luxury tour through South Africa, exploring Johannesburg, Kruger National Park, the Cape Peninsula, and Cape Town. Enjoy safaris, cultural experiences, and stunning landscapes.',	'8 days/7 nights.',	'',	'',	'3,500',	'1',	'1',	45,	'3',	'file_20241223_111507.jpg',	1,	'2024-12-23 13:15:08',	0),
(8,	'South Africaâ€™s Diverse Adventures ',	'Experience South Africa\'s vibrant cities, breathtaking landscapes, and diverse wildlife in 7 days. Discover Cape Town, Durban, the majestic Drakensberg Mountains, and enjoy a thrilling safari in Pilanesberg National Park.',	'Explore South Africaâ€™s vibrant cities, majestic mountains, and wildlife wonders in 7 days. From Cape Town to Pilanesberg, enjoy thrilling safaris, cultural heritage, and breathtaking landscapes.',	'7days/ 6nights',	'',	'',	'3,000',	'1',	'1',	45,	'4',	'file_20241224_133956.png',	1,	'2024-12-24 15:39:57',	0),
(9,	'Explore South Africa: 6 Days of Adventure and Beauty',	'Discover the magic of South Africa in 6 days. Explore Johannesburgâ€™s rich history, experience Kruger National Parkâ€™s wildlife, relax in the Garden Route, and marvel at Cape Townâ€™s beauty.',	'Discover South Africaâ€™s history in Johannesburg, experience thrilling safaris in Kruger, explore the Garden Routeâ€™s beauty, savor Cape Winelands delights, and uncover Cape Townâ€™s iconic landmarks on this unforgettable 6-day journey.',	'6 days/5 nights ',	'',	'',	'2,800',	'1',	'1',	45,	'4',	'file_20241224_155015.jpeg',	1,	'2024-12-24 17:50:15',	0),
(10,	'Explore South Africa: 5-Day Journey',	'Embark on a 5-day journey through South Africaâ€™s most captivating destinations. From the bustling streets of Johannesburg to the serene beauty of the Drakensberg Mountains, experience the countryâ€™s cultural, historical, and natural wonders.',	'This tour offers an unforgettable exploration of South Africaâ€™s vibrant culture, rich history, and breathtaking landscapes. Enjoy a blend of urban adventures, wildlife encounters, and scenic escapes, making every moment a memory to cherish.',	'5days/4nights',	'',	'',	'2,500',	'1',	'1',	45,	'3',	'file_20241224_210954.jpg',	1,	'2024-12-24 23:09:54',	0),
(11,	'Explore South Africa in 4 Days',	'Immerse yourself in South Africa\'s vibrant culture and stunning landscapes with this 4-day adventure. From the iconic Table Mountain to the historic Robben Island, experience the best of Cape Town and beyond.',	'Experience South Africa\'s beauty in 4 days. Explore Cape Townâ€™s landmarks, discover the Cape Peninsula, enjoy wine tastings in Stellenbosch, and visit Robben Island for a rich cultural journey.',	'4 days/3 nights',	'',	'',	'2,000',	'1',	'1',	45,	'4',	'file_20241224_212905.jpg',	1,	'2024-12-24 23:29:05',	0),
(12,	'South Africa: 4-Day Adventure Tour',	'This 4-day tour takes you through the vibrant cities and breathtaking landscapes of South Africa. From the energetic city of Johannesburg to the beauty of Pilanesberg National Park and the historic sites of Pretoria, this journey promises an unforgettable experience.',	'Explore South Africa in 4 days, visiting Johannesburgâ€™s historical sites, experiencing a safari in Pilanesberg National Park, enjoying Sun City, and discovering Pretoriaâ€™s landmarks, offering a mix of culture and adventure.',	'4 days/3 nights',	'',	'',	'2,200',	'1',	'1',	45,	'2',	'file_20241224_214415.jpg',	1,	'2024-12-24 23:44:15',	0),
(13,	'Discover Livingstone, Zambia ',	'This package is designed to provide a well-rounded experience in Livingstone, combining adventure, wildlife, culture, and relaxation. All activities are customizable, ensuring an unforgettable trip tailored to your preferences',	'Explore the best of Livingstone with a detailed day-by-day itinerary, including every activity from morning to evening. Enjoy a mix of breathtaking natural wonders, thrilling wildlife experiences, and rich cultural interactions, all while staying in a 4-star lodge.',	'5 Day & 4 Nights',	'',	'',	'4500',	'3',	'2',	52,	'2',	'file_20241225_010013.jpeg',	1,	'2024-12-25 03:00:13',	0),
(14,	'Zambia Vacation, Wildlife safaris, Rusaka City Tour,Cultural exprience',	'Immerse yourself in Zambiaâ€™s vibrant culture, breathtaking wildlife, and stunning landscapes. From Lusakaâ€™s city charm to thrilling safaris and the majestic Victoria Falls, this adventure is unforgettable.',	'Explore Zambiaâ€™s best destinations, including Lusakaâ€™s bustling streets, South Luangwaâ€™s thrilling safaris, and Livingstoneâ€™s iconic Victoria Falls. Dive into culture, nature, and adventure on this exciting 6-day journey.',	'10 Day & 9 Nights',	'',	'',	'8600',	'1',	'2',	52,	'2',	'file_20241225_014416.jpeg',	1,	'2024-12-25 03:44:16',	0),
(15,	'10-Day Magical Kenya Adventure',	'Embark on a thrilling 10-day journey through Kenyaâ€™s most iconic destinations. From vibrant cities and wildlife safaris to serene beaches, this adventure showcases the best of Kenyaâ€™s culture, landscapes, and biodiversity.',	'Experience Kenyaâ€™s vibrant culture, breathtaking landscapes, and iconic wildlife in this 10-day adventure. Explore Nairobi, Masai Mara, Mount Kenya, and serene lakes for an unforgettable journey.',	'10days/9nights',	'',	'',	'3,500',	'1',	'1',	25,	'5',	'file_20241225_095624.jpeg',	1,	'2024-12-25 11:56:24',	0),
(16,	'Discover the Wonders of Kenya â€“ 8 Days Adventure',	'Embark on an 8-day journey through Kenyaâ€™s vibrant landscapes and diverse wildlife. Explore Nairobi, the iconic Masai Mara, Lake Naivasha, and Amboseli National Park for an unforgettable adventure.',	'Explore Kenyaâ€™s stunning landscapes in 8 days, including safaris in Masai Mara and Amboseli, Lake Naivashaâ€™s beauty, and Nairobiâ€™s cultural highlights. A perfect blend of wildlife and culture.',	'8 days/7 nights.',	'',	'',	'3,000',	'1',	'1',	25,	'4',	'file_20241225_104859.jpg',	1,	'2024-12-25 12:48:59',	0),
(17,	' Tour Package: Kenya Adventure - 6 Days of Wildlife and Culture',	'Embark on a 6-day journey through Kenyaâ€™s rich landscapes and wildlife wonders. From vibrant city life to serene natural reserves, this tour is crafted for unforgettable experiences in the heart of Africa.',	'Discover Kenyaâ€™s breathtaking wildlife, cultural heritage, and scenic beauty on this 6-day adventure. Explore Nairobi, Samburu, Lake Nakuru, and Mount Kenya for an enriching and thrilling travel experience.',	'6 days/5 nights ',	'',	'',	'2,800',	'1',	'1',	25,	'3',	'file_20241225_111114.jpg',	1,	'2024-12-25 13:11:14',	0),
(18,	'Kenyaâ€™s Ultimate 12-Day Adventure: Wildlife, Culture, and Coastal Bliss',	'Immerse yourself in Kenyaâ€™s rich culture, stunning landscapes, and incredible wildlife on this 12-day journey. From bustling Nairobi to the Maasai Mara, Mount Kenya, and the pristine Diani Beach, every day is an adventure.',	'Explore Kenyaâ€™s vibrant culture, breathtaking savannahs, and serene beaches in 12 days. Visit Nairobi, Samburu, Mount Kenya, Lake Naivasha, Maasai Mara, and relax on the idyllic Diani Beach.',	'12days/11days',	'',	'',	'9,000',	'1',	'1',	25,	'4',	'file_20241225_115508.jpg',	1,	'2024-12-25 13:55:08',	0),
(19,	'Kenyaâ€™s 5-Day Highlights: Safari, Culture, and Scenic Beauty',	'Explore Kenya\'s vibrant culture, thrilling wildlife safaris, and serene landscapes in this 5-day adventure, featuring Nairobiâ€™s attractions, Maasai Maraâ€™s iconic Big Five, and Lake Naivashaâ€™s breathtaking beauty.',	'Discover the best of Kenya in this immersive 5-day adventure. Experience the thrill of safaris in Maasai Mara, cultural encounters in Amboseli, and serene views at Lake Naivasha.',	'5days/4nights',	'',	'',	'2,000',	'1',	'1',	25,	'2',	'file_20241225_162102.webp',	1,	'2024-12-25 18:21:02',	0),
(20,	'Kenyaâ€™s 4-Day Escape, Wildlife and Wonders',	'Experience Kenyaâ€™s wildlife and natural beauty in this compact 4-day adventure. Perfect for a quick getaway, this journey combines thrilling safaris, serene lakes, and unforgettable cultural encounters.',	'Explore Kenya in 4 action-packed days. From spotting the Big Five in Maasai Mara to enjoying a boat ride on Lake Naivasha and immersing in Nairobiâ€™s vibrant culture.',	'4 days/3 nights',	'',	'',	'1,800',	'1',	'1',	25,	'3',	'file_20241225_163834.webp',	1,	'2024-12-25 18:38:34',	0),
(21,	'Zambia Explorer: A 12-Day Adventure Through Culture and Wilderness',	'Experience Zambia like never before in this 12-day journey, exploring vibrant cities, thrilling safaris, cultural heritage, and awe-inspiring natural wonders like the Victoria Falls and Zambezi River.',	'Dive into Zambia\'s best offeringsâ€”Lusakaâ€™s urban energy, South Luangwaâ€™s wildlife, the serene Lower Zambezi, and the majestic Victoria Falls. This tour is a mix of culture, adventure, and relaxation.',	'12days/11nights',	'',	'',	'9,000',	'1',	'1',	52,	'4',	'file_20241225_213924.webp',	1,	'2024-12-25 23:39:24',	0),
(22,	'Zambia Adventure: An 8-Day Journey Through Diverse Landscapes',	'Discover the beauty of Zambia in 8 days, featuring wildlife safaris, natural wonders, and cultural experiences. Explore diverse destinations, from iconic Victoria Falls to hidden gems.',	'This 8-day tour unveils Zambiaâ€™s unique charm, combining thrilling safaris, vibrant cities, and serene landscapes. Perfect for adventurers seeking an unforgettable experience.',	'8 days/7 nights.',	'',	'',	'8,000',	'1',	'1',	1,	'4',	'file_20241225_222514.jpeg',	1,	'2024-12-26 00:25:14',	0),
(23,	'Discover Zambia in 6 Days: Wildlife, Culture, and Scenic Beauty',	'Immerse yourself in Zambia\'s stunning landscapes, rich culture, and thrilling wildlife safaris. This 6-day journey explores diverse destinations, from bustling cities to serene natural wonders.',	'Experience the best of Zambia in just six days, blending cultural exploration, wildlife encounters, and breathtaking scenery. A perfect escape for adventure and relaxation.',	'6 days/5 nights ',	'',	'',	'6,000',	'1',	'1',	52,	'3',	'file_20241225_224355.jpeg',	1,	'2024-12-26 00:43:55',	0),
(24,	'Zambia in 5 Days: Nature, Culture, and Adventure',	'Discover Zambiaâ€™s highlights in a thrilling 5-day journey. Explore iconic Victoria Falls, vibrant cultural villages, and diverse wildlife safaris in this unforgettable adventure.',	'This 5-day trip blends Zambiaâ€™s natural wonders and rich culture. Ideal for travelers seeking a quick yet immersive African experience.',	'5days/4nights',	'',	'',	'4,000',	'1',	'1',	52,	'2',	'file_20241225_234323.jpg',	1,	'2024-12-26 01:43:23',	0),
(25,	'A 4-Day Nature and Culture Adventure in Zambia',	'Experience Zambiaâ€™s natural beauty and cultural heritage in this short yet unforgettable 4-day adventure. Visit Victoria Falls, wildlife reserves, and vibrant cultural hubs.',	'This 4-day journey offers a perfect mix of Zambiaâ€™s iconic waterfalls, thrilling safaris, and cultural insights for travelers with limited time.',	'4 days/3 nights',	'',	'',	'3,800',	'1',	'1',	52,	'3',	'file_20241226_114838.jpg',	1,	'2024-12-26 13:48:38',	0),
(26,	' Tanzania Expedition, A 12-Day Safari and Coastal Adventure',	'Embark on a 12-day journey through Tanzaniaâ€™s diverse landscapes, from the iconic Serengeti plains to the white-sand beaches of Zanzibar. Experience thrilling safaris, vibrant culture, and breathtaking natural beauty.',	'This 12-day adventure showcases Tanzaniaâ€™s wildlife, culture, and pristine beaches. Discover world-famous parks, experience local traditions, and unwind on Zanzibarâ€™s tropical shores.',	'12days/11nights',	'',	'',	'9,000',	'1',	'1',	48,	'4',	'file_20241226_121452.jpeg',	1,	'2024-12-26 14:14:52',	0),
(27,	'Tanzania Discovery, A 10-Day Safari and Coastal Escape',	'Immerse yourself in the beauty of Tanzania with this 10-day tour. Experience thrilling wildlife safaris in iconic parks and unwind on Zanzibar\'s stunning beaches, blending adventure and relaxation.',	'Explore Tanzaniaâ€™s world-renowned national parks, vibrant culture, and serene coastal landscapes. This 10-day itinerary offers an unforgettable mix of thrilling safaris and tranquil beach retreats.\r\n\r\n',	'10days/9nights',	'',	'',	'7,500',	'1',	'1',	48,	'5',	'file_20241226_132438.jpeg',	1,	'2024-12-26 15:24:38',	0),
(28,	'Tanzania Explorer: An 8-Day Adventure Through Unique Destinations',	'Discover Tanzania\'s hidden gems on this 8-day journey. From off-the-beaten-path national parks to historical sites and the tranquil islands of the Indian Ocean, this tour blends adventure and relaxation.',	'Experience Tanzaniaâ€™s diverse attractions, from unique wildlife encounters and cultural visits to pristine island retreats. Explore lesser-known parks, historical towns, and the coastal serenity of Mafia Island.',	'8 days/7 nights.',	'',	'',	'6,700',	'1',	'1',	48,	'4',	'file_20241226_135428.jpg',	1,	'2024-12-26 15:54:28',	0),
(29,	'Tanzania Explorer: A 6-Day Journey to Unseen Gems',	'Experience Tanzania\'s unique landscapes and vibrant culture on this 6-day journey. Discover untouched parks, serene lakes, and cultural treasures beyond the usual tourist trail.',	'This 6-day adventure unveils Tanzania\'s hidden wonders. From remote wildlife havens to cultural villages and breathtaking views, explore the heart of Tanzaniaâ€™s diverse offerings.',	'6 days/5 nights ',	'',	'',	'6,300',	'1',	'1',	48,	'5',	'file_20241226_141419.jpeg',	1,	'2024-12-26 16:14:19',	0),
(30,	' Tanzania Discovery: A 5-Day Adventure Through Hidden Treasures',	'Embark on a 5-day journey through Tanzania\'s unique landscapes and vibrant culture. Explore untouched wildlife, serene beaches, and historical sites for an unforgettable experience.',	'This 5-day adventure offers a mix of Tanzaniaâ€™s wildlife, culture, and coastal charm. Discover hidden gems and create memories to last a lifetime.',	'5days/4nights',	'',	'',	'6,000',	'1',	'1',	48,	'4',	'file_20241226_171442.jpeg',	1,	'2024-12-26 19:14:43',	0),
(31,	'Tanzania Wonders: A 7-Day Journey Across Nature and Culture',	'Dive into Tanzaniaâ€™s captivating beauty with a 7-day adventure. Discover vibrant cities, breathtaking wildlife, and serene beaches for an unforgettable escape.',	'Explore the best of Tanzania in seven days. From the wildlife-rich national parks to the cultural heart of Dar es Salaam and Zanzibar\'s pristine beaches, this trip has it all.',	'7days/ 6nights',	'',	'',	'6,500',	'1',	'1',	48,	'5',	'file_20241226_181819.jpeg',	1,	'2024-12-26 20:18:19',	0),
(32,	'12-Day Uganda Adventure: Explore the Pearl of Africa',	'Embark on a 12-day journey across Uganda, the Pearl of Africa, where every corner unveils breathtaking beauty. From lush rainforests and thrilling wildlife safaris to vibrant cultural experiences, this tour promises unforgettable memories.',	'Discover Ugandaâ€™s stunning landscapes, diverse wildlife, and rich culture. Experience gorilla trekking, explore the Source of the Nile, marvel at Sipi Falls, and enjoy thrilling safaris in iconic national parks.',	'12days/11days',	'',	'',	'9,000',	'1',	'1',	51,	'5',	'file_20241227_080616.jpg',	1,	'2024-12-27 10:06:16',	0),
(33,	'10-Day Uganda Discovery: A Journey Through Nature and Culture',	'Explore Ugandaâ€™s diverse beauty over 10 days. From serene lakes and rolling hills to wildlife-packed savannas and cultural heritage, this journey offers unforgettable adventures across the Pearl of Africa.\r\n\r\n',	'Immerse yourself in Ugandaâ€™s treasures. Experience gorilla trekking, chimpanzee tracking, scenic lakes, and thrilling safaris. Visit unique cultural sites and marvel at the natural wonders of this vibrant country.\r\n\r\n',	'10days/9nights',	'',	'',	'8600',	'1',	'1',	51,	'4',	'file_20241227_083604.jpg',	1,	'2024-12-27 10:36:04',	0),
(34,	'9-Day Uganda Adventure: Nature, Wildlife, and Culture',	'Discover Ugandaâ€™s charm in this 9-day journey through iconic landscapes, thrilling wildlife safaris, and vibrant cultural experiences. Perfect for adventurers seeking a blend of relaxation and exploration.\r\n\r\n',	'This 9-day itinerary offers thrilling gorilla trekking, serene lakes, and exciting wildlife safaris. Immerse yourself in Ugandaâ€™s rich cultural heritage and explore its breathtaking national parks and scenic wonders.',	'9days/8nights',	'',	'',	'8,300',	'1',	'1',	51,	'4',	'file_20241227_090819.jpeg',	1,	'2024-12-27 11:08:19',	0),
(35,	'8-Day Uganda Expedition: Nature, Wildlife, and Cultural Wonders',	'Embark on an 8-day Ugandan adventure, exploring captivating landscapes, vibrant culture, and diverse wildlife. Perfect for travelers seeking a blend of thrilling safaris, cultural experiences, and scenic beauty.\r\n\r\n',	'This 8-day tour highlights Ugandaâ€™s iconic destinations, including serene lakes, mountain gorillas, and vibrant cultural sites. Experience the best of Ugandaâ€™s nature, wildlife, and warm hospitality.',	'8 days/7 nights.',	'',	'',	'8,000',	'1',	'1',	51,	'3',	'file_20241227_093709.jpeg',	1,	'2024-12-27 11:37:09',	0),
(36,	'6-Day Uganda Highlights: Wildlife, Adventure, and Culture',	'Discover Ugandaâ€™s breathtaking beauty in just six days. This tour blends thrilling wildlife encounters, serene landscapes, and vibrant cultural experiences, showcasing the countryâ€™s rich heritage and natural wonders.',	'This 6-day Uganda adventure includes wildlife safaris, mountain vistas, and cultural immersion. Visit iconic destinations like Lake Mburo, Kibale Forest, and cultural landmarks, perfect for travelers seeking a short yet unforgettable experience.',	'6 days/5 nights ',	'',	'',	'7,400',	'1',	'1',	51,	'4',	'file_20241227_100340.jpg',	1,	'2024-12-27 12:03:40',	0),
(37,	'4-Day Uganda Adventure: Nature, Wildlife, and Culture',	'Experience Ugandaâ€™s beauty in just four days! This tour offers a mix of wildlife safaris, serene landscapes, and cultural experiences, perfect for a short yet impactful getaway.',	'Explore Ugandaâ€™s rich biodiversity and cultural heritage. This 4-day journey takes you to vibrant towns, wildlife-rich parks, and tranquil natural settings, creating memories to cherish forever.\r\n\r\n',	'4 days/3 nights',	'',	'',	'6,000',	'1',	'1',	51,	'4',	'file_20241227_102158.webp',	1,	'2024-12-27 12:21:58',	0),
(38,	'Discover Namibia: A Journey Through Desert, Wildlife, and Cultur',	'Uncover Namibia\'s mesmerizing landscapes and vibrant culture in this 12-day journey. From thrilling safaris to surreal desert vistas, each day offers unforgettable memories.\r\n\r\n',	'This 12-day tour showcases Namibiaâ€™s beauty, from Etoshaâ€™s wildlife to Sossusvleiâ€™s dunes. Discover the Skeleton Coast, Fish River Canyon, and Windhoekâ€™s vibrant culture in this immersive journey.',	'12days/11nights',	'',	'',	'9,000',	'1',	'1',	36,	'5',	'file_20241227_143150.webp',	1,	'2024-12-27 16:31:50',	0),
(39,	'Namibia: The Ultimate 10-Day Adventure',	'Experience the stunning beauty and diverse wonders of Namibia in this 10-day journey. From safaris to majestic deserts, every moment is a step into adventure.',	'Discover Namibiaâ€™s captivating landscapes on this 10-day journey. From Etoshaâ€™s wildlife to Swakopmundâ€™s coast and Sossusvleiâ€™s dunes, experience the perfect blend of adventure and serenity.',	'10days/9nights',	'',	'',	'8600',	'1',	'1',	36,	'4',	'file_20241227_184356.webp',	1,	'2024-12-27 18:06:39',	0),
(40,	'Namibia: 8-Day Diverse Adventure',	'Discover the breathtaking diversity of Namibia on this 8-day journey. From awe-inspiring deserts to cultural towns and unique geological wonders, this tour captures the essence of Namibia.',	'Explore Namibiaâ€™s stunning landscapes and rich heritage on this 8-day tour. Highlights include the Waterberg Plateau, Twyfelfonteinâ€™s rock art, Kaokolandâ€™s culture, and the lush Caprivi Strip.',	'8 days/7 nights.',	'',	'',	'8,300',	'1',	'1',	36,	'4',	'file_20241227_182058.jpg',	1,	'2024-12-27 20:20:58',	0),
(41,	'Namibia: 7-Day Highlights Tour',	'Immerse yourself in Namibia\'s stunning landscapes and unique culture on this 7-day journey. From desert dunes to vibrant towns, this adventure offers unforgettable experiences and breathtaking views.\r\n\r\n',	'Experience Namibiaâ€™s top highlights in 7 days. Explore Sossusvleiâ€™s red dunes, Swakopmundâ€™s charm, Skeleton Coastâ€™s wildlife, Etoshaâ€™s safari, and Waterberg Plateauâ€™s stunning vistas.',	'7days/ 6nights',	'',	'',	'7,500',	'1',	'1',	36,	'4',	'file_20241227_200206.cms',	1,	'2024-12-27 22:02:06',	0);

DROP TABLE IF EXISTS `package_inclusive`;
CREATE TABLE `package_inclusive` (
  `package_inclusive_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `tour_plan` text NOT NULL,
  `departure_location` varchar(200) NOT NULL,
  `return_location` varchar(200) NOT NULL,
  `departure_time` varchar(200) NOT NULL,
  `bed_room` varchar(200) DEFAULT NULL,
  `air_fares` varchar(200) NOT NULL,
  `hotel` varchar(200) NOT NULL,
  `entrance_fees` varchar(200) NOT NULL,
  `tour_guide` varchar(200) NOT NULL,
  `insurance` varchar(200) NOT NULL,
  `food_and_drinks` varchar(200) NOT NULL,
  `additional_service` varchar(200) DEFAULT NULL,
  `recorded_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`package_inclusive_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `package_inclusive` (`package_inclusive_id`, `package_id`, `tour_plan`, `departure_location`, `return_location`, `departure_time`, `bed_room`, `air_fares`, `hotel`, `entrance_fees`, `tour_guide`, `insurance`, `food_and_drinks`, `additional_service`, `recorded_date`) VALUES
(2,	2,	'Price Includes:\r\n\r\nAirport transfers and ground transportation in a 4x4 safari vehicle\r\nAccommodation based on chosen package\r\nPark entry fees and permit fees (gorilla trekking permits $1,500 included)\r\nMeals as listed in the itinerary\r\nProfessional English-speaking guide\r\nActivities listed in the itinerary\r\nPrice Excludes:\r\n\r\nInternational flights\r\nVisas and personal expenses\r\nTravel insurance\r\nOptional activities not included in the itinerary\r\n',	'kigali',	'KIGALI',	'7pm',	'',	'Yes',	'Yes',	'Yes',	'Yes',	'Yes',	'Yes',	'',	'2024-12-17 03:21:18'),
(3,	3,	'Visit RWANDA with First Class Tours.',	'Kigali',	'Kigali',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-23 12:41:19'),
(4,	4,	'8-Day Majestic South Africa Tour\r\nExplore Johannesburg, Kruger National Park, the Cape Peninsula, and Cape Town in 8 days. Enjoy safaris, cultural sites, scenic landscapes, and luxury experiences.',	'Cape Town',	'Cape Town',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-23 13:38:48'),
(5,	3,	'Embark on an 8-day adventure through Kigali, Akagera National Park, Volcanoes National Park, and Lake Kivu. Experience Rwandaâ€™s wildlife, culture, and natural beauty in style.',	'Kigali',	'Kigali',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-23 13:52:45'),
(6,	5,	'Explore Rwanda in 6 days: Kigaliâ€™s highlights, cultural experiences in Musanze, Twin Lakes, Akagera safari, and serene Lake Muhazi, ending with a city tour and departure.',	'Kigali',	'Kigali',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-24 13:33:32'),
(7,	6,	'Experience Rwanda in 5 days: Kigali city tour, Huyeâ€™s cultural heritage, canopy walk in Nyungwe, tea plantations and Kamiranzovu Waterfalls in Gisakura, concluding with shopping and departure in Kigali.',	'Kigali',	'Kigali',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-24 13:55:13'),
(8,	7,	'Explore Kigaliâ€™s vibrant culture, trek with gorillas in Volcanoes National Park, and relax by the serene shores of Lake Kivu, culminating with a final city tour and departure.',	'Kigali',	'Kigali',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-24 14:14:05'),
(9,	8,	'Begin in Cape Town, exploring Table Mountain and the Cape Peninsula. Fly to Durban for cultural charm, hike the Drakensberg Mountains, then enjoy thrilling safaris in Pilanesberg National Park before departing Johannesburg.',	'Cape Town',	'Johannesburg',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-24 15:46:10'),
(10,	9,	'Begin in Johannesburg with historical insights, followed by thrilling safaris in Kruger. Explore the Garden Route, indulge in Cape Winelands wine tasting, and complete your adventure in vibrant Cape Town.',	'Johannesburg',	'Cape Town',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-24 17:52:57'),
(11,	10,	'Begin in Johannesburg with a city tour, safari in Pilanesberg National Park, explore Sun City, visit the Cradle of Humankind, and end with Pretoria highlights.',	'Johannesburg',	'Durban',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-24 23:14:06'),
(12,	11,	'In 4 days, explore Cape Townâ€™s iconic sights, including Table Mountain and Bo-Kaap, tour the Cape Peninsula, enjoy wine tasting in Stellenbosch, and visit the historic Robben Island.',	'Cape Town',	'Western Cape town',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-24 23:33:33'),
(13,	12,	'Explore Johannesburgâ€™s history, enjoy a safari in Pilanesberg, relax at Sun City, and visit Pretoriaâ€™s landmarks, experiencing South Africaâ€™s rich culture, wildlife, and stunning scenery.',	'Johannesburg',	'Pretoria',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-24 23:48:39'),
(14,	13,	'This package is designed to provide a well-rounded experience in Livingstone, combining adventure, wildlife, culture, and relaxation. All activities are customizable, ensuring an unforgettable trip tailored to your preferences',	'RUSAKA',	'Rusaka',	'Morning',	'',	'no',	'yes',	'yes',	'yes',	'no',	'yes',	'',	'2024-12-25 03:02:34'),
(15,	15,	'Explore Kenya in 10 days, starting with Nairobiâ€™s cultural sites, then the majestic Masai Mara for safaris, Mount Kenyaâ€™s beauty, serene Rift Valley lakes, and vibrant local communities.',	'Nairobi',	'Nairobi',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-25 11:58:47'),
(16,	16,	'Experience Kenya in 8 days: Nairobi\'s cultural gems, Masai Mara safaris, Lake Naivasha\'s tranquility, Amboseli\'s iconic Kilimanjaro views, and vibrant local experiences. A journey blending wildlife and adventure.',	'Nairobi',	'Nairobi',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-25 12:52:21'),
(17,	17,	'Experience Kenyaâ€™s highlights in 6 days: Nairobiâ€™s attractions, Samburuâ€™s unique wildlife, Lake Nakuruâ€™s flamingos, and Mount Kenyaâ€™s majestic landscapes. A perfect blend of culture, nature, and adventure awaits.',	'Nairobi',	'Nairobi',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-25 13:12:36'),
(18,	19,	'Explore Nairobiâ€™s highlights, embark on thrilling safaris in Maasai Mara and Amboseli, and relax at Lake Naivasha. A perfect mix of adventure, culture, and relaxation.',	'Nairobi',	'Loitoktok ',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-25 18:25:41'),
(19,	20,	'Discover Kenyaâ€™s charm with safaris in Maasai Mara, a tranquil visit to Lake Naivasha, and Nairobiâ€™s cultural landmarks. A perfect short adventure for wildlife and culture lovers.',	'Nairobi',	'Nairobi',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-25 18:41:45'),
(20,	14,	'Explore Zambia in 10 days: Lusaka city tour, South Luangwa safaris, and Victoria Falls adventures. An exciting blend of wildlife, culture, and natural wonders.',	'Lusaka',	'Livingstone',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-25 18:58:07'),
(21,	21,	'Discover Zambia in 12 days: vibrant Lusaka, thrilling safaris in South Luangwa, serene Lower Zambezi, and the majestic Victoria Falls. A perfect mix of adventure and culture',	'Lusaka',	'Livingstone',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-25 23:41:37'),
(22,	22,	'Explore Zambia in 8 days: vibrant Lusaka, wildlife in Kafue, serene Lake Kariba, the iconic Victoria Falls, and cultural highlights in Mukuni Village. Adventure and relaxation await.',	'Lusaka',	'Livingstone',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 00:26:46'),
(23,	23,	'A 6-day adventure exploring Zambiaâ€™s vibrant Lusaka, Kafueâ€™s wildlife, the iconic Victoria Falls, thrilling Zambezi River activities, and cultural gems in Mukuni Village.',	'Lusaka',	'Livingstone',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 00:48:34'),
(24,	24,	'A 5-day tour showcasing Victoria Falls, a Chobe safari, Livingstoneâ€™s culture, and wildlife adventures in Mosi-oa-Tunya National Park.',	'Livingstone',	'Livingstone',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 01:46:07'),
(25,	25,	'A 4-day getaway featuring Victoria Falls, wildlife safaris in Mosi-oa-Tunya National Park, and cultural experiences in Livingstone.',	'Livingstone',	'Livingstone',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 13:52:32'),
(26,	26,	'A 12-day adventure through Tanzania, featuring wildlife safaris in iconic national parks, cultural experiences, and relaxing days on Zanzibarâ€™s pristine beaches.',	'Arusha',	'Zanzibar',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 14:17:45'),
(27,	27,	'A 10-day journey through Tanzania, combining thrilling safaris in Tarangire, Serengeti, and Ngorongoro with the cultural and coastal charm of Zanzibar.',	'Day 1: Arrival in Arusha',	'Arusha',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 15:27:15'),
(28,	28,	'An 8-day adventure visiting Saadani, Bagamoyo, Mikumi, Udzungwa Mountains, and Mafia Island. Explore wildlife, history, and coastal beauty for a truly unforgettable Tanzanian experience.',	'Dar es Salaam',	'Mafia Island',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 15:56:37'),
(29,	29,	'A 6-day journey covering Dodoma, Ruaha National Park, Iringa, Lake Tanganyika, Usambara Mountains, and Bagamoyo. Experience wildlife, history, and local culture in one incredible trip.',	'Dodoma',	'Bagamoyo',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 17:59:26'),
(30,	30,	'A 5-day journey showcasing Arusha, Tarangire National Park, Lake Manyara, and Zanzibar. Experience Tanzaniaâ€™s wildlife, culture, and coastal beauty in one compact yet enriching adventure.',	'Arusha',	'Zanzibar',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 20:02:36'),
(31,	31,	'A 7-day adventure through Dar es Salaam, Mikumi, Udzungwa, Selous, and Zanzibar. Experience thrilling safaris, cultural heritage, and idyllic island life.',	'Dar es Salaam',	'Zanzibar',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-26 20:47:49'),
(32,	32,	'Discover Ugandaâ€™s wonders in 12 days: Entebbe, Jinja, Sipi Falls, Murchison Falls, Kibale Forest, and Queen Elizabeth National Park. Wildlife, culture, and natural beauty await.',	'Entebbe',	'Entebbe',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 10:09:00'),
(33,	33,	'In 10 days, explore Ugandaâ€™s wonders: Entebbe, Lake Mburo, Bwindi, Lake Bunyonyi, Mgahinga, Fort Portal, Semuliki, and Kampala. Experience wildlife, culture, and breathtaking landscapes in this enriching adventure.',	'Entebbe',	'Kampala',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 10:37:36'),
(34,	34,	'Over 9 days, explore Ugandaâ€™s wonders, from Jinjaâ€™s Nile source to Kidepoâ€™s remote wilderness, Sipi Falls, and Murchison Falls. Experience unforgettable wildlife, adventure, and cultural richness.',	'Entebbe',	'Entebbe',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 11:12:39'),
(35,	35,	'Explore Ugandaâ€™s hidden gems over 8 days, including Jinjaâ€™s Nile source, Murchison Falls, and Sipi Falls. Experience thrilling safaris, serene landscapes, and vibrant culture.\r\n\r\n',	'Entebbe',	'Kampala',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 11:38:20'),
(36,	36,	'Experience the best of Uganda in 6 days, from chimpanzee tracking in Kibale Forest to wildlife safaris at Queen Elizabeth and Lake Mburo, alongside cultural highlights in Kampala and Mpigi.\r\n\r\n',	'Entebbe',	'Entebbe',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 12:04:39'),
(37,	37,	'Discover Ugandaâ€™s wonders in 4 days: birdwatching at Mabamba, rhino tracking at Ziwa, wildlife safaris at Murchison Falls, and cultural tours in Kampala.\r\n\r\n',	'Entebbe',	'Kampala',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 12:23:29'),
(38,	38,	'Explore Namibiaâ€™s highlights in 12 days, featuring thrilling safaris, towering dunes, eerie coastlines, and cultural gems. Perfect for adventure seekers and nature lovers seeking unforgettable experiences.\r\n\r\n',	'Windhoek',	'Windhoek',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 16:36:35'),
(39,	39,	'A 10-day Namibian adventure featuring safaris, coastal charm, and desert magic. Highlights include Etosha National Park, the Skeleton Coast, and Sossusvleiâ€™s towering red dunes.',	'Windhoek',	'Windhoek',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 18:08:12'),
(40,	40,	'An 8-day Namibian adventure highlighting cultural experiences, ancient rock art, and diverse ecosystems. Discover the Waterberg Plateau, Twyfelfontein, Kaokoland, and the wildlife-rich Caprivi Strip.\r\n\r\n',	'Windhoek',	'Windhoek',	'Morning',	'',	'No',	'No',	'Yes',	'Yes',	'No',	'Yes',	'',	'2024-12-27 20:25:12');

DROP TABLE IF EXISTS `package_type`;
CREATE TABLE `package_type` (
  `package_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_type_name` varchar(300) NOT NULL,
  PRIMARY KEY (`package_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `package_type` (`package_type_id`, `package_type_name`) VALUES
(1,	'Vip Package'),
(2,	'Regular Package'),
(3,	'Best Package'),
(4,	'High Price Package'),
(5,	'Low price package');

DROP TABLE IF EXISTS `SubAttractions`;
CREATE TABLE `SubAttractions` (
  `SubID` int(11) NOT NULL AUTO_INCREMENT,
  `AttractionID` int(11) NOT NULL,
  `SubTitle` varchar(255) NOT NULL,
  `SubDescriptions` text NOT NULL,
  `SubImage` varchar(255) NOT NULL,
  `SubStatus` tinyint(1) NOT NULL DEFAULT 1,
  `SubTimeCreated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`SubID`),
  KEY `AttractionID` (`AttractionID`),
  CONSTRAINT `SubAttractions_ibfk_1` FOREIGN KEY (`AttractionID`) REFERENCES `Attractions` (`AttractionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `SubAttractions` (`SubID`, `AttractionID`, `SubTitle`, `SubDescriptions`, `SubImage`, `SubStatus`, `SubTimeCreated`) VALUES
(1,	2,	'Bisoke Crator Lake',	'kjlkvdsklj vsdlnk kl sdln vsdl kjlkvdsklj vsdlnk kl sdln vsdl kjlkvdsklj vsdlnk kl sdln vsdl ',	'images/subattractions/bisoke.jpg',	1,	'2024-12-30 11:51:09'),
(4,	2,	'CXV',	'DSV SDF SDF',	'images/subattractions/1735556403_67727d334e3a7.jpg',	1,	'2024-12-30 13:00:03');

DROP TABLE IF EXISTS `tour`;
CREATE TABLE `tour` (
  `tour_id` int(10) NOT NULL AUTO_INCREMENT,
  `tour_name` varchar(50) NOT NULL,
  `locations` varchar(255) DEFAULT NULL,
  `no_of_passengers` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `tour_status` varchar(50) DEFAULT NULL,
  `tourist_id` int(10) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `published_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(100) NOT NULL,
  `displayImage` varchar(255) NOT NULL,
  PRIMARY KEY (`tour_id`),
  KEY `email` (`email`),
  CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tourist` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tourist`;
CREATE TABLE `tourist` (
  `tourist_id` int(10) NOT NULL,
  `tourist_name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profile_pic` blob DEFAULT NULL,
  `tourist_gender` varchar(10) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tourist_destination`;
CREATE TABLE `tourist_destination` (
  `destination_id` int(10) NOT NULL,
  `tour_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`email`,`destination_id`) USING BTREE,
  KEY `tourist_destination_ibfk_2` (`destination_id`),
  CONSTRAINT `tourist_destination_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`destination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tours_company`;
CREATE TABLE `tours_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `tour_type` varchar(255) NOT NULL,
  `language_by_tour_guide` varchar(255) NOT NULL,
  `licence_number` varchar(255) DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `company_certificate` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 0,
  `password` varchar(200) NOT NULL DEFAULT '123',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `transaction_id` varchar(10) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `payment_to` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `tour_id` int(10) DEFAULT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `reciever_type` varchar(100) NOT NULL,
  `completed` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `transport_companies`;
CREATE TABLE `transport_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `company_address` text NOT NULL,
  `fleet_size` varchar(110) NOT NULL,
  `type_of_vehicles` text NOT NULL,
  `licence_number` varchar(255) NOT NULL,
  `company_certificate` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 0,
  `password` varchar(200) NOT NULL DEFAULT '123',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transport_companies` (`id`, `company_name`, `owner_name`, `contact_email`, `phone_number`, `company_address`, `fleet_size`, `type_of_vehicles`, `licence_number`, `company_certificate`, `company_logo`, `created_at`, `active`, `password`) VALUES
(1,	'Rwanda Luxury Car',	'TUMUKUNDE IHOGOZA Patience Elina',	'tumukundepatience5@gmail.com',	'+250 783 993 456',	'kimironko',	'6',	'Luxury Cars',	'1233',	'1734965917_visa in Rwanda.pdf',	'1734965917_images.jpeg',	'2024-12-23 14:58:37',	0,	'123');

DROP TABLE IF EXISTS `travel_type`;
CREATE TABLE `travel_type` (
  `travel_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_type_name` varchar(300) NOT NULL,
  PRIMARY KEY (`travel_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `travel_type` (`travel_type_id`, `travel_type_name`) VALUES
(1,	'Adventure Tours '),
(2,	'City Tours '),
(3,	'Couple Tours '),
(4,	'Group Tours '),
(5,	'Weekend Break '),
(6,	'Business Tours ');

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle` (
  `vehi_id` varchar(10) DEFAULT NULL,
  `vehi_registration_number` varchar(20) NOT NULL,
  `ac/nonac` tinyint(1) DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `vehical_mark` varchar(255) NOT NULL,
  `vehical_model` varchar(255) NOT NULL,
  PRIMARY KEY (`vehi_registration_number`),
  UNIQUE KEY `vehi_id` (`vehi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `vehicle` (`vehi_id`, `vehi_registration_number`, `ac/nonac`, `no_of_seats`, `vehicle_type`, `driver_id`, `vehical_mark`, `vehical_model`) VALUES
(NULL,	'HS-0441',	NULL,	NULL,	'',	'drivertest',	'nissan',	'fb15');

DROP TABLE IF EXISTS `WelcomeImages`;
CREATE TABLE `WelcomeImages` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for the image',
  `ImagePath` varchar(255) NOT NULL COMMENT 'Path or URL of the image',
  `ImageStatus` tinyint(1) NOT NULL COMMENT 'Status of the image (0=inactive, 1=active)',
  `ImageTime` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Time the image was uploaded',
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `WelcomeImages` (`ImageID`, `ImagePath`, `ImageStatus`, `ImageTime`) VALUES
(2,	'images/welcome/1735499571_67719f33ba5dd.png',	1,	'2024-12-29 19:12:51'),
(3,	'images/welcome/1735499595_67719f4b4a820.png',	1,	'2024-12-29 19:13:15'),
(4,	'images/welcome/1735499607_67719f57f394a.jpeg',	1,	'2024-12-29 19:13:27'),
(5,	'images/welcome/1735499625_67719f69301b7.webp',	1,	'2024-12-29 19:13:45'),
(6,	'images/welcome/1735499631_67719f6f69bb8.jpeg',	1,	'2024-12-29 19:13:51');

DROP TABLE IF EXISTS `welcome_content`;
CREATE TABLE `welcome_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `welcome_message` text NOT NULL,
  `welcome_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `welcome_content` (`id`, `welcome_message`, `welcome_image`, `created_at`) VALUES
(1,	'At First Class Tours, we transform dreams into unforgettable journeys. As a premier leader in the tourism industry, we specialize in delivering extraordinary experiences that connect you with the heart of Africa\'s beauty, culture, and wildlife.\r\n\r\nWhether you\'re seeking the thrill of Rwandaâ€™s majestic landscapes, the serenity of luxury retreats, or the richness of authentic cultural encounters, we are here to guide you every step of the way. Our dedicated team ensures that every journey is meticulously crafted, reflecting our commitment to excellence, sustainability, and personalized service.\r\n\r\nStep into a world where adventure meets luxury, and every moment is designed to leave an everlasting impression. Explore with us, experience with us, and let First Class Tours be your gateway to the wonders of Africa and beyond.\r\n\r\nWelcome to the journey of a lifetime',	'../uploads/welcome_message/1710703842119.jpg',	'2024-12-24 02:54:09');

-- 2024-12-30 12:22:59
