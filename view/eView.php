<?php

include_once "../data.php";
include_once "header.php";
include "../controller/eController.php";
include_once "../model/visit.php";




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strana za zaposlene</title>
    <link rel="stylesheet" href="../css/styleAdminEmployee.css">
</head>

<body>
    <div id="glavniDiv">
        <div>
            <h3>Pretraga po imenu i prezimenu klijenta:</h3>
            <div>
                <form method="post">
                    <div>
                        <label for="klijent">Klijent</label>
                        <input type="text" id="klijent" name="klijent" required>
                    </div>
            </div>
            <br>
            <input type="submit" value="Nađi klijenta" id="nadjiKl" name="nadjiKl">
            </form>
            <br><br>
            <?php

            if (isset($_POST["nadjiKl"])) {
                $clientName = $_POST["klijent"];
                eController::findByClient($clientName);
            }
            ?>
        </div>

        <div>
            <h3>Pretraga po imenu pacijenta:</h3>
            <div>
                <form method="post">
                    <div>
                        <label for="pacijent">Pacijent</label>
                        <input type="text" id="pacijent" name="pacijent" required>
                    </div>
            </div>
            <br>
            <input type="submit" value="Nađi pacijenta" id="nadjiPa" name="nadjiPa">
            </form>
            <br><br>
            <?php
            if (isset($_POST["nadjiPa"])) {
                $petName = $_POST["pacijent"];
                eController::findByPet($petName);
            }

            ?>
        </div>
        <div>
            <h3>Zakazivanje kontrole:</h3>
            <form method="post">
                <div>
                    <label for="petID">Unesite ID klijenta</label>
                    <input type="text" id="userID" name="userID" required>
                </div>
                <div>
                    <label for="scheduleDate">Datum kontrole</label>
                    <input type="date" name="scheduleDate" id="scheduleDate">
                    </div>
                    <br>
                    <input type="submit" value="Zakaži" id="schedule" name="schedule">
            </div> 
            </form>
            <br><br>
        </div>
        <?php

        if (isset($_POST["schedule"])) {
            $userID = $_POST["userID"];
            $date = date('d-m-Y', strtotime($_POST["scheduleDate"]));
            eController::scheduleNextVisit($date, $userID);
            echo "Kontrola zakazana za: " . $date;
        }

        ?>

        <div>
            <h3>Nova poseta:</h3>
            <div>
                <form method="post">
                    <div>
                        <label for="idA">ID pacijenta</label>
                        <input type="text" id="idA" name="idA" required>
                    </div>
                    <div>
                        <label for="idC">ID klijenta</label>
                        <input type="text" id="idC" name="idC" required>
                    </div>
                    <div>
                        <label for="datum">Datum</label>
                        <input type="date" id="datum" name="datum" placeholder="dd-mm-YYYY" required>
                    </div>
                    <div>
                        <label for="diagnosis">Dijagnoza</label>
                        <input type="text" id="diagnosis" name="diagnosis" required>
                    </div>
                    <div>
                        <label for="meds">Terapija</label>
                        <input type="text" id="meds" name="meds" required>
                    </div>
            </div>
            <br>
            <input type="submit" value="Zapamti" id="zapamti" name="zapamti">
            </form>
            <br><br>
            <?php

            if (isset($_POST["zapamti"])) {
                $idA = $_POST["idA"];
                $idC = $_POST["idC"];
                $datum = date('d-m-Y', strtotime($_POST["datum"]));
                $diagnosis = $_POST["diagnosis"];
                $meds = $_POST["meds"];
                
                eController::addVisit($idA ,$idC, $datum, $diagnosis, $meds);
            }
            ?>
        </div>
    </div>

</body>

</html>