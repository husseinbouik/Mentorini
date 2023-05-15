

<?php


 class project {

    private $Id;
    private $name;
    private $description;


    public function getId() { 
        return $this->Id;
    }
    public function setId($Id) {
        $this->Id =$Id;
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