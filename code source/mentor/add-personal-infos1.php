<?php
session_name('mentor');
session_start();
include("connect.php");

// Get the mentor's ID
$mentor_id = $_SESSION['mentor_id'];

// Define the variables
$title = $_POST['address'];
$introduction = $_POST['signature-5'];
$about_me = $_POST['signature-2'];
$position = $_POST['signature-4'];
$how_it_works = $_POST['signature-3'];
$why_choose_me = $_POST['signature-6'];
$what_you_will_learn = $_POST['signature-7'];
$session_image = isset($_FILES['session_image']) ? $_FILES['session_image'] : null;
$target_dir = "session_images/";
$target_file = $target_dir . basename($_FILES["session_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a valid file
if(isset($_FILES["session_image"])) {
    if($_FILES["session_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, PNG, and JPEG files are allowed.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["session_image"]["tmp_name"], $target_file)) {
        $timestamp = time();
        $random_number = rand(1, 10000);
        $session_image_name = "session_image" . $timestamp . $random_number . "." . $imageFileType;
        $session_image_path = $target_dir . $session_image_name;

        // Rename the uploaded picture
        if (!rename($target_file, $session_image_path)) {
            echo "Sorry, there was an error uploading your file.";
            // exit();
        }

        // Update the existing row in the mentor table for the mentor
        $sql = "UPDATE mentor SET title = COALESCE(:title, title), introduction = COALESCE(:introduction, introduction), about_me = COALESCE(:about_me, about_me), position = COALESCE(:position, position), how_it_works = COALESCE(:how_it_works, how_it_works), why_choose_me = COALESCE(:why_choose_me, why_choose_me), what_you_will_learn = COALESCE(:what_you_will_learn, what_you_will_learn), session_image_path = COALESCE(:session_image_name, session_image_path) WHERE mentor_id = :mentor_id AND (title IS NULL OR introduction IS NULL OR about_me IS NULL OR position IS NULL OR how_it_works IS NULL OR why_choose_me IS NULL OR what_you_will_learn IS NULL OR session_image_path IS NULL)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':mentor_id', $mentor_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':introduction', $introduction);
        $stmt->bindParam(':about_me', $about_me);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':how_it_works', $how_it_works);
        $stmt->bindParam(':why_choose_me', $why_choose_me);
        $stmt->bindParam(':what_you_will_learn', $what_you_will_learn);
        $stmt->bindParam(':session_image_name', $session_image_name);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Redirect the user to the next page
            header("Location: personal-infos-part2.php");
        } else {
            $message = 'Something went wrong. Please try again.';
            $_SESSION['message'] = $message;
            echo 'Something went wrong. Please try again.';
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>