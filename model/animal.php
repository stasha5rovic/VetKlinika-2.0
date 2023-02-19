<?php

class Animal{

    protected int $id;
    protected string $animalType;
    protected string $animalName;
    protected string $dob;
    protected float $weight;

    public function __construct($id, $animalType, $animalName, $dob, $weight)
    {
        $this->id = $id;
        $this->animalType = $animalType;
        $this->animalName = $animalName;
        $this->dob = $dob;
        $this->weight = $weight;
    }




    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function setDob(string $dob)
    {
        $this->dob = $dob;
    }
    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight(string $weight)
    {
        $this->weight = $weight;
    }

    public function getAnimalName()
    {
        return $this->animalName;
    }

    public function setAnimalName(string $animalName)
    {
        $this->animalName = $animalName;
    }

    public function getAnimalType()
    {
        return $this->animalType;
    }

    public function setAnimalType(string $animalType)
    {
        $this->animalType = $animalType;
    }
 
}



?>