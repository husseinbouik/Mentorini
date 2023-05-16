<?php

// include "../managers/GestionExpert.php";

if (file_exists('./managers/GestionExpert.php')) {
	include './managers/GestionExpert.php';
} elseif (file_exists('../managers/GestionExpert.php')) {
	include '../managers/GestionExpert.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

// Trouver tous les employés depuis la base de données 

$gestionExpert = new GestionExpert();
$experts = $gestionExpert->RechercherTous();

if (!empty($_POST)) {
	$expert = new Expert();
	$expert->setName($_POST['name']);
	$expert->setExpertise($_POST['expertise']);
	$expert->setEmail($_POST['email']);
	$expert->setPhone($_POST['phone']);
	$expert->setLocation($_POST['location']);
	$gestionExpert->Ajouter($expert);

	// Redirection to index.php
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
			<label for="name">Name</label>
			<input type="text" required="required" id="name" name="name" placeholder="Name">
		</div>
		<div>
			<label for="expertise">Expertise</label>
			<input type="text" required="required" id="expertise" name="expertise" placeholder="Expertise">
		</div>
		<div>
			<label for="email">Email</label>
			<input type="email" required="required" id="email" name="email" placeholder="Email">
		</div>
		<div>
			<label for="phone">Phone</label>
			<input type="text" required="required" id="phone" name="phone" placeholder="Phone">
		</div>
		<div>
			<label for="location">Location</label>
			<input type="text" required="required" id="location" name="location" placeholder="Location">
		</div>

		<div>
			<button type="submit">Ajouter</button>
			<a href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>