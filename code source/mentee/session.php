<?php 
class Session {
    private $session_id;
    private $start_time;
    private $end_time;
    private $status;
    private $session_date;
    private $mentee_id;
    private $mentor_id;

    public function getSessionId() {
        return $this->session_id;
    }

    public function setSessionId($session_id) {
        $this->session_id = $session_id;
    }

    public function getStartTime() {
        return $this->start_time;
    }

    public function setStartTime($start_time) {
        $this->start_time = $start_time;
    }

    public function getEndTime() {
        return $this->end_time;
    }

    public function setEndTime($end_time) {
        $this->end_time = $end_time;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getSessionDate() {
        return $this->session_date;
    }

    public function setSessionDate($session_date) {
        $this->session_date = $session_date;
    }

    public function getMenteeId() {
        return $this->mentee_id;
    }

    public function setMenteeId($mentee_id) {
        $this->mentee_id = $mentee_id;
    }

    public function getMentorId() {
        return $this->mentor_id;
    }

    public function setMentorId($mentor_id) {
        $this->mentor_id = $mentor_id;
    }
}
?>