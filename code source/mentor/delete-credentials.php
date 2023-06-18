<?php

session_name('mentor');
session_start();
include("connect.php");

// Get the mentor's ID
$mentor_id = $_SESSION['mentor_id'];

// Get the credential ID
$credential_id = $_GET['credential_id'];

// Delete the credential from the database
$sql = "DELETE FROM Credentials WHERE credential_id = :credential_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':credential_id', $credential_id);
$stmt->execute();

// Check if the credential was deleted successfully
if ($stmt->rowCount() > 0) {
    echo "Credential deleted successfully.";
    // Redirect the user to the home page
    header("Location:personal-infos-part2.php");
} else {
    echo "Error deleting credential: " . $stmt->errorInfo()[2];
}

// close database connection
$db = null;
?>