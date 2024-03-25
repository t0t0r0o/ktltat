<?php
class AuthController
{
    public function index()
    {
        include __DIR__ . '/../views/login.php';
    }


    function save()
    {
        $data = $_POST;
        $userRepository = new UserRepository();
        if ($userRepository->save($data)) {
            $_SESSION["success"] = "Đã tạo sinh viên thành công";
        } else {
            $_SESSION["error"] = $userRepository->error;
        }

        header("Location: /");
    }

    function login()
    {
        $data = $_POST;
        $userRepository = new UserRepository();
        if ($data) {
            $user = $userRepository->login($data);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role_id'] = $user['role_id'];
                header("Location: /");
            } else {
                $_SESSION["error"] = $userRepository->error;
            }
            // header("Location: /?c=auth&a=login");
        }
        require "views/login/login.php";
        // header("Location: /?c=auth&a=login");
    }

    function logout()
    {
        // session_start();

        // Hủy bỏ session
        session_unset();
        session_destroy();

        // Chuyển hướng đến trang đăng nhập
        header("Location: /?c=auth&a=login");
        exit;
        // header("Location: /?c=auth&a=login");
    }

}
