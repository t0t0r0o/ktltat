<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Quản lý sinh viên</title>
        <link rel="stylesheet" href="public/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
        <link rel="stylesheet" href="public/css/style.css">
    </head>
    <body>
        <?php
        //Bên trong hàm không nhìn thấy biến ngoài hàm
        global $c;
        ?>
        <div class="container" style="margin-top:20px;">
        <a href="/" class="<?=$c=='student' ? "active": ""?> btn btn-info">Students</a>
			<a href="/?c=subject" class="<?=$c=='subject' ? "active": ""?> btn btn-info">Subject</a>
			<a href="/?c=register" class="<?=$c=='register' ? "active": ""?> btn btn-info">Register</a>
			<a href="/?c=auth&a=logout" class="flex-end ">Log out</a>
            <?php
            $message = "";
            //Nếu tồn tại và có giá trị success
            if (!empty($_SESSION["success"])) {
                $message = $_SESSION["success"];
                $messageClass = "alert-success";
                //Xóa phần tử dựa vào key
                unset($_SESSION["success"]);
            } else if (!empty($_SESSION["error"])) {
                $message = $_SESSION["error"];
                $messageClass = "alert-danger";
                //Xóa phần tử dựa vào key
                unset($_SESSION["error"]);
            }
            ?>
            <?php if ($message) {
                ?>
                <div class="mt-5 alert <?= $messageClass ?> ">
                    <?= $message ?>
                </div>
            <?php }
            ?>