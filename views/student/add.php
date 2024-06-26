<?php
require "layout/header.php"
?>
<h1>Thêm sinh viên</h1>
<form action="/?a=save" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" placeholder="Tên của bạn" required name="name">
                </div>
                <div class="form-group">
                    <label>Mã sinh viên</label>
                    <input type="text" class="form-control" placeholder="Mã sinh viên" required name="msv">
                </div>
                <div class="form-group">
                    <label>Lớp</label>
                    <input type="text" class="form-control" placeholder="Lớp" required name="class">
                </div>
                <div class="form-group">
                    <label>Quê quán</label>
                    <input type="text" class="form-control" placeholder="Quê quán" required name="town">
                </div>
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" class="form-control" placeholder="Ngày sinh của bạn" required name="birthday">
                </div>
                <div class="form-group">
                    <label>Chọn Giới tính</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="M">Nam</option>
                        <option value="F">Nữ</option>
                        <option value="K">Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
require "layout/footer.php"
?>