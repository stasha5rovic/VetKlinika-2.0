<?php
include_once "../model/animal.php";


class eController{

    public static function findByClient($clientName, mysqli $conn){

                $query = "SELECT * FROM user WHERE name='$clientName';";
                return $conn->query($query);

    }

    public static function ClientVisits($clientName, mysqli $conn){
        $query = "SELECT id FROM user WHERE name='$clientName';";
        $res =$conn->query($query);
        $row = $res->fetch_assoc();
        $clientid = $row['id'];
        $query2 = "SELECT * FROM visit WHERE clientid=$clientid;";
        return $conn->query($query2);
    }

    public static function findByPet($petName){
        foreach($_SESSION["pacijenti"] as $pacijent){
            if($pacijent->getAnimalName() == $petName){
                echo "ID: " . $pacijent->getId() . " / " . "Ime: " . $pacijent->getAnimalName() . " / " .
                "Vrsta: " . $pacijent->getAnimalType() . " / " . "Datum rođenja: " . $pacijent->getDob() . " / " .
                 "Težina: " . $pacijent->getWeight() . " kg";
                 echo "<br>";
                echo "Posete ovog pacijenta:  <br>";
                foreach ($_SESSION["posete"] as $pos){
                    if ($pacijent->getId() == $pos->getAnimalID()){
                        echo "Datum: " .$pos->getDate() . " / " . "Dijagnoza: ". $pos->getDiagnosis() . " / " . "Terapija: " . $pos->getMeds() . "<br>";
            }
        }
    }
}


}

    public static function scheduleNextVisit($date, $userID, mysqli $conn){
        
            $query = "SELECT email FROM user WHERE id=$userID;";

            $result = $conn->query($query);
            $row = $result->fetch_assoc();

            $to = $row['email'];
            $subject = "Kontrola";
            $message = "Kontrola zdravlja vašeg ljubimca je zakazana za " . $date . ".";

            $res = mail($to, $subject, $message);
            
                echo "Kontrola zakazana za: " . $date . ", mejl je uspešno poslat na adresu: " . $to;
            
    }

    public static function addVisit($idA, $idC, $datum, $diagnosis, $meds, mysqli $conn){      
        
            $animalid = $idA;
            $clientid = $idC;
            $date = $datum;
            $diagnosis = $diagnosis;
            $meds = $meds;
            
            $query = "INSERT INTO visit (animalid, clientid, date, diagnosis, meds) 
                        VALUES ($animalid, $clientid, '$date', '$diagnosis','$meds');";
            return $conn->query($query); 
    }

    // dodati izmenu pacijentovih podataka

}





?>