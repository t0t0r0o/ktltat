<?php

class StudentRepository {
    public $error;

   
    function getBySearch($search) {
        $cond = "name LIKE '%$search%'";
        $students = $this->fetch($cond);
        return $students;
    }
    function getAll() {
        return $this->fetch();
    }

    function fetch($cond = null) {
        global $conn;
        $sql = "SELECT * FROM student";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        $result = $conn->query($sql);
        $students = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student = new Student($row["id"], $row["name"], $row["birthday"], $row["gender"]);
                $students[] = $student;
            }
        }
        return $students;
    }

    function save($data){
        global $conn;
        $name=$data["name"];
        $birthday=$data["birthday"];
        $gender=$data["gender"];
        $sql="INSERT INTO student (name, birthday, gender)
        VALUES ('$name', '$birthday', $gender)
        ";
        if($conn->query($sql)){
            return true;
        }else{
            $this->error= "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
        
    }

    function find($id){
        $cond="id =$id";
        $students=$this->fetch($cond);
        $student=current($students);//Lấy student tại vị trí con trỏ
        return $student;

    }

    function update($student){
        global $conn;
        $name=$student->name;
        $birthday=$student->birthday;
        $gender=$student->gender;
        $id=$student->id;
        $sql="UPDATE student SET name='$name',birthday='$birthday',gender=$gender WHERE id=$id";

        if($conn->query($sql)){
            return true;
        }else{
            $this->error= "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    function delete($id){
        global $conn;
        $sql="DELETE FROM `student` WHERE id=$id";
        if($conn->query($sql)){
            return true;
        }else{
            $this->error= "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

  

}

?>