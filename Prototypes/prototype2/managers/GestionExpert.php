<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entity/expert.php');
// if (file_exists('./Entitys/projet.php')) {
//     include './Entitys/projet.php';
// } elseif (file_exists('../Entitys/projet.php')) {
//     include '../Entitys/projet.php';
// } else {
//     // Neither file exists, so handle the error here
//     echo "Error: projet.php not found in either directory.";
// }
class GestionExpert
{
    private $Connection = null;

    private function getConnection()
    {
        if (is_null($this->Connection)) {
            $this->Connection = mysqli_connect('localhost', 'root', '', 'prototype-fil-rouge');
            // Check if the connection to the database is successful
            if (!$this->Connection) {
                $message = 'Connection error: ' . mysqli_connect_error();
                throw new Exception($message);
            }
        }
        return $this->Connection;
    }

    public function Ajouter($expert)
    {
        $name = $expert->getName();
        $expertise = $expert->getExpertise();
        $email = $expert->getEmail();
        $phone = $expert->getPhone();
        $location = $expert->getLocation();
        // SQL query
        $sql = "INSERT INTO expert (name, expertise, email, phone, location) VALUES ('$name', '$expertise', '$email', '$phone', '$location')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherTous()
    {
        $sql = 'SELECT expert_id, name, expertise, email, phone, location FROM expert';
        $query = mysqli_query($this->getConnection(), $sql);
        $experts_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $experts = array();
        foreach ($experts_data as $expert_data) {
            $expert = new Expert();
            $expert->setId($expert_data['expert_id']);
            $expert->setName($expert_data['name']);
            $expert->setExpertise($expert_data['expertise']);
            $expert->setEmail($expert_data['email']);
            $expert->setPhone($expert_data['phone']);
            $expert->setLocation($expert_data['location']);
            array_push($experts, $expert);
        }
        return $experts;
    }

    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM expert WHERE expert_id = $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Retrieve a single result row as an associative array
        $expert_data = mysqli_fetch_assoc($result);
        $expert = new Expert();
        $expert->setId($expert_data['expert_id']);
        $expert->setName($expert_data['name']);
        $expert->setExpertise($expert_data['expertise']);
        $expert->setEmail($expert_data['email']);
        $expert->setPhone($expert_data['phone']);
        $expert->setLocation($expert_data['location']);
        return $expert;
    }

    public function Supprimer($id)
    {
        $sql = "DELETE FROM expert WHERE expert_id = '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($id, $name, $expertise, $email, $phone, $location)
    {
        // SQL query
        $sql = "UPDATE expert SET 
        name = '$name', expertise = '$expertise', email = '$email', phone = '$phone', location = '$location'
        WHERE expert_id = $id";
        mysqli_query($this->getConnection(), $sql);
        // Check for errors
        if (mysqli_error($this->getConnection())) {
            $msg = 'Error: ' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }
}

?>