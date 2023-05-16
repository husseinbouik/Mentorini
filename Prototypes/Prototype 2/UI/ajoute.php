<?php


if (file_exists('./managers/GestionExpert.php')) {
	include './managers/GestionExpert.php';
} elseif (file_exists('../managers/GestionExpert.php')) {
	include '../managers/GestionExpert.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

// Trouver tous les employés depuis la base de données 
$GestionExpert = new GestionExpert();
$projects = $GestionExpert->RechercherTous();

if (!empty($_POST)) {
	$project = new  project();
	$project->setId($_POST['Id_Project']);
	$project->setNom($_POST['name']);
	$project->setDescription($_POST['description']);
	$GestionExpert->Ajouter($project);

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

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./style/file.css">



	<title>Gestion des projets</title>



</head>

<body>

	<h1 class="text-center">Ajouter un projets</h1>

	<form method="post" action="">
		<div class="input-group mb-3">
			<label for="Nom">Nom</label>
			<input type="text" required="required" class="form-control" id="name" name="name" placeholder="Nom">
		</div>
		<div class="input-group mb-3">
			<label for="description">Description</label>
			<input type="text" required="required" class="form-control" id="description" name="description" placeholder="Description">
		</div>

		<div>
			<button class="btn btn-primary" type="submit" >Ajouter</button>
			<a class="btn btn-info" href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>