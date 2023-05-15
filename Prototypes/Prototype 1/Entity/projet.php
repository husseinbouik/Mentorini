

<?php

 class project {

    private $Id_Project;
    private $name;
    private $description;


    public function getId() { 
        return $this->Id_Project;
    }
    public function setId($Id_Project) {
        $this->Id_Project =$Id_Project;
    }

    public function getNom() {
        return $this->name;
    }
    public function setNom($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }
  
    public function setDescription($description) {
        $this->description = $description;
    }

 
















}










?>