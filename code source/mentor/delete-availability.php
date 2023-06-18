<?php
session_name('mentor');
session_start();
include("connect.php");
// Connect to the database
// Get the availability ID from the URL
$availability_id = $_GET['availability_id'];

// Delete the availability infos from the database
$sql = 'DELETE FROM availability WHERE availability_id = ?';
$stmt = $db->prepare($sql);
$stmt->execute([$availability_id]);

// Display a success message
echo 'Availability infos successfully deleted!';

header("Location: personal-infos-part2.php");
// Close the database connection
$db = null;

?>