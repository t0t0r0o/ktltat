<?php
require "layout/header.php"
?>
<h1>Danh sách sinh viên</h1>
<a href="/?a=add" class="btn btn-info">Add</a>
<form action="/" method="GET">
    <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="<?=$search?>">
        <button class="btn btn-danger">Tìm</button>
    </label>
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Mã SV</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>
            <th>Giới Tính</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $order = 0;
        foreach ($students as $student) {
            $order++;
            ?>
            <tr>
                <td><?= $order ?></td>
                <td><?= $student->id ?></td>
                <td><?= $student->name ?></td>
                <td><?= convertDateToVNFormat($student->birthday) ?></td>
                <td><?= getGenderName($student->gender) ?></td>
                <td><a href="/?a=edit&id=<?=$student->id?>">Sửa</a></td>
                    <td><button class="btn btn-danger btn-sm delete" data-url="/?a=delete&id=<?=$student->id?>">Xóa</button></td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>
<div>
    <span>Số lượng: <?= count($students) ?></span>
</div>
<?php
require "layout/footer.php"
?>
