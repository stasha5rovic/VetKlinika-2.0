<?php

class Visit{
    protected int $animalID;
    protected int $clientID;
    protected $date;
    protected string $diagnosis;
    protected string $meds;
    

    public function __construct($animalID, $clientID, $date, $diagnosis, $meds)
    {
        $this->animalID = $animalID;
        $this->clientID = $clientID;
        $this->date = $date;
        $this->diagnosis = $diagnosis;
        $this->meds = $meds;
    }


    public function getMeds()
    {
        return $this->meds;
    }

    public function setMeds($meds)
    {
        $this->meds = $meds;
    }

    public function getAnimalID()
    {
        return $this->animalID;
    }

    public function getClientID()
    {
        return $this->clientID;
    }

    public function getDiagnosis()
    {
        return $this->diagnosis;
    }

    public function setDiagnosis($diagnosis)
    {
        $this->diagnosis = $diagnosis;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function __toString()
    {
        return $this->date;
    }


}



?>