<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Connect to the database
    $db = new PDO('mysql:host=localhost;dbname=trainingcenter', 'root', '');

    // Check if the current password is correct
    $sql = 'SELECT password FROM Mentee WHERE email = :email';
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
    } else {
        // Update the profile picture if a new one was uploaded
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
            $image_path = 'profile_pic/' . $_FILES['profile_pic']['name'];
            move_uploaded_file($_FILES['profile_pic']['tmp_name'], $image_path);
            // Delete the old profile picture if it exists
            if (!empty($image_path)) {
                unlink($_SESSION['image_path']);
            }
        }

        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Prepare the SQL query to update data in the Mentee table
        $sql = 'UPDATE Mentee SET first_name = :first_name, last_name = :last_name, password = :password, image_path = :image_path WHERE email = :email';
        
        // Bind the form data to the prepared statement
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':image_path', $image_path);
        
        // Execute the prepared statement
        $stmt->execute();

        $success_update = 'Your profile information has been updated successfully.';
        $_SESSION['success_update'] = $success_update; 

        // Store the updated data in the session
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['image_path'] = $image_path;

        // Redirect back to the profile page
        header('Location: profile.php');
        exit();
    }
}
?>