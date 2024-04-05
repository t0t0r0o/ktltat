<?php 

class Register {

    public $id;
    public $student_id;
    public $subject_id;
    public $student_name;
    public $subject_name;
    public $student_msv;

    function __construct($id, $student_id,$subject_id,$student_name,$subject_name, $student_msv) {
        $this->id = $id;
        $this->student_id = $student_id;
        $this->subject_id = $subject_id;
        $this->student_name = $student_name;
        $this->subject_name = $subject_name;
        $this->student_msv = $student_msv;
        
    }
}

?>