<?php

if (file_exists('./Entitys/projet.php')) {
    include './Entitys/projet.php';
} elseif (file_exists('../Entitys/projet.php')) {
    include '../Entitys/projet.php';
} else {
    // Neither file exists, so handle the error here
    echo "Error: projet.php not found in either directory.";
}
class GestionProject
{
    private $Connection = Null;

    private function getConnection()
    {
        if (is_null($this->Connection)) {
            $this->Connection = mysqli_connect('localhost', 'root', '', 'prototype-fil-rouge');
            // Vérifier l'ouverture de la connexion avec la base de données
            if (!$this->Connection) {
                $message = 'Erreur de connexion: ' . mysqli_connect_error();
                throw new Exception($message);
            }
        }
        return $this->Connection;
    }

    public function Ajouter($project)
    {
        $Name = $project->getNom();
        $Description = $project->getDescription();
        // requête SQL
        $sql = "INSERT INTO `project`(`name`, `description`) VALUES ('$Name','$Description')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherTous()
    {
        $sql = 'SELECT Id_Project, name, description FROM project';
        $query = mysqli_query($this->getConnection(), $sql);
        $projects_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $projects = array();
        foreach ($projects_data as $project_data) {
            $project = new project();
            $project->setId($project_data['Id_Project']);
            $project->setNom($project_data['name']);
            $project->setDescription($project_data['description']);
            array_push($projects, $project);
        }
        return $projects;
    }

    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM project WHERE Id_Project= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $project_data = mysqli_fetch_assoc($result);
        $project = new Project();
        $project->setId($project_data['Id_Project']);
        $project->setNom($project_data['name']);
        $project->setDescription($project_data['description']);
        return $project;
    }

    public function Supprimer($id)
    {
        $sql = "DELETE FROM project WHERE Id_Project= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($id, $name, $description)
    {
        // Requête SQL
        $sql = "UPDATE project SET 
        name='$name', description='$description'
        WHERE Id_Project= $id";
        //  
        mysqli_query($this->getConnection(), $sql);
        //
        if (mysqli_error($this->getConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }

}
?>