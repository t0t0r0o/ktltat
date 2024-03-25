<?php

class SubjectController
{
    protected $redirectTo = "/?c=subject";

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /?c=auth&a=login");
            exit;
        }
    }
    public function list()
    {

        $subjectRepository = new SubjectRepository();
        $search = "";
        if (!empty($_GET["search"])) {
            $search = $_GET["search"];
            $subjects = $subjectRepository->getBySearch($search);
        } else {
            $subjects = $subjectRepository->getAll();
            // var_dump($subjects);
        }
        require "views/subject/list.php";
    }

    //add Subject
    function add()
    {   
        if($_SESSION['role_id'] == 1) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        require "views/subject/add.php";
    }

    function save()
    {   
        if($_SESSION['role_id'] == 1) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        $data = $_POST;
        $subjectRepository = new SubjectRepository();
        if ($subjectRepository->save($data)) {
            $_SESSION["success"] = "Đã tạo môn học thành công";
        } else {
            $_SESSION["error"] = $subjectRepository->error;
        }

        header("Location: {$this->redirectTo}");
    }

    //Edit
    function edit()
    {   
        if($_SESSION['role_id'] == 1) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        $id = $_GET["id"];
        $subjectRepository = new SubjectRepository();
        $subject = $subjectRepository->find($id);
        require "views/subject/edit.php";
    }

    //update

    function update()
    {   
        if($_SESSION['role_id'] == 1) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        $id = $_POST["id"];
        $subject = $subjectRepository = new SubjectRepository();
        $subject = $subjectRepository->find($id);
        $subject->name = $_POST["name"];
        $subject->number_of_credit = $_POST["number_of_credit"];


        if ($subjectRepository->update($subject)) {
            $_SESSION["success"] = "Đã cập nhật môn học thành công";
        } else {
            $_SESSION["error"] = $subjectRepository->error;
        }

        header("Location: {$this->redirectTo}");
    }

    function delete()
    {   
        if($_SESSION['role_id'] == 1) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        $id = $_GET["id"];
        $subject = $subjectRepository = new SubjectRepository();
        if ($subjectRepository->delete($id)) {
            $_SESSION["success"] = "Đã xóa môn học thành công";
        } else {
            $_SESSION["error"] = $subjectRepository->error;
        }

        header("Location: {$this->redirectTo}");
    }
}
