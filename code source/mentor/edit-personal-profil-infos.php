<?php
session_name('mentor');
session_start();
include("connect.php");

// Get the mentor's ID
$mentor_id = $_SESSION['mentor_id'];

// Define the variables
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$introduction = filter_input(INPUT_POST, 'introduction', FILTER_SANITIZE_STRING);
$about_me = filter_input(INPUT_POST, 'about_me', FILTER_SANITIZE_STRING);
$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
$how_it_works = filter_input(INPUT_POST, 'how_it_works', FILTER_SANITIZE_STRING);
$why_choose_me = filter_input(INPUT_POST, 'why_choose_me', FILTER_SANITIZE_STRING);
$what_you_will_learn = filter_input(INPUT_POST, 'what_you_will_learn', FILTER_SANITIZE_STRING);

$session_image = isset($_FILES['session_image']) ? $_FILES['session_image'] : null;
$session_image_old_path = $_SESSION['session_image_path'];
// Check if the input file is empty
if (empty($_FILES['session_image']['tmp_name'])) {
    // The input file is empty, so keep the old session image
    $session_image_path = $_SESSION['session_image_path'];
} else {
    // The input file is not empty, so upload the new image and update the session image path
    $target_dir = "session_images/";
    $target_file = $target_dir . basename($_FILES["session_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid file
    if ($_FILES["session_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, PNG, and JPEG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["session_image"]["tmp_name"], $target_file)) {
            $timestamp = time();
            $random_number = rand(1, 10000);
            $session_image_name = "session_image" . $timestamp . $random_number . "." . $imageFileType;
            $session_image_path = $target_dir . $session_image_name;
            // Delete the old session image file
            unlink($session_image_old_path);
            // Rename the uploaded picture
            if (!rename($target_file, $session_image_path)) {
                echo "Sorry, there was an error uploading your file.";
                // exit();
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Update the mentor table with the new image path
$sql = "UPDATE mentor SET title = :title, introduction = :introduction, about_me = :about_me, position = :position,
how_it_works = :how_it_works, why_choose_me = :why_choose_me, what_you_will_learn = :what_you_will_learn,
session_image_path = :session_image_path WHERE mentor_id = :mentor_id";

try {
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':mentor_id', $mentor_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':introduction', $introduction);
    $stmt->bindParam(':about_me', $about_me);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':how_it_works', $how_it_works);
    $stmt->bindParam(':why_choose_me', $why_choose_me);
    $stmt->bindParam(':what_you_will_learn', $what_you_will_learn);
    $stmt->bindParam(':session_image_path', $session_image_path);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {

       
        // Redirect the user to the next page
        header("Location: profile.php");
    } else {
        $message = 'Something went wrong. Please try again.';
        $_SESSION['message'] = $message;
        echo 'Something went wrong. Please try again.';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$db = null;
?>