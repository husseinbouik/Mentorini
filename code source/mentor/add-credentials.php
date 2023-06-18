<?php
session_name('mentor');
session_start();
include("connect.php");

// Get the mentor's ID
$mentor_id = $_SESSION['mentor_id'];

// get form data
$title = $_POST['title'];
$description = $_POST['description'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$link = $_POST['link'];

// handle file upload
$target_dir = "credentials_uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// generate unique filename based on current timestamp
$timestamp = round(microtime(true) * 1000); // get current timestamp in milliseconds
$file_ext = pathinfo($target_file, PATHINFO_EXTENSION); // get file extension
$new_file_name = $timestamp . '.' . $file_ext; // generate unique filename
$new_target_file = $target_dir . $new_file_name; // set new target file path with unique filename

move_uploaded_file($_FILES["file"]["tmp_name"], $new_target_file);
$file_path = $new_target_file;
// prepare and execute SQL statement to insert data into credentials table
$sql = "INSERT INTO Credentials (mentor_id, title, description, start_date, end_date, file_path, link)
        VALUES (:mentor_id, :title, :description, :start_date, :end_date, :file_path, :link)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':mentor_id', $mentor_id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':start_date', $start_date);
$stmt->bindParam(':end_date', $end_date);
$stmt->bindParam(':file_path', $file_path);
$stmt->bindParam(':link', $link);

if ($stmt->execute()) {
    echo "Credential added successfully.";
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}

// close database connection
$db = null;
?>