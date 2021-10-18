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
    <script src="JS/main.js"></script>
    <div class="main">
        <?php
        include 'header.php';
        ?>
        <div class="content-log">
            <div class="wide grid">
                <p class="title-1">
                    Đăng nhập
                </p>
                <?php
                    session_start();
                    include 'config.php';
                    if (isset($_POST["login"])) {
                        // lấy thông tin người dùng
                        $username = $_POST["txtEmail"];
                        $password = $_POST["txtPass"];
                        //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
                        //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
                        if ($username == "" || $password == "") {
                            echo '<p class="title-ok">Chưa nhập đầy đủ thông tin</p>';
                        } else {
                            $sql = "SELECT * from nguoidung where nguoidung_email = '$username' and nguoidung_pass = '$password' ";
                            $query = mysqli_query($conn, $sql);
                            $num_rows = mysqli_num_rows($query);
                            if ($num_rows == 0) {
                                echo '<p class="title-ok">Đăng nhập thất bại</p>';
                            } else {
                                //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                                $_SESSION['nguoidung_eamil'] = $username;
                                // Thực thi hành động sau khi lưu thông tin vào session
                                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                                header('Location: user-index.php');
                            }
                        }
                    }
                    ?>
                <form action="Login.php" method="POST" class="form_log">
                    <label class="title_log">Email </label> <input class="input-log" type="email" name="txtEmail"><br><br>
                    <label class="title_log">Mật khẩu</label> <input class="input-log" type="password" name="txtPass"><br><br>
                    <button type="submit" name="login" class="btn-log">Đăng nhập</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>