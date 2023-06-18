<?php
session_name('mentor');
session_start();
include("connect.php");

// Get the mentor's ID
$mentor_id = $_SESSION['mentor_id'];

// Get the credential ID
$credential_id = $_GET['credential_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$link = $_POST['link'];

// handle file upload
if (!empty($_FILES['file']['name'])) {
    $sql = "SELECT file_path FROM Credentials WHERE credential_id = :credential_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':credential_id', $credential_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $old_file_path = $result['file_path'];

    // Handle file upload
    $target_dir = "credentials_uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Generate unique filename based on current timestamp
    $timestamp = round(microtime(true) * 1000); // get current timestamp in milliseconds
    $file_ext = pathinfo($target_file, PATHINFO_EXTENSION); // get file extension
    $new_file_name = $timestamp . '.' . $file_ext; // generate unique filename
    $new_target_file = $target_dir . $new_file_name; // set new target file path with unique filename

    move_uploaded_file($_FILES["file"]["tmp_name"], $new_target_file);
    $file_path = $new_target_file;

    // Update the record in the database
    $sql = "UPDATE Credentials SET
                title = :title,
                description = :description,
                start_date = :start_date,
                end_date = :end_date,
                file_path = :file_path,
                link = :link
            WHERE mentor_id = :mentor_id AND credential_id = :credential_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':mentor_id', $mentor_id);
    $stmt->bindParam(':credential_id', $credential_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->bindParam(':file_path', $file_path);
    $stmt->bindParam(':link', $link);
    $stmt->execute();

    // Delete the old file
    unlink($old_file_path);
} else {
    $file_path = $_POST['file_path'];

    // Update the record in the database
    $sql = "UPDATE Credentials SET
                title = :title,
                description = :description,
                start_date = :start_date,
                end_date = :end_date,
                link = :link
            WHERE mentor_id = :mentor_id AND credential_id = :credential_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':mentor_id', $mentor_id);
    $stmt->bindParam(':credential_id', $credential_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->bindParam(':link', $link);
}
if ($stmt->execute()) {
echo "Credential updated successfully.";
    // Redirect the user to the home page
    header("Location:personal-infos-part2.php");
} else {
echo "Error: " . $stmt->errorInfo()[2];
}

// close database connection
$db = null;
?>