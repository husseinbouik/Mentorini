<?php 
class Mentor {
    private $mentor_id;
    private $first_name;
    private $last_name;
    private $email;
    private $created_at;
    private $image_path;
    private $password;
    private $title;
    private $introduction;
    private $about_me;
    private $position;
    private $how_it_works;
    private $why_choose_me_1;
    private $what_you_wil_learn;
    private $session_image_path;

    public function getMentorId() {
        return $this->mentor_id;
    }

    public function setMentorId($mentor_id) {
        $this->mentor_id = $mentor_id;
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

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getIntroduction() {
        return $this->introduction;
    }

    public function setIntroduction($introduction) {
        $this->introduction = $introduction;
    }

    public function getAboutMe() {
        return $this->about_me;
    }

    public function setAboutMe($about_me) {
        $this->about_me = $about_me;
    }

    public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function getHowItWorks() {
        return $this->how_it_works;
    }

    public function setHowItWorks($how_it_works) {
        $this->how_it_works = $how_it_works;
    }

    public function getWhyChooseMe1() {
        return $this->why_choose_me_1;
    }

    public function setWhyChooseMe1($why_choose_me_1) {
        $this->why_choose_me_1 = $why_choose_me_1;
    }

    public function getWhatYouWilLearn() {
        return $this->what_you_wil_learn;
    }

    public function setWhatYouWilLearn($what_you_wil_learn) {
        $this->what_you_wil_learn = $what_you_wil_learn;
    }

    public function getSessionImagePath() {
        return $this->session_image_path;
           }
              }
    ?>