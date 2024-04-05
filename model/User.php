<?php 

class Student {

    public $id;
    public $name;
    public $username;
    public $password;
    public $role_id;
    public $birthday;
    public $gender;
    public $town;
    public $msv;
    public $class;

    function __construct($id, $name, $username, $password,$role_id,$birthday,$gender,$town,$msv,$class) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->role_id = $role_id;
        $this->birthday = $birthday;
        $this->gender = $gender;
        $this->town = $town;
        $this->msv = $msv;
        $this->class = $class;
    }
}

?>