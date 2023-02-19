<?php

session_start();

include_once "model/user.php";
include_once "model/admin.php";
include_once "model/client.php";
include_once "model/employee.php";
include_once "model/animal.php";
include_once "model/visit.php";
include "database/dbbroker.php";




$c1 = new Client(3, "Jadzia Dax", "dax@hotmail.com", "dax123", "+38161222964", "client");
$e1 = new Employee(1, "Jean-Luc Picard", "picard@gmail.com", "picard123", "+445215878", "employee", "doctor");
$a1 = new Admin(2, "Ellen Ripley", "ripley@yahoo.com", "ripley123", "+38160251547", "admin");
$c2 = new Client(4, "Kira Nerys", "kira@gmail.com", "kira123", "+38137854996", "client");

$pet1 = new Animal(1, "mačka", "Spot", "19-07-2019", 4.2);
$pet2 = new Animal(2, "papagaj", "Odo", "25-05-2015", 1.4);

$v1 = new Visit(1, 3, "03-05-2022", "Redovna kontrola", "nema");
$v2 = new Visit(1, 3, "21-12-2022", "Upala desnog oka", "antibiotska krema");
$v3 = new Visit(2, 4, "12-12-2022", "Povreda krila", "bandaža");

$listOfVisits = [];
array_push($listOfVisits, $v1);
array_push($listOfVisits, $v2);
array_push($listOfVisits, $v3);




$nizKorisnika = [];

array_push($nizKorisnika, $e1);
array_push($nizKorisnika, $a1);
array_push($nizKorisnika, $c1);

$nizPacijenata = [];
array_push($nizPacijenata, $pet1);
array_push($nizPacijenata, $pet2);



$_SESSION["korisnici"] = $nizKorisnika;

$_SESSION["posete"] = $listOfVisits;

$_SESSION["pacijenti"] = $nizPacijenata;







?>