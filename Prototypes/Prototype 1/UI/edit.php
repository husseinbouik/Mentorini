<?php

// include "GestionExpert.php";

if (file_exists('./managers/GestionExpert.php')) {
	include './managers/GestionExpert.php';
} elseif (file_exists('../managers/GestionExpert.php')) {
	include '../managers/GestionExpert.php';
} else {
	// Neither file exists, so handle the error here
	echo "Error: Project.php not found in either directory.";
}


$gestionExpert = new GestionExpert();

if (isset($_GET['Id_Expert'])) {
    $expert = $gestionExpert->RechercherParId($_GET['Id_Expert']);
}

if (isset($_POST['modifier'])) {
    $id = $_POST['Id_Expert'];
    $nom = $_POST['name'];
    $expertise = $_POST['expertise'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $gestionExpert->Modifier($id, $nom, $expertise, $email, $phone, $location);
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
    <title>Modifier : <?=$expert->getName()?></title>
</head>

<body>

    <h1>Modification de l'Expert : <?=$expert->getName()?></h1>
    <form method="post" action="">
        <input type="text" required="required"
            id="Id" name="Id_Expert"
            value="<?php echo $expert->getId()?>">

        <div>
            <label for="name">Name</label>
            <input type="text" required="required"
            id="name" name="name"  placeholder="Name"
            value="<?php echo $expert->getName()?> ">
        </div>
      
        <div>
            <label for="expertise">Expertise</label>
            <input type="text" required="required"
            id="expertise" name="expertise" placeholder="Expertise"
            value="<?php echo $expert->getExpertise()?>">
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" required="required"
            id="email" name="email" placeholder="Email"
            value="<?php echo $expert->getEmail()?>">
        </div>

        <div>
            <label for="phone">Phone</label>
            <input type="text" required="required"
            id="phone" name="phone" placeholder="Phone"
            value="<?php echo $expert->getPhone()?>">
        </div>

        <div>
            <label for="location">Location</label>
            <input type="text" required="required"
            id="location" name="location" placeholder="Location"
            value="<?php echo $expert->getLocation()?>">
        </div>

        <div>
            <input name="modifier" type="submit" value="Modifier">
            <a href="../index.php">Annuler</a>
        </div>
    </form>
</body>

</html>