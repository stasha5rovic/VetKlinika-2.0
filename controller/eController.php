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

    public static function findByPet($petName, mysqli $conn){
        $query = "SELECT * FROM animal WHERE animalName='$petName';";
        return $conn->query($query);
    }


    public static function petVisits($petName, $conn){
        $query = "SELECT id FROM animal WHERE animalName='$petName';";
        $res =$conn->query($query);
        $row = $res->fetch_assoc();
        $animalid = $row['id'];
        $query2 = "SELECT * FROM visit WHERE animalid=$animalid;";
        return $conn->query($query2);
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

    public static function editPatientInfo($id, $weight, mysqli $conn){
        $query = "UPDATE animal SET weight=$weight WHERE id=$id;";
        return $conn->query($query); 
    }

}





?>