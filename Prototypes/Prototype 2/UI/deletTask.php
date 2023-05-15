<?php

if (file_exists('./managers/GestionTask.php')) {
    include './managers/GestionTask.php';
} elseif (file_exists('../managers/GestionTask.php')) {
    include '../managers/GestionTask.php';
} else {
    // Neither file exists, so handle the error here
    echo "Error: Project.php not found in either directory.";
}
$id_projet = $_GET['Id_projet'];
if (isset($_GET['Id_Task'])) {

    $GestionTask = new GestionTask();
    $id = $_GET['Id_Task'];
    $GestionTask->Supprimer($id);
    header("Location: tasks.php?id=" . $id_projet);
}