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

    public static function scheduleNextVisit($date, $userID){
        
            foreach ($_SESSION["korisnici"] as $kor) {
                if ($kor->getiD() == $userID) {
                    $to = $kor->getEmail();
                }
            }
            $subject = "Kontrola";
            $message = "Kontrola zdravlja vašeg ljubimca je zakazana za " . $date . ".";

            $result = mail($to, $subject, $message);
            if($result == true){
                echo "Mejl je uspešno poslat klijentu.";
            } else {
                "Mejl nije poslat.";
            }
    }

    public static function addVisit($idA, $idC, $datum, $diagnosis, $meds){
            $poseta = array(
            "animalID" => $idA,
            "clientID" => $idC,
            "date" => $datum,
            "diagnosis" => $diagnosis,
            "meds" => $meds,
            );

            $_SESSION["posete"][] = $poseta;
    }

}





?>