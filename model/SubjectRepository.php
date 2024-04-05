<?php

class SubjectRepository {



    public $error;

    function getBySearch($search) {
        $cond = "name LIKE '%$search%'";
        $subjects = $this->fetch($cond);
        return $subjects;
    }

    function getAll() {
        return $this->fetch();
    }

    function fetch($cond = null) {
        global $conn;
        $sql = "SELECT * FROM subject";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        $result = $conn->query($sql);
        $subjects = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $subject = new Subject($row["id"], $row["name"], $row["number_of_credit"]);
                $subjects[] = $subject;
            }
        }
        return $subjects;
    }

    function save($data) {
        global $conn;
        $name = filter_injection($data["name"]);
        $number_of_credit = filter_injection($data["number_of_credit"]);
        $sql = "INSERT INTO subject (name, number_of_credit) 
            VALUES('$name', $number_of_credit)";
        if ($conn->query($sql)) {
            return true;
        }
        $this->error = "Error: $sql <br>" .$conn->error ;
        return false;


    }


    function find($id) {
        $cond = "id =$id";
        $subjects = $this->fetch($cond);
        $subject = current($subjects); //Lấy subject tại vị trí con trỏ
        return $subject;
    }

    function update($subject) {
        global $conn;
        $name = filter_injection($subject->name);
        $number_of_credit = filter_injection($subject->number_of_credit);
        $gender = filter_injection($subject->gender);
        $id = filter_injection($subject->id);
        $sql = "UPDATE subject SET name='$name',number_of_credit='$number_of_credit' WHERE id=$id";

        if ($conn->query($sql)) {
            return true;
        } else {
            $this->error = "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    function delete($id) {
        global $conn;
        $sql = "DELETE FROM `subject` WHERE id=$id";
        if ($conn->query($sql)) {
            return true;
        } else {
            $this->error = "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

}

?>