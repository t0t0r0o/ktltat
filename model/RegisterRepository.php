<?php

class RegisterRepository {

    public $error;

    function getBySearch($search) {
        $cond = "student_id LIKE '%$search%'";
        $registers = $this->fetch($cond);
        return $registers;
    }

    function getAll() {
        return $this->fetch();
    }

    function fetch($cond = null) {
        global $conn;
        $sql = "SELECT * FROM register";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        $result = $conn->query($sql);
        $registers = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $register = new register($row["id"], $row["student_id"], $row["subject_id"]);
                $registers[] = $register;
            }
        }
        return $registers;
    }

    function save($data) {
        global $conn;
        $student_id = $data["student_id"];
        $subject_id = $data["subject_id"];
        $sql = "INSERT INTO register (student_id, subject_id) 
            VALUES('$student_id', $subject_id)";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "Error: $sql <br>" . $conn->error;
        return false;
    }

    function find($id) {
        $cond = "id =$id";
        $registers = $this->fetch($cond);
        $register = current($registers); //Lấy register tại vị trí con trỏ
        return $register;
    }

    function update($register) {
        global $conn;
        $student_id = $register->student_id;
        $subject_id = $register->subject_id;
        $gender = $register->gender;
        $id = $register->id;
        $sql = "UPDATE register SET student_id='$student_id',subject_id='$subject_id' WHERE id=$id";

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