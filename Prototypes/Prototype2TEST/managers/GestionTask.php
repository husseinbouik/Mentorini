<?php
if (file_exists('./Entitys/Task.php')) {
    include './Entitys/Task.php';
} elseif (file_exists('../Entitys/Task.php')) {
    include '../Entitys/Task.php';
} else {
    // Neither file exists, so handle the error here
    echo "Error: Task.php not found in either directory.";
}

class GestionTask
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

    public function Ajouter($task)
    {
        $id = $task->getId();
        $Name = $task->getNom();
        $Description = $task->getDescription();
        // requête SQL
        $sql = "INSERT INTO `task`(`name`, `description`, `Id_Project`) VALUES ('$Name','$Description','$id')";
        mysqli_query($this->getConnection(), $sql);
    }

    public function RechercherTous($id)
    {
        $sql = "SELECT * FROM task WHERE Id_Project=$id";
        $query = mysqli_query($this->getConnection(), $sql);
        $tasks_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $tasks = array();
        foreach ($tasks_data as $task_data) {
            $task = new Task();
            $task->setId($task_data['Id_Task']);
            $task->setNom($task_data['name']);
            $task->setDescription($task_data['description']);
            array_push($tasks, $task);
        }
        return $tasks;
    }

    public function RechercherParId($id)
    {
        $sql = "SELECT * FROM task WHERE Id_Task= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $task_data = mysqli_fetch_assoc($result);
        $task = new Task();
        $task->setId($task_data['Id_Task']);
        $task->setNom($task_data['name']);
        $task->setDescription($task_data['description']);
        return $task;
    }

    public function Supprimer($id)
    {
        $sql = "DELETE FROM task WHERE Id_Task= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($id, $name, $description)
    {
        // Requête SQL
        $sql = "UPDATE task SET 
        name='$name', description='$description'
        WHERE Id_Task= $id";
        //  
        mysqli_query($this->getConnection(), $sql);
        //
        if (mysqli_error($this->getConnection())) {
            $msg = 'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg);
        }
    }
}
