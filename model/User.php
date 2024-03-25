<?php 

class Student {

    public $id;
    public $name;
    public $username;
    public $password;
    public $role_id;
    public $birthday;
    public $gender;

    function __construct($id, $name, $username, $password,$role_id,$birthday,$gender) {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->role_id = $role_id;
        $this->birthday = $birthday;
        $this->gender = $gender;
    }
}

?>