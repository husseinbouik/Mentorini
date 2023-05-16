<?php

if (file_exists('./managers/GestionCredentials.php')) {
	include './managers/GestionCredentials.php';
} elseif (file_exists('../managers/GestionCredentials.php')) {
	include '../managers/GestionCredentials.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}
include_once '../Entity/credentials.php';

$expert_id = $_GET['Id_Expert'];
// $credential_id = $_GET['Credential_ID'];

// Find all credentials from the database
$GestionCredentials = new GestionCredentials();
$credentials = $GestionCredentials->RechercherCredentialsParExpertId($expert_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $credential = new Credential();
    // $credential->setCredentialId();
    $credential->setExpertId($_POST['expert_id']);
    $credential->setDegree($_POST['degree']);
    $credential->setInstitution($_POST['institution']);
    $credential->setYear($_POST['year']);
    $GestionCredentials->AjouterCredential($credential);

    // Redirect to the credentials.php page
    header("Location: credentials.php?Id_Expert=" . $expert_id);
    exit();
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

  <title>Gestion des credentials</title>

</head>

<body>

  <h1 class="text-center">Ajouter un Credential</h1>

  <form method="post" action="">
    <div class="input-group mb-3">
      <label for="expert_id">Expert ID</label>
      <input type="hidden" required="required" class="form-control" id="expert_id" name="expert_id" placeholder="Expert ID" value="<?php echo $expert_id ?>">
    </div>
    <div class="input-group mb-3">
      <label for="degree">Diplôme</label>
      <input type="text" required="required" class="form-control" id="degree" name="degree" placeholder="Diplôme">
    </div>
    <div class="input-group mb-3">
      <label for="institution">Institution</label>
      <input type="text" required="required" class="form-control" id="institution" name="institution" placeholder="Institution">
    </div>
    <div class="input-group mb-3">
      <label for="year">Année</label>
      <input type="text" required="required" class="form-control" id="year" name="year" placeholder="Année">
    </div>


    <div>
      <button class="btn btn-primary" type="submit">Ajouter</button>
      <a class="btn btn-info" href="../index.php">Annuler</a>
    </div>
  </form>
</body>

</html>
