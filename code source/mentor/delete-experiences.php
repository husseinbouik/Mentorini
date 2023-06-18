<?php

session_name('mentor');
session_start();
include("connect.php");

// Get the mentor's ID
$mentor_id = $_SESSION['mentor_id'];

// Get the credential ID
$experience_id = $_GET['experience_id'];

// Delete the credential from the database
$sql = "DELETE FROM Experiences WHERE experience_id = :experience_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':experience_id', $experience_id);
$stmt->execute();

// Check if the credential was deleted successfully
if ($stmt->rowCount() > 0) {
    echo "Experience deleted successfully.";
    // Redirect the user to the home page
    header("Location:personal-infos-part2.php");
} else {
    echo "Error deleting credential: " . $stmt->errorInfo()[2];
}

// close database connection
$db = null;
?>