<?php
session_name('mentor');
session_start();
include("connect.php");

// Get the mentor's ID
$mentor_id = $_SESSION['mentor_id'];

// get form data
$title = $_POST['title'];
$description = $_POST['description'];
$start_year = $_POST['start_year'];
$end_year = $_POST['end_year'];
$link = $_POST['link'];

// handle file upload
$target_dir = "experiences_uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// generate unique filename based on current timestamp
$timestamp = round(microtime(true) * 1000); // get current timestamp in milliseconds
$file_ext = pathinfo($target_file, PATHINFO_EXTENSION); // get file extension
$new_file_name = $timestamp . '.' . $file_ext; // generate unique filename
$new_target_file = $target_dir . $new_file_name; // set new target file path with unique filename

move_uploaded_file($_FILES["file"]["tmp_name"], $new_target_file);
$file_path = $new_target_file;
// prepare and execute SQL statement to insert data into experiences table
$sql = "INSERT INTO Experiences (mentor_id, title, description, start_year, end_year, file_path, link)
        VALUES (:mentor_id, :title, :description, :start_year, :end_year, :file_path, :link)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':mentor_id', $mentor_id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':start_year', $start_year);
$stmt->bindParam(':end_year', $end_year);
$stmt->bindParam(':file_path', $file_path);
$stmt->bindParam(':link', $link);

if ($stmt->execute()) {
    echo "Experience added successfully.";
    // Redirect the user to the home page
    header("Location:personal-infos-part2.php");
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}

// close database connection
$db = null;
?>