<?php

 


if (file_exists('./managers/GestionTask.php')) {
	include './managers/GestionTask.php';
} elseif (file_exists('../managers/GestionTask.php')) {
	include '../managers/GestionTask.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}
$id = $_GET['id'];
// Trouver tous les employés depuis la base de données 
$GestionTask = new GestionTask();
$tasks = $GestionTask->RechercherTous($id);

if (!empty($_POST)) {
	$task = new  Task();
	$task->setId($id);
	$task->setNom($_POST['name']);
	$task->setDescription($_POST['description']);
	$GestionTask->Ajouter($task);
	// Redirection vers la page index.php
	header("Location: tasks.php?id=".$id);
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

	<title>Gestion des tasks</title>

</head>

<body>

	<h1 class="text-center">Ajouter un Task</h1>

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
			<button   class="btn btn-primary" type="submit" >Ajouter</button>
			<a   class="btn btn-info" href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>