<?php

if (file_exists('./managers/GestionCredentials.php')) {
    include './managers/GestionCredentials.php';
} elseif (file_exists('../managers/GestionCredentials.php')) {
    include '../managers/GestionCredentials.php';
} else {
    // Neither file exists, so handle the error here
    echo "Error: Project.php not found in either directory.";
}
$id_expert = $_GET['Id_expert'];
if (isset($_GET['Credential_ID'])) {

    $GestionCredentials = new GestionCredentials();
    $id_credential = $_GET['Credential_ID'];
    $GestionCredentials->SupprimerCredentialsParExpertId($id_expert,$id_credential);
    header("Location: Credentials.php?Id_Expert=" . $id_expert);
}