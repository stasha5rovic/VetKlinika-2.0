<header>
    <div id="user">

    </div>
    <div id="logout">
        <form action="" method="post">
            <input type="submit" value="Izloguj me" id="logout" name="logout">
        </form>
    </div>
</header>




<?php

if (isset($_POST["logout"])) {
    unset($_SESSION["logovani_korisnik"]);
    header("Location:../index.php");
}


?>