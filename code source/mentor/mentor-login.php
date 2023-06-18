<?php
session_name('mentor');
session_start();

include "connect.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM mentor WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$mentor = $stmt->fetch(PDO::FETCH_ASSOC);
if ($mentor) {
    if (password_verify($password, $mentor['password'])) {
        // Check if all of the mentor's columns are filled
        $empty_columns = array();
        foreach ($mentor as $key => $value) {
            if (empty($value)) {
                $empty_columns[] = $key;
            }
        }

        // If there are any empty columns, redirect to the index.php page
        if (!empty($empty_columns)) {
            $_SESSION['mentor_id'] = $mentor['mentor_id'];
            $_SESSION['first_name'] = $mentor['first_name'];
            $_SESSION['last_name'] = $mentor['last_name'];
            $_SESSION['email'] = $mentor['email'];
            $_SESSION['image_path'] = $mentor['image_path'];
            header("Location: personal-infos.php");
            exit;
        }else {
            $_SESSION['mentor_id'] = $mentor['mentor_id'];
            $_SESSION['first_name'] = $mentor['first_name'];
            $_SESSION['last_name'] = $mentor['last_name'];
            $_SESSION['email'] = $mentor['email'];
            $_SESSION['image_path'] = $mentor['image_path'];
            header("Location:table.php"); 
        }

        // Redirect to the personal-infos.php page
        $_SESSION['mentor_id'] = $mentor['mentor_id'];
        $_SESSION['first_name'] = $mentor['first_name'];
        $_SESSION['last_name'] = $mentor['last_name'];
        $_SESSION['email'] = $mentor['email'];
        $_SESSION['image_path'] = $mentor['image_path'];

        
        exit;
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header("Location: signIn-mentor.php");
    }
} else {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: signIn-mentor.php");
}