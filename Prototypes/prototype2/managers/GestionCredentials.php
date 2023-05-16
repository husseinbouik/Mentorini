
<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entity/credentials.php');
class GestionCredentials
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

    public function AjouterCredential($credential)
    {
        $expert_id = $credential->getExpertId();
        $degree = $credential->getDegree();
        $institution = $credential->getInstitution();
        $year = $credential->getYear();
        // SQL query
        $sql = "INSERT INTO credentials (expert_id, degree, institution, year) VALUES ('$expert_id', '$degree', '$institution', '$year')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherCredentialsParExpertId($expert_id)
    {
        $sql = "SELECT * FROM credentials WHERE expert_id = $expert_id";
        $query = mysqli_query($this->getConnection(), $sql);
        $credentials_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $credentials = array();
        foreach ($credentials_data as $credential_data) {
            $credential = new Credential();
            $credential->setCredentialId($credential_data['credential_id']);
            $credential->setExpertId($credential_data['expert_id']);
            $credential->setDegree($credential_data['degree']);
            $credential->setInstitution($credential_data['institution']);
            $credential->setYear($credential_data['year']);
            array_push($credentials, $credential);
        }
        return $credentials;
        // return $credential;
    }

    public function RechercherCredentialParCredentialId($Credential_ID)
    {
        $sql = "SELECT * FROM credentials WHERE credential_id = $Credential_ID";
        $query = mysqli_query($this->getConnection(), $sql);
        $credentials_data = mysqli_fetch_assoc($query);
        $credential = new Credential();
        $credential->setCredentialId($credentials_data['credential_id']);
        $credential->setExpertId($credentials_data['expert_id']);
        $credential->setDegree($credentials_data['degree']);
        $credential->setInstitution($credentials_data['institution']);
        $credential->setYear($credentials_data['year']);
        // return $credentials_data;
        return $credential;
    }

    public function SupprimerCredentialsParExpertId($expert_id)
    {
        $sql = "DELETE FROM credentials WHERE expert_id = '$expert_id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function ModifierCredential($credential_id, $degree, $institution, $year)
    {
        // SQL query
        $sql = "UPDATE credentials SET 
        degree = '$degree', institution = '$institution', year = '$year'
        WHERE credential_id = $credential_id";
        mysqli_query($this->getConnection(), $sql);
        // Check for errors
        if (mysqli_error($this->getConnection())) {
            $msg = 'Error: ' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }
}
?>