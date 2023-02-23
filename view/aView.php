<?php

include_once "../data.php";
include_once "header.php";
include "../controller/aController.php";


$result = aController::getAllUsers($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin strana</title>
    <link rel="stylesheet" href="../css/styleAdminEmployee.css">
</head>
<body>
<div id="glavniDiv">

<div id="table_div">
        <h3>Lista svih korisnika:</h3>
        <table border="2px">
            <thead>
                <th>ID</th>
                <th>Ime i prezime</th>
                <th>Email adresa</th>
                <th>Lozinka</th>
                <th>Broj telefona</th>
                <th>Tip korisnika</th>
            </thead>
            <tbody>
                <?php
                    while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['id'];  ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['phone'];  ?></td>
                    <td><?php echo $row['type']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div>
            <h3>Unos novog korisnika:</h3>
            <div>
                <form method="post">
                    <div>
                        <label for="name">ID</label>
                        <input type="text" id="id" name="id" required>
                    </div>
                    <div>
                        <label for="name">Ime i prezime</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div>
                        <label for="email">Email adresa</label>
                        <input type="text" id="email" name="email" required>
                    </div>
                    <div>
                        <label for="password">Lozinka</label>
                        <input type="text" id="password" name="password" required>
                    </div>
                    <div>
                        <label for="phone">Broj telefona</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div>
                        <label for="type">Tip korisnika</label>
                        <input type="text" id="type" name="type" required>
                    </div>
            </div>
            <br>
            <input type="submit" value="Dodaj" id="dodaj" name="dodaj">
            </form>
            <br><br>
            <?php

            if (isset($_POST["dodaj"])) { 
                $id = $_POST["id"];                 
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $phone = $_POST["phone"];
                $type = $_POST["type"];
                $result = aController::addUser($id, $name, $email, $password, $phone, $type, $conn);
                $num_rows = $conn->affected_rows;
                if ($num_rows === 1) {
                    echo "Korisnik je dodat.";
                } else {
                    echo "Došlo je do greške, pokušajte ponovo.";
                }
            }      
             
                
            ?>
        </div>

        <div>
            <h3>Brisanje korisnika</h3>
            <div>
                <form method="post">
                    <div>
                        <label for="deleteId">ID korisnika</label>
                        <input type="text" id="deleteId" name="deleteId" required>
                    </div>
                    <br>
            <input type="submit" value="Obriši" id="delete" name="delete">
            </form>
            <br><br>
            <?php

            if (isset($_POST["delete"])) {
                $id = $_POST["deleteId"];
                $result = aController::deleteUser($id, $conn);
                $num_rows = $conn->affected_rows;
                if ($num_rows === 1) {
                    echo "Korisnik je obrisan.";
                } else {
                    echo "Došlo je do greške, pokušajte ponovo.";
                }
            }
            ?>
        </div>
        </div>


</div>
</body>
</html>