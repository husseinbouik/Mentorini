<?php
session_name('mentor');
session_start();
include("connect.php");
// Connect to the database
// Get the mentor ID from the URL
$mentorId = $_GET['mentorId'];

// Get the start time and end time from the form
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];

// Get the days of the week that the mentor is available
$days = $_POST['days'];

// Update the availability infos in the database
$sql = 'UPDATE availability SET startTime = ?, endTime = ?, days = ? WHERE mentorId = ?';
$stmt = $db->prepare($sql);
$stmt->execute([$startTime, $endTime, getDays($days), $mentorId]);

// Display a success message
echo 'Availability infos successfully updated!';

// Close the database connection
$db = null;

?>

?>