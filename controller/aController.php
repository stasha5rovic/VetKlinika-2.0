<?php



$korisnici = $_SESSION["korisnici"];

class aController{

    public static function addUser($id ,$name, $email, $password, $phone, $type){
        $korisnik = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "password" => $password,
            "phone" => $phone,
            "type" => $type);
            $_SESSION["korisnici"][] = $korisnik;
            //array_push($_SESSION["korisnici"][], $korisnik);

            //provera
            // foreach($_SESSION["korisnici"] as $kor){
            //     print_r($kor);
            // }


    }            
    

    public static function deleteUser($deleteId){

        foreach($_SESSION["korisnici"] as $kor){
            if($kor->getId() == $deleteId){
                unset($kor);
            }
        }

    }

    public static function editUser(){

    }


}




?>