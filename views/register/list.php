<?php
require "layout/header.php"
?>
<h1>Danh sách sinh viên đăng ký môn học</h1>
<a href="add.html" class="btn btn-info">Add</a>
<form action="list.html" method="GET">
    <label class="form-inline justify-content-end">Tìm kiếm: <input type="search" name="search" class="form-control" value="">
        <button class="btn btn-danger">Tìm</button>
    </label>
    <input type="hidden" name="c" value="register">
</form>
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Mã SV</th>
            <th>Tên SV</th>
            <th>Mã MH</th>
            <th>Tên MH</th>
            <th>Điểm</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $order = 0;
        foreach ($registers as $register) {
            $order++;
            ?>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>Nguyễn Thị Bé Bảy</td>
                <td>1</td>
                <td>Toán</td>
                <td>5</td>
                <td><a href="edit.html">Cập nhật điểm</a></td>
                <td><a onclick="return confirm('Bạn muốn xóa đăng ký này phải không?')" href="list.html">Xóa</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<div>
    <span>Số lượng: 4</span>
</div>
<?php
require "layout/footer.php"
?>