

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" class="">
    <link rel="stylesheet" href="css/grid.css" class="">
    <link rel="stylesheet" href="css/base.css" class="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="main">
        <?php
        include 'header.php'
        ?>
        <div class="content-log">
            <div class="wide grid">
                <p class="title-1">
                    Đăng ký
                </p>
                <?php
                if (isset($_POST["dangky"])) {
                    $user = $_POST['txtUser'];
                    $email = $_POST['txtEmail'];
                    $pass1 = $_POST['txtPass1'];
                    $pass2 = $_POST['txtPass2'];

                    include 'config.php';

                    $sql = "SELECT * FROM  nguoidung WHERE nguoidung_email='$email' ";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<p class="title-ok">Email đã tồn tại</p>';
                    } else {
                        if ($pass1 != $pass2) {
                            echo '<p class="title-ok">Mật khẩu nhập lại không đúng</p>';
                        } else {
                            if ($user != '' && $email != '' && $pass1 != '') {
                                $sql = "INSERT INTO nguoidung (nguoidung_name,nguoidung_email,nguoidung_pass)
                                VALUE (' $user','$email',' $pass1')";
                                $result = mysqli_query($conn, $sql);
                                if ($result > 0) {
                                    echo '<p class="title-ok">Đăng ký thành công</p>';
                                } else {
                                    echo '<p class="title-ok">Đăng ký thất bại</p>';
                                }
                            } else {
                                echo '<p class="title-ok">Bạn đã nhập thiếu thông tin<p>';
                            }
                            mysqli_close($conn);
                        }
                    }
                }
                ?>
                <form action="" method="POST" class="form_log">
                    <label class="title_log">Tên người dùng</label> <input class="input-log" type="text" name="txtUser"><br><br>
                    <label class="title_log">Email </label> <input class="input-log" type="email" name="txtEmail"><br><br>
                    <label class="title_log">Mật khẩu</label> <input class="input-log" type="password" name="txtPass1"><br><br>
                    <label class="title_log">Nhập lại mật khẩu</label> <input class="input-log" type="password" name="txtPass2"><br><br>
                    <button type="submit" name="dangky" class="btn-log">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>