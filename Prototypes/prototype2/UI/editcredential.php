<?php
// if (file_exists('./managers/GestionCredentials.php')) {
// 	include './managers/GestionCredentials.php';
// } elseif (file_exists('../managers/GestionCredentials.php')) {
	include '../managers/GestionCredentials.php';
// } else {
// 	// Neither file exists, so handle the error here
// 	echo "Error: Project.php not found in either directory.";
// }

$gestionCredentials = new GestionCredentials();
$Credential_ID = $_GET['Credential_ID'];
// if (isset($_GET['Credential_ID'])) {
    $credential = $gestionCredentials->RechercherCredentialParCredentialId($Credential_ID);
    // $credential = $credentials[0]; // Assuming the query returns only one credential
// }
// echo "<pre>";
// var_dump($credential);
// echo "</pre>";
if (isset($_POST['modifier'])) {
    $id = $_POST['Credential_ID'];
    $degree = $_POST['degree'];
    $institution = $_POST['institution'];
    $year = $_POST['year'];
    $gestionCredentials->ModifierCredential($id, $degree, $institution, $year);
    header('Location: credentials.php?Id_Expert='.$credential->getExpertId());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/file.css">
    <title>Modify: <?= $credential->getExpertId() ?></title>
</head>

<body>
    <h1>Modification of Credential: <?= $credential->getDegree() ?></h1>
    <form method="post" action="">
        <input type="hidden" required="required" name="Credential_ID" value="<?= $credential->getCredentialId() ?>">

        <div>
            <label for="degree">Degree</label>
            <input type="text" required="required" id="degree" name="degree" placeholder="Degree"
                value="<?= $credential->getDegree() ?>">
        </div>

        <div>
            <label for="institution">Institution</label>
            <input type="text" required="required" id="institution" name="institution" placeholder="Institution"
                value="<?= $credential->getInstitution() ?>">
        </div>

        <div>
            <label for="year">Year</label>
            <input type="text" required="required" id="year" name="year" placeholder="Year"
                value="<?= $credential->getYear() ?>">
        </div>

        <div>
            <input name="modifier" type="submit" value="Modify">
            <a href="credentials.php?Id_Expert=<?php echo $credential->getExpertId() ?>">Cancel</a>
        </div>
    </form>
</body>

</html>
