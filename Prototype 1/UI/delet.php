<?php
if (file_exists('./managers/GestionProject.php')) {
	include './managers/GestionProject.php';
} elseif (file_exists('../managers/GestionProject.php')) {
	include '../managers/GestionProject.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

if(isset($_GET['Id_Project'])){

    // Trouver tous les employés depuis la base de données 
    $gestionProject= new GestionProject();
    $id = $_GET['Id_Project'] ;
    $gestionProject->Supprimer($id);
        
    header('Location: ../index.php');
}
?>