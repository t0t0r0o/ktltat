<?php

class RegisterRepository {

    public $error;

    function getBySearch($search) {
        $cond = "user.name LIKE '%$search%' OR subject.name LIKE '%$search%'";
        $registers = $this->fetch($cond);
        return $registers;
    }

    function getAll() {
        return $this->fetch();
    }

    function fetch($cond = null) {
        global $conn;
        $sql = "SELECT register.*, user.name AS student_name, user.msv AS student_msv, subject.name AS subject_name FROM register 
            JOIN user ON register.student_id = user.id
            JOIN subject ON register.subject_id = subject.id";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        $result = $conn->query($sql);
        $registers = [];
        if ( $result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $register = new Register($row["id"], $row["student_id"], $row["subject_id"], $row["student_name"], $row["subject_name"], $row["student_msv"]);
                $registers[] = $register;
            }
        }
        return $registers;
    }

    function save($data) {
        global $conn;
        $student_id = filter_injection($data["student_id"]);
        $subject_id = filter_injection($data["subject_id"]);
        $sql = "INSERT INTO register (student_id, subject_id) 
            VALUES('$student_id', $subject_id)";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "Error: $sql <br>" . $conn->error;
        return false;
    }

    function find($id) {
        $cond = "register.id =$id";
        $registers = $this->fetch($cond);
        $register = current($registers); //Lấy register tại vị trí con trỏ
        return $register;
    }

    function update($register) {
        global $conn;
        $score = filter_injection($register->score);
        $id = filter_injection($register->id);
        $sql = "UPDATE register SET score=$score WHERE id=$id";

        if ($conn->query($sql)) {
            return true;
        } else {
            $this->error = "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    function delete($id) {
        global $conn;
        $sql = "DELETE FROM `register` WHERE id=$id";
        if ($conn->query($sql)) {
            return true;
        } else {
            $this->error = "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

}
?>