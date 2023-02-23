<?php


class aController{




    public static function getAllUsers(mysqli $conn)
    {
        $query = "SELECT * FROM user;";
        return $conn->query($query);
    }

    public static function addUser($id, $name, $email, $password, $phone, $type, mysqli $conn){
      
        
        $newId = $id;
        $newName = $name;
        $newEmail = $email;
        $newPassword = $password;
        $newPhone = $phone;
        $newType = $type;
        
        $query = "INSERT INTO user (id, name, email, password, phone, type) 
                    VALUES ($newId, '$newName', '$newEmail', '$newPassword','$newPhone', '$newType');";
        return $conn->query($query); 


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