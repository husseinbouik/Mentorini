<?php 
include("connect.php");
class GestionMentees{

    function signIn($email, $password) {
        $mentee = new Mentee();
        $mentee->setEmail($email);
        $mentee->setPassword($password);
    
        $sql = "SELECT * FROM Mentee WHERE email = :email AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $mentee->email);
        $stmt->bindParam(':password', $mentee->password);
        $stmt->execute();
        $result = $stmt->fetch();
    
        if ($result) {
            $mentee->id = $result['id'];
            $mentee->first_name = $result['first_name'];
            $mentee->last_name = $result['last_name'];
    
            $_SESSION['mentee'] = $mentee;
            header("Location: homepage.php");
        } else {
            $message = 'Incorrect email or password.';
            $_SESSION['message'] = $message;
            header("Location: signin.php");
        }
    }
    function signUp($first_name, $last_name, $email, $password, $profile_picture) {


}
}