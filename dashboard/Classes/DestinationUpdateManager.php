<?php

include('includes/config.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DestinationUpdateManager
 *
 * @author Kavindu
 */
class DestinationUpdateManager {

    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function getDestinationDetails($pid) {
        $sql = "SELECT * FROM destination,countries WHERE destination.category=countries.country_id and  destination_id  = :pid";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':pid', $pid, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function updateDestinationDetails($pid, $pname, $ptype, $plocation, $sdescription, $pdetails,$pvisa_required,$planguages_spoken,$pcurrency_used,$psupport_phone,$psupport_email,$pcountry_area) {
        $sql = "UPDATE destination SET name = :pname, category = :ptype, city = :plocation, description = :sdescription, description_full = :pdetails, visa_required = :pvisa_required,languages_spoken = :planguages_spoken, currency_used = :pcurrency_used,support_phone = :psupport_phone,support_email = :psupport_email,support_email = :psupport_email,country_area = :pcountry_area    WHERE destination_id = :pid";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':pid', $pid, PDO::PARAM_INT);
        $query->bindParam(':pname', $pname, PDO::PARAM_STR);
        $query->bindParam(':ptype', $ptype, PDO::PARAM_STR);
        $query->bindParam(':plocation', $plocation, PDO::PARAM_STR);
        $query->bindParam(':sdescription', $sdescription, PDO::PARAM_STR);
        $query->bindParam(':pdetails', $pdetails, PDO::PARAM_STR);
        
        $query->bindParam(':pvisa_required', $pvisa_required, PDO::PARAM_STR);
        $query->bindParam(':planguages_spoken', $planguages_spoken, PDO::PARAM_STR);
        $query->bindParam(':pcurrency_used', $pcurrency_used, PDO::PARAM_STR);
        $query->bindParam(':psupport_phone', $psupport_phone, PDO::PARAM_STR);
        $query->bindParam(':psupport_email', $psupport_email, PDO::PARAM_STR);
        $query->bindParam(':pcountry_area', $pcountry_area, PDO::PARAM_STR);
        
        return $query->execute();
    }

}

?>
