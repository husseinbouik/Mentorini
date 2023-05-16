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
    <link rel="stylesheet" href="./UI/style/file.css">
    <title>Gestion des experts</title>
</head>

<body>
    <div>
        <a href="./UI/addExpert.php">Ajouter un expert</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Expertise</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($experts as $expert) {
                ?>
                <tr>
                    <td>
                        <?= $expert->getName() ?>
                    </td>
                    <td>
                        <?= $expert->getExpertise() ?>
                    </td>
                    <td>
                        <?= $expert->getEmail() ?>
                    </td>
                    <td>
                        <?= $expert->getPhone() ?>
                    </td>
                    <td>
                        <?= $expert->getLocation() ?>
                    </td>
                    <td>
                        <a href="./UI/edit.php?Id_Expert=<?php echo $expert->getId() ?>">Edit</a>
                        <a href="./UI/delet.php?Id_Expert=<?php echo $expert->getId() ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
