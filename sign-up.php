<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style_login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container sign-in-container">
            <form method="POST">
                <h1>Đăng Ký</h1>
                <div class="social-container">
                    <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <?php
                if (isset($_POST["sign-up"])) {
                    $user = $_POST['name'];
                    $email = $_POST['email'];
                    $pass = $_POST['password'];

                    $sql = "SELECT * FROM  users WHERE user_name='$user' and user_email='$email' ";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<p class="title-ok">Email hoặc User đã tồn tại</p>';
                    } else {
                        if ($user != '' && $email != '' && $pass != '') {
                            $pass = md5($pass);
                            $partten = "/^[A-Za-z0-9_\.]{5,18}$/";
                            $subject = $user;
                            if (!preg_match($partten, $subject, $matchs)) {
                                echo '<p class="title-ok">User gồm các ký tự A đến Z từ 0-9 dấu và dấu gạch dưới</p>';
                            }
                            else{
                                $sql = "INSERT INTO users (user_name,user_email,user_password)
                                VALUE ('$user','$email','$pass')";
                                $result = mysqli_query($conn, $sql);
                                if ($result > 0) {
                                    echo '<p class="title-ok">Đăng ký thành công</p>';
                                } else {
                                    echo '<p class="title-ok">Đăng ký thất bại</p>';
                                }
                            }
                        } else {
                            echo '<p class="title-ok">Bạn đã nhập thiếu thông tin<p>';
                        }
                        mysqli_close($conn);
                    }
                }
                ?>
                <input type="text" name="name" placeholder="Tên người dùng" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Mật khẩu" />
                <button type="submit" name="sign-up">Đăng Ký</button>
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>XIN CHÀO BẠN</h1>
                    <p>Hãy đăng ký để đến với trang web của chúng tôi chân thành cảm ơn</p>
                    <div class="go">
                        <a href="index.php" class="go-in">TRỞ LẠI</a>
                        <a href="sign-in.php" class="go-in">ĐĂNG NHẬP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>