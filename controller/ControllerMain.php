<?php

class ControllerMain{

public static function login($email, $password, mysqli $conn)
    {
        $query = "SELECT * FROM user 
        WHERE email='$email' AND password='$password';";
        return $conn->query($query);
    }

}

?>