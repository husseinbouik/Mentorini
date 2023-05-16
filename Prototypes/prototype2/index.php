<?php

include "./managers/GestionExpert.php";

// Retrieve all experts from the database
$gestionExpert = new GestionExpert();
$experts = $gestionExpert->RechercherTous();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./UI/style/file.css">

  <title>Gestion des experts</title>
</head>

<body>
  <div class="container">
    <h1 class="text-center">Gestion des experts</h1>
    <a href="./UI/addExpert.php" class="btn btn-primary">Ajouter un expert</a>
    <table class="table">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Expertise</th>
          <th>Email</th>
          <th>Téléphone</th>
          <th>Lieu</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($experts as $expert) {
          ?>
          <tr>
            <td><?= $expert->getName() ?></td>
            <td><?= $expert->getExpertise() ?></td>
            <td><?= $expert->getEmail() ?></td>
            <td><?= $expert->getPhone() ?></td>
            <td><?= $expert->getLocation() ?></td>
            <td>
              <a href="./UI/credentials.php?Id_Expert=<?php echo $expert->getId() ?>">view</a>
              <a href="./UI/edit.php?Id_Expert=<?php echo $expert->getId() ?>">Edit</a>
              <a href="./UI/delet.php?Id_Expert=<?php echo $expert->getId() ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>
