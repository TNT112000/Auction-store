
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css" class="">
    <link rel="stylesheet" href="../css/grid.css" class="">
    <link rel="stylesheet" href="../css/base.css" class="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="../JS/main.js"></script>
    <div class="main">
        <?php
        include '../header.php';
        ?>
        <div class="content-log">
            <div class="wide grid">
                <p class="title-1">
                    Đăng nhập để được vào trang quản trị
                </p>
                <?php
                // Dịch vụ bảo vệ:
                session_start(); //Công ty dịch vụ Bảo vệ

                if (isset($_POST['sbmGuiDi'])) {
                    $name = $_POST['txtName'];
                    $email = $_POST['txtEmail'];
                    $password = $_POST['txtPass'];

                    // Bước 01: Kết nối DB Server
                    $conn = mysqli_connect('localhost', 'root', '', 'bestbook-store');
                    if (!$conn) {
                        die("Không thể kết nối");
                    }

                    // Bước 02: Truy vấn thông tin
                    $sql = "SELECT * FROM users WHERE  user_name='$name' AND user_email='$email' AND user_password='$password'";
                    $query = mysqli_query($conn, $sql);
                    // Bước 03: Xác thực > Đăng nhập > Ở trên, trả về 1 bản ghi thôi
                    if (mysqli_num_rows($query) > 0) {
                        // Bảo vệ cửa CHÍNH: kiểm tra xác thực
                        $_SESSION['loginOK'] = $email;
                        header("Location: home.php");
                    } else {
                        echo '<p class="title-ok">Đăng nhập thất bại</p>';
                    }
                }
                ?>

                <form action="" method="POST" class="form_log">
                    <label class="title_log">Tên </label> <input class="input-log" type="text" name="txtName"><br><br>
                    <label class="title_log">Email </label> <input class="input-log" type="email" name="txtEmail"><br><br>
                    <label class="title_log">Mật khẩu</label> <input class="input-log" type="password" name="txtPass"><br><br>
                    <button type="submit" name="sbmGuiDi" class="btn-log">Đăng nhập</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>