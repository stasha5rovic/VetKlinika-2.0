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

    public static function editUser($id, $name, $email, $password, $phone, $type, $conn){
        $query1 = "SELECT * FROM user WHERE id=$id;";
        $res1 = $conn->query($query1);
        $row = $res1->fetch_assoc();

        if($name === "") {
            $updateName = $row['name'];
        } else {
            $updateName = $name;
        }
        if($email === "") {
            $updateEmail = $row['email'];
        }else {
            $updateEmail = $email;
        }
        if($password === "") {
            $updatePassword = $row['password'];
        }else {
            $updatePassword = $password;
        }
        if($phone === "") {
            $updatePhone = $row['phone'];
        }else {
            $updatePhone = $phone;
        }
        if($type === "") {
            $updateType = $row['type'];
        }else {
            $updateType = $type;
        }

        $query2 = "UPDATE user SET name='$updateName', email='$updateEmail',
                     password='$updatePassword', phone='$updatePhone', type='$updateType'
                    WHERE id=$id;";
        return $conn->query($query2);
        
    }


}




?>