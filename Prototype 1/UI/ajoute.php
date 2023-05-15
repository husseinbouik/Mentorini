<?php

// include "../managers/GestionProject.php";

if (file_exists('./managers/GestionProject.php')) {
	include './managers/GestionProject.php';
} elseif (file_exists('../managers/GestionProject.php')) {
	include '../managers/GestionProject.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

// Trouver tous les employés depuis la base de données 
$gestionProject = new GestionProject();
$projects = $gestionProject->RechercherTous();

if (!empty($_POST)) {
	$project = new  project();
	$project->setId($_POST['Id_Project']);
	$project->setNom($_POST['name']);
	$project->setDescription($_POST['description']);
	$gestionProject->Ajouter($project);

	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style/file.css">
	<title>Gestion des projets</title>

</head>

<body>

	<h1>Ajouter un projets</h1>

	<form method="post" action="">
		<div>
			<label for="Nom">Nom</label>
			<input type="text" required="required" id="name" name="name" placeholder="Nom">
		</div>
		<div>
			<label for="description">Description</label>
			<input type="text" required="required" id="description" name="description" placeholder="Description">
		</div>

		<div>
			<button type="submit">Ajouter</button>
			<a href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>