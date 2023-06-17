<?php 
session_name('mentee');
session_start();
include("connect.php");

// Define the variables
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['Email'];
$password = $_POST['Password'];
$profile_picture = isset($_FILES['profile_picture']) ? $_FILES['profile_picture'] : null;
$target_dir = "profil_pic/";
$target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a valid file
if(isset($_FILES["profile_picture"])) {
    if($_FILES["profile_picture"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        $timestamp = time();
        $random_number = rand(1, 10000);
        $profile_picture_name = "profile_image" . $timestamp . $random_number . "." . $imageFileType;
        $profile_picture_path = $target_dir . $profile_picture_name;

        // Rename the uploaded picture
        if (!rename($target_file, $profile_picture_path)) {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Mentee (first_name, last_name, email, password, image_path) VALUES (:first_name, :last_name, :email, :password, :image_path)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':image_path', $profile_picture_name);
        $stmt->execute();

        if ($stmt) {
            // header("Location: homepage.php");
        } else {
            $message = 'Something went wrong. Please try again.';
            $_SESSION['message'] = $message;
            header("Location: signUp.php");
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Redirect the user to the homepage
header("Location: signIn-mentee.php");
?>