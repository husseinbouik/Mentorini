<?php

// include "GestionProject.php";

if (file_exists('./managers/GestionProject.php')) {
	include './managers/GestionProject.php';
} elseif (file_exists('../managers/GestionProject.php')) {
	include '../managers/GestionProject.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}

$gestionProject = new GestionProject();

if(isset($_GET['Id_Project'])){
    $project = $gestionProject->RechercherParId($_GET['Id_Project']);
}

if(isset($_POST['modifier'])){
    $id = $_POST['Id_Project'];
    $nom = $_POST['name'];
    $description = $_POST['description'];
    $gestionProject->Modifier($id,$nom,$description);
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/file.css">
    <title>Modifier : </title>
</head>
<body>

<h1>Modification de Projet : <?=$project->getNom() ?></h1>
<form method="post" action="">
    <input type="text" required="required" 
        id="Id" name="Id_Project"   
        value=<?php echo $project->getId()?> >

    <div>
        <label for="Nom">Nom</label>
        <input type="text" required="required" 
        id="Nom" name="name"  placeholder="Nom" 
        value=<?php echo $project->getNom()?> >
    </div>
  
    <div>
        <label for="description">description</label>
        <input type="text" required="required"  
        id="description"  name="description" placeholder="description"
        value=<?php echo $project->getDescription()?>>
    </div>
    <div>
        <input name="modifier" type="submit" value="Modifier">
        <a href="../index.php">Annuler</a>
    </div>
</form>
</body>
</html>