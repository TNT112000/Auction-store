<?php

session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['loginOK'])) {
    header("Location: index.php");
}

include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style_login.css" />
    <link rel="stylesheet" href="css/base.css" class="">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container sign-in-container">
            <form method="POST">
                <h1>Đổi mật khẩu</h1>
                <div class="social-container">
                    <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <?php
                if (isset($_POST["up-pass"])) {
                    $name = $_POST['name'];
                    $pass1 = $_POST['password1'];
                    $pass2 = $_POST['password2'];

                    $pass1 = md5($pass1);
                    $pass2 = md5($pass2);
                    $sql = "SELECT * FROM users WHERE   user_name='$name' and user_password='$pass1' and user_id=$id ";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        if ($name == $_SESSION['loginOK']) {
                            $sql = "UPDATE users SET user_password='$pass2'  
                                WHERE user_id=$id ";
                            $result = mysqli_query($conn, $sql);
                            if ($result > 0) {
                                echo '<p class="title-ok">Đổi mật khẩu thành công</p>';
                            } else {
                                echo '<p class="title-ok">Đổi mật khẩu thất bại</p>';
                            }
                            mysqli_close($conn);
                        }
                        else {
                            echo '<p class="title-ok">Tên đăng nhập không trùng khớp</p>';
                        }
                    } else {
                        echo '<p class="title-ok">Sai tai khoản hoặc mật khẩu</p>';
                    }
                }
                ?>
                <input type="text" name="name" placeholder="Tên người dùng" autocomplete="off">
                <input type="password" name="password1" placeholder="Mật khẩu cũ" autocomplete="off">
                <input type="password" name="password2" placeholder="Mật khẩu mới">
                <button type="submit" name="up-pass">Xác nhận</button>
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>XIN CHÀO BẠN</h1>
                    <p>Hãy đổi mật khẩu của bạn nếu như bạn cảm thấy tài khoản bị đe dọa</p>
                    <div class="go">
                        <a href="index.php" class="go-in">TRỞ LẠI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>