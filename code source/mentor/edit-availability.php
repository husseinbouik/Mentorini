<?php
session_name('mentor');
session_start();
include("connect.php");
// Connect to the database
// Get the mentor ID from the URL
$mentorId = $_SESSION['mentor_id'];

// Get the start time and end time from the form
$startTime = $_POST['start_time'];
$endTime = $_POST['end_time'];

// Get the days of the week that the mentor is available
$days = explode(',', $_POST['days']);

// Update the availability infos in the database
$sql = 'UPDATE availability SET start_time = ?, end_time = ?, availability_days = ? WHERE mentor_id = ?';
$stmt = $db->prepare($sql);
$stmt->execute([$startTime, $endTime, join(',', $days), $mentorId]);

// Display a success message
echo 'Availability infos successfully updated!';

header("Location: personal-infos-part2.php");

// Close the database connection
$db = null;

?>

?>