<?php
include_once "../model/animal.php";

$visits = $_SESSION["posete"];
$korisnici = $_SESSION["korisnici"];
$pacijenti = $_SESSION["pacijenti"];

class eController{

    public static function findByClient($clientName){
        foreach ($_SESSION["korisnici"] as $korisnik) {
            if ($korisnik->getName() == $clientName){
                echo "ID: " . $korisnik->getId() . " / " . "Ime: " . $korisnik->getName() . " / " . 
                "Email: " . $korisnik->getEmail() . " / " . "Telefon: ". $korisnik->getPhone();
                echo "<br>";
                echo "Posete ovog klijenta:  <br>";
                foreach ($_SESSION["posete"] as $pos){
                    if ($korisnik->getId() == $pos->getClientID()){
                        echo "Datum: " .$pos->getDate() . " / " . "Dijagnoza: ". $pos->getDiagnosis() . " / " . "Terapija: " . $pos->getMeds() . "<br>";
                    }
                }
            }
    
        }

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

}





?>