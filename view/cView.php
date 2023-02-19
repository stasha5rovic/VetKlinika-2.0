<?php

include_once "../data.php";
include_once "header.php";

echo "<br>";

$visits = $_SESSION["posete"];

$myVisits = [];

// foreach($visits as $vis){
//     global $user;
//     if($vis->getClientID() == $user->getId()){
//         array_push($myVisits, $vis);
//     }
// }

$korisnici = $_SESSION["korisnici"];

for ($i = 0; $i < count($visits); $i++){
    for ($j = 0; $j < count($korisnici); $j++){
        if($visits[$i]->getClientID() == $korisnici[$j]->getId()){
                    array_push($myVisits, $visits[$i]);
                }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strana za klijente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div id="table_div">
        <h3>Ovo je lista vaših poseta:</h3>
        <table border="2px">
            <thead>
                <th>Datum</th>
                <th>Dijagnoza</th>
                <th>Terapija</th>
            </thead>
            <tbody>
                <?php

                    foreach($myVisits as $mv):
                ?>
                <tr>
                    <td><?php echo $mv->getDate();  ?></td>
                    <td><?php echo $mv->getDiagnosis(); ?></td>
                    <td><?php echo $mv->getMeds(); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
      </div>
    
</body>
</html>






