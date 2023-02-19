<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "vetklinika";


$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_errno){
    exit("Konekcija nije uspela: " . $conn->connect_error);
}


?>