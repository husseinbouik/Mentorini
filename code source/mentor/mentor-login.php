<?php 
session_name('mentor');
session_start();

include "connect.php";

$email = $_POST['Email'];
$password = $_POST['Password'];

$sql = "SELECT * FROM mentee WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$mentee = $stmt->fetch(PDO::FETCH_ASSOC);
if ($mentee) {
    if (password_verify($password, $mentee['password'])) {
        $_SESSION['mentee_id'] = $mentee['mentee_id'];
        $_SESSION['first_name'] = $mentee['first_name'];
        $_SESSION['last_name'] = $mentee['last_name'];
        $_SESSION['email'] = $mentee['email'];
        $_SESSION['image_path'] = $mentee['image_path'];

        header("Location: homepage.php");
        exit;
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header("Location: homepage.php");
    }
} else {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: homepage.php");
}
