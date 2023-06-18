<?php
session_name('mentor');
session_start();
include("connect.php");
// Connect to the database
// Get the start time and end time from the form
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];

// Get the days of the week that the mentor is available
$days = explode(',', $_POST['days']);

// Insert the availability infos into the database
$sql = 'INSERT INTO availability (start_time, end_time, availability_days, mentor_id) VALUES (?, ?, ?, ?)';
$stmt = $db->prepare($sql);
$stmt->execute([$startTime, $endTime, join(',', $days), $_SESSION['mentor_id']]);
// header("Location:personal-infos-part2.php");

// Close the database connection
$db = null;

?>