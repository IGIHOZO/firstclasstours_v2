-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2024 at 05:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_company`
--

CREATE TABLE `about_company` (
  `about_id` int(11) NOT NULL,
  `about_us` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
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
  `company_moto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_company`
--

INSERT INTO `about_company` (`about_id`, `about_us`, `background`, `mission`, `vision`, `contact_location`, `contact_phone`, `contact_email`, `working_time`, `terms_of_services`, `privacy_policy`, `visa_and_passport`, `safety`, `x_link`, `youtube_link`, `facebook_link`, `linkedin_link`, `instagram_link`, `become_rwanda_citizen`, `become_rwanda_resident`, `visa_in_rwanda`, `website_logo`, `company_name`, `company_moto`) VALUES
(1, 'The World Star Tour & Travel (WSTT) is more than just a travel company; we\'re your gateway to unforgettable experiences in Africa, with a deep passion for showcasing the wonders of Rwanda. We are a team of passionate travel enthusiasts and Rwanda experts, dedicated to curating adventures that ignite a connection between you, the breathtaking landscapes, and the vibrant cultures of the region.\r\n\r\nHere\'s what sets us apart:\r\n\r\n1. Unforgettable Experiences: We go beyond the typical tourist itinerary, crafting personalized adventures tailored to your interests and dreams. We believe travel should be transformative, fostering personal growth and a deeper understanding of the world.\r\n2. Local Expertise: Our team boasts extensive knowledge of Africa, particularly Rwanda. We have strong relationships with local communities, ensuring your trip is authentic and supports the people and places you visit.\r\n3. Responsible Tourism: We are committed to sustainable practices that minimize our environmental impact and empower local communities. We work with responsible lodges and guides, ensuring a positive impact for all.\r\n4. Unwavering Passion: Our team is driven by a genuine love for Africa and a desire to share its magic with others. This passion fuels our dedication to creating exceptional travel experiences for every guest.\r\n\r\nChoosing WSTT means:\r\n\r\n1. Expert Guidance: Our travel specialists will work closely with you to understand your aspirations and craft an itinerary that exceeds your expectations.\r\n2. Authentic Experiences: We\'ll connect you with local communities, allowing you to experience the true essence of African culture.\r\n3. Sustainable Travel: We prioritize responsible practices, ensuring your trip benefits both you and the region\'s environment and communities.\r\n4. Unforgettable Memories: We\'ll create a personalized adventure that leaves you with cherished memories that will last a lifetime. \r\n\r\nJoin us on your African adventure and discover the magic of this extraordinary region with The World Star Tour & Travel (WSTT)!', 'The World Star Tour & Travel (WSTT) wasn\'t born from a business plan, but from a spark of wonder ignited in the heart of Africa. Our founders, a group of travel enthusiasts captivated by the region\'s beauty and rich tapestry of cultures, dreamt of sharing this magic with the world. We believe travel is more than just ticking destinations off a list; it\'s about forging connections â€“ with breathtaking landscapes, vibrant cultures, and the welcoming communities that call East Africa home.\r\n\r\nThis passion for exploration and cultural immersion fueled the creation of World Star Tours. We started by focusing on Rwanda, a country that continues to hold a special place in our hearts. Rwanda\'s breathtaking scenery, from the majestic Virunga volcanoes to the shimmering waters of Lake Kivu, captivated us. But it was the resilience and warmth of the Rwandan people that truly inspired us. We witnessed a nation rebuilding itself, its spirit unwavering, and its culture pulsating with life. We knew we wanted to be a part of showcasing this remarkable country to the world.\r\n\r\nThe World Star Tour & Travel (WSTT) plans to soon expand to encompass the entirety of Africa. From the savannah plains of Kenya to the mountain gorillas of Uganda, we plan to explore every corner of this remarkable region. But our core values remain the same â€“ a dedication to crafting unforgettable experiences, fostering responsible tourism practices, and building strong relationships with local communities. We believe that travel, when done thoughtfully, can be a powerful force for good, fostering understanding and creating a positive impact on both travelers and the destinations they visit.\r\n\r\nToday, WSTT stands as a testament to the transformative power of travel. We\'re a team of passionate individuals driven by a desire to share our love for Africa with you. Join us on a journey of discovery, where you\'ll not only experience the wonders of the region but also forge connections that will stay with you long after your trip concludes.', 'The World Star Tour & Travel (WSTT) is dedicated to crafting unforgettable adventures in Rwanda and beyond that leave a lasting impression. We believe travel should be more than just sightseeing. Our curated experiences foster meaningful connections with the breathtaking natural beauty of Africa, its vibrant culture, and the welcoming local communities.\r\n\r\nThis philosophy extends beyond simply showing you around. We empower our guests to explore the beauty of Africa, respecting the environment and traditions. By embracing local customs and interacting with communities, you\'ll gain a deeper understanding of Rwanda and create cherished memories that will stay with you long after your trip concludes.', 'The vision of The World Star Tour & Travel (WSTT) is to be the catalyst for transformative travel experiences across East Africa and beyond, igniting a deeper connection between travelers, diverse cultures, and breathtaking landscapes.', 'Kigali Rwanda', '+250 788 913 722', ' info@firstclasstours.rw', 'From 9:00 am to 5:00 pm', 'Last updated: April 17, 2024\r\n\r\nWelcome to The World Star Tour & Travel (WSTT)!\r\n\r\nThese Terms and Conditions (\"Terms\") govern your use of our website (https://worldstarstours.com) and the booking of our travel arrangements across various African countries. By using our website or booking a trip with us, you agree to be bound by these Terms.\r\n\r\nEligibility:\r\n\r\nAge Requirement:\r\nYou must be 18 years of age or older to book a trip with World Stars Tours and Travels (WSTT). Minors may only participate in a trip if accompanied by a legal guardian who is at least 18 years old and takes full responsibility for the minor throughout the trip.\r\n\r\nBooking and Payment:\r\nDeposit and Confirmation: A booking is only confirmed upon receipt of a minimum 50% deposit of the total trip cost. This deposit is non-refundable and non-transferable. We accept secure online payments through Stripe and PayPal for your convenience.\r\n\r\nIncluded Services: WSTT covers the following services for your booked package:\r\n- Roundtrip airfare from your designated origin city (as specified in the package details) to the African destination.\r\n- All in-country transportation, including airport transfers, ground transportation between destinations, and any internal flights included in the itinerary.\r\n- Services of a professional and experienced tour guide throughout the trip.\r\n- Accommodation in comfortable and well-located Luxury Homes and or Hotels (as specified in the package details) throughout the duration of the tour.\r\n\r\nTravel Insurance:\r\nPackage Coverage: Some tour packages include comprehensive travel insurance that covers trip cancellation, medical emergencies, baggage loss, and other unforeseen circumstances. Please refer to the specific package details for confirmation of insurance coverage.\r\n\r\nMandatory Coverage: If your chosen package does not include travel insurance and you do not have your own life insurance that covers travel-related incidents, you will not be able to travel with WSTT. This is to ensure your safety and financial protection in case of emergencies. We can recommend reputable travel insurance providers if needed.\r\n\r\nVisa Processing:\r\nWe can assist you with obtaining a visa for your chosen African destination. Our visa processing services include:\r\n- Guidance on required documentation based on your nationality and the destination country.\r\n- Assistance with completing visa application forms.\r\n- Liaison with the relevant embassy or consulate on your behalf (may involve additional fees).\r\n\r\nYou are responsible for providing all necessary documentation for your visa application, including your passport, any required photographs, and proof of sufficient funds. If you already have a valid visa for the destination country, you are not obligated to use our processing services.\r\n\r\nBooking Deadlines:\r\nEarly Booking Recommended: To ensure proper logistical arrangements, including securing flights and accommodations, we highly recommend booking your trip at least 30 days prior to your desired travel date.\r\n\r\nFinal Payment Due:\r\nFull payment for your trip, including the remaining balance after the initial deposit, is due 15 days before your scheduled departure date.\r\n\r\nCancellation Policy:\r\nWe understand that unexpected circumstances may arise, and you may need to cancel your trip.  However, cancellation fees apply depending on the situation:\r\n\r\nTraveler Cancellation:\r\nYou have the right to cancel your trip, but the following fees will apply:\r\n- Cancellations made more than 7 working days before departure: 50% of the total trip cost is non-refundable. This covers administrative costs and confirmed arrangements already made on your behalf.\r\n- Cancellations made within 7 working days of departure: No refund will be issued, as full payment would have already been due and all trip arrangements would be finalized.\r\n\r\nWSTT Cancellation (Force Majeure): In case of unforeseen circumstances beyond our control, such as natural disasters, political unrest, or airline disruptions (considered Force Majeure events), we may be required to cancel a tour. In such cases, we will do our best to re-schedule your trip or offer alternative options. However, the following will apply:\r\n- Cancellations made 3-6 days before departure due to Force Majeure: We will retain 75% of the total trip cost to cover non-recoverable expenses incurred. We will work with you to find alternative travel arrangements or issue a partial refund for the remaining balance.\r\n- Cancellations made less than 3 days before departure due to Force Majeure: No refund will be issued, as full payment would have already been due and significant trip arrangements would be finalized. We will mutually explore any other alternative if any before confirming the cancellation.\r\n\r\nModification: WSTT reserves the right to modify these terms and conditions at any time without prior notice. It is your responsibility to review them periodically for any changes.\r\n\r\nContact Information: For any queries or concerns regarding these terms and conditions, please contact us at info@worldstarstours.com.', 'The World Star Tour & Travel (WSTT) Privacy Policy\r\nLast updated: April 17, 2024\r\n\r\nWSTT (\"we,\" \"us,\" or \"our\") is committed to protecting the privacy of our website visitors and tour participants (\"you\" or \"your\"). This Privacy Policy explains how we collect, use, and disclose your personal information when you use our website (https://worldstarstours.com) or book a trip with us.\r\n\r\nInformation We Collect:\r\n\r\nWe collect the following types of information when you interact with us:\r\n1. Contact Information: We collect your name, email address, phone number, and mailing address when you:\r\n    - Book a trip with us.\r\n    - Create an account on our website (if applicable).\r\n    - Sign up for our email newsletter.\r\n    - Contact us with a question or inquiry.\r\n\r\n2. Travel Information: To ensure a smooth travel experience, we may collect the following information when you book a trip:\r\n    - Passport details (if using our visa processing service). This information is only collected with your explicit consent and is used solely for the purpose of assisting with your visa application.\r\n    - Dietary restrictions to ensure all meals meet your dietary needs.\r\n    - Emergency contact information in case of unforeseen circumstances.\r\n\r\n3. Booking Information: To process your booking and deliver travel services, we collect details related to your chosen package, including: Itinerary details (destinations, activities, accommodation).\r\n\r\n4. Payment information (collected securely through a reputable third-party payment processor. We do not store your full credit card details).\r\n\r\n5. Usage Information: We may collect information about your activity on our website to improve your experience, such as: Pages you visit and links you click. This information is collected anonymously through cookies and similar technologies. You can manage your cookie preferences through your web browser settings.\r\n\r\nHow We Use Your Information:\r\n\r\nWe use your information for the following legitimate purposes:\r\n- To Process Bookings and Deliver Travel Services: Your information is essential to confirm your booking, communicate trip details, manage logistics (flights, accommodation), and ensure a seamless travel experience.\r\n- To Communicate with You: We use your contact information to send confirmation emails, itinerary updates, important travel advisories, and respond to your inquiries.\r\n - To Personalize Your Experience: By understanding your browsing activity and travel preferences (if provided), we can recommend tours that may interest you and personalize your experience on our website.\r\n- To Improve Our Website and Services: We analyze usage information to understand how visitors interact with our website and identify areas for improvement. This helps us provide a more user-friendly and informative experience.\r\n\r\nHow we share your information:\r\nWe share your information only with trusted third parties who are essential to deliver your travel experience and operate our business. These include:\r\n- Travel Service Providers: Airlines, hotels, tour guides, and other companies that provide services included in your booked travel package. We only share the information necessary for them to fulfill their specific role in your trip.\r\n- Visa Processing Services (if applicable): Embassies or consulates require specific information to process your visa application. We share only the necessary details to facilitate this process and obtain your visa.\r\n- Payment Processors: To securely process your booking payment, we utilize a reputable third-party payment processor. They adhere to strict security standards to safeguard your financial information.\r\n- Law Enforcement or Regulatory Authorities: We may disclose your information if required by law, to protect our rights, or to prevent illegal activity.\r\n\r\nYour Choices:\r\nWe respect your right to control your information. Here\'s how you can manage your privacy settings:\r\n- Account Information: If you create an account on our website, you can access and update your contact information and travel preferences in your account settings.\r\n- Email Marketing: You can unsubscribe from our marketing emails at any time by clicking the \"unsubscribe\" link at the bottom of any email.\r\n- Cookies: You can manage your cookie preferences through your web browser settings. Disabling cookies may limit certain functionalities on our website.\r\n\r\nData Security:\r\nWe take all reasonable security measures to protect your information from unauthorized access, disclosure, alteration, or destruction. This includes secure data storage practices, encryption of sensitive information, and regular security audits. However, no internet transmission is completely secure. \r\n\r\nChildren\'s Privacy:\r\nOur website and services are not directed towards children under 18. We do not knowingly collect personal information from minors\r\n\r\nRetention Period:\r\nWe will retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law.\r\n\r\nChanges to this Privacy Policy:\r\nWe may update this Privacy Policy from time to time to reflect changes in our practices or comply with legal requirements. We will notify you of any changes by posting the new Privacy Policy on our website.  Your continued use of our website or services following the posting of the revised Privacy Policy constitutes your acceptance of the changes.\r\n\r\nContact Us:\r\nIf you have any questions or concerns about our privacy practices, please contact us at info@worldstartours.com. We are committed to transparency and will address your inquiries promptly.\r\n\r\nWe appreciate your trust in World Star Tours. We are committed to protecting your privacy and providing a secure and enjoyable travel experience.', 'Visiting our exciting destinations often require advanced preparation to obtain valid passports and visas. We provide information for your convenience, but ultimately it is your responsibility to ensure that you have everything required for travel. To visit this particular country \"RWANDA\", no visa needed for US citizens, you only need a US Passport.\r\nPlan ahead:\r\nStart the process early if you need to apply for or renew your passport since processing times may be long. Application and renewal information is available on the US Department of Stateâ€™s website.\r\nCheck your passport expiration date:\r\nMost countries require that your passport is valid for at least six months beyond the completion of your travel.\r\nCheck your passport for empty pages:\r\nMost countries require several blank pages in your passport for entry visas. Make sure you have enough blank pages to accommodate visas for all of the countries in your itinerary.\r\n', 'Learn about what you need to do to stay healthy by reading location-specific advice and visiting your doctor for any needed vaccinations. \r\nDo your research:\r\nThe Centers for Disease Control and Prevention (CDC) Travelersâ€™ Health website has a wealth of information related to disease risks, including location-specific advice, vaccination guidelines, and a disease directory. More general travel health information is available at the MedlinePlus Travelerâ€™s Health website, a service of the US National Library of Medicine and National Institutes of Health. \r\nTalk to your doctor:\r\nWe encourage you to have routine vaccinations up to date before any travel, and to speak with your medical provider about any additional location-specific precautions, such as additional vaccinations and malaria protection, to take for your itinerary. Please plan ahead, as some vaccinations require boosters at specific intervals to be effective.\r\nCarrying medications:\r\nIf you take prescription or over-the-counter medications, bring enough for your trip; it may be impossible to refill them while you are traveling. Keep all medications in their original labeled containers and wait until you arrive at your destination to put them in your daily medication dispenser. Keep all necessary medications in your carry-on luggage. You may want to bring a note from your physician explaining your required medications, especially if you use syringes or other unusual supplies. Some over-the-counter medications in the United States are listed as controlled substances in other countries, and possession of these medications may carry heavy penalties. Please refer to the US Department of Stateâ€™s website for travelers and look up any known restrictions prior to packing your medications. \r\nMotion sickness:\r\nDonâ€™t let the fear of motion sickness deter you from ship-based trips! Some of the most breathtaking sights and regions of the world are only accessible by ship. You can find natural and medical solutions to seasickness; refer to our guide to managing seasickness.\r\nAltitude sickness:\r\nA few of our trips visit high elevations, where the low oxygen levels can cause altitude sickness for some travelers. The CDC provides information on altitude sickness. The symptoms of altitude sickness are similar to those of a hangover: tiredness, headache, and vomiting. You can usually control it symptomatically â€“ for example with rest, water, and aspirin. Very rarely, people experience severe altitude sickness, which may be deadly if not immediately treated. If you find yourself experiencing any symptoms at altitude, please let your trip leader know so they can take appropriate measures.\r\nIf you have pre-existing medical conditions, especially heart or lung disease, are pregnant, are diabetic, or are thinking of a travel itinerary that involves more than a 9,000ft increase in altitude on any given day, please talk to your doctor about your itinerary.\r\n', '', '', 'ghfhf', '', '', '', '', '', 'logowhite.png', 'First Class Tours', 'Explore Rwanda\'s beauty with our premier tour packages');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `name`, `password`) VALUES
('admin@firstclasstours.rw', 'Akingeney Alphonse', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `enq_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_num` char(10) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp(),
  `reply` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`enq_id`, `name`, `email`, `mobile_num`, `subject`, `description`, `posting_date`, `reply`) VALUES
(11, 'jhbjk', NULL, NULL, NULL, NULL, '2023-11-21 13:37:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `active`) VALUES
(1, 'Algeria', 0),
(2, 'Angola', 0),
(3, 'Benin', 0),
(4, 'Botswana', 0),
(5, 'Burkina Faso', 0),
(6, 'Burundi', 0),
(7, 'Cabo Verde', 0),
(8, 'Cameroon', 0),
(9, 'Central African Republic', 0),
(10, 'Chad', 0),
(11, 'Comoros', 0),
(12, 'Democratic Republic of the Congo', 0),
(13, 'Djibouti', 0),
(14, 'Egypt', 0),
(15, 'Equatorial Guinea', 0),
(16, 'Eritrea', 0),
(17, 'Eswatini', 0),
(18, 'Ethiopia', 0),
(19, 'Gabon', 0),
(20, 'Gambia', 0),
(21, 'Ghana', 0),
(22, 'Guinea', 0),
(23, 'Guinea-Bissau', 0),
(24, 'Ivory Coast', 0),
(25, 'Kenya', 0),
(26, 'Lesotho', 0),
(27, 'Liberia', 0),
(28, 'Libya', 0),
(29, 'Madagascar', 0),
(30, 'Malawi', 0),
(31, 'Mali', 0),
(32, 'Mauritania', 0),
(33, 'Mauritius', 0),
(34, 'Morocco', 0),
(35, 'Mozambique', 0),
(36, 'Namibia', 0),
(37, 'Niger', 0),
(38, 'Nigeria', 0),
(39, 'Rwanda', 1),
(40, 'Sao Tome and Principe', 0),
(41, 'Senegal', 0),
(42, 'Seychelles', 0),
(43, 'Sierra Leone', 0),
(44, 'Somalia', 0),
(45, 'South Africa', 0),
(46, 'South Sudan', 0),
(47, 'Sudan', 0),
(48, 'Tanzania', 0),
(49, 'Togo', 0),
(50, 'Tunisia', 0),
(51, 'Uganda', 0),
(52, 'Zambia', 0),
(53, 'Zimbabwe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destination_id` int(10) NOT NULL,
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
  `country_info` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destination_id`, `name`, `category`, `description`, `image`, `city`, `description_full`, `creationdate`, `updationdate`, `visa_required`, `languages_spoken`, `currency_used`, `support_phone`, `support_email`, `country_area`, `visa_requirements_document`, `country_info`) VALUES
(3, 'Visit Rwanda', 39, 'Unleash your wanderlust: Explore Rwanda\'s breathtaking landscapes and wildlife with World Stars Tours', 'file_20240410_074336.jpg', 'All Cities', 'Embark on an unforgettable adventure with World Stars Tours (WST) captivating Visit Rwanda package. Immerse yourself in the heart of Africa, where breathtaking landscapes teeming with wildlife meet a vibrant tapestry of culture and tradition. Hike through the lush rainforests of Volcanoes National Park, coming face-to-face with the awe-inspiring mountain gorillas. Witness the incredible biodiversity of Akagera National Park, spotting everything from lions and elephants to and giraffes roaming the savanna plains.\r\n\r\nBeyond the stunning wilderness, Rwanda offers a captivating cultural experience. Delve into the rich history of the Rwandan people, visiting ancient sites, museums and Memorial sites that tell stories of resilience and hope after the 1994 Genocide against Tutsi that brought the entire country on its knees. Immerse yourself in the warmth of Rwandan hospitality, where vibrant dance performances and local cuisine create unforgettable memories. \r\n\r\nWorld Stars Tours curates an exceptional itinerary, ensuring you experience the best of Rwanda\'s natural wonders and cultural treasures. Join us on this extraordinary journey and discover why Rwanda is quickly becoming a top travel destination. \r\nWhether you\'re a nature enthusiast, a culture buff, or simply seeking an adventure that will rejuvenate your soul, World Stars Tours \"Visit Rwanda\" package promises an experience unlike any other. Let us guide you through this captivating land, where unforgettable memories are made around every corner.', '2024-04-10 07:43:36', '2024-08-31 00:53:40', 'No', 'English, French, Kinyarwanda and Kiswahili', 'Rwandan Franc (RWF), US Dollar', '+1 (214) 548-1282', 'info@worldstarstours.com', '26338', 'file_20240410_074336.pdf', 'file_20240410_074336.pdf'),
(6, 'Visit Rwanda', 39, 'Unleash your wanderlust: Explore Rwanda\'s breathtaking landscapes and wildlife with World Stars Tours', 'file_20240410_074336.jpg', 'All Cities', 'Embark on an unforgettable adventure with World Stars Tours (WST) captivating Visit Rwanda package. Immerse yourself in the heart of Africa, where breathtaking landscapes teeming with wildlife meet a vibrant tapestry of culture and tradition. Hike through the lush rainforests of Volcanoes National Park, coming face-to-face with the awe-inspiring mountain gorillas. Witness the incredible biodiversity of Akagera National Park, spotting everything from lions and elephants to and giraffes roaming the savanna plains.\r\n\r\nBeyond the stunning wilderness, Rwanda offers a captivating cultural experience. Delve into the rich history of the Rwandan people, visiting ancient sites, museums and Memorial sites that tell stories of resilience and hope after the 1994 Genocide against Tutsi that brought the entire country on its knees. Immerse yourself in the warmth of Rwandan hospitality, where vibrant dance performances and local cuisine create unforgettable memories. \r\n\r\nWorld Stars Tours curates an exceptional itinerary, ensuring you experience the best of Rwanda\'s natural wonders and cultural treasures. Join us on this extraordinary journey and discover why Rwanda is quickly becoming a top travel destination. \r\nWhether you\'re a nature enthusiast, a culture buff, or simply seeking an adventure that will rejuvenate your soul, World Stars Tours \"Visit Rwanda\" package promises an experience unlike any other. Let us guide you through this captivating land, where unforgettable memories are made around every corner.', '2024-04-10 07:43:36', '2024-08-31 00:53:40', 'No', 'English, French, Kinyarwanda and Kiswahili', 'Rwandan Franc (RWF), US Dollar', '+1 (214) 548-1282', 'info@worldstarstours.com', '26338', 'file_20240410_074336.pdf', 'file_20240410_074336.pdf'),
(7, 'Visit Rwanda', 39, 'Unleash your wanderlust: Explore Rwanda\'s breathtaking landscapes and wildlife with World Stars Tours', 'file_20240410_074336.jpg', 'All Cities', 'Embark on an unforgettable adventure with World Stars Tours (WST) captivating Visit Rwanda package. Immerse yourself in the heart of Africa, where breathtaking landscapes teeming with wildlife meet a vibrant tapestry of culture and tradition. Hike through the lush rainforests of Volcanoes National Park, coming face-to-face with the awe-inspiring mountain gorillas. Witness the incredible biodiversity of Akagera National Park, spotting everything from lions and elephants to and giraffes roaming the savanna plains.\r\n\r\nBeyond the stunning wilderness, Rwanda offers a captivating cultural experience. Delve into the rich history of the Rwandan people, visiting ancient sites, museums and Memorial sites that tell stories of resilience and hope after the 1994 Genocide against Tutsi that brought the entire country on its knees. Immerse yourself in the warmth of Rwandan hospitality, where vibrant dance performances and local cuisine create unforgettable memories. \r\n\r\nWorld Stars Tours curates an exceptional itinerary, ensuring you experience the best of Rwanda\'s natural wonders and cultural treasures. Join us on this extraordinary journey and discover why Rwanda is quickly becoming a top travel destination. \r\nWhether you\'re a nature enthusiast, a culture buff, or simply seeking an adventure that will rejuvenate your soul, World Stars Tours \"Visit Rwanda\" package promises an experience unlike any other. Let us guide you through this captivating land, where unforgettable memories are made around every corner.', '2024-04-10 07:43:36', '2024-08-31 00:53:40', 'No', 'English, French, Kinyarwanda and Kiswahili', 'Rwandan Franc (RWF), US Dollar', '+1 (214) 548-1282', 'info@worldstarstours.com', '26338', 'file_20240410_074336.pdf', 'file_20240410_074336.pdf'),
(8, 'Visit Rwanda', 39, 'Unleash your wanderlust: Explore Rwanda\'s breathtaking landscapes and wildlife with World Stars Tours', 'file_20240410_074336.jpg', 'All Cities', 'Embark on an unforgettable adventure with World Stars Tours (WST) captivating Visit Rwanda package. Immerse yourself in the heart of Africa, where breathtaking landscapes teeming with wildlife meet a vibrant tapestry of culture and tradition. Hike through the lush rainforests of Volcanoes National Park, coming face-to-face with the awe-inspiring mountain gorillas. Witness the incredible biodiversity of Akagera National Park, spotting everything from lions and elephants to and giraffes roaming the savanna plains.\r\n\r\nBeyond the stunning wilderness, Rwanda offers a captivating cultural experience. Delve into the rich history of the Rwandan people, visiting ancient sites, museums and Memorial sites that tell stories of resilience and hope after the 1994 Genocide against Tutsi that brought the entire country on its knees. Immerse yourself in the warmth of Rwandan hospitality, where vibrant dance performances and local cuisine create unforgettable memories. \r\n\r\nWorld Stars Tours curates an exceptional itinerary, ensuring you experience the best of Rwanda\'s natural wonders and cultural treasures. Join us on this extraordinary journey and discover why Rwanda is quickly becoming a top travel destination. \r\nWhether you\'re a nature enthusiast, a culture buff, or simply seeking an adventure that will rejuvenate your soul, World Stars Tours \"Visit Rwanda\" package promises an experience unlike any other. Let us guide you through this captivating land, where unforgettable memories are made around every corner.', '2024-04-10 07:43:36', '2024-08-31 00:53:40', 'No', 'English, French, Kinyarwanda and Kiswahili', 'Rwandan Franc (RWF), US Dollar', '+1 (214) 548-1282', 'info@worldstarstours.com', '26338', 'file_20240410_074336.pdf', 'file_20240410_074336.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `des_feedback`
--

CREATE TABLE `des_feedback` (
  `feedback_id` varchar(10) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `tourist_id` int(10) DEFAULT NULL,
  `destination_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

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
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `driver_feedback`
--

