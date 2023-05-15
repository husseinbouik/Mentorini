<?php
include "./managers/GestionProject.php";
// Trouver tous les employés depuis la base de données 
$GestionProject = new GestionProject();
$projects = $GestionProject->RechercherTous();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./UI/style/file.css">
    <title>Gestion des employés</title>
</head>

<body>
    <div>
        <a href="./UI/Ajoute.php">Ajouter un project</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($projects as $project) {
                ?>
                <tr>
                    <td>
                        <?= $project->getNom() ?>
                    </td>
                    <td>
                        <?= $project->getDescription() ?>
                    </td>
                    <td>
                        <a href="./UI/edit.php?Id_Project=<?php echo $project->getId() ?>">Éditer</a>
                        <a href="./UI/delet.php?Id_Project=<?php echo $project->getId() ?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>