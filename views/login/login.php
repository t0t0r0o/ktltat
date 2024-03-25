<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Tùy chỉnh CSS */
        .centered-form {
            margin-top: 100px;
            /* Khoảng cách từ trên xuống */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 centered-form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Đăng nhập</h3>
                    </div>
                    <div class="card-body">
                        <form action="/?c=auth&a=login" method="POST">
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input type="text" class="form-control" placeholder="Tên đăng nhập" required name="username">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Mật khẩu" required name="password">
                            </div>
                            <?php
                                if (isset($_SESSION['error'])) {
                                    echo ("<p class='warning'>" . $_SESSION['error'] . "</p>");
                                }
                            ?>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>