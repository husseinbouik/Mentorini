<?php
if (file_exists('./managers/GestionExpert.php')) {
	include './managers/GestionExpert.php';
} elseif (file_exists('../managers/GestionExpert.php')) {
	include '../managers/GestionExpert.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

if (isset($_GET['Id_Expert'])) {
    // Find the expert ID from the database
    $gestionExpert = new GestionExpert();
    $id = $_GET['Id_Expert'];
    $gestionExpert->Supprimer($id);

    header('Location: ../index.php');
}

?>