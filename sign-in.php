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

    <div class="form-container sign-in-container">
      <form method="POST">
        <h1>Đăng Nhập</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <?php

        session_start();

        if (isset($_POST['sign-in'])) {
          $name = $_POST['name'];
          $password = $_POST['password'];

          if ($name == "" || $password == "") {
            echo '<p class="title-ok">Chưa nhập đầy đủ thông tin</p>';
          } else {
            $password = md5($password);
            $partten = "/^[A-Za-z0-9_\.]{5,18}$/";
            $subject = $name;
            if (!preg_match($partten, $subject, $matchs)) {
              echo '<p class="title-ok">User gồm các ký tự A đến Z từ 0-9 dấu và dấu gạch dưới</p>';
            } else {
              $sql = "SELECT * FROM users WHERE  user_name='$name' AND user_password='$password'";
              $query = mysqli_query($conn, $sql);
              if (mysqli_num_rows($query) > 0) {
                if (($name == "admin")) {
                  if (mysqli_num_rows($query) > 0) {

                    $_SESSION['loginOK'] = $name;
                    header("Location: admin/home.php");
                  } else {
                    echo '<p class="title-ok">Đăng nhập thất bại</p>';
                  }
                } else {
                  if (mysqli_num_rows($query) > 0) {

                    $_SESSION['loginOK'] = $name;
                    header("Location: index.php");
                  } else {
                    echo '<p class="title-ok">Đăng nhập thất bại</p>';
                  }
                }
              } else {
                echo '<p class="title-ok">Tài khoản hoặc mật khẩu sai</p>';
              }
            }
          }
        }
        ?>
        <input type="text" name="name" placeholder="Tên người dùng" />
        <input type="password" name="password" placeholder="Mật khẩu" />
        <button type="submit" name="sign-in">Đăng Nhập</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1>XIN CHÀO BẠN</h1>
          <p>Hãy đăng nhập để đến với trang web của chúng tôi chân thành cảm ơn</p>
          <div class="go">
            <a href="index.php" class="go-in">TRỞ LẠI</a>
            <a href="sign-up.php" class="go-in">ĐĂNG KÝ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


</html>