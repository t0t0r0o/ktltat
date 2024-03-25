<?php 

class Session {

    public $id;
    public $session_id;
    public $expiration_time;
    public $optional;

    function __construct($id, $session_id, $expiration_time, $optional) {
        $this->id = $id;
        $this->session_id = $session_id;
        $this->expiration_time = $expiration_time;
        $this->optional = $optional;
    }
}

?>