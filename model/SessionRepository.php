<?php

class SesionRepository {
    public $error;

    function save($data){
        global $conn;
        $session_id=$data["session_id"];
        $session_value=$data["session_value"];
        $expiration_time=$data["expiration_time"];
        $optional=$data["optional"];
        $sql="INSERT INTO session (session_id, session_value, expiration_time,optional )
        VALUES ('$session_id', '$session_value', '$expiration_time', '$optional')
        ";
        if($conn->query($sql)){
            return true;
        }else{
            $this->error= "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }        
    }


    function fetch($session_id = null) {
        global $conn;
        $sql = "SELECT * FROM session";
        if ($session_id) {
            $sql .= " WHERE session_id =  $session_id AND session.expiration_time > NOW()";
        }
        $result = $conn->query($sql);
        $session_id = '';
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $session_id = $row['session_id'];
        }
        return $session_id;
    }
}

?>