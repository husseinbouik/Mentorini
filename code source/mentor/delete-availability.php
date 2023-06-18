<?php
session_name('mentor');
session_start();
include("connect.php");
// Connect to the database
// Get the availability ID from the URL
$availabilityId = $_GET['availabilityId'];

// Delete the availability infos from the database
$sql = 'DELETE FROM availability WHERE availabilityId = ?';
$stmt = $db->prepare($sql);
$stmt->execute([$availabilityId]);

// Display a success message
echo 'Availability infos successfully deleted!';

// Close the database connection
$db = null;

?>