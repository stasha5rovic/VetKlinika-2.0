<?php





class aController{




    public static function getAllUsers(mysqli $conn)
    {
        $query = "SELECT * FROM user;";
        return $conn->query($query);
    }

    public static function addUser($id ,$name, $email, $password, $phone, $type){
        $korisnik = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "phone" => $phone,
            "type" => $type);
            $_SESSION["korisnici"][] = $korisnik;
         


    }            
    

    public static function deleteUser($id, mysqli $conn){
        $query = "DELETE FROM user 
                    WHERE id=$id";
        return $conn->query($query);

    }

    public static function editUser(){

    }


}




?>