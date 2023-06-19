<?php
// start a session and set session variables for the mentor's data
session_name('mentor');
session_start();
require('connect.php');


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    // Check if the current password is correct
    $sql = 'SELECT password FROM mentor WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $password_match = password_verify($current_password, $result['password']);
    if (!$password_match) {
        $false_current_password = 'The current password is incorrect';
        $_SESSION['false_current_password'] = $false_current_password;
        header("Location: profile.php");
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Prepare the SQL query to update data in the mentor table
    $sql = 'UPDATE mentor SET first_name = :first_name, last_name = :last_name, password = :password WHERE email = :email';

    // Bind the form data to the prepared statement
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);

    // Execute the prepared statement
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $success_update = 'Your profile information has been updated successfully.';
        $_SESSION['success_update'] = $success_update;
    } else {
        $message = 'Something went wrong. Please try again.';
        $_SESSION['message'] = $message;
    }

    // Redirect to the profile page
    header('Location: profile.php');
    exit();
}
?>