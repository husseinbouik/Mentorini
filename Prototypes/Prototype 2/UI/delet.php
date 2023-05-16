<?php
if (file_exists('./managers/GestionExpert.php')) {
	include './managers/GestionExpert.php';
} elseif (file_exists('../managers/GestionExpert.php')) {
	include '../managers/GestionExpert.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

if(isset($_GET['Id_Project'])){

    // Trouver tous les employés depuis la base de données 
    $GestionExpert= new GestionExpert();
    $id = $_GET['Id_Project'] ;
    $GestionExpert->Supprimer($id);
        
    header('Location: ../index.php');
}
?>