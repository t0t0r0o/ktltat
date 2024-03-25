<?php

class StudentController
{
    public function __construct()
    {
        // session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: /?c=auth&a=login");
            exit;
        }
    }

    public function list()
    {
        $userRepository = new UserRepository();

        if ( $user = $userRepository->find($_SESSION['user_id'])) {
            // $user = $userRepository->user;
            // print_r($user);
            // exit;
            require "views/student/info.php";
            return;
        }
        $search = "";
        if (!empty($_GET["search"])) {
            $search = $_GET["search"];
            $users = $userRepository->getBySearch($search);
        } else {
            $users = $userRepository->getAll();
            // var_dump($users);
        }
        require "views/student/list.php";
    }

    //add User
    function add()
    {   
        if($_SESSION['role_id'] == 1) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        require "views/student/add.php";
    }

    function save()
    {   
        if($_SESSION['role_id'] == 1) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        $data = $_POST;
        $userRepository = new UserRepository();
        if ($userRepository->save($data)) {
            $_SESSION["success"] = "Đã tạo sinh viên thành công";
        } else {
            $_SESSION["error"] = $userRepository->error;
        }

        header("Location: /");
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
        $userRepository = new UserRepository();
        $user = $userRepository->find($id);
        require "views/student/edit.php";
    }

    //update

    function update()
    {
        $id = $_POST["id"];
        $user = $userRepository = new UserRepository();
        if($_SESSION['user_id'] != $id) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        $user = $userRepository->find($id);
        $user->name = $_POST["name"];
        $user->birthday = $_POST["birthday"];
        $user->gender = $_POST["gender"];

        if ($userRepository->update($user)) {
            $_SESSION["success"] = "Đã cập nhật sinh viên thành công";
        } else {
            $_SESSION["error"] = $userRepository->error;
        }

        header("Location: /");
    }

    function delete()
    {   
        if($_SESSION['role_id'] == 1) {
            $_SESSION["error"] = 'Not have permission';
            header("Location: /");
            return;
        }
        $id = $_GET["id"];
        $user = $userRepository = new UserRepository();
        if ($userRepository->delete($id)) {
            $_SESSION["success"] = "Đã xóa sinh viên thành công";
        } else {
            $_SESSION["error"] = $userRepository->error;
        }

        header("Location: /");
    }
}
