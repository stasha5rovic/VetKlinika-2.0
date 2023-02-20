<?php

class clController {

    public static function getMyVisits($id, mysqli $conn)
    {
        $query = "SELECT * FROM visit 
        WHERE clientid=$id;";
        return $conn->query($query);
    }




}



?>