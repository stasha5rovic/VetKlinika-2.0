<?php

include_once "../data.php";
include_once "header.php";
include_once "../controller/clController.php";

echo "<br>";

$id = $_SESSION['logovani_korisnik']['id'];

$result = clController::getMyVisits($id, $conn);

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

                while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['date'];  ?></td>
                    <td><?php echo $row['diagnosis']; ?></td>
                    <td><?php echo $row['meds']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
      </div>
    
</body>
</html>






