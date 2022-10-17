<?php

class StudentController {

public function list()
{
    $studentRepository = new StudentRepository();
    $search="";
    if(!empty($_GET["search"])){
        $search=$_GET["search"];
        $students=$studentRepository->getBySearch($search);
    }
    else{
        $students = $studentRepository->getAll();
        // var_dump($students);
    }
    require "views/student/list.php";
}

//add Student
function add()
{
require "views/student/add.php";
}

function save(){
    $data = $_POST;
    $studentRepository = new StudentRepository();
    if($studentRepository->save($data)){
    $_SESSION["success"] = "Đã tạo sinh viên thành công";
    }
    else{
    $_SESSION["error"] = $studentRepository->error;
    }

    header("Location: /");
}

//Edit
function edit(){
    $id=$_GET["id"];
    $studentRepository = new StudentRepository();
    $student=$studentRepository->find($id);
    require "views/student/edit.php";
}

//update

function update(){
    $id = $_POST["id"];
    $student=$studentRepository = new StudentRepository();
    $student=$studentRepository->find($id);
    $student->name=$_POST["name"];
    $student->birthday=$_POST["birthday"];
    $student->gender=$_POST["gender"];

    if($studentRepository->update($student)){
    $_SESSION["success"] = "Đã cập nhật sinh viên thành công";
    }
    else{
    $_SESSION["error"] = $studentRepository->error;
    }

    header("Location: /");
}

function delete(){
    $id = $_GET["id"];
    $student=$studentRepository = new StudentRepository();
    if($studentRepository->delete($id)){
        $_SESSION["success"] = "Đã xóa sinh viên thành công";
        }
        else{
        $_SESSION["error"] = $studentRepository->error;
        }
    
        header("Location: /");
}

}