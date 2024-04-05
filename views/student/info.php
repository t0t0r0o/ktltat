<?php

require "layout/header.php"
?>
<h1>Thông tin sinh viên</h1>

<h4>Họ tên sinh viên: <?= $user['name'] ?></h4>
<h4>Năm sinh: <?= $user['birthday'] ?></h4>
<h4>Giới tính: <?= getGenderName($user['gender']) ?></h4>
<a href="/?a=edit&id=<?=$user['id']?>">Sửa</a>
<?php
require "layout/footer.php"
?>
