<?php 
class Credential {
    private $credential_id;
    private $expert_id;
    private $degree;
    private $institution;
    private $year;

    public function getCredentialId() {
        return $this->credential_id;
    }

    public function setCredentialId($credential_id) {
        $this->credential_id = $credential_id;
    }

    public function getExpertId() {
        return $this->expert_id;
    }

    public function setExpertId($expert_id) {
        $this->expert_id = $expert_id;
    }

    public function getDegree() {
        return $this->degree;
    }

    public function setDegree($degree) {
        $this->degree = $degree;
    }

    public function getInstitution() {
        return $this->institution;
    }

    public function setInstitution($institution) {
        $this->institution = $institution;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }
}
?>