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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./style/file.css">

  <title>Gestion des projets</title>
</head>

<body>

  <h1 class="text-center">Ajouter un projets</h1>

  <form method="post" action="">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" required="required" id="name" name="name" placeholder="Name" class="form-control">
    </div>
    <div class="mb-3">
      <label for="expertise" class="form-label">Expertise</label>
      <input type="text" required="required" id="expertise" name="expertise" placeholder="Expertise" class="form-control">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" required="required" id="email" name="email" placeholder="Email" class="form-control">
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="text" required="required" id="phone" name="phone" placeholder="Phone" class="form-control">
    </div>
    <div class="mb-3">
      <label for="location" class="form-label">Location</label>
      <input type="text" required="required" id="location" name="location" placeholder="Location" class="form-control">
    </div>

    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-primary">Ajouter</button>
      <a href="../index.php">Annuler</a>
    </div>
  </form>
</body>

</html>
