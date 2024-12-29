<?php 

// define('DB_HOST','localhost');
// define('DB_USER','firstclasstours_new_user_newsite');
// define('DB_PASS','#kd)0c0+ZGC[');
// define('DB_NAME','firstclasstours_new_website');

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','Igihozo!#07');
define('DB_NAME','firstclasstours');

try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
// $servername = "localhost";
// $username = "firstclasstours_new_user_newsite";
// $password = "#kd)0c0+ZGC[";
// $dbname = "firstclasstours_new_website";

$servername = "localhost";
$username = "root";
$password = "Igihozo!#07";
$dbname = "firstclasstours";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




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
        $website_logo = $row['website_logo'];
        $company_name= $row['company_name'];
        $company_moto= $row['company_moto'];
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
        $visa_in_rwanda = $row['visa_in_rwanda'];
        $become_rwanda_resident = $row['become_rwanda_resident'];
        $become_rwanda_citizen = $row['become_rwanda_citizen'];
     
      
    }}
    
?>