

<?php
class Expert {
    private $expert_id;
    private $name;
    private $expertise;
    private $email;
    private $phone;
    private $location;

    public function getId() {
        return $this->expert_id;
    }

    public function setId($expert_id) {
        $this->expert_id = $expert_id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getExpertise() {
        return $this->expertise;
    }

    public function setExpertise($expertise) {
        $this->expertise = $expertise;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }
}
?>