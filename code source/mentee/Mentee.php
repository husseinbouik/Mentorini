<?php
class Mentee {
    private $mentee_id;
    private $first_name;
    private $last_name;
    private $email;
    private $created_at;
    private $image_path;
    private $password;
    private $db;

    public function getMenteeId() {
        return $this->mentee_id;
    }

    public function setMenteeId($mentee_id) {
        $this->mentee_id = $mentee_id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getImagePath() {
        return $this->image_path;
    }

    public function setImagePath($image_path) {
        $this->image_path = $image_path;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }  
    public function get_mentee_by_id($mentee_id) {
        // Connect to the database
        $this->db = new PDO('mysql:host=localhost;dbname=mentorini', 'root', '');
    
        // Prepare the SQL query to select the mentee with the given ID
        $sql = 'SELECT * FROM Mentee WHERE mentee_id = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$mentee_id]);
    
        // Fetch the mentee's data from the database
        $mentee_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Set the mentee object's properties based on the retrieved data
        $this->setFirstName($mentee_data['first_name']);
        $this->setLastName($mentee_data['last_name']);
        $this->setEmail($mentee_data['email']);
        $this->setPassword($mentee_data['password']);
     $this->setImagePath($mentee_data['image_path']);
        // Store the mentee object in the session
        $_SESSION['mentee'] = $this;
    }

}