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
    <link rel="stylesheet" href="./UI/style/file.css">
    <title>Gestion des experts</title>
</head>

<body>
    <div>
        <a href="addCredential.php?Id_Expert=<?php echo $expert_id ?>">Add a Credential</a>
        <table>
            <tr>
                <th>Expert ID</th>
                <th>Degree</th>
                <th>Institution</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
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
                        <a href="editcredential.php?Credential_ID=<?php echo $credential->getCredentialId() ?>&Id_expert=<?php echo $expert_id ?>">Edit</a>
                        <a href="deletecredential.php?Credential_ID=<?php echo $credential->getCredentialId() ?>&Id_expert=<?php echo $expert_id ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a class="btn btn-info" href="../index.php">Annuler</a>
    </div>
</body>


</html>