CREATE TABLE `driver_feedback` (
  `fb_id` varchar(10) NOT NULL,
  `fb_description` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `tourist_id` int(10) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

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
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guide_feedback`
--

CREATE TABLE `guide_feedback` (
  `fb_id` varchar(10) NOT NULL,
  `fb_description` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `tourist_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homepage_logo`
--

CREATE TABLE `homepage_logo` (
  `logo_id` int(11) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_logo`
--

INSERT INTO `homepage_logo` (`logo_id`, `logo`) VALUES
(1, 'logonew.png');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_slider`
--

CREATE TABLE `homepage_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` text NOT NULL,
  `slider_description` text NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_slider`
--

INSERT INTO `homepage_slider` (`slider_id`, `slider_title`, `slider_description`, `slider_image`) VALUES
(3, 'Adventure Awaits', 'Embark on a Wild Journey Through Africa\'s Untamed Beauty with First Class Tours. Experience Thrilling Safaris, Majestic Gorilla Encounters, and Exotic Bird Watching.', 'rwanda.jpeg'),
(8, 'Adventure Awaits', 'Embark on a Wild Journey Through Africa\'s Untamed Beauty with First Class Tours. Experience Thrilling Safaris, Majestic Gorilla Encounters, and Exotic Bird Watching.', 'kcc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_video`
--

CREATE TABLE `homepage_video` (
  `video_id` int(11) NOT NULL,
  `embended_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_video`
--

INSERT INTO `homepage_video` (`video_id`, `embended_code`) VALUES
(1, '<iframe width=\"1136\" height=\"639\" src=\"https://www.youtube.com/embed/QeA4KOMbJq4\" title=\"From east to west, experience Rwanda in just 3 minutes\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
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
  `password` varchar(200) NOT NULL DEFAULT '123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_name`, `owner_name`, `contact_email`, `phone_number`, `hotel_address`, `star_rating`, `room_types`, `checkin_policy`, `hotel_amenities`, `dining_options`, `accessibility_features`, `hotel_certificate`, `hotel_logo`, `created_at`, `active`, `password`) VALUES
(1, 'dfsfsd', 'sdfsdf', 'kcc@gmail.com', '343454353', 'gdhhsghsh', 4, 'fghfshgf', 'fgshhsf', 'sfghsfh', 'gshfghfghf', 'gfhfh', '1732526617_bluJk94P_400x400.jpg', 'hotel1.jpg', '2024-11-25 09:23:37', 1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `itinerary_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `day_time_plan` varchar(100) NOT NULL,
  `day_full_description` text NOT NULL,
  `itinerary_recorded_date` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itineraries`
--

INSERT INTO `itineraries` (`itinerary_id`, `package_id`, `title`, `day_time_plan`, `day_full_description`, `itinerary_recorded_date`) VALUES
(2, 3, 'HIKING ', 'Day 2', 'THIS IS THE FULL ITERNARIES CONTENT ', '2024-04-05 15:07:36'),
(3, 3, 'LION VISITING', 'LION DAY 2 VISITING ', 'This is the description gain for day 2\r\n', '2024-04-05 15:08:50'),
(6, 8, 'Day 1', 'Day time', 'Arrival & Kigali City Tour', '2024-04-17 00:42:24'),
(7, 8, 'Day 2', 'From 8:00 am', 'Akagera National Park Safari', '2024-04-17 00:43:30'),
(8, 8, 'Day 3', 'From 9:00 am', 'Romantic getaway of your choice', '2024-04-17 00:49:19'),
(9, 8, 'Day 4', 'From 8:00 am', 'Nyungwe National Park & Canopy Walk', '2024-04-17 00:50:09'),
(10, 8, 'Day 5', 'From 9:00 am', 'Relaxation by Lake Kivu ', '2024-04-17 00:50:41'),
(13, 8, 'Day 6', 'From 9:00 am', 'Kigali Handicraft ', '2024-04-17 00:53:22'),
(14, 8, 'Day 7', 'Day time', 'Departure', '2024-04-17 00:53:46'),
(15, 9, 'Day 1', 'Day time', 'Arrival & Kigali City Tour', '2024-04-17 01:00:59'),
(16, 9, 'Day 2', 'From 8:00 am', 'Akagera National Park Safari', '2024-04-17 01:02:01'),
(17, 9, 'Day 3', 'From 9:00 am', 'Getaway of Your Choice: Kingfisher Boat Cruise or Nyanza & Cultural Immersion', '2024-04-17 01:03:31'),
(18, 9, 'Day 4', 'From 8:00 am', 'Nyungwe National Park & Canopy Walk', '2024-04-17 01:03:53'),
(19, 9, 'Day 5', 'From 9:00 am', 'Hike the Scenic Meraneza Trails & Farewell Dinner', '2024-04-17 01:04:31'),
(20, 9, 'Day 6', 'From 10:am', 'Nyandungu Eco Park & Farewell Dinner', '2024-04-17 01:05:04'),
(21, 9, 'Day 7', 'From 9:00 am', 'Departure', '2024-04-17 01:05:27'),
(22, 10, 'Day 1', 'Day time', 'Kigali Arrival & City Buzz', '2024-04-18 08:25:41'),
(23, 10, 'Day 2', '9:00 am', 'Nyungwe National Park (chimpanzee trekking & canopy walk)', '2024-04-18 08:26:06'),
(24, 10, 'Day 3', '10:00 am', 'Nyandungu Eco Park & Farewell Dinner', '2024-04-18 08:26:28'),
(25, 10, 'Day 4', '9:00 am', 'Akagera National Park Safari', '2024-04-18 08:26:55'),
(26, 10, 'Day 5', '9:00 am', 'Nyanza Museum & Cultural Immersion', '2024-04-18 08:27:21'),
(27, 10, 'Day 6', '10:00 am', 'Hike the Scenic Meraneza Trails & Farewell Dinner', '2024-04-18 08:27:44'),
(28, 10, 'Day 7', '9:00 am', 'Departure', '2024-04-18 08:28:05'),
(29, 11, 'Day 1', 'Day time', 'Arrival in Kigali - A Warm Welcome', '2024-04-19 12:01:52'),
(30, 11, 'Day 2', '9:00 am', 'Visit Kigali Genocide Memorial or Nyamata Church and Cultural Experiences', '2024-04-19 12:02:15'),
(31, 11, 'Day 3', '9:00 am', 'Witnessing Wildlife Wonders at Akagera National Park', '2024-04-19 12:02:39'),
(32, 11, 'Day 4', '9:00 am', 'Unveiling Rwanda\'s Rich Tapestry', '2024-04-19 12:03:02'),
(33, 11, 'Day 5', '9:00 am', 'A Spiritual Sanctuary at Kibeho or Nyungwe Forest Discovery', '2024-04-19 12:04:01'),
(34, 11, 'Day 6', '10:00 am', 'Rejuvenation at Nyandungu Eco-Park & Kigali City', '2024-04-19 12:04:31'),
(35, 11, 'Day 7', 'Day time', 'Fond Farewells', '2024-04-19 12:04:51'),
(36, 5, 'Day 1', 'Day time', 'Kigali Arrival & City Exploration', '2024-04-19 12:32:14'),
(38, 5, 'Day 2', '9:00 am', 'Unveiling Wildlife Wonders at Akagera National Park', '2024-04-19 12:32:50'),
(39, 5, 'Day 3', '9:00 am', 'Zipline Adventure & Kigali Exploration', '2024-04-19 12:33:57'),
(40, 5, 'Day 4', '9:00 am', 'Delving into Nyungwe National Park\'s Majesty', '2024-04-19 12:34:41'),
(41, 5, 'Day 5', '9:00 am', 'Visit Kigali Genocide Memorial', '2024-04-19 12:35:04'),
(42, 5, 'Day 6', '9:00 am', 'Cultural Immersion: Community Visit & Local Shopping, or Bigogwe Traditional Village Experience', '2024-04-19 12:36:13'),
(43, 5, 'Day 7', '9:00 am', 'Departure', '2024-04-19 12:36:34');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` varchar(10) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `tourist_id` int(10) NOT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `tour_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
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
  `package_recorded_date` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `package_company_owner` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `package_introduction`, `package_description`, `package_days_and_nights`, `package_from_date`, `package_to_date`, `package_price`, `package_travel_type`, `package_type`, `package_country`, `package_number_of_person`, `package_image`, `package_status`, `package_recorded_date`, `package_company_owner`) VALUES
(5, ' 7 Days Tour for Ministries', 'This unique 7-day tour package is designed for religious ministries seeking a blend of spiritual reflection, cultural immersion, and breathtaking Rwandan scenery.', 'Day 1: Arrival in Kigali - A Warm Welcome\r\nUpon arrival at Kigali International Airport, you will receive a warm welcome from our amiable representative from World Stars Tours. Your transfer to your hotel in the vibrant heart of Rwanda\'s capital, Kigali, will be arranged seamlessly. Once settled in, take the opportunity to unwind and rejuvenate after your journey, ensuring you\'re ready to embark on the adventures awaiting you in Rwanda.\r\n\r\nDay 2: Visit Kigali Genocide Memorial or Nyamata Church and Cultural Experiences\r\nDiscover the vibrant pulse of modern Rwandan life as you explore Kigali, a city teeming with energy and culture. Begin your journey with a visit to the Kigali Genocide Memorial, a solemn tribute to the victims of the tragic events of 1994. Take a moment to reflect on the resilience of the Rwandan people and the profound concepts of forgiveness and reconciliation. Later in the day, delve into the lively atmosphere of Kigali\'s bustling markets and vibrant art galleries, immersing yourself in the rich tapestry of Rwandan culture and creativity.\r\n\r\nAlternatively, you can embark on a poignant journey as you drive to Nyamata Church, a solemn memorial site bearing witness to the tragic events of the genocide. Here, you will confront the haunting remnants of history, paying tribute to those who lost their lives. In the afternoon, immerse yourself in Rwandan culture through a series of enriching experiences. Explore a bustling local market, savor the flavors of authentic Rwandan cuisine, and engage with skilled artisans, gaining insight into the country\'s vibrant heritage. Conclude your day with an overnight stay in Kigali, reflecting on the significance of the day\'s encounters.\r\n\r\nDay 3: Witnessing Wildlife Wonders at Akagera National Park\r\nSet out after breakfast for an exhilarating journey to Akagera National Park, a paradise for wildlife aficionados. Prepare for an unforgettable safari experience as you venture into the park\'s expansive landscapes, where encounters with majestic zebras, graceful giraffes, powerful lions, majestic elephants, and an array of over 500 bird species await. The park\'s diverse terrain, ranging from vast savannas to tranquil papyrus swamps, provides a picturesque backdrop for avid photographers. As the day draws to a close, indulge in a delectable dinner and retreat to the comfort of your lodge nestled within the park, relishing in the memories of the day\'s remarkable sightings.\r\n\r\nDay 4: Unveiling Rwanda\'s Rich Tapestry\r\nOn a captivating journey to Butare (Huye), celebrated as a center of Rwandan culture and history. Immerse yourself in the nation\'s rich heritage at the National Museum of Rwanda, where intriguing displays offer insight into Rwanda\'s past and artistic achievements. Treat yourself to a delicious lunch at a local restaurant in Butare. Continuing your exploration, proceed to the magnificent Nyungwe National Park, a lush rainforest teeming with a variety of primates such as chimpanzees and colobus monkeys. Conclude your day with a delightful dinner and a peaceful overnight stay at your lodge nestled amidst the park\'s natural beauty.\r\n\r\nDay 5: A Spiritual Sanctuary at Kibeho or Nyungwe Forest Discovery\r\nKibeho: Choose to visit Kibeho, a revered Catholic pilgrimage site renowned for reported apparitions of the Virgin Mary. Find solace and contemplate in this sacred space.\r\n\r\nOR\r\n\r\nNyungwe Forest: Alternatively, explore the depths of Nyungwe National Park. Experience the exhilarating canopy walk, providing breathtaking views of the rainforest\'s diverse flora and fauna.\r\n\r\nDay 6: Rejuvenation at Nyandungu Eco-Park & Kigali City\r\nHead back to Kigali, with a serene stopover planned at the Nyandungu Eco-Park, offering a peaceful retreat within the bustling city. Take a leisurely stroll along the park\'s picturesque trails, immersing yourself in nature\'s tranquility. Alternatively, opt for optional yoga or meditation sessions (available at an additional cost), allowing for moments of deep relaxation and rejuvenation amidst the lush greenery. As the day winds down, indulge in a memorable farewell dinner at a local restaurant in Kigali, where you can reminisce and reflect on the unforgettable experiences of your Rwandan journey.\r\n\r\nDay 7: Fond Farewells\r\nFollowing breakfast, it\'s time to bid farewell to Rwanda as you transfer to Kigali International Airport for your departure flight. Take with you the cherished memories of the spiritual revelations and natural marvels you encountered during your journey. Reflect on the profound experiences and the beauty of Rwanda\'s landscapes, knowing that the memories created will stay with you long after your departure.\r\n', '7', '2024-04-10', '2025-07-04', '5500.00', '1', '1', 39, '5+', 'file_20240419_171145.jpeg', 1, '2024-04-10 01:21:19', 0),
(8, 'Rwandan Adventure for Students (7 Days)  ', 'Get ready for thrilling encounters, insightful experiences, and memories that will last a lifetime! ', 'Day 1: Kigali Arrival & City Buzz\r\nYour Rwandan adventure begins in Kigali, the country\'s bustling capital city. After settling into your comfortable accommodation, you\'ll dive right in with a guided walking tour. Explore the city\'s vibrant markets, historical landmarks, and hidden gems, getting a taste of the local life. As the day winds down, a delicious welcome dinner featuring traditional Rwandan flavors awaits, offering a chance to unwind and connect with your fellow travelers.\r\n\r\nDay 2: Nyungwe National Park (chimpanzee trekking & canopy walk)\r\nDay two whisks you away to Nyungwe National Park, a lush rainforest teeming with diverse plant and animal life. Here, you\'ll have the option to embark on a thrilling chimpanzee trekking adventure, observing these intelligent primates in their natural habitat. Witness their social interactions, playful antics, and remarkable intelligence as they swing through the ancient trees. Alternatively, for those seeking a different perspective, a guided nature walk along the canopy walkway offers breathtaking views of the rainforest and its inhabitants. In the evening, a local conservationist will lead a group discussion, shedding light on Rwanda\'s ongoing environmental efforts and the importance of protecting this vital ecosystem.\r\n\r\nDay 3: Nyandungu Eco Park & Farewell Dinner\r\nImmerse yourselves in nature at Nyandungu Urban Wetland, a restored ecosystem showcasing Rwanda\'s environmental conservation efforts. Explore the park with your guide, learning about the diverse birdlife, native flora, and the importance of wetlands. Enjoy scenic walkways and appreciate the park\'s beauty as a group.\r\n\r\nDay 4: Akagera National Park Safari\r\nGeared up for adventure, depart for Akagera National Park, a haven for diverse wildlife. Enjoy a thrilling game drive through savannah plains and acacia woodlands, spotting lions, elephants, giraffes, zebras, and over 500 species of birds. In the afternoon, choose a group activity like a boat cruise on Lake Ihema, renowned for its hippopotamuses and crocodiles, or a guided nature walk through lush landscapes. (Breakfast and dinner included)\r\n\r\nDay 5: Nyanza Museum & Cultural Immersion\r\nEmbark on a journey to Nyanza, the former royal capital of Rwanda. Explore the King\'s Palace Museum, a reconstructed replica of the traditional royal residence. Learn about Rwandan history, culture, and the significance of the monarchy through informative exhibits. Marvel at the beautifully crafted beehive-shaped structure and witness the long-horned Inyambo cattle, once a symbol of royal prestige.\r\n\r\nDay 6: Hike the Scenic Meraneza Trails & Farewell Dinner\r\nChallenge yourselves with a group hike in the Meraneza hiking area. Explore scenic trails amidst lush Rwandan landscapes, enjoy breathtaking views, and connect with nature as a group. Choose a trail suitable for your group\'s fitness level to ensure an enjoyable experience for everyone.\r\n\r\nDay 7: Departure\r\nAs your Rwandan adventure concludes on day seven, enjoy a relaxing breakfast before your departure transfer to Kigali International Airport. Take home unforgettable memories, a newfound appreciation for Rwanda\'s natural beauty, rich culture, and inspiring history.\r\n', '7', '', '', '5000.00 ', '1', '5', 39, '5+', 'file_20240418_152211.jpg', 1, '2024-04-13 14:09:14', 0),
(9, '7 Days Tour for Shared Adventure', 'Explore Rwanda\'s wonders with friends: wildlife, volcanoes, history & culture in 7 days', 'Embark on an unforgettable journey with your friends or family in Rwanda, the Land of a Thousand Hills. World Star Tours curates a 7-day adventure packed with wildlife encounters, breathtaking landscapes, cultural experiences, and opportunities to connect as a group.\r\n\r\nItinerary:\r\n\r\nDay 1: Arrival & Kigali City Tour\r\n\r\nUpon arrival at Kigali International Airport, a friendly World Star Tours representative will greet your group and whisk you away to your comfortable hotel in Kigali.\r\nAfter a refreshing rest, embark on a guided city tour, exploring Kigali\'s vibrant markets, historical landmarks like the Kigali Genocide Memorial, and experiencing the city\'s contemporary art scene.\r\nIn the evening, enjoy a delicious welcome dinner at a local restaurant showcasing Rwandan culinary delights. (Dinner included)\r\n\r\nDay 2: Akagera National Park Safari\r\n\r\nGeared up for adventure, depart for Akagera National Park, a haven for diverse wildlife. Enjoy a thrilling game drive through savannah plains and acacia woodlands, spotting lions, elephants, giraffes, zebras, and over 500 species of birds.\r\nIn the afternoon, choose a group activity like a boat cruise on Lake Ihema, renowned for its hippopotamuses and crocodiles, or a guided nature walk through lush landscapes. (Breakfast and dinner included)\r\n\r\nDay 3: Getaway of Your Choice: Kingfisher Boat Cruise or Nyanza & Cultural Immersion\r\n\r\nEmbark on a scenic boat cruise on a traditional Rwandan \"Kingfisher\" boat. Enjoy breathtaking views of the vast freshwater lake, spot diverse birdlife like the majestic African fish eagle, and relax on board with your group. Learn about the lake\'s importance to local communities and Rwanda\'s history.\r\n\r\nIf Kingfisher doesnâ€™t work for you, try Nyanza & Cultural Immersion\r\nEmbark on a journey to Nyanza, the former royal capital of Rwanda. Explore the King\'s Palace Museum, a reconstructed replica of the traditional royal residence. Learn about Rwandan history, culture, and the significance of the monarchy through informative exhibits. Marvel at the beautifully crafted beehive-shaped structure and witness the long-horned Inyambo cattle, once a symbol of royal prestige.\r\n\r\n\r\nDay 4: Nyungwe National Park & Canopy Walk\r\n\r\nJourney to Nyungwe National Park, a UNESCO World Heritage Site boasting lush rainforests, waterfalls, and breathtaking mountain scenery.\r\nEmbark on a thrilling canopy walk as a group, offering unparalleled views of the emerald rainforest and a chance to spot primates like chimpanzees and colobus monkeys.\r\nIn the afternoon, explore the park\'s diverse flora and fauna with a guided nature walk, learning about the unique ecosystem and its importance. (Breakfast, lunch, and dinner included)\r\n\r\nDay 5: Hike the Scenic Meraneza Trails & Farewell Dinner\r\n\r\nChallenge yourselves with a group hike in the Meraneza hiking area. Explore scenic trails amidst lush Rwandan landscapes, enjoy breathtaking views, and connect with nature as a group. Choose a trail suitable for your group\'s fitness level to ensure an enjoyable experience for everyone.\r\n\r\nDay 6: Nyandungu Eco Park & Farewell Dinner\r\n\r\nImmerse yourselves in nature at Nyandungu Urban Wetland, a restored ecosystem showcasing Rwanda\'s environmental conservation efforts. Explore the park with your guide, learning about the diverse birdlife, native flora, and the importance of wetlands. Enjoy scenic walkways and appreciate the park\'s beauty as a group.\r\n\r\nDay 7: Departure\r\n\r\nAfter breakfast, relax at the hotel or Extended stay house before your transfer back to Kigali International Airport for your departure flight. Take home cherished memories and a newfound appreciation for Rwanda\'s beauty and culture.\r\n', '7', '', '', '5250.00 ', '1', '3', 39, '5+', 'file_20240418_152211.jpg', 1, '2024-04-13 14:43:35', 0),
(10, '7 Days Tour for Couple  ', 'Explore Rwanda\'s beauty, from ziplining in Kigali to wildlife encounters, with your love on this 7-day romantic adventure.', 'This 7-day Rwandan adventure, curated by World Star Tours, is designed for couples seeking an unforgettable escape amidst breathtaking landscapes, diverse wildlife, and rich culture.  We\'ll take care of everything, from airfare and airport pickup to comfortable accommodation, in-country travel, and the services of a knowledgeable tour guide. Explore Rwanda\'s hidden gems, reconnect with nature, and create lasting memories together.\r\n\r\nItinerary:\r\n\r\nDay 1: Arrival & Kigali City Tour\r\n\r\nUpon arrival at Kigali International Airport, a friendly World Star Tours representative will greet you and whisk you away to your comfortable hotel in Kigali. After a refreshing rest, embark on a guided city tour, exploring Kigali\'s vibrant markets, historical landmarks like the Kigali Genocide Memorial, and experiencing the city\'s contemporary art scene.\r\nIn the evening, savor a delightful welcome dinner at a local restaurant showcasing Rwandan culinary delights (Dinner included in the package)\r\n\r\nDay 2: Akagera National Park Safari\r\n\r\nGeared up for adventure, depart for Akagera National Park, a haven for diverse wildlife. Enjoy a thrilling game drive through savannah plains and acacia woodlands, spotting lions, elephants, giraffes, zebras, and over 500 species of birds.\r\nIn the afternoon, choose from optional activities like a boat cruise on Lake Ihema, renowned for its hippopotamuses and crocodiles, or a guided nature walk through lush landscapes. (Breakfast and dinner included)\r\n\r\nDay 3: Romantic Getaway of Your Choice\r\n\r\nZipline Adventure in Nyamirambo: Gear up for an exhilarating adventure as you soar through the skies on a zipline tour in Nyamirambo, Kigali\'s vibrant old town. Experience breathtaking views of the city and surrounding landscapes while enjoying the thrill of this unique activity.\r\n\r\nIf ziplining isn\'t your cup of tea, Private Guided Hike: Explore the scenic beauty of Rwanda on a private guided hike tailored to your fitness level. Enjoy breathtaking views, fresh air, and quality time together amidst nature.\r\n\r\nYou can also choose to exprole Nyandungu Eco Park: Immerse yourselves in nature at Nyandungu Urban Wetland. Explore the restored wetland ecosystem with its diverse birdlife, native flora, and scenic walkways on a guided tour. Learn about Rwanda\'s environmental conservation efforts and appreciate the beauty of this urban oasis.\r\n\r\nDay 4: Nyungwe National Park & Canopy Walk\r\n\r\nJourney to Nyungwe National Park, a UNESCO World Heritage Site boasting lush rainforests, waterfalls, and breathtaking mountain scenery.\r\nEmbark on a thrilling canopy walk through the ancient trees, offering unparalleled views of the emerald rainforest and a chance to spot primates like chimpanzees and colobus monkeys.\r\nIn the afternoon, explore the park\'s diverse flora and fauna on a guided nature walk, learning about the unique ecosystem and its importance. (Breakfast, lunch, and dinner included)\r\n\r\nDay 5: Relaxation by Lake Kivu \r\n\r\nRelax by the shores of scenic Lake Kivu, enjoying breathtaking views and optional activities. Delve deeper into Rwandan culture with a visit to a traditional village. Interact with locals, learn about their way of life, and witness age-old customs and traditions. (Breakfast and dinner included)\r\n\r\nDay 6: Kigali Handicraft \r\n\r\nSpend the morning exploring Kigali\'s bustling handicraft market, a treasure trove of souvenirs handcrafted by local artisans. Find unique gifts like woven baskets, pottery, and vibrant paintings, all while supporting local communities.\r\nIn the evening, enjoy a farewell dinner at a renowned Kigali restaurant, reflecting on the unforgettable memories of your Rwandan adventure. (Breakfast and dinner included)\r\n\r\nDay 7: Departure\r\n\r\nAfter breakfast, relax at the hotel before your transfer back to Kigali International Airport for your departure flight. Take home cherished memories and a renewed appreciation for Rwanda\'s beauty and culture.', '7', '', '', '10000.00', '1', '3', 39, '2', 'file_20240413_210914.webp', 1, '2024-04-18 08:22:11', 0),
(11, '7 Days Tour for Single Person', ' Explore Africa\'s breathtaking landscapes, encounter its magnificent wildlife, and immerse yourself in the vibrant culture of its resilient people. ', 'Day 1:  Kigali Arrival & City Exploration\r\nUpon arrival at Kigali International Airport, you\'ll be greeted with a friendly welcome, setting the tone for your Rwandan adventure. Afterward, settle into your cozy accommodation in Kigali, ensuring a comfortable stay throughout your visit. Dive into the city\'s vibrant atmosphere with a guided tour, where you\'ll uncover historical landmarks, explore bustling markets, and stumble upon hidden gems waiting to be discovered. Cap off your first day with a delightful welcome dinner, indulging in the flavors of traditional Rwandan cuisine, a perfect introduction to the rich culinary heritage of the country.\r\n\r\nDay 2: Unveiling Wildlife Wonders at Akagera National Park\r\nTravel to Akagera National Park, renowned as a sanctuary for a wide array of wildlife species. Prepare for an exhilarating safari adventure as you embark on a game drive through the park\'s diverse habitats. Keep your eyes peeled for sightings of majestic lions, graceful elephants, striped zebras, towering giraffes, and an abundance of other fascinating animals that call Akagera home. Immerse yourself in the park\'s stunning landscapes, which encompass expansive savanna plains and glistening lakes, offering a picturesque backdrop to your safari experience.\r\n\r\nDay 3: Zipline Adventure & Kigali Exploration\r\nIndulge in an adrenaline-fueled escapade with an exhilarating zipline adventure in Nyamirambo, Kigali. Feel the rush as you soar through the air, experiencing a bird\'s-eye perspective of the city\'s lively neighborhoods below. Following the zipline excitement, the afternoon invites you to embrace freedom and leisure. Take the opportunity to explore Kigali at your own pace, whether immersing yourself in museum exhibits, wandering through bustling markets, or unwinding at a cozy local cafe.\r\n\r\nDay 4: Delving into Nyungwe National Park\'s Majesty\r\nEmbark on a journey to Nyungwe National Park, an enchanting haven celebrated for its verdant rainforests and abundant wildlife. Immerse yourself in the park\'s lush surroundings as you traverse winding trails, accompanied by knowledgeable guides who will unveil the secrets of its rich biodiversity. Alternatively, opt for an exhilarating canopy walk experience, offering panoramic vistas of the forest canopy and beyond. Prepare for captivating encounters with the park\'s resident primates, including the playful chimpanzees and majestic colobus monkeys, as you witness their natural behaviors in their pristine habitat.\r\n\r\nDay 5:Visit Kigali Genocide Memorial\r\nHonor the memory of Rwanda\'s past at the Kigali Genocide Memorial, a solemn tribute to the nation\'s history. Take a moment to reflect on Rwanda\'s remarkable journey of healing and reconciliation, paying homage to those affected by the tragic events. Following this introspective experience, delve into Kigali\'s dynamic art scene, where creativity flourishes amidst the city\'s vibrant atmosphere. Explore renowned galleries showcasing diverse artistic expressions, or engage in a workshop to learn traditional Rwandan art techniques, immersing yourself in the country\'s rich cultural heritage.\r\n\r\nDay 6:  Cultural Immersion: Choose Your Adventure\r\n\r\nOption 1: Community Visit & Local Shopping:\r\nImmerse yourself in the heart of Rwandan culture with a visit to a local village, where you\'ll be welcomed by the friendly and hospitable Rwandan people. Explore their traditions and way of life as you engage in meaningful conversations and interactions, gaining firsthand insights into their rich heritage. Dive deeper into Rwandan culture by participating in a captivating cultural activity, such as drumming or basket weaving, under the guidance of skilled artisans. Through hands-on experiences, you\'ll gain a profound appreciation for Rwandan craftsmanship and the stories woven into each piece. Show your support for local communities by perusing a vibrant community market, where you\'ll discover a treasure trove of unique, handcrafted souvenirs. By purchasing these one-of-a-kind items, you not only bring home a piece of Rwandan culture but also contribute to the livelihoods of talented local artisans, ensuring the preservation of their traditions for generations to come.\r\n\r\nOption 2: Bigogwe Traditional Village Experience:\r\nExperience the authentic rhythms of Rwandan rural life with a visit to the Bigogwe Traditional Village. Immerse yourself in the serene countryside setting as you step into the heart of traditional farming practices. Engage with local farmers and gain firsthand knowledge about their time-honored techniques, from cultivating the land to nurturing crops essential to their livelihoods. Witness a fascinating cow milking demonstration, where you\'ll learn about the significance of cattle in Rwandan culture and the integral role they play in daily life. Delve into the rich agricultural heritage of Rwanda as you listen to stories passed down through generations, gaining profound insights into the deep-rooted connection between the land and the local community.\r\n\r\nDay 7: Departure\r\nIndulge in a leisurely breakfast, savoring the flavors of Rwanda one last time before bidding farewell. As you prepare for your departure transfer to Kigali International Airport, reflect on the unforgettable moments and experiences that have enriched your journey. Take with you cherished memories of Rwanda\'s breathtaking landscapes, vibrant culture, and the enduring spirit of its people. May these impressions serve as a lasting reminder of the beauty and resilience that define this remarkable country, inspiring you long after you\'ve returned home.\r\n', '7', '', '', '6000.00', '1', '3', 39, '1', 'file_20241117_092027.jpeg', 1, '2024-04-19 10:11:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `package_inclusive`
--

CREATE TABLE `package_inclusive` (
  `package_inclusive_id` int(11) NOT NULL,
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
  `recorded_date` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_inclusive`
--

INSERT INTO `package_inclusive` (`package_inclusive_id`, `package_id`, `tour_plan`, `departure_location`, `return_location`, `departure_time`, `bed_room`, `air_fares`, `hotel`, `entrance_fees`, `tour_guide`, `insurance`, `food_and_drinks`, `additional_service`, `recorded_date`) VALUES
(1, 2, 'this is our tour plan', 'Kigali', 'nyanza', '2pm', 'NO', 'NO', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', '2024-03-03 12:39:01'),
(2, 3, 'this is full tour plan  in full description ', 'Nyabugogo', 'REMERA', '10AM', 'No', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', '2024-04-05 15:11:44'),
(3, 5, ' Explore Rwanda\'s wildlife in Akagera Park, zipline in Kigali, trek Nyungwe\'s rainforest, reflect at the Genocide Memorial, and choose between a community visit or a traditional village experience.', 'Your home city (Airport)', 'Kigali International Airport', ' Varies', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No', '2024-04-10 01:28:00'),
(8, 8, 'This 7-day Rwandan adventure by World Star Tours whisks you from Kigali city tours to wildlife safaris in Akagera National Park.  Choose your own romantic adventure, explore Nyungwe National Park\'s rainforest canopy, relax by Lake Kivu, discover Rwandan culture, and shop for local crafts before departing with unforgettable memories.', 'Your home country', 'Kigali International Airport', 'Varies', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '', '2024-04-17 00:58:36'),
(9, 9, 'This World Star Tours\' 7-day Rwandan adventure unites you with friends or family. Explore Kigali\'s vibrant markets and history, then embark on a thrilling safari in Akagera National Park. Choose a group boat cruise or cultural immersion in Nyanza.  Next, conquer the Nyungwe National Park canopy walk together and trek scenic Meraneza trails. Explore Nyandungu\'s restored wetland and unwind before your departure, taking home unforgettable memories of Rwanda\'s landscapes and culture.', 'Your home country', 'Kigali International Airport', 'Varies', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '', '2024-04-17 01:07:26'),
(10, 10, 'Explore Rwanda\'s vibrant capital, Kigali, then delve into its history at the Nyanza Museum. Hike the lush Nyungwe National Park or track chimpanzees, before embarking on a thrilling safari adventure in Akagera National Park. Immerse yourself in Rwandan culture with a village visit and traditional performance.', 'Your home city (Airport)', 'Kigali International Airport', 'Varies', '', 'Yes', 'Yes', 'No', 'Yes', 'Yes', 'Yes', '', '2024-04-18 08:24:42'),
(11, 11, 'This 7-day Rwandan adventure immerses you in spiritual reflection, starting with Kigali\'s Genocide Memorial and a vibrant city tour. Witness the wonders of Akagera National Park\'s wildlife, delve into Rwanda\'s history at the National Museum, and choose between a spiritual visit to Kibeho or an exhilarating canopy walk in Nyungwe National Park. Find peace at Nyandungu Eco-Park before departing with unforgettable memories.', 'Your home city (Airport)', 'Kigali International Airport', 'Varies', '', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '', '2024-04-19 12:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `package_type`
--

CREATE TABLE `package_type` (
  `package_type_id` int(11) NOT NULL,
  `package_type_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_type`
--

INSERT INTO `package_type` (`package_type_id`, `package_type_name`) VALUES
(1, 'Vip Package'),
(2, 'Regular Package'),
(3, 'Best Package'),
(4, 'High Price Package'),
(5, 'Low price package');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `tour_id` int(10) NOT NULL,
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
  `displayImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

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
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tourist_destination`
--

CREATE TABLE `tourist_destination` (
  `destination_id` int(10) NOT NULL,
  `tour_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tours_company`
--

CREATE TABLE `tours_company` (
  `id` int(11) NOT NULL,
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
  `password` varchar(200) NOT NULL DEFAULT '123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tours_company`
--

INSERT INTO `tours_company` (`id`, `company_name`, `owner_name`, `contact_email`, `phone_number`, `company_address`, `tour_type`, `language_by_tour_guide`, `licence_number`, `service_description`, `company_certificate`, `company_logo`, `created_at`, `active`, `password`) VALUES
(1, 'First Class Tours', 'Akingeneye', 'info@firstsclass.rw', '03274892374823', 'Kigali', 'adventure', 'eng', '234', 'sdfsfsd\r\nsdffsdfs', '1732524404_Amasezerano ubukode bw\'inzu gahanga.pdf', 'logo1.jpg', '2024-11-25 08:46:44', 1, '123'),
(2, 'sdfs', 'sdfsdf', 'sdfsd@gm.vom', 'f3534', 'gfddgd', 'dfgdfg', 'dfgdf', 'dfgdf', 'fdgfdgdfgd', '1732524509_bluJk94P_400x400.jpg', 'logo2.jpg', '2024-11-25 08:48:29', 1, '123'),
(3, 'sdfs', 'sdfsdf', 'sdfsd@gm.vom', 'f3534', 'gfddgd', 'dfgdfg', 'dfgdf', 'dfgdf', 'fdgfdgdfgd', '1732524638_bluJk94P_400x400.jpg', '1732524638_bluJk94P_400x400.jpg', '2024-11-25 08:50:38', 2, '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` varchar(10) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `payment_to` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `tour_id` int(10) DEFAULT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `reciever_type` varchar(100) NOT NULL,
  `completed` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transport_companies`
--

CREATE TABLE `transport_companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `company_address` text NOT NULL,
  `fleet_size` int(11) NOT NULL,
  `type_of_vehicles` text NOT NULL,
  `licence_number` varchar(255) NOT NULL,
  `company_certificate` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 0,
  `password` varchar(200) NOT NULL DEFAULT '123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_companies`
--

INSERT INTO `transport_companies` (`id`, `company_name`, `owner_name`, `contact_email`, `phone_number`, `company_address`, `fleet_size`, `type_of_vehicles`, `licence_number`, `company_certificate`, `company_logo`, `created_at`, `active`, `password`) VALUES
(1, 'fgddfgd', 'dfggdfgd', 'transport@gmail.com', '5464645645', 'fhdghfghgfhfghf', 9, 'minivans', '7645756756', '1732527689_bluJk94P_400x400.jpg', 'logo1.jpg', '2024-11-25 09:41:29', 1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `travel_type`
--

CREATE TABLE `travel_type` (
  `travel_type_id` int(11) NOT NULL,
  `travel_type_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_type`
--

INSERT INTO `travel_type` (`travel_type_id`, `travel_type_name`) VALUES
(1, 'Adventure Tours '),
(2, 'City Tours '),
(3, 'Couple Tours '),
(4, 'Group Tours '),
(5, 'Weekend Break '),
(6, 'Business Tours ');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehi_id` varchar(10) DEFAULT NULL,
  `vehi_registration_number` varchar(20) NOT NULL,
  `ac/nonac` tinyint(1) DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `driver_id` varchar(10) DEFAULT NULL,
  `vehical_mark` varchar(255) NOT NULL,
  `vehical_model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehi_id`, `vehi_registration_number`, `ac/nonac`, `no_of_seats`, `vehicle_type`, `driver_id`, `vehical_mark`, `vehical_model`) VALUES
(NULL, 'HS-0441', NULL, NULL, '', 'drivertest', 'nissan', 'fb15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_company`
--
ALTER TABLE `about_company`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `des_feedback`
--
ALTER TABLE `des_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `driver_feedback`
--
ALTER TABLE `driver_feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`);

--
-- Indexes for table `guide_feedback`
--
ALTER TABLE `guide_feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `homepage_logo`
--
ALTER TABLE `homepage_logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `homepage_slider`
--
ALTER TABLE `homepage_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `homepage_video`
--
ALTER TABLE `homepage_video`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`itinerary_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `FK` (`tourist_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `package_inclusive`
--
ALTER TABLE `package_inclusive`
  ADD PRIMARY KEY (`package_inclusive_id`);

--
-- Indexes for table `package_type`
--
ALTER TABLE `package_type`
  ADD PRIMARY KEY (`package_type_id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tourist_destination`
--
ALTER TABLE `tourist_destination`
  ADD PRIMARY KEY (`email`,`destination_id`) USING BTREE,
  ADD KEY `tourist_destination_ibfk_2` (`destination_id`);

--
-- Indexes for table `tours_company`
--
ALTER TABLE `tours_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transport_companies`
--
ALTER TABLE `transport_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_type`
--
ALTER TABLE `travel_type`
  ADD PRIMARY KEY (`travel_type_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehi_registration_number`),
  ADD UNIQUE KEY `vehi_id` (`vehi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_company`
--
ALTER TABLE `about_company`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `destination_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `homepage_logo`
--
ALTER TABLE `homepage_logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_slider`
--
ALTER TABLE `homepage_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `homepage_video`
--
ALTER TABLE `homepage_video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `itinerary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `package_inclusive`
--
ALTER TABLE `package_inclusive`
  MODIFY `package_inclusive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `package_type`
--
ALTER TABLE `package_type`
  MODIFY `package_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `tour_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tours_company`
--
ALTER TABLE `tours_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transport_companies`
--
ALTER TABLE `transport_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `travel_type`
--
ALTER TABLE `travel_type`
  MODIFY `travel_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tourist` (`email`);

--
-- Constraints for table `tourist_destination`
--
ALTER TABLE `tourist_destination`
  ADD CONSTRAINT `tourist_destination_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`destination_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
