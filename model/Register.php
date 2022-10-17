<?php 

class Register {

    public $id;
    public $student_id;
    public $subject_id;

    function __construct($id, $student_id,$subject_id) {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->subject_id = $subject_id;
    }
}

?>