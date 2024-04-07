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


<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Sign in</h3>

                        <!-- <div class="form-outline mb-4">
              <input type="email" id="typeEmailX-2" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div> -->

                        <!-- Checkbox -->
                        <!-- <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button> -->

                        <form action="/?c=auth&a=login" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Tên đăng nhập" required name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" placeholder="Mật khẩu" required name="password">
                            </div>
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo ("<p class='warning'>" . $_SESSION['error'] . "</p>");
                            }
                            ?>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" type="submit">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <body>
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
</body> -->

</html>