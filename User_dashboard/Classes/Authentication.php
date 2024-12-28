<?php

class Authentication {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    // Modify the authenticate method to check the table dynamically based on the company type
    public function authenticate($userId,$username, $password, $company_type) {
        $password = $password; // Hash the password to match the stored one
        
        // Set the table based on company type
        switch ($company_type) {
            case 'tour_company':
                $table = 'tours_company';  // Table for tour companies
                break;
            case 'hotel_company':
                $table = 'hotels';  // Table for hotels
                break;
            case 'transport_company':
                $table = 'transport_companies';  // Table for transport companies
                break;
            default:
                return false;  // Invalid company type
        }

        // SQL query to check if the username (email) and password exist in the selected table
        $sql = "SELECT id,contact_email, password FROM $table WHERE contact_email = :uname AND password = :password";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':uname', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();

        // If row count is greater than 0, credentials are valid
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false; 
        }
    }
}

?>
