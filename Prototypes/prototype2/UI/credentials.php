<?php

include "../managers/GestionCredentials.php";

// Retrieve all experts from the database
$expert_id = $_GET['Id_Expert'];
$gestionCredentials = new GestionCredentials();
$credentials = $gestionCredentials->RechercherCredentialsParExpertId($expert_id);

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
    <h1>Gestion des experts</h1>
    <a href="addCredential.php?Id_Expert=<?php echo $expert_id ?>">Ajouter un Credential</a>
    <table class="table">
      <thead>
        <tr>
          <th>Expert ID</th>
          <th>Diplôme</th>
          <th>Institution</th>
          <th>Année</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($credentials as $credential) {
          ?>
          <tr>
            <td>
              <?= $credential->getExpertId() ?>
            </td>
            <td>
              <?= $credential->getDegree() ?>
            </td>
            <td>
              <?= $credential->getInstitution() ?>
            </td>
            <td>
              <?= $credential->getYear() ?>
            </td>
            <td>
              <a href="editcredential.php?Credential_ID=<?php echo $credential->getCredentialId() ?>&Id_expert=<?php echo $expert_id ?>">Modifier</a>
              <a href="deletecredential.php?Credential_ID=<?php echo $credential->getCredentialId() ?>&Id_expert=<?php echo $expert_id ?>">Supprimer</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <a class="btn btn-info" href="../index.php">Annuler</a>
  </div>
</body>


</html>
