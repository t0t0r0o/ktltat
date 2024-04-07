<?php

require "layout/header.php"
?>
<h1>Thông tin sinh viên</h1>
<div class="container mt-5">
    <div class="card">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="../../public/image/avatar.png" alt="Avatar" class="card-img" style="width: 80%; height: auto;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5>Họ tên sinh viên: <?= $user['name'] ?></h5>
                    <h5>Mã sinh viên: <?= $user['msv'] ?></h5>
                    <h5>Lớp: <?= $user['class'] ?></h5>
                    <h5>Năm sinh: <?= $user['birthday'] ?></h5>
                    <h5>Giới tính: <?= getGenderName($user['gender']) ?></h5>
                    <h5>Quê quán: <?= $user['town'] ?></h5>
                    <a href="/?a=edit&id=<?= $user['id'] ?>">Chỉnh sửa thông tin</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    require "layout/footer.php"
    ?>