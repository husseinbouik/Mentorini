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
        $_SESSION['mentor_id'] = $mentor['mentor_id'];
        $_SESSION['first_name'] = $mentor['first_name'];
        $_SESSION['last_name'] = $mentor['last_name'];
        $_SESSION['email'] = $mentor['email'];
        $_SESSION['image_path'] = $mentor['image_path'];

        header("Location: personal-infos.php");
        exit;
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header("Location: signIn-mentor.php");
    }
} else {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: signIn-mentor.php");
}
